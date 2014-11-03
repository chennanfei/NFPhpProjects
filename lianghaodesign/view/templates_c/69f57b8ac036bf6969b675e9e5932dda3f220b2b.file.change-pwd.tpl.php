<?php /* Smarty version Smarty-3.1.3, created on 2014-11-02 18:59:07
         compiled from "/Users/ucdream/Sites/lianghaodesign/view/templates/change-pwd.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15637738054560e7b33b929-41109181%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69f57b8ac036bf6969b675e9e5932dda3f220b2b' => 
    array (
      0 => '/Users/ucdream/Sites/lianghaodesign/view/templates/change-pwd.tpl',
      1 => 1414925816,
      2 => 'file',
    ),
    '5e6a4d340a62167db930a9248fbb2dcbd013399a' => 
    array (
      0 => '/Users/ucdream/Sites/lianghaodesign/view/templates/layouts/two-columns.tpl',
      1 => 1414925779,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15637738054560e7b33b929-41109181',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_54560e7b37b36',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54560e7b37b36')) {function content_54560e7b37b36($_smarty_tpl) {?><!DOCTYPE HTML>
<html class="lh">
<head>
    <meta charset="utf-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <?php echo $_smarty_tpl->getSubTemplate ("features/assets.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</head>
<body class="lh-background-primary" data-page="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
    <div class="lh-header">
        <?php echo $_smarty_tpl->getSubTemplate ("features/header-small.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
    <div class="lh-content lh-row lh-spacing-top-big">
        <div class="lh-col3">
            <?php echo $_smarty_tpl->getSubTemplate ("features/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
        <div class="lh-col9 lh-col-last">
            
<div class="lh-box">
    
</div>

        </div>
    </div>
</body>
</html><?php }} ?>