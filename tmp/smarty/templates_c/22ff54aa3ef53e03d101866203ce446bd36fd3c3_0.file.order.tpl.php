<?php
/* Smarty version 3.1.34-dev-7, created on 2020-01-25 07:12:07
  from 'Z:\home\myshop.local\views\default\order.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e2bea47428be9_31884390',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '22ff54aa3ef53e03d101866203ce446bd36fd3c3' => 
    array (
      0 => 'Z:\\home\\myshop.local\\views\\default\\order.tpl',
      1 => 1579936320,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e2bea47428be9_31884390 (Smarty_Internal_Template $_smarty_tpl) {
?><h1>Данные заказа: </h1>
<form action="/cart/saveorder" id="frmOrder" method = 'POST'>
	<table>
		<tr>
			<td>№</td>
			<td>Наименование</td>
			<td>Количество</td>
			<td>Цена за единицу</td>
			<td>Стоимость</td>
		</tr>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
			<tr>
				<td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
				<td><a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></td>
				<td>
					<span id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
						<input type="hidden" name ="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value = "<?php echo $_smarty_tpl->tpl_vars['item']->value['cnt'];?>
">
						<?php echo $_smarty_tpl->tpl_vars['item']->value['cnt'];?>

					</span>
				</td>
				<td>
					<span id="itemPrice_<?php ob_start();
echo $_smarty_tpl->tpl_vars['item']->value['id'];
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
">
						<input type="hidden" name ="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value = "<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
">
						<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

					</span>
				</td>
				<td>
					<span id="itemRealPrice_<?php ob_start();
echo $_smarty_tpl->tpl_vars['item']->value['id'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
">
						<input type="hidden" name ="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value = "<?php echo $_smarty_tpl->tpl_vars['item']->value['realPrice'];?>
">
						<?php echo $_smarty_tpl->tpl_vars['item']->value['realPrice'];?>

					</span>
				</td>
			</tr>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</table>

<?php if (isset($_smarty_tpl->tpl_vars['anUser']->value)) {?>
	<?php $_smarty_tpl->_assignInScope('buttonClass', '');?>
	<h2>Данные заказчика: </h2>
	<div id="orderUserInfoBox">
		<?php $_smarty_tpl->_assignInScope('name', $_smarty_tpl->tpl_vars['anUser']->value['name']);?>
		<?php $_smarty_tpl->_assignInScope('phone', $_smarty_tpl->tpl_vars['anUser']->value['phone']);?>
		<?php $_smarty_tpl->_assignInScope('adress', $_smarty_tpl->tpl_vars['anUser']->value['adress']);?>
		<table>
			<tr>
				<td>Имя*</td>
				<td><input type="text" id='name' name='name' value = '<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
'></td>
			</tr>
			<tr>
				<td>Телефон*</td>
				<td><input type="text" id='phone' name='phone' value = '<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
'></td>
			</tr>
			<tr>
				<td>Адрес</td>
				<td><textarea name="adress" form='frmOrder' id="adress"><?php echo $_smarty_tpl->tpl_vars['adress']->value;?>
</textarea></td>
			</tr>
		</table>
	</div>
<?php } else { ?>
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

		Имя* : <input type="text" id='name' name='name' value = '<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
'> <br>
		Телефон* : <input type="text" id='phone' name='phone' value = '<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
'> <br>
		Адрес* : <textarea name="adress" id="adress" form='frmOrder'><?php echo $_smarty_tpl->tpl_vars['adress']->value;?>
</textarea> <br>

		<input type="button" onclick='registerNewUser();' value="Зарегистрироваться">
	</div>
	<?php $_smarty_tpl->_assignInScope('buttonClass', "class='hideme'");?>


<?php }?>

<input <?php echo $_smarty_tpl->tpl_vars['buttonClass']->value;?>
 type="button" id ='btnSaveOrder' value='Оформить заказ' onclick='saveOrder();'>
</form><?php }
}
