<?php
/* Smarty version 4.1.1, created on 2022-07-26 13:29:20
  from '/opt/lampp/htdocs/templates/posts/new.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62dfd010f10e17_23449658',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bfdfcc4d2f0ebe39480788071ad392230dd0e962' => 
    array (
      0 => '/opt/lampp/htdocs/templates/posts/new.html',
      1 => 1658834955,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../components/header.html' => 1,
    'file:../components/footer.html' => 1,
  ),
),false)) {
function content_62dfd010f10e17_23449658 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../components/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if ((isset($_smarty_tpl->tpl_vars['_SESSION']->value['username']))) {?>
<div class="row">
    <form class="col s12" action="" method="post">
      <div class="row">
        <h4>Write a new blog post</h4>
        <div class="input-field col s6">
          <input name="title"id="title" type="text">
          <label for="title">Title</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea name="content" id="textarea1" class="materialize-textarea"></textarea>
          <label for="textarea1">Text-Content</label>
        </div>
      </div>
      <?php if ((isset($_smarty_tpl->tpl_vars['err_msg']->value))) {?>
        <div class="row">
        <div class="col s12 m12">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
            <span class="card-title">Error</span>
            <?php echo $_smarty_tpl->tpl_vars['err_msg']->value;?>

            </div>
        </div>
        </div>
    </div>
    <?php }?>
      <div class="row">
        <button class="btn blue-grey darken-3 waves-effect waves-light" type="submit" name="submit">Save
            <i class="material-icons right">send</i>
        </button>
      </div>      
    </form>
  </div>
<?php }?>

<?php if (!(isset($_smarty_tpl->tpl_vars['_SESSION']->value['username']))) {?>
    <h1>You are not allowed to do this!</h1>  
<?php }
$_smarty_tpl->_subTemplateRender("file:../components/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
