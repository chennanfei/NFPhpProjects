<div id="{$project->getContentId()}" class="tm-row content content-detail">
    <div class="close-btn"></div>
    <div class="tm-row images">
        {foreach from=$project->getImages() item=image name=img}
        <div {if $image->getIsHalf()}class="tm-row-col6"{else}class="tm-row-col12"{/if}>
            {if $smarty.foreach.img.index == 0}
            <img src="{$image->getImageUrl()}">
            {else}
            <span class="image-placeholder" data-image-url="{$image->getImageUrl()}"></span>
            {/if}
        </div>
        {/foreach}
    </div>
    
    <div class="tm-row">
        <div class="tm-row-col6">
            <div class="desc">
                <p>{$project->getChineseTitle()} / {$project->getEnglishTitle()}</p>
                <p>
                    <strong>{$project->getChineseAddress()}</strong>
                    /
                    <em>{$project->getEnglishTitle()}_{$project->getDate()}</em>
                </p>
            </div>

            <div class="detail">
                <p>{$project->getChineseDescription()}</p>
                <p>{$project->getEnglishDescription()}</p>
            </div>
        </div>
    </div>
</div>