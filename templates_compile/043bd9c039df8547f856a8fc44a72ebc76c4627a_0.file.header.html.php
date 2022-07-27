<?php
/* Smarty version 4.1.1, created on 2022-07-26 10:38:58
  from '/opt/lampp/htdocs/blog-proj/templates/components/header.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62dfa822c75972_47373983',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '043bd9c039df8547f856a8fc44a72ebc76c4627a' => 
    array (
      0 => '/opt/lampp/htdocs/blog-proj/templates/components/header.html',
      1 => 1658823783,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62dfa822c75972_47373983 (Smarty_Internal_Template $_smarty_tpl) {
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
    <li><a href="#!">Profile</a></li>
    <li class="divider"></li>
    <li><a href="/logout">Logout</a></li>
</ul>
<nav>
    <div class="nav-wrapper">
        <ul class="left hide-on-med-and-down">
            <li><a href="/">Home</a></li>
            <li><a href="/register">Register</a></li>
        </ul>
        <?php if ((isset($_smarty_tpl->tpl_vars['_SESSION']->value['username']))) {?>
        <ul class="right">
            <!-- Dropdown Trigger -->
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
        <?php }?>
        <?php if (!(isset($_smarty_tpl->tpl_vars['_SESSION']->value['username']))) {?>
        <ul class="right">
            <li><a href="/login">Login</a></li>
        </ul>
        <?php }?>
      
    </div>
</nav><?php }
}
