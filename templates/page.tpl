{extends file='html.tpl'}
{block name='links' append}
	<link href="/css/main.css" rel="stylesheet" />
{/block}
{block name='page'}
	{include file="aside.tpl"}
	<div id="main">
		{block name='div.main'}{/block}
	</div>
{/block}