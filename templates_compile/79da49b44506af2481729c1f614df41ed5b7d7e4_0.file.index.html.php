<?php
/* Smarty version 4.1.1, created on 2022-07-27 07:03:05
  from '/opt/lampp/htdocs/templates/index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62e0c709580df4_64627849',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '79da49b44506af2481729c1f614df41ed5b7d7e4' => 
    array (
      0 => '/opt/lampp/htdocs/templates/index.html',
      1 => 1658859130,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:components/header.html' => 1,
    'file:components/footer.html' => 1,
  ),
),false)) {
function content_62e0c709580df4_64627849 (Smarty_Internal_Template $_smarty_tpl) {
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
                <span class="card-title"><a href="/posts/details/<?php echo $_smarty_tpl->tpl_vars['r']->value['postID'];?>
"><?php echo $_smarty_tpl->tpl_vars['r']->value['title'];?>
</a></span>
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
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>    
<?php $_smarty_tpl->_subTemplateRender("file:components/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
