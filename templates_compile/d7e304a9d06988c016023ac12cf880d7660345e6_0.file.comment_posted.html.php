<?php
/* Smarty version 4.1.1, created on 2022-07-26 17:59:08
  from '/opt/lampp/htdocs/templates/posts/comment_posted.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62e00f4c969796_64344778',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd7e304a9d06988c016023ac12cf880d7660345e6' => 
    array (
      0 => '/opt/lampp/htdocs/templates/posts/comment_posted.html',
      1 => 1658851130,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../components/header.html' => 1,
    'file:../components/footer.html' => 1,
  ),
),false)) {
function content_62e00f4c969796_64344778 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../components/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<p>New comment successfully posted...!</p>
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
