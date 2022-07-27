<?php
/* Smarty version 4.1.1, created on 2022-07-26 11:31:13
  from '/opt/lampp/htdocs/templates/logout.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62dfb4614d7112_39858586',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c367e856c03875087940f8510d0acc30e9edaed' => 
    array (
      0 => '/opt/lampp/htdocs/templates/logout.html',
      1 => 1658827732,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:components/header.html' => 1,
    'file:components/footer.html' => 1,
  ),
),false)) {
function content_62dfb4614d7112_39858586 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:components/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<p>Logout successful. You will be redirected in 5 seconds ...</p>
<?php echo '<script'; ?>
>
    setTimeout(function(){
       window.location.href = '/';
    }, 5000);
 <?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:components/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
