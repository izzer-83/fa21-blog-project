<?php
/* Smarty version 4.1.1, created on 2022-07-26 18:21:57
  from '/opt/lampp/htdocs/templates/posts/details.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62e014a51fc709_25139326',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e09b66835cd612f51e573ab1ea69df84843451bb' => 
    array (
      0 => '/opt/lampp/htdocs/templates/posts/details.html',
      1 => 1658852516,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:components/header.html' => 1,
    'file:components/footer.html' => 1,
  ),
),false)) {
function content_62e014a51fc709_25139326 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:components/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> 
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['res']->value, 'r');
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
?>
        <div class="row">
            <div class="col s12 m12">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                <span class="card-title"><?php echo $_smarty_tpl->tpl_vars['r']->value['title'];?>
</span>
                <p><?php echo $_smarty_tpl->tpl_vars['r']->value['content'];?>
</p>
                </div>
                <div class="card-action">
                <a>Author: <?php echo $_smarty_tpl->tpl_vars['r']->value['username'];?>
</a>
                <a>Date: <?php echo $_smarty_tpl->tpl_vars['r']->value['createdAt'];?>
</a>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <form class="col s12" action="/comments/new" method="post">
                <div class="row">
                    <h4 class="center-align">Write a new comment</h4>
                    <div class="col s3"></div>
                    <div class="input-field col s6">
                      <input name="title"id="title" type="text">
                      <label for="title">Title</label>
                    </div>
                    <div class="col s3"></div>
                  </div>
                  <div class="row">
                    <div class="col s3"></div>
                    <div class="input-field col s6">
                      <textarea name="content" id="textarea1" class="materialize-textarea"></textarea>
                      <label for="textarea1">Text-Content</label>
                    </div>
                    <div class="col s3"></div>
                  </div>
                  <div class="row">
                    <div class="col s3"></div>
                    <div class="col s6">
                    <input type="hidden" name="postID" value="<?php echo $_smarty_tpl->tpl_vars['r']->value['postID'];?>
">
                    <button class="btn blue-grey darken-3 waves-effect waves-light" type="submit" name="submit">Send
                        <i class="material-icons right">save</i>
                    </button>
                    </div>
                    <div class="col s3"></div>
                  </div>   
            </form>
        </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    
    <div class="row">
        <div class="col s12 m3"></div>
        <div class="col s12 m6"><h3>Comments</h3></div>
        <div class="col s12 m3"></div>
    </div>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['resComments']->value, 'r');
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
?>
    <div class="row">
        <div class="col s12 m3"></div>
        <div class="col s12 m6">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
            <span class="card-title"><?php echo $_smarty_tpl->tpl_vars['r']->value['title'];?>
</span>
            <p><?php echo $_smarty_tpl->tpl_vars['r']->value['content'];?>
</p>
            </div>
            <div class="card-action">
            <a>Author: <?php echo $_smarty_tpl->tpl_vars['r']->value['username'];?>
</a>
            <a>Date: <?php echo $_smarty_tpl->tpl_vars['r']->value['createdAt'];?>
</a>
            </div>
        </div>
        </div>
        <div class="col s12 m3"></div>
    </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_smarty_tpl->_subTemplateRender("file:components/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
