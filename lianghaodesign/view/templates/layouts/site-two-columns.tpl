<!DOCTYPE HTML>
<html class="lh-site">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="baidu-site-verification" content="B8YxaKGOsT">
    <meta name="keywords" content="良好设计,良好,lianghao,平面设计,网站设计,环境标识设计,环境平面设计,导向标识设计产品设计">
    <title>{$title} {$cnTitle} - Lianghao Design</title>
    {include file="features/shared/assets.tpl"}
</head>
<body class="background-primary" data-page="{$page}">
    <header class="tm-container tm-row header-fixed">
        {include file="features/site/header.tpl"}
    </header>
    
    <div id="pageLoading" class="page-loading background-stress">
        Loading......
    </div>
    <div id="mainContent" class="tm-container tm-content tm-row main-content">
        {include file="features/site/menu.tpl"}
        <div class="tm-col-offset2 tm-row-col10 tm-row-col-last">
            {block name="center"}{/block}
        </div>
    </div>
    
    <footer class="tm-container footer-fixed" id="footer">
        {include file="features/site/footer.tpl"}
    </footer>
</body>
</html>