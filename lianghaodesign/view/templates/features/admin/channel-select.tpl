<div class="lh-row lh-input">
    <div class="lh-col3 lh-input-label">*Channel:</div>
    <div class="lh-col9 lh-col-last">
        <select class="lh-select" name="siteChannelId">
            <option>Choose a channel</option>
        {if $channels}
            {foreach from=$channels item=channel}
            <option value="{$channel->getId()}">{$channel->getChineseName()} - {$channel->getEnglishName()}</option>
            {/foreach}
        {/if}
        </select>
    </div>
</div>