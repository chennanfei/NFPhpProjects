<!DOCTYPE HTML>
<html class="lh">
<head>
    <meta charset="utf-8">
    <title>{$title} - Lianghao console</title>
    {include file="features/assets.tpl"}
</head>
<body class="lh-background-primary" data-page="{$page}">
    <div class="lh-header">
        {include file="features/header-small.tpl"}
    </div>
    <div class="lh-content lh-row lh-spacing-top-big">
        <div class="lh-col3">
            {include file="features/menu.tpl"}
        </div>
        <div class="lh-col9 lh-col-last">
            {block name="center"}{/block}
        </div>
    </div>
</body>
</html>