<link rel="shortcut icon" href="{$favicon}">
{foreach from=$styles item=css}
<link type="text/css" href="{$css}" rel="stylesheet">
{/foreach}

{if $jqJS}
<script id="jquery" type="text/javascript" src="{$jqJS}"></script>
{/if}

{if $jqFormJS}
<script id="jqueryForm" type="text/javascript" src="{$jqFormJS}" async="async"></script>
{/if}

{if $pageJS}
<script type="text/javascript" src="{$libJS}" async="async" data-first="{$pageJS}"></script>
{/if}