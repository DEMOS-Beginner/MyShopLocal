<?php
/* Smarty version 3.1.34-dev-7, created on 2020-01-21 07:46:12
  from 'Z:\home\myshop.local\views\default\cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e26ac44d0fec6_55062237',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4048a94ea06482b6f3578fc351869964263bd578' => 
    array (
      0 => 'Z:\\home\\myshop.local\\views\\default\\cart.tpl',
      1 => 1579592671,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e26ac44d0fec6_55062237 (Smarty_Internal_Template $_smarty_tpl) {
?><h1> Корзина </h1>

<?php if (!$_smarty_tpl->tpl_vars['rsProducts']->value) {?>
	<p>В корзине пусто</p>
<?php } else { ?>
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
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'prod', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['prod']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
		<tr>
			<td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
			<td> <a href="/product/<?php echo $_smarty_tpl->tpl_vars['prod']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['prod']->value['name'];?>
</a> </td>
			<td>
				<input name='itemCnt_<?php echo $_smarty_tpl->tpl_vars['prod']->value["id"];?>
' id = 'itemCnt_<?php echo $_smarty_tpl->tpl_vars['prod']->value["id"];?>
' type="text" value='1' onchange='conversionPrice(<?php echo $_smarty_tpl->tpl_vars['prod']->value["id"];?>
)'>
			</td>
			<td>
				<span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['prod']->value['id'];?>
" value='<?php echo $_smarty_tpl->tpl_vars['prod']->value["price"];?>
'>
					<?php echo $_smarty_tpl->tpl_vars['prod']->value['price'];?>

				</span>
			</td>
			<td>
				<span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['prod']->value['id'];?>
" value='<?php echo $_smarty_tpl->tpl_vars['prod']->value["price"];?>
'>
					<?php echo $_smarty_tpl->tpl_vars['prod']->value['price'];?>

				</span>
			</td>
			<td>
				<a id = 'removeCart_<?php echo $_smarty_tpl->tpl_vars['prod']->value["id"];?>
' href="#" title = 'Удалить из корзины' onClick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['prod']->value['id'];?>
); return false;"> Удалить </a>
				<a id = 'addCart_<?php echo $_smarty_tpl->tpl_vars['prod']->value["id"];?>
' href="#" class = 'hideme' onClick="addToCart(<?php echo $_smarty_tpl->tpl_vars['prod']->value['id'];?>
); return false;" title = 'Восстановить в корзину'> Восстановить </a>
			</td>
		</tr>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</table>

	<input type="submit" value = 'Оформить заказ'>
</form>

<?php }
}
}
