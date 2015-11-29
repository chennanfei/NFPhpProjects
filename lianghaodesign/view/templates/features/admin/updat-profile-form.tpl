<form id="updateProfileForm" class="lh-box lh-form" action="{$profileUrl}" method="post">
    {include file="widgets/text-input-row.tpl" left_col=4 right_col=8 input_label="Address"
        input_name="address" input_value="{$address}" auto_focus="1"}

    {include file="widgets/text-input-row.tpl" left_col=4 right_col=8 input_label="Cell phone" 
        input_name="cellPhone" input_value="{$cellPhone}"}
    
    {include file="widgets/text-input-row.tpl" left_col=4 right_col=8 input_label="Email" 
        input_name="email" input_value="{$email}"}
    
    {include file="widgets/text-input-row.tpl" left_col=4 right_col=8 input_label="Fixed phone"
        input_name="fixedPhone" input_value="{$fixedPhone}"}

    <div class="lh-row lh-input lh-spacing-top-big">
        <div class="lh-col4-offset lh-col8 lh-col-last lh-text-right">
            <input type="hidden" name="action" value="update">
            <input id="confirmBtn" class="lh-button lh-button-primary" type="submit" value="Confirm">
        </div>
    </div>
</form>