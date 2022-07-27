<?php
/* Smarty version 4.1.1, created on 2022-07-26 08:38:32
  from '/opt/lampp/htdocs/blog-proj/templates/register.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62df8be86f5500_71425075',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '70c3b69bb3ab959c62909365cb49acee4a8647cf' => 
    array (
      0 => '/opt/lampp/htdocs/blog-proj/templates/register.html',
      1 => 1658817033,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:components/header.html' => 1,
    'file:components/footer.html' => 1,
  ),
),false)) {
function content_62df8be86f5500_71425075 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:components/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<form action="" method="POST">
    <input type="text" name="username">
    <input type="text" name="password">
    <input type="submit" value="Register" name="submit">
</form>
<?php $_smarty_tpl->_subTemplateRender("file:components/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
