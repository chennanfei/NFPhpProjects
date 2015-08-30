<form id="projectForm" class="lh-form" action="{$projectUrl}" method="post"
        data-channel-id="{$curChannelId}" data-program-id="{$project->getProgramId()}">
    <input type="hidden" name="a" value="{$action}">
    {if $action eq 'update'}
    <input type="hidden" name="id" value="{$project->getId()}">
    {/if}
    
    {include file="features/admin/entry-times.tpl" entry=$project}

    {include file="widgets/text-input-row.tpl" input_label="*Chinese title" input_name="chineseTitle"
        input_value="{$project->getChineseTitle()}" auto_focus="1"}
    {include file="widgets/text-input-row.tpl" input_label="*English title" input_name="englishTitle"
        input_value="{$project->getEnglishTitle()}"}
    
    <div class="lh-row lh-input">
        <div class="lh-col3 lh-input-label">*Channel:</div>
        <div class="lh-col9 lh-col-last">
            <select name="channelId">
                <option>Choose a channel</option>
            {if $channels}
                {foreach from=$channels item=channel}
                <option value="{$channel->getId()}">{$channel->getChineseName()} - {$channel->getEnglishName()}</option>
                {/foreach}
            {/if}
            </select>
        </div>
    </div>

    <div class="lh-row lh-input">
        <div class="lh-col3 lh-input-label">*Program:</div>
        <div class="lh-col9 lh-col-last">
            <select name="programId">
                <option>Please choose the channel firstly</option>
            {if $channels}
                {foreach from=$channels item=channel}
                <optgroup class="lh-hidden" id="programs.{$channel->getId()}" label="{$channel->getEnglishName()}">
                {foreach from=$channel->getPrograms() item=program}
                    <option value="{$program->getId()}">{$program->getChineseName()} - {$program->getEnglishName()}</option>
                {/foreach}
                </optgroup>
                {/foreach}
            {/if}
            </select>
        </div>
    </div>

    {include file="widgets/text-input-row.tpl" input_label="*Date" input_name="date"
        input_value="{$project->getDate()}"
        placeholder="Please enter date, e.g. 2015-09-01"}

    {include file="widgets/text-input-row.tpl" input_label="*Chinese address" input_name="chineseAddress"
        input_value="{$project->getChineseAddress()}"}

    {include file="widgets/text-input-row.tpl" input_label="*English address" input_name="englishAddress"
        input_value="{$project->getEnglishAddress()}"}

    {include file="widgets/text-input-row.tpl" input_label="*Display order" input_name="displayOrder"
        input_value="{$project->getDisplayOrder()}"
        placeholder="Please enter numbers, e.g. 1,2,3"}

    {include file="widgets/text-input-row.tpl" input_type="checkbox" input_label="Show description"
        input_value="{$project->getShowDescription()}"
        input_name="showDescription"}

    {include file="widgets/text-input-row.tpl" input_type="textarea" input_label="Chinese description"
        input_value="{$project->getChineseDescription()}"
        input_name="chineseDescription"}

    {include file="widgets/text-input-row.tpl" input_type="textarea" input_label="English description"
        input_value="{$project->getEnglishDescription()}"
        input_name="englishDescription"}

    <div class="lh-row lh-input lh-spacing-top-big">
        <div class="lh-col3-offset lh-col9 lh-col-last lh-text-right">
            <input type="hidden" name="action" value="project">
            <input id="confirmBtn" class="lh-button lh-button-primary" type="submit" value="Save">
        </div>
    </div>
</form>