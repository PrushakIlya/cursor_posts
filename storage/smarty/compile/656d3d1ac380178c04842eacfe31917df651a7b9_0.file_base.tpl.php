<?php
/* Smarty version 5.7.0, created on 2026-01-31 19:56:33
  from 'file:base.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_697e5e71e622c4_17099742',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '656d3d1ac380178c04842eacfe31917df651a7b9' => 
    array (
      0 => 'base.tpl',
      1 => 1769889296,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697e5e71e622c4_17099742 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/app/Views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_648379585697e5e71e61490_90147237', 'title');
?>
</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,600;0,9..40,700;1,9..40,400&display=swap" rel="stylesheet">
    <link href="/build/app.css" rel="stylesheet">
    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_517470683697e5e71e61999_63123746', 'head');
?>

</head>
<body class="<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1773797843697e5e71e61d10_69241607', 'body_class');
?>
">
<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_770357904697e5e71e62044_61862407', 'body');
?>

</body>
</html>
<?php }
/* {block 'title'} */
class Block_648379585697e5e71e61490_90147237 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/app/Views';
?>
Web Site<?php
}
}
/* {/block 'title'} */
/* {block 'head'} */
class Block_517470683697e5e71e61999_63123746 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/app/Views';
}
}
/* {/block 'head'} */
/* {block 'body_class'} */
class Block_1773797843697e5e71e61d10_69241607 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/app/Views';
?>
page-base<?php
}
}
/* {/block 'body_class'} */
/* {block 'body'} */
class Block_770357904697e5e71e62044_61862407 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/app/Views';
}
}
/* {/block 'body'} */
}
