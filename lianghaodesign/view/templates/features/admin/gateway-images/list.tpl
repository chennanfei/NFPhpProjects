<div id="gwImages" class="lh-list">
    {if $images}
    <div class="lh-row lh-list-head">
        <div class="lh-col1">ID</div>
        <div class="lh-col3">Name</div>
        <div class="lh-col1">Channel</div>
        <div class="lh-col1">Order</div>
        <div class="lh-col2">Creator</div>
        <div class="lh-col2">Created time</div>
        <div class="lh-col2 lh-col-last">Actions</div>
    </div>
        {foreach from=$images item=image}
    <div class="lh-row lh-list-item">
        <div class="lh-col1">{$image->getId()}</div>
        <div class="lh-col3">{$image->getImageName()}</div>
        <div class="lh-col1">{$image->getSiteChannel()->getEnglishName()}</div>
        <div class="lh-col1">{$image->getDisplayOrder()}</div>
        <div class="lh-col2">{$image->getCreator()}</div>
        <div class="lh-col2">{$image->getCreatedTime()}</div>
        <div class="lh-col2 lh-col-last lh-actions">
            <a class="lh-action-edit" href="javascript:void(0);" data-image-id="{$image->getId()}">Edit</a>
            <a class="lh-action-delete" href="javascript:void(0);" data-image-id="{$image->getId()}">Delete</a>
        </div>
    </div>
        {/foreach}
    {else}
        {include file="widgets/alert.tpl" messageType="info" message="There are no images on the gateway page"}
    {/if}
</div>