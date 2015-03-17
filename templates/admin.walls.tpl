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
								table: 'Walls',
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
{block name='main'}{include 'admin.header.tpl'}
	<div class="gallery" id="gallery">
		<div><a href="/admin/walls_add" id="add" class="btn btn-default">+ Add wall</a></div>
		{foreach $walls as $wall}
			<div class="preview"><a href="/scripts/uploads/{$wall['id']}.jpg" data-lightbox="walls"><img src="/scripts/uploads/{$wall['id']}_s.jpg" /></a><button class="delete" data="{$wall['id']}">X</button></div>
		{/foreach}
	</div>
{/block}