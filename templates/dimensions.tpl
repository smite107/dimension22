{extends file='page.tpl'}
{block name='main'}
	<div class="row gallery" id="projects_gallery">
		{foreach $dimensions as $dimension}
			<a href="/dimension/?id={$dimension['id']}"><div class="col-md-3 col-xs-6"><img {if $dimension['image_main_id']}src="/scripts/uploads/d{$dimension['image_main_id']}_s.jpg"{else}src="/images/no-photo360x250.jpg"{/if} /></div></a>
		{/foreach}
	</div>
{/block}