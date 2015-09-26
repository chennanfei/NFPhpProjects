{extends file="layouts/admin-two-columns.tpl"}

{block name="menu"}
    {include file="features/admin/team/menu.tpl"}
{/block}

{block name="center"}
<div class="lh-box" id="memberList">
    <div class="lh-box-inner">
        <div class="lh-row lh-members">
        {if $members}
            {foreach from=$members item=member}
            <div class="lh-member">
                <div class="lh-image">
                    <img src="{$member->getImageUrl()}">
                </div>
                <p>
                    <span class="lh-size-medium">{$member->getMemberName()}</span>&nbsp;&nbsp;
                    <a href="{$memberUrl}?o=update&id={$member->getId()}">Edit</a>&nbsp;&nbsp;
                    <a href="javascript:void()" data-url="{$memberUrl}" data-member-id="{$member->getId()}">Delete</a>
                </p>
            </div>
            {/foreach}
        {else}
            {include file="widgets/alert.tpl" messageType="info" message="There are no members"}
        {/if}
        </div>
    </div>
</div>
{/block}