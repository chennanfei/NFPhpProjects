{extends file="layouts/simple-column.tpl"}

{block name="top"}
{include file="features/header.tpl"}
{/block}

{block name="center"}
<div class="lh-box lh-box-signin">
    {include file="features/page-content-title.tpl"}
    
    <div class="lh-box-inner">
        {include file="features/message.tpl"}
        {include file="features/signin-form.tpl"}
    </div>
</div>
{/block}