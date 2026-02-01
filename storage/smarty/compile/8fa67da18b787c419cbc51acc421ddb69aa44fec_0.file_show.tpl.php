<?php
/* Smarty version 5.7.0, created on 2026-01-31 21:42:41
  from 'file:posts/show.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_697e775122b4e2_71452190',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8fa67da18b787c419cbc51acc421ddb69aa44fec' => 
    array (
      0 => 'posts/show.tpl',
      1 => 1769893474,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697e775122b4e2_71452190 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/app/Views/posts';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_602026008697e7751221c29_50622444', 'body_class');
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1685330981697e7751222eb3_32353008', 'title');
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1551293576697e7751224695_71983363', 'body');
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'base.tpl', $_smarty_current_dir);
}
/* {block 'body_class'} */
class Block_602026008697e7751221c29_50622444 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/app/Views/posts';
?>
page-post-show<?php
}
}
/* {/block 'body_class'} */
/* {block 'title'} */
class Block_1685330981697e7751222eb3_32353008 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/app/Views/posts';
echo htmlspecialchars((string)$_smarty_tpl->getValue('post')['name'], ENT_QUOTES, 'UTF-8', true);
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_1551293576697e7751224695_71983363 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/app/Views/posts';
?>

    <div class="container">
        <p class="back"><a href="/">← Back to home</a></p>
        <p class="meta">
            <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_long')($_smarty_tpl->getValue('post')['publication_date']);?>

            <?php if ($_smarty_tpl->getValue('post')['count_views']) {?>&nbsp;·&nbsp;<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_fmt')($_smarty_tpl->getValue('post')['count_views']);?>
 views<?php }?>
        </p>
        <h1><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')['name'], ENT_QUOTES, 'UTF-8', true);?>
</h1>
        <?php if ($_smarty_tpl->getValue('post')['img_path']) {?>
            <img class="post-img" src="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')['img_path'], ENT_QUOTES, 'UTF-8', true);?>
" alt="">
        <?php }?>
        <?php if ($_smarty_tpl->getValue('post')['description']) {?>
            <p class="post-description"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')['description'], ENT_QUOTES, 'UTF-8', true);?>
</p>
        <?php }?>
        <div class="post-text"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('nl2br_esc')($_smarty_tpl->getValue('post')['text']);?>
</div>

        <?php if ($_smarty_tpl->getValue('recommendedPosts')) {?>
            <section class="recommended">
                <h2>Recommended Posts</h2>
                <div class="recommended-grid">
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('recommendedPosts'), 'rec');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('rec')->value) {
$foreach0DoElse = false;
?>
                        <article class="rec-card">
                            <?php if ($_smarty_tpl->getValue('rec')['img_path']) {?>
                                <a href="/post/<?php echo $_smarty_tpl->getValue('rec')['id'];?>
"><img class="rec-card__img" src="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('rec')['img_path'], ENT_QUOTES, 'UTF-8', true);?>
" alt="" loading="lazy"></a>
                            <?php } else { ?>
                                <a href="/post/<?php echo $_smarty_tpl->getValue('rec')['id'];?>
"><div class="rec-card__img rec-card__img-placeholder">No image</div></a>
                            <?php }?>
                            <div class="rec-card__body">
                                <h3 class="rec-card__title"><a href="/post/<?php echo $_smarty_tpl->getValue('rec')['id'];?>
"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('rec')['name'], ENT_QUOTES, 'UTF-8', true);?>
</a></h3>
                            </div>
                        </article>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </div>
            </section>
        <?php }?>
    </div>
<?php
}
}
/* {/block 'body'} */
}
