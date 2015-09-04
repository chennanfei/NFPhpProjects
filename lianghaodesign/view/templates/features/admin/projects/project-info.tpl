{if $project}
<ul class="lh-row lh-spacing-big lh-bottom-line lh-project-info">
    <li><a href="{$project->getDetailUrl()}&a=update" href="">{$project->getEnglishTitle()}</a></li>
    <li>{$project->getEnglishAddress()}</li>
    <li>{$project->getDate()}</li>
</ul>
{/if}