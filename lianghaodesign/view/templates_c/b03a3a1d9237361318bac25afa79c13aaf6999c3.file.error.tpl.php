<?php /* Smarty version Smarty-3.1.3, created on 2014-11-02 23:18:13
         compiled from "/Users/ucdream/Sites/lianghaodesign/view/templates/error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:198095122954563f43417685-09368880%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b03a3a1d9237361318bac25afa79c13aaf6999c3' => 
    array (
      0 => '/Users/ucdream/Sites/lianghaodesign/view/templates/error.tpl',
      1 => 1414940317,
      2 => 'file',
    ),
    '2241704b9dc15ff70e960286f19f54b9bce7b984' => 
    array (
      0 => '/Users/ucdream/Sites/lianghaodesign/view/templates/layouts/simple-column.tpl',
      1 => 1414938748,
      2 => 'file',
    ),
    'c0ca194fcd0277b5db8c04a7beb9e2479ac5676c' => 
    array (
      0 => '/Users/ucdream/Sites/lianghaodesign/view/templates/features/header-small.tpl',
      1 => 1414940926,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198095122954563f43417685-09368880',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_54563f4344eca',
  'variables' => 
  array (
    'title' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54563f4344eca')) {function content_54563f4344eca($_smarty_tpl) {?><!DOCTYPE HTML>
<html class="lh">
<head>
    <meta charset="utf-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 - Lianghao console</title>
    <?php echo $_smarty_tpl->getSubTemplate ("features/assets.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</head>
<body class="lh-background-primary" data-page="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
    <div class="lh-header">
        
<?php /*  Call merged included template "features/header-small.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("features/header-small.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '198095122954563f43417685-09368880');
content_54564b35e8d32($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "features/header-small.tpl" */?>

    </div>
    <div class="lh-content">
        
<div class="lh-box lh-box-error">
    <div class="lh-box-inner">
        <div class="lh-alert lh-alert-error lh-size-medium">
            <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

        </div>
    </div>
</div>

    </div>
    <div class="lh-footer">
    </div>
</body>
</html><?php }} ?><?php /* Smarty version Smarty-3.1.3, created on 2014-11-02 23:18:13
         compiled from "/Users/ucdream/Sites/lianghaodesign/view/templates/features/header-small.tpl" */ ?>
<?php if ($_valid && !is_callable('content_54564b35e8d32')) {function content_54564b35e8d32($_smarty_tpl) {?><div class="lh-header-content-small lh-row">
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