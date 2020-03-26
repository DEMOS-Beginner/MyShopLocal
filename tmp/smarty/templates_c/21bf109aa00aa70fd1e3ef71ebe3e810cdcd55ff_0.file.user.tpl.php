<?php
/* Smarty version 3.1.34-dev-7, created on 2020-01-27 12:54:15
  from 'Z:\home\myshop.local\views\default\user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e2edd7782bbb7_32963473',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '21bf109aa00aa70fd1e3ef71ebe3e810cdcd55ff' => 
    array (
      0 => 'Z:\\home\\myshop.local\\views\\default\\user.tpl',
      1 => 1580129648,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e2edd7782bbb7_32963473 (Smarty_Internal_Template $_smarty_tpl) {
?><h1> Ваши регистрационные данные: </h1>
<table border="0">
	<tr>
		<td>Логин (email):</td>
		<td><?php echo $_smarty_tpl->tpl_vars['arUser']->value['email'];?>
</td>
	</tr>
	<tr>
		<td>Имя:</td>
		<td> <input type="text" id = 'newName' value = '<?php echo $_smarty_tpl->tpl_vars['arUser']->value["name"];?>
'> </td>
	</tr>
	<tr>
		<td>Телефон:</td>
		<td> <input type="text" id = 'newPhone' value = '<?php echo $_smarty_tpl->tpl_vars['arUser']->value["phone"];?>
'> </td>
	</tr>
	<tr>
		<td>Адрес:</td>
		<td> <textarea name="" id="newAdress"><?php echo $_smarty_tpl->tpl_vars['arUser']->value["adress"];?>
</textarea></td>
	</tr>
	<tr>
		<td>Новый пароль:</td>
		<td> <input type="password" id = 'newPwd1' value = ''> </td>
	</tr>
	<tr>
		<td>Повтор пароля:</td>
		<td> <input type="password" id = 'newPwd2' value = ''> </td>
	</tr>
	<tr>
		<td>Для обновления данных введите текущий пароль: </td>
		<td> <input type="password" id = 'curPwd'> </td>
	</tr>
	<tr>
		<td>&nbsp</td>
		<td> <input type="button" value = 'Сохранить изменения' onclick='updateUserData();'> </td>
	</tr>
</table>

<h2>Заказы: </h2>
<?php if (!'rsUserOrders') {?>
	Нет заказов
<?php } else { ?>
	<table border="1" cellpadding="1" cellspacing="1">
		<tr>
			<td>№</td>
			<td>Действие</td>
			<td>ID Заказа</td>
			<td>Статус</td>
			<td>Дата создания</td>
			<td>Дата оплаты</td>
			<td>Дополнительная информация</td>
		</tr>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsUserOrders']->value, 'item', false, NULL, 'orders', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']++;
?>
			<tr>
				<td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration'] : null);?>
</td>
				<td>
					<a href="" onclick='showProducts(<?php echo $_smarty_tpl->tpl_vars['item']->value["id"];?>
); return false;'>
						Показать товар заказа
					</a>
				</td>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value["id"];?>
</td>
				<td>
	                <?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 1) {?>
	                    Заказ оплачен
	                <?php } else { ?>
	                    Заказ не оплачен
	                <?php }?>
            	</td>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value["date_created"];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value["date_payment"];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['item']->value["comment"];?>
</td>
			</tr>

			<tr class="hideme" id="purchasesForOrderId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
				<td colspan='7'>
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
