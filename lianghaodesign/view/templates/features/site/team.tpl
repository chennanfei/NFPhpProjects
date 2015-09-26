<div id="{$project->getContentId()}" class="tm-row content content-detail">
    <div class="close-btn"></div>
    <div class="tm-row images team-images">
        {foreach from=$project->getImages() item=image}
        <div class="tm-row-col4">
            <img src="{$image->getImageUrl()}">
            <p>{$image->getAliasName()}</p>
        </div>
        {/foreach}
    </div>
</div>