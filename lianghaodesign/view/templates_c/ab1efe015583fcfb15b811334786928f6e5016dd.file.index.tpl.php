<?php /* Smarty version Smarty-3.1.3, created on 2014-11-02 22:36:39
         compiled from "/Users/ucdream/Sites/lianghaodesign/view/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2051441194544bc4122fc545-84351012%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab1efe015583fcfb15b811334786928f6e5016dd' => 
    array (
      0 => '/Users/ucdream/Sites/lianghaodesign/view/templates/index.tpl',
      1 => 1414930123,
      2 => 'file',
    ),
    '2241704b9dc15ff70e960286f19f54b9bce7b984' => 
    array (
      0 => '/Users/ucdream/Sites/lianghaodesign/view/templates/layouts/simple-column.tpl',
      1 => 1414938748,
      2 => 'file',
    ),
    '21c76f86cfe1f0bff8d25d6d36ef36f691b4975d' => 
    array (
      0 => '/Users/ucdream/Sites/lianghaodesign/view/templates/features/header.tpl',
      1 => 1414297647,
      2 => 'file',
    ),
    'b4a0ce8e3552c4060fcf2986fd23596d825c69c0' => 
    array (
      0 => '/Users/ucdream/Sites/lianghaodesign/view/templates/features/page-content-title.tpl',
      1 => 1414934073,
      2 => 'file',
    ),
    '1eb70fe7607c97931c706a018e65eccb3c68dcff' => 
    array (
      0 => '/Users/ucdream/Sites/lianghaodesign/view/templates/features/message.tpl',
      1 => 1414929270,
      2 => 'file',
    ),
    'a7d893efc1379ff5526ab1424835632180c113f9' => 
    array (
      0 => '/Users/ucdream/Sites/lianghaodesign/view/templates/features/signin-form.tpl',
      1 => 1414930165,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2051441194544bc4122fc545-84351012',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_544bc4123728d',
  'variables' => 
  array (
    'title' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544bc4123728d')) {function content_544bc4123728d($_smarty_tpl) {?><!DOCTYPE HTML>
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
        
<?php /*  Call merged included template "features/header.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("features/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '2051441194544bc4122fc545-84351012');
content_54564177c0a79($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "features/header.tpl" */?>

    </div>
    <div class="lh-content">
        
<div class="lh-box lh-box-signin">
    <?php /*  Call merged included template "features/page-content-title.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("features/page-content-title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '2051441194544bc4122fc545-84351012');
content_54564177c1c3d($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "features/page-content-title.tpl" */?>
    
    <div class="lh-box-inner">
        <?php /*  Call merged included template "features/message.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("features/message.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '2051441194544bc4122fc545-84351012');
content_54564177c4188($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "features/message.tpl" */?>
        <?php /*  Call merged included template "features/signin-form.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("features/signin-form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '2051441194544bc4122fc545-84351012');
content_54564177c5553($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "features/signin-form.tpl" */?>
    </div>
</div>

    </div>
    <div class="lh-footer">
    </div>
</body>
</html><?php }} ?><?php /* Smarty version Smarty-3.1.3, created on 2014-11-02 22:36:39
         compiled from "/Users/ucdream/Sites/lianghaodesign/view/templates/features/header.tpl" */ ?>
<?php if ($_valid && !is_callable('content_54564177c0a79')) {function content_54564177c0a79($_smarty_tpl) {?><div class="lh-header-content">
    <span class="lh-header-text">Welcome to Lianghao site console</span>
</div><?php }} ?><?php /* Smarty version Smarty-3.1.3, created on 2014-11-02 22:36:39
         compiled from "/Users/ucdream/Sites/lianghaodesign/view/templates/features/page-content-title.tpl" */ ?>
<?php if ($_valid && !is_callable('content_54564177c1c3d')) {function content_54564177c1c3d($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['pageContentTitle']->value){?>
<h2><?php echo $_smarty_tpl->tpl_vars['pageContentTitle']->value;?>
</h2>
<?php }?><?php }} ?><?php /* Smarty version Smarty-3.1.3, created on 2014-11-02 22:36:39
         compiled from "/Users/ucdream/Sites/lianghaodesign/view/templates/features/message.tpl" */ ?>
<?php if ($_valid && !is_callable('content_54564177c4188')) {function content_54564177c4188($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['message']->value){?>
<div class="lh-alert lh-alert-<?php echo $_smarty_tpl->tpl_vars['messageType']->value;?>
">
    <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

</div>
<?php }?><?php }} ?><?php /* Smarty version Smarty-3.1.3, created on 2014-11-02 22:36:39
         compiled from "/Users/ucdream/Sites/lianghaodesign/view/templates/features/signin-form.tpl" */ ?>
<?php if ($_valid && !is_callable('content_54564177c5553')) {function content_54564177c5553($_smarty_tpl) {?><form class="lh-form" action="<?php echo $_smarty_tpl->tpl_vars['signInUrl']->value;?>
" method="post">
    <div class="lh-row lh-input">
        <div class="lh-col3 lh-input-label">User ID:</div>
        <div class="lh-col9 lh-col-last">
            <input class="lh-input-text" type="text" name="userID" value="<?php echo $_smarty_tpl->tpl_vars['userID']->value;?>
" autofocus>
        </div>
    </div>
    <div class="lh-row lh-input">
        <div class="lh-col3 lh-input-label">Password:</div>
        <div class="lh-col9 lh-col-last">
            <input class="lh-input-text" type="password" name="password">
        </div>
    </div>
    <div class="lh-row lh-input">
        <div class="lh-col3-offset lh-col9 lh-col-last lh-text-right">
            <input class="lh-button lh-button-primary" type="submit" name="signInBtn" value="Sign in">
        </div>
    </div>
</form><?php }} ?>