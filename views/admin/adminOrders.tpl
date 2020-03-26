<h2>Заказы</h2>
{if !$rsOrders}
	Нет заказов
{else}
<table border='1' cellpadding='1' cellspacing='1'>
	<tr>
		<th>№</th>
		<th>Действие</th>
		<th>ID</th>
		<th width='110'>Статус</th>
		<th>Дата создания</th>
		<th>Дата оплаты</th>
		<th>Дополнительная информация</th>
		<th>Дата изменения</th>
	</tr>
	{foreach $rsOrders as $item name=orders}
	<tr>
		<th>{$smarty.foreach.orders.iteration}</th>
		<th>
			<a href="" onclick='showProducts({$item["id"]}); return false;'>
				Показать товар заказа
			</a>
		</th>
		<th>{$item['id']}</th>
		<th width='110'>
			<input type="checkbox" id='itemStatus_{$item["id"]}'
			{if $item['status']}checked='checked'{/if} onclick='updateOrderStatus({$item["id"]});'>Закрыт
		</th>
		<th>$item['date_created']</th>
		<th>
			<input type="text" id='datePayment_{$item["id"]}' value='{$item["date_payment"]}'>
			<input type="button" value='Сохранить' onclick='uploadDatePayment({$item["id"]});'>
		</th>
		<th>{$item['comment']}</th>
		<th>{$item['date_modification']}</th>
	</tr>

	<tr class="hideme" id="purchasesForOrderId_{$item['id']}">
		<td colspan='8'>
			{if $item['children']}
				<table border="1" cellpadding="1" cellspacing="1" width='100%'>
					<tr>
						<td>№</td>
						<td>ID</td>
						<td>Название</td>
						<td>Цена</td>
						<td>Количество</td>
					</tr> 
				{foreach $item['children'] as $itemChild name=products}
					<tr>
						<td>{$smarty.foreach.products.iteration}</td>
						<td>{$itemChild["product_id"]}</td>
						<td>
							<a href="/product/{$itemChild['product_id']}">
								{$itemChild['name']}
							</a>
						</td>
						<td>{$itemChild["price"]}</td>
						<td>{$itemChild["amount"]}</td>
					</tr>
				{/foreach}
				</table>
			{/if}
		</td>
	</tr>

	{/foreach}

</table>
{/if}