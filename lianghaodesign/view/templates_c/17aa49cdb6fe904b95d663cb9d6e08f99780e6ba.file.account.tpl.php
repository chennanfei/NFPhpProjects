<?php /* Smarty version Smarty-3.1.3, created on 2014-11-02 21:14:35
         compiled from "/Users/ucdream/Sites/lianghaodesign/view/templates/account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:50136468154560ebdac39f5-66324338%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17aa49cdb6fe904b95d663cb9d6e08f99780e6ba' => 
    array (
      0 => '/Users/ucdream/Sites/lianghaodesign/view/templates/account.tpl',
      1 => 1414932947,
      2 => 'file',
    ),
    '5e6a4d340a62167db930a9248fbb2dcbd013399a' => 
    array (
      0 => '/Users/ucdream/Sites/lianghaodesign/view/templates/layouts/two-columns.tpl',
      1 => 1414928579,
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
    '00996edea4b41b46242d658d95c224df0361b956' => 
    array (
      0 => '/Users/ucdream/Sites/lianghaodesign/view/templates/features/change-pwd-form.tpl',
      1 => 1414932515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '50136468154560ebdac39f5-66324338',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_54560ebdb1f51',
  'variables' => 
  array (
    'title' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54560ebdb1f51')) {function content_54560ebdb1f51($_smarty_tpl) {?><!DOCTYPE HTML>
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
        <?php echo $_smarty_tpl->getSubTemplate ("features/header-small.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
    <div class="lh-content lh-row lh-spacing-top-big">
        <div class="lh-col3">
            <?php echo $_smarty_tpl->getSubTemplate ("features/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
        <div class="lh-col9 lh-col-last">
            
<div class="lh-box lh-box-pwd">
    <?php /*  Call merged included template "features/page-content-title.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("features/page-content-title.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '50136468154560ebdac39f5-66324338');
content_54562e3b6c6d4($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "features/page-content-title.tpl" */?>
    
    <div class="lh-box-inner">
        <?php /*  Call merged included template "features/message.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("features/message.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '50136468154560ebdac39f5-66324338');
content_54562e3b6ddb0($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "features/message.tpl" */?>
        <?php /*  Call merged included template "features/change-pwd-form.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("features/change-pwd-form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '50136468154560ebdac39f5-66324338');
content_54562e3b6e9ee($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "features/change-pwd-form.tpl" */?>
    </div>
</div>

        </div>
    </div>
</body>
</html><?php }} ?><?php /* Smarty version Smarty-3.1.3, created on 2014-11-02 21:14:35
         compiled from "/Users/ucdream/Sites/lianghaodesign/view/templates/features/page-content-title.tpl" */ ?>
<?php if ($_valid && !is_callable('content_54562e3b6c6d4')) {function content_54562e3b6c6d4($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['pageContentTitle']->value){?>
<h2><?php echo $_smarty_tpl->tpl_vars['pageContentTitle']->value;?>
</h2>
<?php }?><?php }} ?><?php /* Smarty version Smarty-3.1.3, created on 2014-11-02 21:14:35
         compiled from "/Users/ucdream/Sites/lianghaodesign/view/templates/features/message.tpl" */ ?>
<?php if ($_valid && !is_callable('content_54562e3b6ddb0')) {function content_54562e3b6ddb0($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['message']->value){?>
<div class="lh-alert lh-alert-<?php echo $_smarty_tpl->tpl_vars['messageType']->value;?>
">
    <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

</div>
<?php }?><?php }} ?><?php /* Smarty version Smarty-3.1.3, created on 2014-11-02 21:14:35
         compiled from "/Users/ucdream/Sites/lianghaodesign/view/templates/features/change-pwd-form.tpl" */ ?>
<?php if ($_valid && !is_callable('content_54562e3b6e9ee')) {function content_54562e3b6e9ee($_smarty_tpl) {?><form class="lh-box lh-form" action="<?php echo $_smarty_tpl->tpl_vars['accountUrl']->value;?>
" method="post">
    <div class="lh-row lh-input">
        <div class="lh-col3 lh-input-label">User ID:</div>
        <div class="lh-col9 lh-col-last">
            <input class="lh-input-text" type="text" name="userID" value="<?php echo $_smarty_tpl->tpl_vars['userID']->value;?>
" autofocus>
        </div>
    </div>
    <div class="lh-row lh-input">
        <div class="lh-col3 lh-input-label">Old password:</div>
        <div class="lh-col9 lh-col-last">
            <input class="lh-input-text" type="password" name="oldPwd">
        </div>
    </div>
    <div class="lh-row lh-input">
        <div class="lh-col3 lh-input-label">New password:</div>
        <div class="lh-col9 lh-col-last">
            <input class="lh-input-text" type="password" name="newPwd">
        </div>
    </div>
    <div class="lh-row lh-input">
        <div class="lh-col3-offset lh-col9 lh-col-last lh-text-right">
            <input type="hidden" name="action" value="updatePwd">
            <input class="lh-button lh-button-primary" type="submit" value="Confirm">
        </div>
    </div>
</form><?php }} ?>