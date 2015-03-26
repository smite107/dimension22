{extends file='html.tpl'}
{block name='links' append}
	<link rel="stylesheet" type="text/css" href="/css/admin_styles.css" />
    <script>
		$(function() {
			$('header li[data={$active}]').addClass('active');
		});
    </script>
{/block}
{block name='body'}
	<div class="wrapper">
		{block name='main'}{/block}
	</div>
{/block}