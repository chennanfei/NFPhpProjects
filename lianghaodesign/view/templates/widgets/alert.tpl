<div id="msgAlert" class="lh-alert {if $messageType}lh-alert-{$messageType}{else}lh-hidden{/if}">
    <p class="lh-alert-message">{$message}</p>
    {foreach from=$errors item=error}
    <p class="lh-alert-errors">
        {if $error.field}Invalid field: {$error.field}, {/if}
        {$error.message}
    </p>
    {/foreach}
</div>