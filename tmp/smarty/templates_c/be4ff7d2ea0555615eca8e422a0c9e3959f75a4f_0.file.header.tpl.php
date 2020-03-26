<?php
/* Smarty version 3.1.34-dev-7, created on 2020-01-23 07:18:20
  from 'Z:\home\myshop.local\views\default\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e2948bcd90129_69864661',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be4ff7d2ea0555615eca8e422a0c9e3959f75a4f' => 
    array (
      0 => 'Z:\\home\\myshop.local\\views\\default\\header.tpl',
      1 => 1579763868,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:leftColumn.tpl' => 1,
  ),
),false)) {
function content_5e2948bcd90129_69864661 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> <?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
 </title>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/main.css" type = 'text/css'>
	<?php echo '<script'; ?>
 type = 'text/javascript' src="/js/jquery.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type = 'text/javascript' src='/js/main.js'><?php echo '</script'; ?>
>
</head>
<body>
	<header id="header">
		<h1> MyShop - Интернет-магазин </h1>
	</header>
	
	<?php $_smarty_tpl->_subTemplateRender('file:leftColumn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	<div id="centerColumn"><?php }
}
