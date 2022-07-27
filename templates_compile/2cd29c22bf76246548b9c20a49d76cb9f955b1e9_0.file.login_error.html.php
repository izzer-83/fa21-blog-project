<?php
/* Smarty version 4.1.1, created on 2022-07-26 11:06:50
  from '/opt/lampp/htdocs/templates/login_error.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62dfaeaa42ed50_58355987',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2cd29c22bf76246548b9c20a49d76cb9f955b1e9' => 
    array (
      0 => '/opt/lampp/htdocs/templates/login_error.html',
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
function content_62dfaeaa42ed50_58355987 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:components/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
if ((isset($_smarty_tpl->tpl_vars['err_msg']->value))) {
echo $_smarty_tpl->tpl_vars['err_msg']->value;?>

<?php }
$_smarty_tpl->_subTemplateRender("file:components/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
