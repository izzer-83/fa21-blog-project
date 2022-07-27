<?php

    // [GET] /
    function getIndex($smarty, $dbh) {

        try {

            $sql = "SELECT posts.postID, posts.title, posts.content, posts.createdAt, user.username FROM posts INNER JOIN user ON posts.userID = user.userID ORDER BY posts.postID DESC";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        }

        catch (PDOException $e) {
            echo $e->getMessage();
        }
        
        $smarty->assign('res', $res);
        $smarty->assign('_SESSION', $_SESSION);
        $smarty->display('index.html');
    }

    // [GET] /register
    function getRegister($smarty) {
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
            if(isset($_POST['username']) && isset($_POST['username'])) {                
                try {
                    // username and password from the register form
                    $username = htmlspecialchars($_POST['username']);
                    $password = htmlspecialchars($_POST['password']);
                    
                    // encrypt password 
                    $enc_pw = hash('md5', $password);

                    // sql command
                    $sql = "SELECT username, password, userID FROM user WHERE username = '$username'";
                    
                    // prepare, execute and fetch the database
                    $dbc = $dbh->prepare($sql);
                    $dbc->execute();
                    $res = $dbc->fetch();

                    // error-handling: user already exist
                    if ($username == $res['username']) {
                        $error_msg .= 'The username is already in use...';
                        $error = true;
                    }

                    // user did not exist. insert the new user into the database
                    if ($username != $res['username']) {

                        try {
                            
                            $sql = "INSERT INTO user (username, password) VALUES (:username, :password)";
                            $dbc = $dbh->prepare($sql);

                            $dbc->execute(array(
                                ':username' => $username,
                                ':password' => $enc_pw
                            ));

                            $smarty->display('register_success.html');
                        }
                        
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
        $smarty->display('login.html');
    }

    // [POST] /login
    function postLogin($smarty, $dbh) {

        if (isset($_POST['submit'])) {
            // error-handling output
            $err_msg = null;

            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $enc_pw = hash('md5', $password);

            if (isset($_POST['username']) && $_POST['username'] == '') {
                $err_msg .= 'Please enter a username...';
            }
            
            if (isset($_POST['password']) && $_POST['password'] == '') {
                $err_msg .= 'Please enter a password...';
            }

            if ($err_msg != null) {
                $smarty->assign('err_msg', $err_msg);
                return $smarty->display('login_error.html');
            }

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
        session_unset();
        session_destroy();

        return $smarty->display('logout.html');
    }

    // [GET] /posts/new
    function getNewPost($smarty) {
        $smarty->assign('_SESSION', $_SESSION);
        $smarty->display('posts/new.html');
    }
    
    // [POST] /posts/new
    function postNewPost($smarty, $dbh) {

        if(isset($_POST['submit'])) {
            
            $err_msg = null;

            if (isset($_POST['title']) && $_POST['title'] == '') {
                $err_msg .= '<p>Please enter a title.</p>';
            }

            if (isset($_POST['content']) && $_POST['content'] == '') {
                $err_msg .= '<p>Please fill in some content.</p>';
            }

            if ($err_msg == null) {

                try {

                    $title = $_POST['title'];
                    $content = $_POST['content'];

                    $sql = "INSERT INTO posts (userID, title, content) VALUES (:userID, :title, :content)";
                    $stmt = $dbh->prepare($sql);
                    
                    $stmt->execute(array(
                        'userID' => $_SESSION['userID'],
                        'title' => $title,
                        'content' => $content
                    ));

                    $smarty->assign('_SESSION', $_SESSION);
                    return $smarty->display('posts/new_success.html');
                }
                catch (PDOException $e) {
                    $err_msg .= '<p>Database-Error</p>';
                    $err_msg .= '<p>' . $e->getMessage() . '</p>';
                }

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
        
        try {

            $sql = "SELECT posts.postID, posts.title, posts.content, posts.createdAt, user.username FROM posts INNER JOIN user ON posts.userID = user.userID WHERE posts.postID = '$postID'";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        }

        catch (PDOException $e) {
            echo 'Database-Error: <br/>';
            echo $e->getMessage();
        }

        try {
            $sql = "SELECT comments.title, comments.content, comments.createdAt, user.username FROM comments INNER JOIN user ON comments.userID = user.userID WHERE comments.postID = $postID ORDER BY comments.commentID DESC";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();

            $resComments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        catch (PDOException $e) {
            echo 'Database-Error: <br/>';
            echo $e->getMessage();
        }

        $smarty->assign('resComments', $resComments);
        $smarty->assign('res', $res);
        $smarty->assign('_SESSION', $_SESSION);
        $smarty->display('posts/details.html');

    }

    // [POST] /comments/new
    function postNewComment($smarty, $dbh) {
        if(isset($_POST['submit'])) {

            $err_msg = null;

            if (isset($_POST['title']) && $_POST['title'] == '') {
                $err_msg .= '<p>Please enter a title for your comment.</p>';
            }

            if (isset($_POST['content']) && $_POST['content'] == '') {
                $err_msg .= '<p>Please fill in some content.</p>';
            }

            if ($err_msg == null) {

                try {

                    $postID = $_POST['postID'];
                    $title = $_POST['title'];
                    $content = $_POST['content'];

                    $sql = "INSERT INTO comments (postID, userID, title, content) VALUES (:postID, :userID, :title, :content)";
                    $stmt = $dbh->prepare($sql);
                    $stmt->execute(array(
                        'postID' => $postID,
                        'userID' => $_SESSION['userID'],
                        'title' => $title,
                        'content' => $content
                    ));

                    $smarty->assign('_SESSION', $_SESSION);
                    $smarty->display('posts/comment_posted.html');
                    
                }

                catch (PDOException $e) {
                    echo 'Database-Error: <br/>';
                    echo $e->getMessage();
                }

            }
        }
    }

    // [GET] /profile
    function getUserProfile($smarty, $dbh) {

        $sql = "SELECT * FROM user WHERE username = '{$_SESSION['username']}'";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();

        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $smarty->assign('res', $res);
        $smarty->assign('_SESSION', $_SESSION);
        $smarty->display('user_profile.html');

    }

    // [GET] /pictures
    function getPicturesIndex($smarty, $dbh) {

        $smarty->assign('_SESSION', $_SESSION);
        $smarty->display('picture-gallery.html');

    }

    // [POST] /pictures
    function postNewPicture($smarty, $dbh) {
        
        if (isset($_POST['submit'])) {

            $err_msg = false;

            if(!isset($_FILES['file'])) {
                $err_msg .= 'Please select a picture to upload!';
            }

            if ($err_msg == false) {

                // variable to check errors during upload
                $uploadOk = true;
                // directory to upload the file into
                $target_dir = '/opt/lampp/htdocs/picture_uploads/';
                
                // original filename
                $originalFilename = $_FILES['file']['name'];
                // cut the filename out of the string to get the file-extension
                $fileextension = pathinfo($originalFilename, PATHINFO_EXTENSION);
                // generate uuid v4 for the extension and combine it with the target directory and the
                // file extension
                $target_filename = $target_dir . $_FILES['file']['name'];                
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

                if ($uploadOk == false) {
                    $err_msg .= 'Your file was not uploaded...';
                }
                
                // move uploaded file to targer directory if all is okay
                if ($uploadOk == true) {
                    
                    
                    if(move_uploaded_file($_FILES['files']['tmp_name'], __DIR__ . '/../picture_uploads/'.$_FILES['file']['name'])) {
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







    // function for generating uuidv4 ids for the filenames.
    function uuidv4($data = null) {
        // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        $data = $data ?? random_bytes(16);
        assert(strlen($data) == 16);
    
        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    
        // Output the 36 character UUID.
        return vsprintf('%s%s_%s_%s_%s_%s%s%s', str_split(bin2hex($data), 4));
    }