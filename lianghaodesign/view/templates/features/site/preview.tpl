<div class="item tm-float-{$project->getPosition()}">
    <div class="image" data-content-id="{$project->getContentId()}">
        <div class="image-panel">
            {foreach from=$project->getPreviewedImages() item=image}
            <img src="{$image->getImageUrl()}">
            {/foreach}
        </div>
    </div>
    <div class="desc">
        <p>{$project->getChineseTitle()} / {$project->getEnglishTitle()}</p>
        <p>
            <strong>{$project->getChineseAddress()}</strong>
            /
            <em>{$project->getEnglishAddress()}_{$project->getDate()}</em></p>
    </div>
    
    {if $project->getShowDescription()}
    <div class="detail">
        <p>{$project->getChineseDescription()}</p>
        <p>{$project->getEnglishDescription()}</p>
    </div>
    {/if}
</div>
