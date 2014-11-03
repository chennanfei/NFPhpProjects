<?php /* Smarty version Smarty-3.1.3, created on 2014-11-02 20:10:42
         compiled from "/Users/ucdream/Sites/lianghaodesign/view/templates/features/menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1005674573544cc00b514d00-00129524%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c77e833de5bc372490eef90c21cae08d35541a94' => 
    array (
      0 => '/Users/ucdream/Sites/lianghaodesign/view/templates/features/menu.tpl',
      1 => 1414930241,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1005674573544cc00b514d00-00129524',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.3',
  'unifunc' => 'content_544cc00b51957',
  'variables' => 
  array (
    'newProjUrl' => 0,
    'projectsUrl' => 0,
    'updateGWUrl' => 0,
    'updateTeamUrl' => 0,
    'accountUrl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544cc00b51957')) {function content_544cc00b51957($_smarty_tpl) {?><div class="lh-box">
    <ul class="lh-box-inner lh-menu">
        <li class="lh-menu-item">
            <a class="lh-menu-item-link" href="<?php echo $_smarty_tpl->tpl_vars['newProjUrl']->value;?>
">New project</a>
        </li>
        <li class="lh-menu-item">
            <a class="lh-menu-item-link" href="<?php echo $_smarty_tpl->tpl_vars['projectsUrl']->value;?>
">View projects</a>
        </li>
        <li class="lh-menu-item">
            <a class="lh-menu-item-link" href="<?php echo $_smarty_tpl->tpl_vars['updateGWUrl']->value;?>
">Update gateway images</a>
        </li>
        <li class="lh-menu-item">
            <a class="lh-menu-item-link" href="<?php echo $_smarty_tpl->tpl_vars['updateTeamUrl']->value;?>
">Update team</a>
        </li>
        <li class="lh-menu-item">
            <a class="lh-menu-item-link" href="<?php echo $_smarty_tpl->tpl_vars['accountUrl']->value;?>
">Change password</a>
        </li>
    </ul>
</div><?php }} ?>