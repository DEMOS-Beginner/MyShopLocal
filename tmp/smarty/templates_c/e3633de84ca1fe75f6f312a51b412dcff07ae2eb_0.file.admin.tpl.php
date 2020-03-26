<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-01 09:47:47
  from 'Z:\home\myshop.local\views\admin\admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e5b84c3c10cd0_18240917',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e3633de84ca1fe75f6f312a51b412dcff07ae2eb' => 
    array (
      0 => 'Z:\\home\\myshop.local\\views\\admin\\admin.tpl',
      1 => 1583056059,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e5b84c3c10cd0_18240917 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="blockNewCategory">
	Новая категория:
		<input type="text" id="newCategoryName" name='newCategoryName' value = ''>
		<br>
	Является подкатегорией для:
		<select name="generalCatId">
			<option value="0">Главная категория</option>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item', false, NULL, 'categories', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</select>
	<input type="button" onclick='newCategory();' value='Добавить категорию'>
</div><?php }
}
