<form id="userAuthForm" class="lh-box lh-form" action="{$accountUrl}" method="post">
    {include file="widgets/text-input-row.tpl" left_col=4 right_col=8 input_label="User ID"
        input_name="userID" input_value="{$userID}" auto_focus="1"}

    {include file="widgets/text-input-row.tpl" left_col=4 right_col=8 input_type="password"
        input_label="Old password" input_name="oldPwd"}
    
    {include file="widgets/text-input-row.tpl" left_col=4 right_col=8 input_type="password"
        input_label="New password" input_name="newPwd"}
    
    {include file="widgets/text-input-row.tpl" left_col=4 right_col=8 input_type="password"
        input_label="Confirm password" input_name="confirmedPwd"}

    <div class="lh-row lh-input lh-spacing-top-big">
        <div class="lh-col4-offset lh-col8 lh-col-last lh-text-right">
            <input type="hidden" name="action" value="updatePwd">
            <input id="confirmBtn" class="lh-button lh-button-primary" type="submit" value="Confirm">
        </div>
    </div>
</form>