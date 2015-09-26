<form id="memberForm" class="lh-form" action="{$memberUrl}" method="post">
    <input type="hidden" name="a" value="{$action}"/>
    <input type="hidden" name="imageName" value="{$member->getImageName()}"/>
    {if $member->getId()}
    <input type="hidden" name="id" value="{$member->getId()}"/>
    {/if}

    {include file="features/admin/entry-times.tpl" entry=$member}
    
    {include file="widgets/text-input-row.tpl" right_col="4"
        input_label="*Member name" input_name="memberName"
        input_value="{$member->getMemberName()}"}

    {include file="widgets/text-input-row.tpl" right_col="4"
        input_label="*Display order" input_name="displayOrder"
        input_value="{$member->getDisplayOrder()}"
        placeholder="Please enter numbers"}

    <div class="lh-row lh-input lh-spacing-top-big">
        <div class="lh-col3-offset lh-col9 lh-col-last">
            <input id="confirmBtn" class="lh-button lh-button-primary" type="submit" value="Save">
        </div>
    </div>
</form>