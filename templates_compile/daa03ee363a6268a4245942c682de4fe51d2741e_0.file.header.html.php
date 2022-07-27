<?php
/* Smarty version 4.1.1, created on 2022-07-26 12:48:59
  from '/opt/lampp/htdocs/templates/components/header.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62dfc69b9c6665_90849407',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'daa03ee363a6268a4245942c682de4fe51d2741e' => 
    array (
      0 => '/opt/lampp/htdocs/templates/components/header.html',
      1 => 1658832538,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62dfc69b9c6665_90849407 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo (($tmp = $_smarty_tpl->tpl_vars['title']->value ?? null)===null||$tmp==='' ? "FA21 Blog Projekt" ?? null : $tmp);?>
</title>
</head>
<body>
<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
    <li><a href="/posts/new">New Post</a></li>
    <li class="divider"></li>
    <li><a href="/profile">Profile</a></li>
    <li class="divider"></li>
    <li><a href="/logout">Logout</a></li>
</ul>
<nav class="blue-grey darken-3">
    <div class="nav-wrapper">
        <ul class="left hide-on-med-and-down">
            <li><a href="/">Home</a></li>
            <?php if ((isset($_smarty_tpl->tpl_vars['_SESSION']->value['username']))) {?><li><a href="/pictures">Pictures</a></li><?php }?>
            <?php if (!(isset($_smarty_tpl->tpl_vars['_SESSION']->value['username']))) {?><li><a href="/register">Register</a></li><?php }?>
        </ul>
        <?php if ((isset($_smarty_tpl->tpl_vars['_SESSION']->value['username']))) {?>
        <ul class="right">
            <!-- Dropdown Trigger -->
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><?php echo $_smarty_tpl->tpl_vars['_SESSION']->value['username'];?>
<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
        <?php }?>
        <?php if (!(isset($_smarty_tpl->tpl_vars['_SESSION']->value['username']))) {?>
        <ul class="right">
            <li><a href="/login">Login</a></li>
        </ul>
        <?php }?>
      
    </div>
</nav>
<div class="container" style="padding-top: 50px;">
<?php }
}
