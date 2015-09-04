{extends file="layouts/admin-two-columns.tpl"}

{block name="menu"}
    {include file="features/admin/projects/menu.tpl"}
{/block}

{block name="center"}
<div class="lh-row">
    <div class="lh-col9 lh-col-last">
        <div class="lh-box lh-box-form">
            <div class="lh-box-inner">
                {include file="widgets/alert.tpl"}
                {include file="features/admin/projects/form.tpl"}
            </div>
        </div>
    </div>
</div>
{/block}