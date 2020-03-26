<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-05 14:18:50
  from 'Z:\home\myshop.local\views\admin\adminOrders.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e3aceca28bb92_27905450',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '16f47dd9568b846ffa0cef9475cffd446f6360a6' => 
    array (
      0 => 'Z:\\home\\myshop.local\\views\\admin\\adminOrders.tpl',
      1 => 1580912328,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e3aceca28bb92_27905450 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>Заказы</h2>
<?php if (!$_smarty_tpl->tpl_vars['rsOrders']->value) {?>
	Нет заказов
<?php } else { ?>
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
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsOrders']->value, 'item', false, NULL, 'orders', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']++;
?>
	<tr>
		<th><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration'] : null);?>
</th>
		<th>
			<a href="" onclick='showProducts(<?php echo $_smarty_tpl->tpl_vars['item']->value["id"];?>
); return false;'>
				Показать товар заказа
			</a>
		</th>
		<th><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</th>
		<th width='110'>
			<input type="checkbox" id='itemStatus_<?php echo $_smarty_tpl->tpl_vars['item']->value["id"];?>
'
			<?php if ($_smarty_tpl->tpl_vars['item']->value['status']) {?>checked='checked'<?php }?> onclick='updateOrderStatus(<?php echo $_smarty_tpl->tpl_vars['item']->value["id"];?>
);'>Закрыт
		</th>
		<th>$item['date_created']</th>
		<th>
			<input type="text" id='datePayment_<?php echo $_smarty_tpl->tpl_vars['item']->value["id"];?>
' value='<?php echo $_smarty_tpl->tpl_vars['item']->value["date_payment"];?>
'>
			<input type="button" value='Сохранить' onclick='uploadDatePayment(<?php echo $_smarty_tpl->tpl_vars['item']->value["id"];?>
);'>
		</th>
		<th><?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>
</th>
		<th><?php echo $_smarty_tpl->tpl_vars['item']->value['date_modification'];?>
</th>
	</tr>

	<tr class="hideme" id="purchasesForOrderId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
		<td colspan='8'>
			<?php if ($_smarty_tpl->tpl_vars['item']->value['children']) {?>
				<table border="1" cellpadding="1" cellspacing="1" width='100%'>
					<tr>
						<td>№</td>
						<td>ID</td>
						<td>Название</td>
						<td>Цена</td>
						<td>Количество</td>
					</tr> 
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'itemChild', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
					<tr>
						<td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value["product_id"];?>
</td>
						<td>
							<a href="/product/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['product_id'];?>
">
								<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>

							</a>
						</td>
						<td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value["price"];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value["amount"];?>
</td>
					</tr>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</table>
			<?php }?>
		</td>
	</tr>

	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</table>
<?php }
}
}
