<?php
    // start session
    session_start();

    // Create instance of bramus router
    $router = new \Bramus\Router\Router();
    //$router->setBasePath('/blog-proj');
    
    // Create instance of smarty
    $smarty = new Smarty();

    // Configure dirs for smarty
    $smarty->setTemplateDir(__DIR__ . '/../templates');
    $smarty->setConfigDir(__DIR__ . '/../vendor/smarty/smarty/config');
    $smarty->setCompileDir(__DIR__ . '/../templates_compile');
    $smarty->setCacheDir(__DIR__ . '/../templates_cache');

    // Database connection info
    $db_info['host'] = 'localhost';
    $db_info['db_name'] = 'blog';
    $db_info['username'] = 'root';
    $db_info['password'] = '';
    
    // create PDO instance and connect to database
    try 
    {
        $dbh = new PDO("mysql:host={$db_info['host']};dbname={$db_info['db_name']}", $db_info['username'], $db_info['password']);
    }
    
    catch (PDOException $e) 
    {
        echo 'Error: ' . $e->getMessage();
        die();
    }
    
?>