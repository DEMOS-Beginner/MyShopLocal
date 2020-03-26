<div id="leftColumn">
	<div id="leftmenu">
		<div class="menuCaption"> Меню: </div>
		{foreach $rsCategories as $item}
			<a href="/category/{$item['id']}">{$item['name']}</a> <br>
			{if isset($item['children'] )}
				{foreach $item['children'] as $child}
					--<a href="/category/{$child['id']}">{$child['name']}</a> <br>
				{/foreach}
			{/if}
		{/foreach}
	</div>
	<a href="/cart" title = 'Перейти в корзину'>В корзине</a>
	<span id ='cartCntItems'>
		{if $cartCntItems > 0}
			{$cartCntItems}
		{else}
			пусто
		{/if}
	</span>

	{if isset($arUser)}
		<div id="userBox">
			<a href="/user" id='userLink'>{$arUser['displayName']}</a> <br>
			<a href="/user/logout"> Выход </a>
		</div>
	{else}
		<div id="userBox" class = 'hideme'>
			<a href="/user" id='userLink'></a> <br>
			<a href="/user/logout"> Выход </a>
		</div>
		{if ! isset($hideLoginBox)}
			<div id="loginBox">
				<div class="menuCaption">Авторизация</div>
				Email: <br>
				<input type="text" id="loginEmail" name="loginEmail" value=""> <br>
				Пароль:
				<input type="password" id="loginPwd" name="loginPwd" value=""> <br> 
				<input type="button" onclick='login();' value="Войти"> <br>
			</div>

			<div id="registerBox">
				<div class="menuCaption showHidden" onclick='showRegisterBox();'>Регистрация</div>
				<div id="registerBoxHidden" class ='hideme'>
					Email: <br>
					<input type="text" id='email' name='email' value="" class='regInput'> <br>
					Пароль: <br>
					<input type="password" id='pwd1' name='pwd1' value="" class='regInput'> <br>
					Подтвердите пароль: <br>
					<input type="password" id='pwd2' name='pwd2' value="" class='regInput'> <br>
					<input type="button" onclick='registerNewUser();' value="Зарегистрироваться">
				</div>
			</div>
		{/if}
	{/if}
</div>



