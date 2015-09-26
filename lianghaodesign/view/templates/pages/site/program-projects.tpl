<!-- preivew -->
<div class="tm-row content preview-content">
    <div class="tm-row-col6">
        {foreach from=$program->getLeftProjects() item=project}
        {include file="features/site/preview.tpl" project=$project}
        {/foreach}
    </div>
    <div class="tm-row-col6 tm-row-col-last">
        {foreach from=$program->getRightProjects() item=project}
        {include file="features/site/preview.tpl" project=$project}
        {/foreach}
    </div>
</div>

{foreach from=$program->getProjects() item=project}
    {if $program->getId() == 'lifeTeam'}
        {include file="features/site/team.tpl" project=$project}
    {else}
        {include file="features/site/project.tpl" project=$project}
    {/if}
{/foreach}

<div class="tm-hidden">
    {include file="features/site/menu-projects.tpl" program=$program}
</div>