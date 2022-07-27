<?php
/* Smarty version 4.1.1, created on 2022-07-26 11:24:25
  from '/opt/lampp/htdocs/templates/login_success.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62dfb2c9ebc264_23887152',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0681fd49b9d903bd4d4e83b48bfba9114c8c17ec' => 
    array (
      0 => '/opt/lampp/htdocs/templates/login_success.html',
      1 => 1658827456,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:components/header.html' => 1,
    'file:components/footer.html' => 1,
  ),
),false)) {
function content_62dfb2c9ebc264_23887152 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:components/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<p>Login successful... Welcome <?php echo $_smarty_tpl->tpl_vars['username']->value;?>
!</p>
You will be redirected in 3 seconds...
<?php echo '<script'; ?>
>
    setTimeout(function(){
       window.location.href = '/';
    }, 3000);
 <?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:components/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
