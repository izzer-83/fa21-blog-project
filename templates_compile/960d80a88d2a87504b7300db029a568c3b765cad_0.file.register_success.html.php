<?php
/* Smarty version 4.1.1, created on 2022-07-26 09:58:56
  from '/opt/lampp/htdocs/blog-proj/templates/register_success.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62df9ec09d53d6_77886928',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '960d80a88d2a87504b7300db029a568c3b765cad' => 
    array (
      0 => '/opt/lampp/htdocs/blog-proj/templates/register_success.html',
      1 => 1658822314,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:components/header.html' => 1,
    'file:components/footer.html' => 1,
  ),
),false)) {
function content_62df9ec09d53d6_77886928 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:components/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<p>New user registered. Welcome in out community! You will be redirected in 5 seconds ...</p>
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
