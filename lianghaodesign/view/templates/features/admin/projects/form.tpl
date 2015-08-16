<form id="projectForm" class="lh-form" action="{$newProjUrl}" method="post">
    {include file="widgets/text-input-row.tpl" input_label="*Chinese title" input_name="cnTitle" auto_focus="1"}
    {include file="widgets/text-input-row.tpl" input_label="*English title" input_name="enTitle"}
    
    <div class="lh-row lh-input">
        <div class="lh-col3 lh-input-label">*Channel:</div>
        <div class="lh-col9 lh-col-last">
            <select name="channel">
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
            <select name="program">
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

    {include file="widgets/text-input-row.tpl" input_label="*Date" input_name="date"}
    {include file="widgets/text-input-row.tpl" input_label="*Chinese address" input_name="cnAddress"}
    {include file="widgets/text-input-row.tpl" input_label="*English address" input_name="enAddress"}
    {include file="widgets/text-input-row.tpl" input_type="textarea" input_label="Chinese description" input_name="cnDesc"}
    {include file="widgets/text-input-row.tpl" input_type="textarea" input_label="English description" input_name="enDesc"}

    <div class="lh-row lh-input">
        <div class="lh-col3-offset lh-col9 lh-col-last lh-text-right">
            <input type="hidden" name="action" value="project">
            <input id="confirmBtn" class="lh-button lh-button-primary" type="submit" value="Continue">
        </div>
    </div>
</form>