<form id="projectImageForm" class="lh-form" action="{$projectImagesUrl}&preview={$image->getIsPreviewed()}" method="post">
    {include file="features/admin/entry-times.tpl" entry=$image}

    <input type="hidden" name="a" value="{$action}"/>
    <input type="hidden" name="projectId" value="{$project->getId()}"/>
    <input type="hidden" name="isPreviewed" value="{$image->getIsPreviewed()}"/>
    <input type="hidden" name="imageName" value="{$image->getImageName()}"/>
    {if $image->getId()}
    <input type="hidden" name="id" value="{$image->getId()}"/>
    {/if}
    
    {include file="widgets/text-input-row.tpl" right_col="4"
        input_label="*Display order" input_name="displayOrder"
        input_value="{$image->getDisplayOrder()}"
        placeholder="Please enter numbers"}

    {include file="widgets/text-input-row.tpl" right_col="4"
        input_label="Alias name" input_name="aliasName"
        input_value="{$image->getAliasName()}"
        placeholder="Provide alias name for team members"}

    <div class="lh-row lh-input">
        <div class="lh-col3 lh-input-label">Display position:</div>
        <div class="lh-col9 lh-col-last">
            <select class="lh-select" name="displayPosition">
                <option value="center" {if $image->getDisplayPosition() == 'center'}selected{/if}>Center</option>
                <option value="left" {if $image->getDisplayPosition() == 'left'}selected{/if}>Left</option>
                <option value="right" {if $image->getDisplayPosition() == 'right'}selected{/if}>Right</option>
            </select>
        </div>
    </div>
    
    <div class="lh-row lh-input">
        <div class="lh-col3 lh-input-label">Is half?</div>
        <div class="lh-col9 lh-col-last">
            <select class="lh-select" name="isHalf">
                <option value="1" {if $image->getIsHalf() == 1}selected{/if}>Yes</option>
                <option value="0" {if $image->getIsHalf() == 0}selected{/if}>No</option>
            </select>
        </div>
    </div>

    <div class="lh-row lh-input lh-spacing-top-big">
        <div class="lh-col3-offset lh-col9 lh-col-last">
            <input id="confirmBtn" class="lh-button lh-button-primary" type="submit" value="Save">
        </div>
    </div>
</form>