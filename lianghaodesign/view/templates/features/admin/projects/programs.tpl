<ul class="lh-menu-programs lh-spacing-big">
    {foreach from=$programs item=program}
    <li {if $program->getId() eq $programId}class="selected"{/if}>
        <a href="{$projectsUrl}?ch={$channelId}&pg={$program->getId()}">{$program->getEnglishName()}</a>
    </li>
    {/foreach}
</ul>