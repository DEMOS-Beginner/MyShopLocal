<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-08 08:34:36
  from 'Z:\home\myshop.local\views\admin\adminProducts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e3e729c0b66d5_57801690',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '31c30085c69944a68d5e5e79e734de07a3f6a02e' => 
    array (
      0 => 'Z:\\home\\myshop.local\\views\\admin\\adminProducts.tpl',
      1 => 1581148455,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e3e729c0b66d5_57801690 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>Товар</h2>
<input type="button" onclick='createXML();' value='Сохранить в XML'>
<div id="xml-place"></div>
<table border='1' cellpadding='1' cellspacing='1'>
	<caption>Добавить продукт</caption>
	<tr>
		<th>Название</th>
		<th>Цена</th>
		<th>Категория</th>
		<th>Описание</th>
		<th>Сохранить</th>
	</tr>

	<tr>
		<td> <input type='edit' id='newItemName'> </td>
		<td> <input type='edit' id='newItemPrice'> </td>
		<td>
			<select name="" id="newCatId">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'itemCat');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itemCat']->value) {
?>
					<?php if ($_smarty_tpl->tpl_vars['itemCat']->value['id'] > 1) {?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['itemCat']->value['id'];?>
">
							<?php echo $_smarty_tpl->tpl_vars['itemCat']->value['name'];?>

						</option>
					<?php }?>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</select>
		</td>
		<td>
			<textarea name="" id="newItemDesc" cols="30 " rows="2"></textarea>
		</td>
		<td>
			<input type="button" value='Сохранить' onclick='addProduct();'>
		</td>
	</tr>
</table>

<table border='1' cellpadding='1' cellspacing='1'>
	<caption>Редактировать</caption>
	<tr>
		<th>№</th>
		<th>ID</th>
		<th>Наименование</th>
		<th>Цена</th>
		<th>Категория</th>
		<th>Описание</th>
		<th>Удалить</th>
		<th>Изображение</th>
		<th>Сохранить</th>
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
		<td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
		<td>
			<input type="text" id='itemName_<?php echo $_smarty_tpl->tpl_vars['item']->value["id"];?>
' value='<?php echo $_smarty_tpl->tpl_vars['item']->value["name"];?>
'>
		</td>
		<td>
			<input type="text" id='itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value["id"];?>
' value='<?php echo $_smarty_tpl->tpl_vars['item']->value["price"];?>
'>
		</td>
		<td>
			<select id="itemCatId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
				<option value="0">Главная категория</option>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'itemCat');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itemCat']->value) {
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['itemCat']->value['id'];?>
"
					<?php if ($_smarty_tpl->tpl_vars['item']->value['category_id'] == $_smarty_tpl->tpl_vars['itemCat']->value['id']) {?> selected <?php }?>>
					<?php echo $_smarty_tpl->tpl_vars['itemCat']->value['name'];?>

				</option>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</select>
		</td>
		<td>
			<textarea id="itemDesc_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
				<?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>

			</textarea>
		</td>
		<td>
			<input type="checkbox" id='itemStatus_<?php echo $_smarty_tpl->tpl_vars['item']->value["id"];?>
'
			<?php if ($_smarty_tpl->tpl_vars['item']->value["status"] == 0) {?> checked='checked'<?php }?>>
		</td>
		<td>
			<?php if ($_smarty_tpl->tpl_vars['item']->value['image']) {?>
				<img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" width='100'>
			<?php }?>
			<form action="/admin/upload" method='post' enctype="multipart/form-data">
				<input type="file" name='filename'>
				<input type="hidden" name='itemId' value='<?php echo $_smarty_tpl->tpl_vars['item']->value["id"];?>
'>
				<input type="submit" value='Загрузить'>
			</form>
		</td>
		<td>
			<input type="button" value='Сохранить' onclick='uploadProduct(<?php echo $_smarty_tpl->tpl_vars['item']->value["id"];?>
);'>
		</td>
	</tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table><?php }
}
