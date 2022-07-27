<?php
/* Smarty version 4.1.1, created on 2022-07-26 09:46:00
  from '/opt/lampp/htdocs/blog-proj/templates/login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62df9bb8a1d7d4_12428524',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8c2b2d97513654c91bf2c63eff58f1d647c7fee3' => 
    array (
      0 => '/opt/lampp/htdocs/blog-proj/templates/login.html',
      1 => 1658821551,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:components/header.html' => 1,
    'file:components/footer.html' => 1,
  ),
),false)) {
function content_62df9bb8a1d7d4_12428524 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:components/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<form action="" method="POST">
    <input type="text" name="username">
    <input type="text" name="password">
    <input type="submit" value="Login" name="submit">
</form>
<?php $_smarty_tpl->_subTemplateRender("file:components/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
