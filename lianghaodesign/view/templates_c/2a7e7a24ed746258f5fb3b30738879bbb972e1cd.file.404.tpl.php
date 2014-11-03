<?php /* Smarty version Smarty-3.1.3, created on 2014-11-02 22:17:36
         compiled from "/Users/ucdream/Sites/lianghaodesign/view/templates/404.tpl" */ ?>
<?php /*%%SmartyHeaderCode:300722492544bd5a83b0750-60140983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a7e7a24ed746258f5fb3b30738879bbb972e1cd' => 
    array (
      0 => '/Users/ucdream/Sites/lianghaodesign/view/templates/404.tpl',
      1 => 1414937838,
      2 => 'file',
    ),
    '2241704b9dc15ff70e960286f19f54b9bce7b984' => 
    array (
      0 => '/Users/ucdream/Sites/lianghaodesign/view/templates/layouts/simple-column.tpl',
      1 => 1414315980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '300722492544bd5a83b0750-60140983',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_544bd5a83df68',
  'variables' => 
  array (
    'title' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544bd5a83df68')) {function content_544bd5a83df68($_smarty_tpl) {?><!DOCTYPE HTML>
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
    </div>
    <div class="lh-content">
        
<div class="lh-box lh-box-404">
    <div class="lh-box-inner">
        <div class="lh-alert lh-alert-error lh-size-medium">
            Page not found. Please check your url.
        </div>
    </div>
</div>

    </div>
    <div class="lh-footer">
    </div>
</body>
</html><?php }} ?>