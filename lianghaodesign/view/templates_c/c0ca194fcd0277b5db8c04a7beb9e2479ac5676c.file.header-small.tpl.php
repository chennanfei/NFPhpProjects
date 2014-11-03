<?php /* Smarty version Smarty-3.1.3, created on 2014-11-02 23:08:53
         compiled from "/Users/ucdream/Sites/lianghaodesign/view/templates/features/header-small.tpl" */ ?>
<?php /*%%SmartyHeaderCode:208663277854560e5eb49207-89180833%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0ca194fcd0277b5db8c04a7beb9e2479ac5676c' => 
    array (
      0 => '/Users/ucdream/Sites/lianghaodesign/view/templates/features/header-small.tpl',
      1 => 1414940926,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208663277854560e5eb49207-89180833',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_54560e5eb5075',
  'variables' => 
  array (
    'homeUrl' => 0,
    'signOutUrl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54560e5eb5075')) {function content_54560e5eb5075($_smarty_tpl) {?><div class="lh-header-content-small lh-row">
    <div class="lh-col5">
        <?php if ($_smarty_tpl->tpl_vars['homeUrl']->value){?>
        <a class="lh-header-text" href="<?php echo $_smarty_tpl->tpl_vars['homeUrl']->value;?>
">Lianghao site console</a>
        <?php }else{ ?>
        <span class="lh-header-text">Lianghao site console</span>
        <?php }?>
    </div>
    <div class="lh-col5 lh-col-last lh-text-right">
        <?php if ($_smarty_tpl->tpl_vars['signOutUrl']->value){?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['signOutUrl']->value;?>
">Log out</a>
        <?php }?>
    </div>
</div><?php }} ?>