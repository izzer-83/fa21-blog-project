<?php
/* Smarty version 4.1.1, created on 2022-07-26 09:54:00
  from '/opt/lampp/htdocs/blog-proj/templates/login_error.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62df9d98981b70_26198221',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a9f89ea25b24cda86c52c7aaf55bdbadf24df19d' => 
    array (
      0 => '/opt/lampp/htdocs/blog-proj/templates/login_error.html',
      1 => 1658822038,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:components/header.html' => 1,
    'file:components/footer.html' => 1,
  ),
),false)) {
function content_62df9d98981b70_26198221 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:components/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
if ((isset($_smarty_tpl->tpl_vars['err_msg']->value))) {
echo $_smarty_tpl->tpl_vars['err_msg']->value;?>

<?php }
$_smarty_tpl->_subTemplateRender("file:components/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
