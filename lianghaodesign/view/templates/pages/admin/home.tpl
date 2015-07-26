{extends file="layouts/admin-simple-column.tpl"}

{block name="top"}
    {include file="features/admin/header-small.tpl"}
{/block}

{block name="center"}
    {include file="features/admin/home/welcome.tpl"}
    {include file="features/admin/home/list.tpl"}
{/block}