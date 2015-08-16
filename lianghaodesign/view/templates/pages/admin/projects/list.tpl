{extends file="layouts/admin-two-columns.tpl"}

{block name="menu"}
    {include file="features/admin/projects/menu.tpl"}
{/block}

{block name="center"}
<div class="lh-box">
    <div class="lh-box-inner">
        {include file="features/admin/projects/list.tpl"}
    </div>
</div>
{/block}