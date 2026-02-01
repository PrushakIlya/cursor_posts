<?php
/* Smarty version 5.7.0, created on 2026-01-31 21:07:51
  from 'file:home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_697e6f27add1a9_01493005',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a0baea4cb5795e7fb704be71de6fe6bfafdc665d' => 
    array (
      0 => 'home.tpl',
      1 => 1769893473,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697e6f27add1a9_01493005 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/app/Views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1167448214697e6f27ad4d75_89692957', 'body_class');
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_447476907697e6f27ad5ff7_48156267', 'title');
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1755393275697e6f27ad7ff4_60505242', 'body');
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'base.tpl', $_smarty_current_dir);
}
/* {block 'body_class'} */
class Block_1167448214697e6f27ad4d75_89692957 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/app/Views';
?>
page-home<?php
}
}
/* {/block 'body_class'} */
/* {block 'title'} */
class Block_447476907697e6f27ad5ff7_48156267 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/app/Views';
echo htmlspecialchars((string)(($tmp = $_smarty_tpl->getValue('title') ?? null)===null||$tmp==='' ? 'Home' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_1755393275697e6f27ad7ff4_60505242 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/app/Views';
?>

    <div class="container">
        <header>
            <h1><a href="/">Web Site</a></h1>
        </header>

        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('sections'), 'section');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('section')->value) {
$foreach0DoElse = false;
?>
                <section class="section">
                    <div class="section-header">
                        <h2 class="section-title"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('section')['category']['name'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
                        <a href="/category/<?php echo $_smarty_tpl->getValue('section')['category']['id'];?>
/posts" class="see-all">See all</a>
                    </div>
                    <div class="posts-grid">
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('section')['posts'], 'post');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('post')->value) {
$foreach1DoElse = false;
?>
                            <article class="post-card">
                                <?php if ($_smarty_tpl->getValue('post')['img_path']) {?>
                                    <img class="post-card__img" src="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')['img_path'], ENT_QUOTES, 'UTF-8', true);?>
" alt="" loading="lazy">
                                <?php } else { ?>
                                    <div class="post-card__img post-block__img-placeholder">No image</div>
                                <?php }?>
                                <div class="post-card__body">
                                    <h3 class="post-card__title">
                                        <a href="/post/<?php echo $_smarty_tpl->getValue('post')['id'];?>
"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')['name'], ENT_QUOTES, 'UTF-8', true);?>
</a>
                                    </h3>
                                    <?php if ($_smarty_tpl->getValue('post')['description']) {?>
                                        <p class="post-card__description"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')['description'], ENT_QUOTES, 'UTF-8', true);?>
</p>
                                    <?php }?>
                                    <p class="post-card__meta">
                                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_fmt')($_smarty_tpl->getValue('post')['publication_date']);?>

                                    </p>
                                    <a href="/post/<?php echo $_smarty_tpl->getValue('post')['id'];?>
" class="btn">Read all</a>
                                </div>
                            </article>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </div>
                </section>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </div>
<?php
}
}
/* {/block 'body'} */
}
