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
			     'uploadType'  : 'dimensions',
			     'item_id'     : '{/literal}{$dimension["id"]}{literal}',
			     'width'       : '360',
			     'height'      : '250',
			     'count'       : '3',
			     'sizes'       : 's#360#250',
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
							table: 'dimensions_images',
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
		<form action="/admin/dimensions_{$action}" method="POST" ENCTYPE="multipart/form-data">
			<input type="hidden" name="id" value="{$dimension['id']}" />
			<div class="form_block">
				<label for="name">Название</label>
				<input name="name" id="name" value="{$dimension['name']}" />
			</div> 
			<div class="form_block">
				<label for="text">Текст</label>
				<textarea name="text" id="text">{$dimension['text']}</textarea>
			</div> 
			<div class="form_block">
				<label for="background">Фон</label>
				<input name="background" id="background" value="{$dimension['background']}" />
			</div> 
			{if $action == 'edit'}
				<div id="gallery" class="upload_gallery">
					{foreach from = $dimension['images'] item=image}
						<div class="preview"><a href="/scripts/uploads/d{$image['id']}_b.jpg" data-lightbox="gallery"><img src="/scripts/uploads/d{$image['id']}_s.jpg" /></a><button class="delete" type="button" data="{$image['id']}">X</button><div class="go_main"><input type="radio" name="image_main_id" id="i{$image['id']}" value="{$image['id']}" {if $image['id'] == $dimension['image_main_id']}checked="checked"{/if} /><label for="i{$image['id']}">go main</label></div></div>
					{/foreach}
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