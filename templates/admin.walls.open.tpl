{extends file='admin.tpl'}
{block name='header'}{/block}
{block name='links' append}
{/block}
{block name='main'}{include 'admin.header.tpl'}
	<div class="form">
		<form action="/admin/walls_{$action}" class="walls_form" method="POST" ENCTYPE="multipart/form-data">
			<input type="hidden" name="id" value="{$wall['id']}" />
			<div class="form_block">
				<label for="caption">Подпись</label>
				<input name="caption" id="caption" value="{$wall['caption']}" />
			</div> 
			<div class="buttons">
		    	<button type="submit" name="submit" value="submit" class="btn btn-default">{if $action == 'edit'}Сохранить{else}Добавить{/if}</button>
		    </div>
		</form>
	</div>
{/block}