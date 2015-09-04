<div class="lh-box">
    <ul class="lh-box-inner lh-menu">
        <li class="lh-menu-item">
            <a class="lh-menu-item-link" href="{$projectUrl}">Add a project</a>
        </li>
        <li class="lh-menu-item">
            <a class="lh-menu-item-link" href="{$workProjectsUrl}">View Work projects</a>
        </li>
        <li class="lh-menu-item">
            <a class="lh-menu-item-link" href="{$lifeProjectsUrl}">View Life projects</a>
        </li>
    </ul>
</div>

{if $projectImagesUrl}
<div class="lh-box lh-spacing-top-big">
    <ul class="lh-box-inner lh-menu">
        <li class="lh-menu-item">
            <a class="lh-menu-item-link" href="{$projectImagesUrl}&preview=1">View previewed images</a>
        </li>
        <li class="lh-menu-item">
            <a class="lh-menu-item-link" href="{$projectImagesUrl}">View project images</a>
        </li>
    </ul>
</div>
{/if}