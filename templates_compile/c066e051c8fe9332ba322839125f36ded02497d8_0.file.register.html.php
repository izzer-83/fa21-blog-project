<?php
/* Smarty version 4.1.1, created on 2022-07-26 10:55:12
  from '/opt/lampp/htdocs/templates/register.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62dfabf03514f0_30651770',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c066e051c8fe9332ba322839125f36ded02497d8' => 
    array (
      0 => '/opt/lampp/htdocs/templates/register.html',
      1 => 1658825710,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:components/header.html' => 1,
    'file:components/footer.html' => 1,
  ),
),false)) {
function content_62dfabf03514f0_30651770 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:components/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h3>Register</h3>
<form action="" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username">
    <label for="username">Password:</label>
    <input type="password" name="password">
    <label for="username">Repeat your password:</label>
    <input type="password" name="password_repeat">
    
    <input type="submit" value="Login" name="submit">
</form>
<?php $_smarty_tpl->_subTemplateRender("file:components/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
