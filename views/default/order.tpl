<h1>Данные заказа: </h1>
<form action="/cart/saveorder" id="frmOrder" method = 'POST'>
	<table>
		<tr>
			<td>№</td>
			<td>Наименование</td>
			<td>Количество</td>
			<td>Цена за единицу</td>
			<td>Стоимость</td>
		</tr>
		{foreach $rsProducts as $item name=products}
			<tr>
				<td>{$smarty.foreach.products.iteration}</td>
				<td><a href="/product/{$item['id']}">{$item['name']}</a></td>
				<td>
					<span id="itemCnt_{$item['id']}">
						<input type="hidden" name ="itemCnt_{$item['id']}" value = "{$item['cnt']}">
						{$item['cnt']}
					</span>
				</td>
				<td>
					<span id="itemPrice_{{$item['id']}}">
						<input type="hidden" name ="itemPrice_{$item['id']}" value = "{$item['price']}">
						{$item['price']}
					</span>
				</td>
				<td>
					<span id="itemRealPrice_{{$item['id']}}">
						<input type="hidden" name ="itemRealPrice_{$item['id']}" value = "{$item['realPrice']}">
						{$item['realPrice']}
					</span>
				</td>
			</tr>
		{/foreach}
	</table>

{if isset($anUser)}
	{$buttonClass = ''}
	<h2>Данные заказчика: </h2>
	<div id="orderUserInfoBox">
		{$name = $anUser['name']}
		{$phone = $anUser['phone']}
		{$adress = $anUser['adress']}
		<table>
			<tr>
				<td>Имя*</td>
				<td><input type="text" id='name' name='name' value = '{$name}'></td>
			</tr>
			<tr>
				<td>Телефон*</td>
				<td><input type="text" id='phone' name='phone' value = '{$phone}'></td>
			</tr>
			<tr>
				<td>Адрес</td>
				<td><textarea name="adress" form='frmOrder' id="adress">{$adress}</textarea></td>
			</tr>
		</table>
	</div>
{else}
	<div id="loginBox">
		<div id="menuCaption">Авторизация</div>
		<table>
			<tr>
				<td>Логин:</td>
				<td><input type="text" id = 'loginEmail' name = 'loginEmail' value = ''></td>
			</tr>
			<tr>
				<td>Пароль: </td>
				<td><input type="password" id = 'loginPwd' name='loginPwd' value=''></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="button" onclick='login();' value = 'Войти'></td>
			</tr>
		</table>
	</div>

	<div id="registerBox">
		<div class="menuCaption">Регистрация нового пользователя:</div>
		Email* : <br>
		<input type="text" id='email' name='email' value="" class='regInput'> <br>
		Пароль* : <br>
		<input type="password" id='pwd1' name='pwd1' value="" class='regInput'> <br>
		Подтвердите пароль* : <br>
		<input type="password" id='pwd2' name='pwd2' value="" class='regInput'> <br>

		Имя* : <input type="text" id='name' name='name' value = '{$name}'> <br>
		Телефон* : <input type="text" id='phone' name='phone' value = '{$phone}'> <br>
		Адрес* : <textarea name="adress" id="adress" form='frmOrder'>{$adress}</textarea> <br>

		<input type="button" onclick='registerNewUser();' value="Зарегистрироваться">
	</div>
	{$buttonClass = "class='hideme'"}


{/if}

<input {$buttonClass} type="button" id ='btnSaveOrder' value='Оформить заказ' onclick='saveOrder();'>
</form>