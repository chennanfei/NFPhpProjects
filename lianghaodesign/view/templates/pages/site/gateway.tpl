{extends file="layouts/site-simple-column.tpl"}

{block name="center"}
<div id="loadingImages" class="loading">
    <div class="image">
      <a class="tm-hidden" id="image-template"><img src=""></a>
      {foreach from=$images item=image}
      <object class="tm-hidden" src="{$image->getImageUrl()}" data-url="{$image->getChannelPageUrl()}"></object>
      {/foreach}
      <div id="realTitle" class="tm-hidden text background-stress">
          <a class="page-link" href="{$workUrl}" style="width:3.5em;">
            <span>Project</span><span class="tm-hidden">项目</span>
          </a>
          <span>X</span>
          <a class="page-link" href="{$lifeUrl}" style="width:2.5em;">
            <span>Life</span><span class="tm-hidden">生活</span>
          </a>
      </div>
    </div>
    <div id="loadingTitle" class="text">
      <span class="background-stress">Loading......</span>
    </div>
</div>
<div class="float-text-list">
    <span class="brand-text1">L</span>
    <span class="brand-text2">I</span>
    <span class="brand-text3">A</span>
    <span class="brand-text4">N</span>
    <span class="brand-text5">G</span>
    <span class="brand-text6">H</span>
    <span class="brand-text7">A</span>
    <span class="brand-text8">O</span>
</div>
{/block}
