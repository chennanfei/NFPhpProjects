<div class="lh-header-content-small lh-row">
    <div class="lh-col3">
        {if $homeUrl}
        <a class="lh-header-text" href="{$homeUrl}">Lianghao site console</a>
        {else}
        <span class="lh-header-text">Lianghao site console</span>
        {/if}
    </div>
    <div class="lh-col6">
        {if $homeUrl}
        <a href="{$homeUrl}">Home</a>
        {/if}
    </div>
    <div class="lh-col3 lh-col-last lh-text-right">
        {if $signOutUrl}
        <a href="{$signOutUrl}">Log out</a>
        {/if}
    </div>
</div>