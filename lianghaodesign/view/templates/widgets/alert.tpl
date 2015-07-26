<div id="msgAlert" class="lh-alert {if $messageType}lh-alert-{$messageType}{else}lh-hidden{/if}">
    <p>{$message}</p>
    {foreach from=$errors item=error}
    <p>
        {if $error.field}Invalid field: {$error.field}, {/if}
        {$error.message}
    </p>
    {/foreach}
</div>