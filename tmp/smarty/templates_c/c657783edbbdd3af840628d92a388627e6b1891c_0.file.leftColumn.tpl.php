<?php
/* Smarty version 3.1.34-dev-7, created on 2020-01-23 07:20:53
  from 'Z:\home\myshop.local\views\default\leftColumn.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e294955094352_51183474',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c657783edbbdd3af840628d92a388627e6b1891c' => 
    array (
      0 => 'Z:\\home\\myshop.local\\views\\default\\leftColumn.tpl',
      1 => 1579764001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e294955094352_51183474 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="leftColumn">
	<div id="leftmenu">
		<div class="menuCaption"> Меню: </div>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
			<a href="/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a> <br>
			<?php if (isset($_smarty_tpl->tpl_vars['item']->value['children'])) {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'child');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
?>
					--<a href="/category/<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['child']->value['name'];?>
</a> <br>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			<?php }?>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</div>
	<a href="/cart" title = 'Перейти в корзину'>В корзине</a>
	<span id ='cartCntItems'>
		<?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value > 0) {?>
			<?php echo $_smarty_tpl->tpl_vars['cartCntItems']->value;?>

		<?php } else { ?>
			пусто
		<?php }?>
	</span>

	<?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)) {?>
		<div id="userBox">
			<a href="/user" id='userLink'><?php echo $_smarty_tpl->tpl_vars['arUser']->value['displayName'];?>
</a> <br>
			<a href="/user/logout"> Выход </a>
		</div>
	<?php } else { ?>
		<div id="userBox" class = 'hideme'>
			<a href="/user" id='userLink'></a> <br>
			<a href="/user/logout"> Выход </a>
		</div>
		<?php if (!isset($_smarty_tpl->tpl_vars['hideLoginBox']->value)) {?>
			<div id="loginBox">
				<div class="menuCaption">Авторизация</div>
				Email: <br>
				<input type="text" id="loginEmail" name="loginEmail" value=""> <br>
				Пароль:
				<input type="password" id="loginPwd" name="loginPwd" value=""> <br> 
				<input type="button" onclick='login();' value="Войти"> <br>
			</div>

			<div id="registerBox">
				<div class="menuCaption showHidden" onclick='showRegisterBox();'>Регистрация</div>
				<div id="registerBoxHidden" class ='hideme'>
					Email: <br>
					<input type="text" id='email' name='email' value="" class='regInput'> <br>
					Пароль: <br>
					<input type="password" id='pwd1' name='pwd1' value="" class='regInput'> <br>
					Подтвердите пароль: <br>
					<input type="password" id='pwd2' name='pwd2' value="" class='regInput'> <br>
					<input type="button" onclick='registerNewUser();' value="Зарегистрироваться">
				</div>
			</div>
		<?php }?>
	<?php }?>
</div>



<?php }
}
