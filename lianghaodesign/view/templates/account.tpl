{extends file="layouts/two-columns.tpl"}

{block name="center"}
<div class="lh-box lh-box-pwd">
    {include file="features/page-content-title.tpl"}
    
    <div class="lh-box-inner">
        {include file="features/message.tpl"}
        {include file="features/change-pwd-form.tpl"}
    </div>
</div>
{/block}