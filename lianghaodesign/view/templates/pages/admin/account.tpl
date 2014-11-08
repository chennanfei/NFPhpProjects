{extends file="layouts/admin-two-columns.tpl"}

{block name="center"}
<div class="lh-box lh-box-pwd">
    {include file="features/admin/page-content-title.tpl"}
    
    <div class="lh-box-inner">
        {include file="features/admin/message.tpl"}
        {include file="features/admin/change-pwd-form.tpl"}
    </div>
</div>
{/block}