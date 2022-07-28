<?php

    // [GET] /
    function getIndex($smarty, $dbh) {

        // get all posts from the database
        try {

            $sql = "SELECT posts.postID, posts.title, posts.content, posts.createdAt, user.username FROM posts INNER JOIN user ON posts.userID = user.userID ORDER BY posts.postID DESC";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        }
        // error-handling
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        
        // assign data to template and render template
        $smarty->assign('res', $res);
        $smarty->assign('_SESSION', $_SESSION);
        $smarty->display('index.html');
    }

    // [GET] /register
    function getRegister($smarty) {
        
        // assign data to template and render template
        $smarty->assign('_SESSION', $_SESSION);
        $smarty->display('register.html');
    }

    // [POST] /register
    function postRegister($smarty, $dbh) {
        
        if(isset($_POST['submit'])) {
            
            // error handling
            $error = false;
            $error_msg = null;

            // username is empty
            if(isset($_POST['username']) && $_POST['username'] == '') {
                $error_msg .= '<p>Please enter a username!</p>';
                $error = true;
            }

            // password is empty
            if(isset($_POST['password']) && $_POST['password'] == '') {
                $error_msg .= '<p>Please enter a password!</p>';
                $error = true;
            }

            // check if user already exist
            if(isset($_POST['username']) && isset($_POST['password'])) {                
                try {
                    // username and password from the register form
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    
                    // encrypt password 
                    $enc_pw = hash('md5', $password);

                    // sql command
                    $sql = "SELECT * FROM user WHERE username = '$username'";
                    
                    // prepare, execute and fetch the database
                    $stmt = $dbh->prepare($sql);
                    $stmt->execute();
                    $res = $stmt->fetch();
                    
                    // error-handling: user already exist
                    if ($username == $res['username'] ??= '') {
                        $error_msg .= 'The username is already in use...';
                        $error = true;
                    }

                    // user did not exist. insert the new user into the database
                    if ($username != $res['username'] ??= '') {

                        try {
                            
                            $sql = "INSERT INTO user (username, password) VALUES (:username, :password)";
                            $dbc = $dbh->prepare($sql);

                            $dbc->execute(array(
                                ':username' => $username,
                                ':password' => $enc_pw
                            ));

                            $smarty->display('register_success.html');
                        }
                        // error-handling
                        catch(PDOException $e) {
                            $error_msg .= 'Database-Error: <br>';
                            $error_msg .= $e->getMessage();
                            $error = true;
                        }
                        
                    }

                }
                // error handling
                catch(PDOException $e) {
                    $error_msg .= 'Database-Error: <br>';
                    $error_msg .= $e->getMessage();
                    $error = true;
                }
                
            }

            // render error template
            if ($error) {
                $smarty->assign('err_msg', $error_msg);
                $smarty->display('register_error.html');
            }

        }
    }

    // [GET] /login
    function getLogin($smarty) {
        // render login template
        $smarty->display('login.html');
    }

    // [POST] /login
    function postLogin($smarty, $dbh) {

        if (isset($_POST['submit'])) {
            // error-handling output
            $err_msg = null;

            // get username and password from form
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            // hash password with md5-algorithm
            $enc_pw = hash('md5', $password);

            // username is empty
            if (isset($_POST['username']) && $_POST['username'] == '') {
                $err_msg .= 'Please enter a username...';
            }
            
            // password is empty
            if (isset($_POST['password']) && $_POST['password'] == '') {
                $err_msg .= 'Please enter a password...';
            }

            // render error template if there is an error
            if ($err_msg != null) {
                $smarty->assign('err_msg', $err_msg);
                return $smarty->display('login_error.html');
            }

            // query database if there is no error
            if ($err_msg == null) {
                
                try {
                    // sql command
                    $sql = "SELECT username, password, userID FROM user WHERE username = '$username'";
                    
                    // prepare, execute and fetch the database
                    $dbc = $dbh->prepare($sql);
                    $dbc->execute();
                    $res = $dbc->fetch();
                    
                    // error-handling: user already exist
                    if ($username == $res['username'] && $enc_pw == $res['password']) {
                        $_SESSION['sid'] = session_id();
                        $_SESSION['username'] = $username;
                        $_SESSION['userID'] = $res['userID'];
                        
                        $smarty->assign('username', $username);
                        return $smarty->display('login_success.html');
                    }
                }
                catch (PDOException $e) {
                    $err_msg .= 'Database-Error: ';
                    $err_msg .= $e->getMessage();

                    return $smarty->display('login_error.html');
                }

            }

        }

    }

    // [GET] /logout
    function getLogout($smarty) {
        
        // unset all session-variables and destroy the session.
        session_unset();
        session_destroy();

        // render template
        return $smarty->display('logout.html');
    }

    // [GET] /posts/new
    function getNewPost($smarty) {
        // assign data to template and render template
        $smarty->assign('_SESSION', $_SESSION);
        $smarty->display('posts/new.html');
    }
    
    // [POST] /posts/new
    function postNewPost($smarty, $dbh) {

        // checks if the submit button was pressed 
        if(isset($_POST['submit'])) {
            
            // variable for error messages
            $err_msg = null;

            // empty title
            if (isset($_POST['title']) && $_POST['title'] == '') {
                $err_msg .= '<p>Please enter a title.</p>';
            }

            // empty content
            if (isset($_POST['content']) && $_POST['content'] == '') {
                $err_msg .= '<p>Please fill in some content.</p>';
            }

            // write new post to database if there is no error
            if ($err_msg == null) {

                try {
                    // get the title and content from the form data.
                    $title = $_POST['title'];
                    $content = $_POST['content'];

                    // sql-query
                    $sql = "INSERT INTO posts (userID, title, content) VALUES (:userID, :title, :content)";
                    $stmt = $dbh->prepare($sql);
                    
                    $stmt->execute(array(
                        'userID' => $_SESSION['userID'],
                        'title' => $title,
                        'content' => $content
                    ));

                    // assign data to template and render template
                    $smarty->assign('_SESSION', $_SESSION);
                    return $smarty->display('posts/new_success.html');
                }
                // error-handling
                catch (PDOException $e) {
                    $err_msg .= '<p>Database-Error</p>';
                    $err_msg .= '<p>' . $e->getMessage() . '</p>';
                }

                // render error template if there is an error message.
                if ($err_msg != null) {
                    $smarty->assign('_SESSION', $_SESSION);
                    $smarty->assign('err_msg', $err_msg);
                    return $smarty->display('posts/new.html');
                }

            }

        }

    }

    // [GET] /posts/details/$postID
    function getPostDetails($smarty, $dbh, $postID) {
        
        // query database for detail data of the blog post with $postID
        try {

            $sql = "SELECT posts.postID, posts.title, posts.content, posts.createdAt, user.username FROM posts INNER JOIN user ON posts.userID = user.userID WHERE posts.postID = '$postID'";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        }

        // error-handling
        catch (PDOException $e) {
            echo 'Database-Error: <br/>';
            echo $e->getMessage();
        }

        // query database for the data of the comments for this blog post
        try {
            $sql = "SELECT comments.title, comments.content, comments.createdAt, user.username FROM comments INNER JOIN user ON comments.userID = user.userID WHERE comments.postID = $postID ORDER BY comments.commentID DESC";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            $resComments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // error-handling
        catch (PDOException $e) {
            echo 'Database-Error: <br/>';
            echo $e->getMessage();
        }

        // assign data to template and render template
        $smarty->assign('resComments', $resComments);
        $smarty->assign('res', $res);
        $smarty->assign('_SESSION', $_SESSION);
        $smarty->display('posts/details.html');

    }

    // [POST] /comments/new
    function postNewComment($smarty, $dbh) {
        
        // check if the submit button was pressed.
        if(isset($_POST['submit'])) {

            // variable for error messages
            $err_msg = null;

            // title is empty
            if (isset($_POST['title']) && $_POST['title'] == '') {
                $err_msg .= '<p>Please enter a title for your comment.</p>';
            }

            // password is empty
            if (isset($_POST['content']) && $_POST['content'] == '') {
                $err_msg .= '<p>Please fill in some content.</p>';
            }

            // check if ther is an error
            if ($err_msg == null) {

                // insert data for a new blog post into the 'posts' table
                try {

                    // get the data from the form.
                    $postID = $_POST['postID'];
                    $title = $_POST['title'];
                    $content = $_POST['content'];

                    // sql-query
                    $sql = "INSERT INTO comments (postID, userID, title, content) VALUES (:postID, :userID, :title, :content)";
                    $stmt = $dbh->prepare($sql);
                    $stmt->execute(array(
                        'postID' => $postID,
                        'userID' => $_SESSION['userID'],
                        'title' => $title,
                        'content' => $content
                    ));

                    // assign data to template and render template
                    $smarty->assign('_SESSION', $_SESSION);
                    $smarty->display('posts/comment_posted.html');
                    
                }

                // error-handling
                catch (PDOException $e) {
                    echo 'Database-Error: <br/>';
                    echo $e->getMessage();
                }

            }
        }
    }

    // [GET] /profile
    function getUserProfile($smarty, $dbh) {

        // query database for the profile data (userdata, posts, pictures) for the actual user
        try {
            // query 1 -> user
            $sql = "SELECT * FROM user WHERE username = '{$_SESSION['username']}'";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            $resUser = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // query 2 -> posts
            $sql = "SELECT * FROM posts WHERE userID = '{$_SESSION['userID']}'";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            $resPosts = $stmt->fetchAll();

            // query 3 -> pictures
            $sql = "SELECT * FROM pictures WHERE userID = '{$_SESSION['userID']}'";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            $resPictures = $stmt->fetchAll();

            // assign data to template and render template
            $smarty->assign('res', $resUser);
            $smarty->assign('resPosts', $resPosts);
            $smarty->assign('resPictures', $resPictures);
            $smarty->assign('_SESSION', $_SESSION);
            $smarty->display('user_profile.html');
        }

        // error-handling
        catch (PDOException $e) {
            echo 'Database-Error: ';
            echo $e->getMessage();
        }
        

    }

    // [GET] /pictures
    function getPicturesIndex($smarty, $dbh) {

        // query the database for pictures data
        try {
            // sql-query
            $sql = "SELECT pictures.filename_original, pictures.filename_new, pictures.createdAt, user.username FROM pictures INNER JOIN user ON pictures.userID = user.userID;";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            // result
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // error-handling
        catch (PDOException $e) {
            echo 'Database-Error:';
            echo $e->getMessage();
        }
        
        // assign data to template and render template
        $smarty->assign('res', $res);
        $smarty->assign('_SESSION', $_SESSION);
        $smarty->display('picture-gallery.html');

    }

    // [POST] /pictures
    function postNewPicture($smarty, $dbh) {
        
        // check if the button in the form was pressed
        if (isset($_POST['submit'])) {

            // variable for error messages
            $err_msg = false;

            // no file selected to upload
            if(!isset($_FILES['file'])) {
                $err_msg .= 'Please select a picture to upload!';
            }

            // check if there are no errors
            if ($err_msg == false) {

                // variable to check errors during upload
                $uploadOk = true;
                
                // directory to upload the file into
                $target_dir = __DIR__ . '/../picture_uploads/';
                
                // original filename
                $originalFilename = $_FILES['file']['name'];
                
                // cut the filename out of the string to get the file-extension
                $fileextension = pathinfo($originalFilename, PATHINFO_EXTENSION);
                
                // uuid v4 generated filename
                $newFilename = uuidv4() .'.'. $fileextension;
                
                // generate uuid v4 for the extension and combine it with the target directory and the
                // file extension
                $target_filename = $target_dir . $newFilename;                
                
                // size of the uploaded file
                $filesize = $_FILES['file']['size'];

                // check if the uploaded picture is realy a picture
                if ($fileextension != 'jpg' && $fileextension != 'jpeg' && $fileextension != 'png' && $fileextension != 'gif') {
                    $err_msg .= 'Your uploaded picture is not a picture!';
                    $uploadOk = false;
                }
                
                // check if the filename already exist
                if (file_exists($target_filename)) {
                    $err_msg .= 'The uploaded file already exist...';
                    $uploadOk = false;
                }

                // something went wrong due the file upload
                if ($uploadOk == false) {
                    $err_msg .= 'Your file was not uploaded...';
                }
                
                // move uploaded file to targer directory if all is okay
                if ($uploadOk == true) {
                    
                    // when the file can be moved, the meta-data of the file will be written to the database.
                    if(move_uploaded_file($_FILES['file']['tmp_name'], $target_filename)) {
                        
                        try {
                            $sql = "INSERT INTO pictures (userID, filename_original, filename_new, filesize) VALUES (:userID, :filename_original, :filename_new, :filesize)";
                            $stmt = $dbh->prepare($sql);
                            $stmt->execute([
                            'userID' => $_SESSION['userID'],
                            'filename_original' => $originalFilename,
                            'filename_new' => $newFilename,
                            'filesize' => $filesize
                            ]);
                        }

                        // error-handling
                        catch(PDOException $e) {
                            echo 'Database-Error:';
                            echo $e->getMessage();
                        }
                        
                        // assign data to template and render template
                        $smarty->assign('_SESSION', $_SESSION);
                        $smarty->display('upload_success.html');
                    } else {
                        echo 'nööööööööö';
                        echo $_FILES['file']['error'];
                    }
                }
                

            }

        }

    }

    function getEditBlogPost($smarty, $dbh, $postID) {
        
        // query database for data with the $postID
        try {

            // sql-query
            $sql = "SELECT * FROM posts WHERE postID = '$postID'";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            // result
            $res = $stmt->fetch();

            // assign data to template and render template
            $smarty->assign('res', $res);
            $smarty->assign('_SESSION', $_SESSION);
            $smarty->display('posts/edit_post.html');

        }

        // error-handling
        catch (PDOException $e) {
            echo 'Database-Error:';
            echo $e->getMessage();
        }

    }

    function postEditBlogPost($smarty, $dbh, $postID) {
        
        // check if the button on the form was pressed.
        if (isset($_POST['submit'])) {

            // get the data from the form
            $title = $_POST['title'];
            $content = $_POST['content'];

            try {
                // sql-query
                $sql = "UPDATE posts SET title = '$title', content = '$content' WHERE postID = '$postID'";
                $stmt = $dbh->prepare($sql);
                $stmt->execute();

                // assign data to template and render template
                $smarty->assign('_SESSION', $_SESSION);
                $smarty->display('posts/edit_success.html');
            }

            // error-handling
            catch(PDOException $e) {
                echo 'Database-Error:';
                echo $e->getMessage();
            }

        }
    }

    function getDelPost($smarty, $dbh, $postID) {

        // query the database to delete the blog post with the $postID
        try {
            // sql-query
            $sql = "DELETE FROM posts WHERE postID = '$postID'";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            // assign data to template and render template
            $smarty->assign('_SESSION', $_SESSION);
            $smarty->display('posts/delete_post.html');

        } 
        
        // error-handling
        catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    function getDelPicture($smarty, $dbh, $pictureID) {

        // query the database to delete the picture with the $pictureID
        try {
            // sql-query
            $sql = "DELETE FROM pictures WHERE pictureID = '$pictureID'";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            // assign data to template and render template
            $smarty->assign('_SESSION', $_SESSION);
            $smarty->display('posts/delete_pic.html');

        } 
        // error-handling
        catch (PDOException $e) {
            echo 'Database-Error: ';
            echo $e->getMessage();
        }

    }



    // function for generating uuidv4 ids for the picture filenames.
    function uuidv4($data = null) {
        // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        $data = $data ?? random_bytes(16);
        assert(strlen($data) == 16);
    
        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    
        // Output the 36 character UUID.
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }