{extends file="layouts/admin-simple-column.tpl"}

{block name="top"}
{include file="features/admin/header-small.tpl"}
{/block}

{block name="center"}
<div class="lh-box lh-box-error">
    <div class="lh-box-inner">
        <div class="lh-alert lh-alert-error lh-size-medium">
            {$message}
        </div>
    </div>
</div>
{/block}