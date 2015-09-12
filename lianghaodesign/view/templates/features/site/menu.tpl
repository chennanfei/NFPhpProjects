<ul id="menu" class="tm-list menu-fixed">
    {foreach from=$programs item=prog}
    <li id="menuItem-{$prog->getId()}">
        <a class="nav-menu-item menu-item" data-item-id="{$prog->getId()}">
            {$prog->getEnglishName()} {$prog->getChineseName()}
        </a>
        {include file="features/site/menu-projects.tpl" program=$prog}
    </li>
    {/foreach}
</ul>