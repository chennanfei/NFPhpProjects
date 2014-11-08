{extends file="layouts/admin-simple-column.tpl"}

{block name="top"}
{include file="features/admin/header.tpl"}
{/block}

{block name="center"}
<div class="lh-box lh-box-signin">
    {include file="features/admin/page-content-title.tpl"}
    
    <div class="lh-box-inner">
        {include file="features/admin/message.tpl"}
        {include file="features/admin/signin-form.tpl"}
    </div>
</div>
{/block}