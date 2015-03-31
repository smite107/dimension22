{extends file='admin.tpl'}
{block name='header'}{/block}
{block name='links' append}
	<script src="/js/lightbox.min.js"></script>
	<link rel="stylesheet" href="/css/lightbox.css">
	<script>
		{literal}
			$(function(){
				$('button.delete').click(function(){
					var $this = $(this);
					if (confirm("Delete?")) {
						$id = $this.attr('data');
						$.post(
							"/scripts/admin/admin.handler.php",
							{
								table: 'dimensions',
								mode: 'Delete',
								params: {
									id: $id
								}
							},
							function(data) {
								if (data.result) {
									$this.parent().remove().empty();
								} else {
									alert(data.message);
								}
							},
							"json"
						);
						return false;
					}
				});
			});
		{/literal}
	</script>
{/block}
{block name='main'}
	{include 'admin.header.tpl'}
	<div class="gallery" id="gallery">
		<div><a href="/admin/dimensions_add" id="add" class="btn btn-default">+ Добавить</a></div>
		{foreach $dimensions as $dimension}
			<div class="preview"><a href="/admin/dimensions_edit/?id={$dimension['id']}"><img {if $dimension['image_main_id']}src="/scripts/uploads/d{$dimension['image_main_id']}_s.jpg"{else}src="/images/no-photo360x250.jpg"{/if} /></a><button class="delete" type="button" data="{$dimension['id']}">X</button></div>
		{/foreach}
	</div>
{/block}