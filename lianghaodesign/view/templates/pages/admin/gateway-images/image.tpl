{extends file="layouts/admin-two-columns.tpl"}

{block name="menu"}
    {include file="features/admin/gateway-images/menu.tpl"}
{/block}

{block name="center"}
<div class="lh-row">
    <div class="lh-box lh-box-form">
        <div class="lh-row lh-box-inner">
            <div class="lh-col4">
                {include file="features/admin/image-upload.tpl" image=$image}
            </div>
            <div class="lh-col8 lh-col-last">
                {include file="widgets/alert.tpl"}
                {include file="features/admin/gateway-images/form.tpl"}
            </div>
        </div>
    </div>
</div>
{/block}