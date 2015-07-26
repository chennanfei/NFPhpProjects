<form id="gatewayImageForm" class="lh-form" action="{$addImageUrl}" method="post">
    {include file="features/admin/channel-select.tpl"}
    {include file="widgets/text-input-row.tpl" right_col="4"
        input_label="*Display order" input_name="displayOrder"
        placeholder="Please enter numbers"}
    {include file="widgets/text-input-row.tpl"
        input_label="*Image name" input_name="imageName"
        placeholder="Please enter image name"}

    <div class="lh-row lh-input">
        <div class="lh-col3-offset lh-col9 lh-col-last lh-text-right">
            <input type="hidden" name="action" value="gatewayImage">
            <input id="confirmBtn" class="lh-button lh-button-primary" type="submit" value="Save">
        </div>
    </div>
</form>