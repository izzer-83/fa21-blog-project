<?php
/* Smarty version 4.1.1, created on 2022-07-27 07:03:36
  from '/opt/lampp/htdocs/templates/posts/new_success.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62e0c72834ca80_69744934',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a395f1b747db40485bba46fba556e1e7e12050a' => 
    array (
      0 => '/opt/lampp/htdocs/templates/posts/new_success.html',
      1 => 1658841183,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../components/header.html' => 1,
    'file:../components/footer.html' => 1,
  ),
),false)) {
function content_62e0c72834ca80_69744934 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../components/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<p>New Blog-Post successfully created...!</p>
You will be redirected in 3 seconds...
<?php echo '<script'; ?>
>
    setTimeout(function(){
       window.location.href = '/';
    }, 3000);
 <?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:../components/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
