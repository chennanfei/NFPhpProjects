{extends file="layouts/admin-two-columns.tpl"}

{block name="menu"}
    {include file="features/admin/projects/menu.tpl"}
{/block}

{block name="center"}
<div class="lh-box" id="projectImageList">
    <div class="lh-box-inner">
        {include file="widgets/alert.tpl"}
        {include file="features/admin/projects/project-info.tpl"}
        {include file="features/admin/projects/image.tpl"}
        {include file="features/admin/projects/images.tpl"}
    </div>
</div>
{/block}