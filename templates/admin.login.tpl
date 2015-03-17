{extends file='admin.tpl'}
{block name='main'}
	<div class="login_form">
		<form action="/admin/" class="login_form" method="POST" ENCTYPE="multipart/form-data">
		    {if isset($invalid_pass)}<p class="invalid_pass">Неправильное имя пользователя или пароль</p>{/if}
		    <div class="form_block">
			    <label for="login">Логин</label>
			    <input type="text" name="login" id="logim" value="{$admin_login|default:''}">
		    </div>
		    <div class="form_block">
			    <label for="pass">Пароль</label>
			    <input type="password" name="pass" id="pass">
		    </div>
		    <div class="buttons">
		    	<button type="submit" name="submit" value="submit" class="btn btn-default">Войти</button>
		    </div>
		</form>
	</div>
{/block}