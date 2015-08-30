<form id="gatewayImageForm" class="lh-form" action="{$imageUrl}" method="post">
    {include file="features/admin/entry-times.tpl" entry=$image}

    {include file="features/admin/channel-select.tpl"}
    <input type="hidden" name="a" value="{$action}"/>
    {if $image->getId()}
    <input type="hidden" name="id" value="{$image->getId()}"/>
    {/if}
    {include file="widgets/text-input-row.tpl" right_col="4"
        input_label="*Display order" input_name="displayOrder"
        input_value="{$image->getDisplayOrder()}"
        placeholder="Please enter numbers"}

    {include file="widgets/text-input-row.tpl"
        input_label="*Image name" input_name="imageName"
        input_value="{$image->getImageName()}"
        placeholder="Please enter image name"}

    <div class="lh-row lh-input lh-spacing-top-big">
        <div class="lh-col3-offset lh-col9 lh-col-last lh-text-right">
            <input type="hidden" name="action" value="gatewayImage">
            <input id="confirmBtn" class="lh-button lh-button-primary" type="submit" value="Save">
        </div>
    </div>
</form>