{extends file="layouts/site-two-columns.tpl"}

{block name="center"}
<div id="floatLayer" class="float-text-list2">
    <span class="page-text1">W</span>
    <span class="page-text2">O</span>
    <span class="page-text3">R</span>
    <span class="page-text4">K</span>
</div>

{foreach from=$programs item=program name=prog}
<div class="design-list tm-spacing-medium" id="{$program->getId()}"
        {if $smarty.foreach.prog.index != 0}data-url="{$program->getProjectsUrl()}"{/if}>
    {include file="pages/site/program-projects.tpl" program=$program}
</div>
{/foreach}

{/block}