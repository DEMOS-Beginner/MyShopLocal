<?php
/* Smarty version 3.1.34-dev-7, created on 2020-01-11 06:00:26
  from 'Z:\home\myshop.local\views\default\category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e19647a988494_73795631',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ce4040d51546b18831be0e8770904f6bb618a5b0' => 
    array (
      0 => 'Z:\\home\\myshop.local\\views\\default\\category.tpl',
      1 => 1578722423,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e19647a988494_73795631 (Smarty_Internal_Template $_smarty_tpl) {
?><h1> Товары категории <?php echo $_smarty_tpl->tpl_vars['rsCategory']->value['name'];?>
 </h1>

<?php if (count($_smarty_tpl->tpl_vars['rsProducts']->value) > 0) {?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item');
$_smarty_tpl->tpl_vars['item']->iteration = 0;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->iteration++;
$__foreach_item_0_saved = $_smarty_tpl->tpl_vars['item'];
?>

		<div style='float: left; padding: 0 30px 40px 0'>
			<a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
				<img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" alt="" width = 100>
			</a><br>
			<a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
		</div>
		<?php if ($_smarty_tpl->tpl_vars['item']->iteration % 3 == 0) {?>
			<div style="clear: both;"></div>
		<?php }?>

	<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} elseif ($_smarty_tpl->tpl_vars['rsCategory']->value['parent_id'] != 0) {?>
	<h2> Товаров данной категории не найдено! </h2>
<?php }
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsChildCats']->value, 'item');
$_smarty_tpl->tpl_vars['item']->iteration = 0;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->iteration++;
$__foreach_item_1_saved = $_smarty_tpl->tpl_vars['item'];
?>
	<h2> <a href="/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a> </h2>
<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_1_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
