<?php
/* Smarty version 3.1.34-dev-7, created on 2020-01-13 10:18:42
  from 'Z:\home\myshop.local\views\default\product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e1c44025de5e5_43354631',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '146365efc8d55044c45bf78ac75d34d75e699bd6' => 
    array (
      0 => 'Z:\\home\\myshop.local\\views\\default\\product.tpl',
      1 => 1578910704,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e1c44025de5e5_43354631 (Smarty_Internal_Template $_smarty_tpl) {
?><h3> <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
 </h3>

<img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['image'];?>
" alt="" width='575'>
Стоимость: <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['price'];?>


<a id = 'removeCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value["id"];?>
' href="#" alt = 'Добавить в корзину' onClick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;" <?php if (!$_smarty_tpl->tpl_vars['itemInCart']->value) {?> class = 'hideme' <?php }?>> Удалить из корзины </a>
<a id = 'addCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value["id"];?>
' href="#" <?php if ($_smarty_tpl->tpl_vars['itemInCart']->value) {?> class = 'hideme' <?php }?> onClick="addToCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;" alt = 'Добавить в корзину'> Добавить в корзину </a>
<p> Описание: <br/> <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['description'];?>
 </p>

<?php }
}
