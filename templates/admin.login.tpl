{extends file='html.tpl'}
{block name='body'}
	<form action="/admin/" method="POST" ENCTYPE="multipart/form-data">
	    {if isset($invalid_pass)}<p class="invalid_pass">Неправильное имя пользователя или пароль</p>{/if}
	    <label for="login">Логин</label>
	    <input type="text" name="login" id="logim" value="{$admin_login|default:''}">
	    <label for="pass">Пароль</label>
	    <input type="password" name="pass" id="pass">
	    <button type="submit" name="submit" value="submit">Войти</button>
	</form>
{/block}