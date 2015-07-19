<form id="userAuthForm" class="lh-form" action="{$signInUrl}" method="post">
    {include file="widgets/text-input-row.tpl" input_label="User ID" input_name="userID"
        input_value="{$userID}" auto_focus="1"}
    
    {include file="widgets/text-input-row.tpl" input_type="password" input_label="Password"
        input_name="password"}

    <div class="lh-row lh-input">
        <div class="lh-col3-offset lh-col9 lh-col-last lh-text-right">
            <input class="lh-button lh-button-primary" type="submit" name="signInBtn" value="Sign In">
        </div>
    </div>
</form>