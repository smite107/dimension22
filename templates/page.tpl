{extends file='html.tpl'}
{block name='links' append}
	<link rel="stylesheet" type="text/css" href="/css/main_styles.css" />
    <script src="/js/glitch.js"></script>
{/block}
{block name='body'}
	<div class="wrapper">
		{include file='header.tpl'}
		{block name='main'}{/block}
		{include file='footer.tpl'}
	</div>
{/block}