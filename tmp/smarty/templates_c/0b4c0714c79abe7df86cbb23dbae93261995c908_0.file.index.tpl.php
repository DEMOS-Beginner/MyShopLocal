<?php
/* Smarty version 3.1.34-dev-7, created on 2020-01-18 04:26:19
  from 'Z:\home\myshop.local\views\default\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e2288eb33f208_57394341',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b4c0714c79abe7df86cbb23dbae93261995c908' => 
    array (
      0 => 'Z:\\home\\myshop.local\\views\\default\\index.tpl',
      1 => 1579321575,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e2288eb33f208_57394341 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Шаблон главной страницы -->

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
));
$_smarty_tpl->tpl_vars['item']->iteration = 0;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->iteration++;
$__foreach_item_0_saved = $_smarty_tpl->tpl_vars['item'];
?>

	<div style='float: left; padding: 0 30px 40px 0; overflow: hidden; width: 100px; margin: 20px'>
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
}
}
