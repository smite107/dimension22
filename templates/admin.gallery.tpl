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
								table: '{/literal}{$type}{literal}',
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
		<div><a href="/admin/{$type}_add" id="add" class="btn btn-default">+ Добавить</a></div>
		{foreach $articles as $article}
			<div class="preview"><a href="/admin/{$type}_edit/?id={$article['id']}"><img src="/scripts/uploads/{$article['image']}_s.jpg" /></a><button class="delete" data="{$article['id']}">X</button></div>
		{/foreach}
	</div>
{/block}