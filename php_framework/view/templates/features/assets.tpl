{foreach from=$styles item=css}
<link type="text/css" href="{$css}" rel="stylesheet">
{/foreach}

{foreach from=$scripts item=script}
<script type="text/javascript" src="{$script}" async="async"></script>
{/foreach}