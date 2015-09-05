<div class="lh-row lh-list" id="projectImages">
    {if $images}
    <div class="lh-row lh-list-head">
        <div class="lh-col4">Name</div>
        <div class="lh-col1">Order</div>
        <div class="lh-col1">Preview?</div>
        <div class="lh-col2">Creator</div>
        <div class="lh-col2">Created time</div>
        <div class="lh-col2 lh-col-last">Actions</div>
    </div>
        {foreach from=$images item=image}
    <div class="lh-row lh-list-item">
        <div class="lh-col4">{$image->getImageName()}</div>
        <div class="lh-col1">{$image->getDisplayOrder()}</div>
        <div class="lh-col1">{if $image->getIsPreviewed()} Yes {else} No {/if}</div>
        <div class="lh-col2">{$image->getCreator()}</div>
        <div class="lh-col2">{$image->getCreatedTime()}</div>
        <div class="lh-col2 lh-col-last lh-actions">
            <a class="lh-action-edit" href="{$image->getDetailUrl()}&a=update">Edit</a>
            <a class="lh-action-delete lh-delete-image" href="javascript:void(0);"
                data-url="{$image->getDetailUrl()}"
                data-pid="{$image->getProjectId()}">Delete</a>
        </div>
    </div>
        {/foreach}
    {else}
    {include file="widgets/alert.tpl" messageType="info" message="There are no images"}
    {/if}
</div>