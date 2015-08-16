<ul id="menu" class="tm-list menu-fixed">
    {foreach from=$programs item=prog}
    <li>
        <a class="nav-menu-item menu-item" data-item-id="{$prog->getId()}">
            {$prog->getEnglishName()} {$prog->getChineseName()}
        </a>
        <ul class="tm-sub-list tm-spacing-base tm-top-spacing-base tm-hidden">
            {foreach from=$prog->getProjects() item=proj}
            <li>
                <a class="nav-menu-item sub-menu-item" data-content-id="{$proj->getContentId()}">
                    {$proj->getChineseName()} / {$proj->getEnglishName()}
                </a>
            </li>
            {/foreach}
        </ul>
    </li>
    {/foreach}
</ul>