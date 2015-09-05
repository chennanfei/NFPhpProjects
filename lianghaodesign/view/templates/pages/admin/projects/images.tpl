{extends file="layouts/admin-two-columns.tpl"}

{block name="menu"}
    {include file="features/admin/projects/menu.tpl"}
{/block}

{block name="center"}
<div class="lh-box" id="projectImageList">
    <div class="lh-box-inner">
        {include file="widgets/alert.tpl"}
        {include file="features/admin/projects/project-info.tpl"}

        <div class="lh-row lh-spacing-big lh-bottom-line" style="padding-bottom: 20px;">
            <div class="lh-col4">
                {include file="features/admin/image-upload.tpl" image=$image}
            </div>
            <div class="lh-col8 lh-col-last">
                {include file="features/admin/projects/image-form.tpl"}
            </div>
        </div>

        {include file="features/admin/projects/images.tpl"}
    </div>
</div>
{/block}