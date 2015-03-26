{extends file='admin.tpl'}
{block name='header'}{/block}
{block name='links' append}
	<script src="/js/lightbox.min.js"></script>
	<link rel="stylesheet" href="/css/lightbox.css">
	<script src="/upload_photo/js/plugin.js"></script>
	<script src="/js/check_disable.js"></script>
	<script>
	{literal}
		$(function(){
			$('div.upload_gallery div.add_photo button.upload').getUpload({
			     'uploadType'  : '{/literal}{$type}{literal}',
			     'item_id'     : '{/literal}{$article["id"]}{literal}',
			     'width'       : '200',
			     'height'      : '200',
			     'count'       : '1',
			     'sizes'       : 's#200#200',
			     'resizes'     : 'b#1000#700',
			});

			checkDisable();

			$('button.delete').click(function(){
				var $this = $(this);
				if (confirm("Delete?")) {
					$id = $this.attr('data');
					$.post(
						"/scripts/admin/admin.handler.php",
						{
							table: 'images',
							mode: 'Delete',
							params: {
								id: $id
							}
						},
						function(data) {
							if (data.result) {
								$this.parent().remove().empty();
								checkDisable();
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
	<div class="form">
		<form action="/admin/{$type}_{$action}" method="POST" ENCTYPE="multipart/form-data">
			<input type="hidden" name="id" value="{$article['id']}" />
			<div class="form_block">
				<label for="caption">Подпись</label>
				<input name="caption" id="caption" value="{$article['caption']}" />
			</div> 
			{if $action == 'edit'}
				<div id="gallery" class="upload_gallery">
					{if $article['image']}
						<div class="preview"><a href="/scripts/uploads/{$article['image']}_b.jpg" data-lightbox="gallery"><img src="/scripts/uploads/{$article['image']}_s.jpg" /></a><button class="delete" data="{$article['image']}">X</button></div>
					{/if}
					<div class="add_photo">
						<button class="upload btn btn-default" type="submit">Добавить фото</button>
					</div>
				</div>
			{/if}
			<div class="buttons">
		    	<button type="submit" name="submit" value="submit" class="btn btn-default">{if $action == 'edit'}Сохранить{else}Добавить{/if}</button>
		    </div>
		</form>
	</div>
{/block}