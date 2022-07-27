<?php
/* Smarty version 4.1.1, created on 2022-07-26 10:53:36
  from '/opt/lampp/htdocs/templates/login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62dfab90a44b65_56444083',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f4fb0b8d4409de385446c77bd588eaeb26b09ff' => 
    array (
      0 => '/opt/lampp/htdocs/templates/login.html',
      1 => 1658825615,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:components/header.html' => 1,
    'file:components/footer.html' => 1,
  ),
),false)) {
function content_62dfab90a44b65_56444083 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:components/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h3>Login</h3>
<form action="" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username">
    <label for="username">Password:</label>
    <input type="text" name="password">
    <input type="submit" value="Login" name="submit">
</form>
<?php $_smarty_tpl->_subTemplateRender("file:components/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
