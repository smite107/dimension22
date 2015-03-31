{extends file='page.tpl'}
{block name='links' append}
	<script src="/js/lightbox.min.js"></script>
	<link rel="stylesheet" href="/css/lightbox.css">
{/block}
{block name='main'}
	<div class="gallery" id="gallery">
		{foreach $articles as $article}
			<a href="/scripts/uploads/g{$article['image']}_b.jpg" data-lightbox="images" data-title="{$article['caption']}"><div class="preview"><img {if $article['image']}src="/scripts/uploads/g{$article['image']}_s.jpg"{else}src="/images/no-photo200x200.jpg"{/if} /></div></a>
		{/foreach}
	</div>
{/block}