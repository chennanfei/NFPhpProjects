{extends file="layouts/admin-two-columns.tpl"}

{block name="menu"}
    {include file="features/admin/gateway-images/menu.tpl"}
{/block}

{block name="center"}
<div class="lh-box">
    {include file="features/admin/page-content-title.tpl"}

    <div class="lh-box-inner">
        {include file="features/admin/gateway-images/list.tpl"}
    </div>
</div>
{/block}