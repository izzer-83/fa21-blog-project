<?php
/* Smarty version 4.1.1, created on 2022-07-26 19:22:21
  from '/opt/lampp/htdocs/templates/user_profile.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_62e022cdc8b6f7_25402267',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e39f73ff3fe82d41930b3ea2a9768d75439de66b' => 
    array (
      0 => '/opt/lampp/htdocs/templates/user_profile.html',
      1 => 1658856140,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:components/header.html' => 1,
    'file:components/footer.html' => 1,
  ),
),false)) {
function content_62e022cdc8b6f7_25402267 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:components/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="row">
    <div class="col s12 m12">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">Profile</span>
          <p>Username: <?php echo $_smarty_tpl->tpl_vars['res']->value['username'];?>
</p>
          <p>Created at: <?php echo $_smarty_tpl->tpl_vars['res']->value['createdAt'];?>
</p>
        </div>
      </div>
    </div>
  </div>
<?php $_smarty_tpl->_subTemplateRender("file:components/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
