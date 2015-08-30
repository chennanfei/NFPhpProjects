{if $entry->getId()}
<div class="lh-row lh-color-secondary lh-spacing-big">
    <div class="lh-col3-offset lh-col9 lh-col-last">
        Created at {$entry->getCreatedTime()},
        Updated at {$entry->getUpdatedTime()}
    </div>
</div>
{/if}