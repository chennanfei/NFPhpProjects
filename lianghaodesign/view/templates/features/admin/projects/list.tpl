<div id="projList" class="lh-list">
    {if $projects}
    <div class="lh-row lh-list-head">
        <div class="lh-col4">Name</div>
        <div class="lh-col1">Order</div>
        <div class="lh-col2">Creator</div>
        <div class="lh-col2">Created time</div>
        <div class="lh-col2 lh-col-last">Actions</div>
    </div>
        {foreach from=$projects item=proj}
    <div class="lh-row lh-list-item">
        <div class="lh-col4">{$proj->getEnglishName()}</div>
        <div class="lh-col1">{$proj->getDisplayOrder()}</div>
        <div class="lh-col2">{$proj->getCreator()}</div>
        <div class="lh-col2">{$proj->getDate()}</div>
        <div class="lh-col2 lh-col-last lh-actions">
            <a class="lh-action-edit" href="{$proj->getDetailUrl()}&a=update">Edit</a>
            <a class="lh-action-delete" href="{$proj->getDetailUrl()}&a=delete">Delete</a>
        </div>
    </div>
        {/foreach}
    {else}
        {include file="widgets/alert.tpl" messageType="info" message="There are no projects"}
    {/if}
</div>