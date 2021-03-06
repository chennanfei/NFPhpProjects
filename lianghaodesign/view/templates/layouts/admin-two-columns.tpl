<!DOCTYPE HTML>
<html class="lh">
<head>
    <meta charset="utf-8">
    <title>{$title} - Lianghao console</title>
    {include file="features/shared/assets.tpl"}
</head>
<body class="lh-background-primary" data-page="{$page}">
    <div class="lh-header">
        {include file="features/admin/header-small.tpl"}
    </div>
    <div class="lh-content lh-spacing-big">
        {include file="features/admin/page-content-title.tpl"}
        <div class="lh-row lh-spacing-top-big">
            <div class="lh-col3">
                {block name="menu"}{/block}
            </div>
            <div class="lh-col9 lh-col-last">
                {block name="center"}{/block}
            </div>
        </div>
    </div>
</body>
</html>