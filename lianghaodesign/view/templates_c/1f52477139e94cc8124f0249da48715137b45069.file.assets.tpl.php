<?php /* Smarty version Smarty-3.1.3, created on 2014-10-25 23:38:58
         compiled from "/Users/ucdream/Sites/lianghaodesign/view/templates/features/assets.tpl" */ ?>
<?php /*%%SmartyHeaderCode:838326930544bc412377cb3-60697792%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f52477139e94cc8124f0249da48715137b45069' => 
    array (
      0 => '/Users/ucdream/Sites/lianghaodesign/view/templates/features/assets.tpl',
      1 => 1414248944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '838326930544bc412377cb3-60697792',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'styles' => 0,
    'css' => 0,
    'jqJS' => 0,
    'libJS' => 0,
    'pageJS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_544bc41238923',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544bc41238923')) {function content_544bc41238923($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['css'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['css']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['styles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['css']->key => $_smarty_tpl->tpl_vars['css']->value){
$_smarty_tpl->tpl_vars['css']->_loop = true;
?>
<link type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
" rel="stylesheet">
<?php } ?>

<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['jqJS']->value;?>
"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['libJS']->value;?>
" async="async" data-first="<?php echo $_smarty_tpl->tpl_vars['pageJS']->value;?>
"></script><?php }} ?>