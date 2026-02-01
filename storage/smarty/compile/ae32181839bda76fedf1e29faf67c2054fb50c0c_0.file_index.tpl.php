<?php
/* Smarty version 5.7.0, created on 2026-01-30 21:39:09
  from 'file:categories/index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_697d24fd39baf0_84399924',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ae32181839bda76fedf1e29faf67c2054fb50c0c' => 
    array (
      0 => 'categories/index.tpl',
      1 => 1769808653,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697d24fd39baf0_84399924 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/app/Views/categories';
?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Categories</title>
</head>
<body>
    <h1>Categories</h1>
    <p><a href="/">Home</a></p>
    <ul>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'cat');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('cat')->value) {
$foreach0DoElse = false;
?>
        <li>
            <strong><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('cat')['name'], ENT_QUOTES, 'UTF-8', true);?>
</strong>
            <?php if ($_smarty_tpl->getValue('cat')['description']) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('cat')['description'], ENT_QUOTES, 'UTF-8', true);
}?>
        </li>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </ul>
</body>
</html>
<?php }
}
