{extends file='page.tpl'}
{block name='links' append}
	<link href="/css/index.css" rel="stylesheet" />
	<link href="/css/positions.css" rel="stylesheet" />
	<link href="/css/aside.css" rel="stylesheet" />
	<link href="/css/footer.css" rel="stylesheet" />
{/block}
{block name='div.main'}
	<div class="row">
		<div class="work h-2 v-2 r-1-1">
			<img src="/images/2.jpg" />
		</div>
	</div>
	<div class="row">
		<div class="work h-3 v-1 r-1-1">
			<img src="/images/2.jpg" />
		</div>
	</div>
	<div class="row">
		<div class="work h-1 v-2 r-1-1">
			<img src="/images/2.jpg" />
		</div>
	</div>
	{include file="footer.tpl"}
{/block}