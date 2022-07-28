<?php

    // Require the composer autoloader
    require __DIR__ . '/vendor/autoload.php';

    // require config and functions
    require_once __DIR__ . '/src/config.php';
    require_once __DIR__ . '/src/functions.php';
    

    // [GET] index route
    $router->get('/', function() use ($smarty, $dbh) {          
        getIndex($smarty, $dbh);
    });

    // [GET] route to register to the blog
    $router->get('/register', function() use ($smarty) {
        getRegister($smarty);
    });

    // [POST] route to write a new user to the database
    $router->post('/register', function() use ($smarty, $dbh) {        
        postRegister($smarty, $dbh);
    });

    // [GET] route to login to the blog
    $router->get('/login', function() use ($smarty) {
        getLogin($smarty);
    });

    // [POST] route to query the database, do the login and start the session
    // for the user
    $router->post('/login', function() use ($smarty, $dbh) {        
        postLogin($smarty,$dbh);
    });

    // [GET] route to logout the user and unset/destroy the session
    $router->get('/logout', function() use ($smarty) {
        getLogout($smarty);
    });

    // [GET] route to write a new blog post
    $router->get('/posts/new', function() use ($smarty) {
        getNewPost($smarty);
    });

    // [POST] route to save the new blog post to the database
    $router->post('/posts/new', function() use ($smarty, $dbh) {
        postNewPost($smarty, $dbh);
    });

    // [GET] route to see the details of a blog post and post comments on the
    // details page
    $router->get('/posts/details/(\d+)', function($postID) use ($smarty, $dbh) {
        getPostDetails($smarty, $dbh, $postID);
    });

    // [POST] route to save a new comment from a blog post details page
    $router->post('/comments/new', function() use ($smarty, $dbh) {
        postNewComment($smarty,$dbh);
    });

    // [GET] route for the users profile page
    $router->get('/profile', function() use ($smarty, $dbh) {
        getUserProfile($smarty, $dbh);
    });

    // [GET] route to view the uploaded pictures
    $router->get('/pictures', function() use ($smarty, $dbh) {
        getPicturesIndex($smarty, $dbh);
    });

    // [POST] route to upload a new picture
    $router->post('/pictures', function() use ($smarty, $dbh) {
        postNewPicture($smarty, $dbh);
    });

    // [GET] route to edit blog posts
    $router->get('/profile/posts/edit/(\d+)', function($postID) use ($smarty, $dbh)
    {
        getEditBlogPost($smarty, $dbh, $postID);
    });
    
    // [POST] route to update the blog posts database entrys
    $router->post('/profile/posts/edit/(\d+)', function($postID) use ($smarty, $dbh)
    {
        postEditBlogPost($smarty, $dbh, $postID);
    });

    // [GET] route to delete a blog post
    $router->get('/profile/posts/delete/(\d+)', function($postID) use ($smarty, $dbh)
    {
        getDelPost($smarty, $dbh, $postID);
    });

    // [GET] route to delete a picture
    $router->get('/profile/pictures/delete/(\d+)', function($pictureID) use ($smarty, $dbh)
    {
        getDelPicture($smarty, $dbh, $pictureID);
    });

    // run the router
    $router->run();

?>