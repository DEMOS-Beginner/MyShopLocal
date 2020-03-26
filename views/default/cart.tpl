<h1> Корзина </h1>

{if ! $rsProducts}
	<p>В корзине пусто</p>
{else}
<form action="/cart/order" method = 'POST'>
	<table>
		<tr>
			<td>№</td>
			<td>Наименование</td>
			<td>Количество</td>
			<td>Цена за единицу</td>
			<td>Цена</td>
			<td>Действие</td>
		</tr>
		{foreach $rsProducts as $prod name=products}
		<tr>
			<td>{$smarty.foreach.products.iteration}</td>
			<td> <a href="/product/{$prod['id']}">{$prod['name']}</a> </td>
			<td>
				<input name='itemCnt_{$prod["id"]}' id = 'itemCnt_{$prod["id"]}' type="text" value='1' onchange='conversionPrice({$prod["id"]})'>
			</td>
			<td>
				<span id="itemPrice_{$prod['id']}" value='{$prod["price"]}'>
					{$prod['price']}
				</span>
			</td>
			<td>
				<span id="itemRealPrice_{$prod['id']}" value='{$prod["price"]}'>
					{$prod['price']}
				</span>
			</td>
			<td>
				<a id = 'removeCart_{$prod["id"]}' href="#" title = 'Удалить из корзины' onClick="removeFromCart({$prod['id']}); return false;"> Удалить </a>
				<a id = 'addCart_{$prod["id"]}' href="#" class = 'hideme' onClick="addToCart({$prod['id']}); return false;" title = 'Восстановить в корзину'> Восстановить </a>
			</td>
		</tr>
		{/foreach}
	</table>

	<input type="submit" value = 'Оформить заказ'>
</form>

{/if}