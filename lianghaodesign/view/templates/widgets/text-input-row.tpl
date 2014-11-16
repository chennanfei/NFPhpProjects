{if !$left_col}
    {assign var="left_col" value="3"}
{/if}
{if !$input_type}
    {assign var="input_type" value="text"}
{/if}

<div class="lh-row lh-input">
    <div class="lh-col{$left_col} lh-input-label">{$input_label}:</div>
    <div class="lh-col{12 - $left_col} lh-col-last">
        {if $input_type eq 'textarea'}
        <textarea name="{$input_name}"></textarea>
        {else}
        <input class="lh-input-text" type="{$input_type}" name="{$input_name}"
            {if {$input_value}}value="{$input_value}"{/if}
            {if $auto_focus}autofocus{/if}>
        {/if}
    </div>
</div>