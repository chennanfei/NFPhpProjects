<ul class="tm-sub-list tm-spacing-base tm-top-spacing-base tm-hidden" data-program-id="{$program->getId()}">
    {foreach from=$program->getProjects() item=project}
    <li>
        <a class="nav-menu-item sub-menu-item" data-content-id="{$project->getContentId()}">
            {$project->getChineseTitle()} / {$project->getEnglishTitle()}
        </a>
    </li>
    {/foreach}
</ul>