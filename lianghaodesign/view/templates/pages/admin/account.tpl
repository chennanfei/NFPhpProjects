{extends file="layouts/admin-two-columns.tpl"}

{block name="center"}
<div class="lh-box lh-box-pwd">
    <div class="lh-box-inner">
        {include file="widgets/alert.tpl"}
        {include file="features/admin/change-pwd-form.tpl"}
    </div>
</div>
{/block}