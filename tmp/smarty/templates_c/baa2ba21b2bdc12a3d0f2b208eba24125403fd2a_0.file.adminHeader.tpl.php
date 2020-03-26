<?php
/* Smarty version 3.1.34-dev-7, created on 2020-01-29 07:27:51
  from 'Z:\home\myshop.local\views\admin\adminHeader.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e3133f71e26c0_95724493',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'baa2ba21b2bdc12a3d0f2b208eba24125403fd2a' => 
    array (
      0 => 'Z:\\home\\myshop.local\\views\\admin\\adminHeader.tpl',
      1 => 1580282869,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:adminLeftColumn.tpl' => 1,
  ),
),false)) {
function content_5e3133f71e26c0_95724493 (Smarty_Internal_Template $_smarty_tpl) {
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
 type = 'text/javascript' src='<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
js/admin.js'><?php echo '</script'; ?>
>
</head>
<body>
	<header id="header">
		<h1> Управление сайтом </h1>
	</header>
	
	<?php $_smarty_tpl->_subTemplateRender('file:adminLeftColumn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	<div id="centerColumn"><?php }
}
