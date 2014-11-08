<div class="lh-header-content-small lh-row">
    <div class="lh-col5">
        {if $homeUrl}
        <a class="lh-header-text" href="{$homeUrl}">Lianghao site console</a>
        {else}
        <span class="lh-header-text">Lianghao site console</span>
        {/if}
    </div>
    <div class="lh-col5 lh-col-last lh-text-right">
        {if $signOutUrl}
        <a href="{$signOutUrl}">Log out</a>
        {/if}
    </div>
</div>