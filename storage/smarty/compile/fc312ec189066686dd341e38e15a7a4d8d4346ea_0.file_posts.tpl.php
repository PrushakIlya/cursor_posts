<?php
/* Smarty version 5.7.0, created on 2026-02-01 10:35:09
  from 'file:categories/posts.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_697f2c5d016327_51489297',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc312ec189066686dd341e38e15a7a4d8d4346ea' => 
    array (
      0 => 'categories/posts.tpl',
      1 => 1769942106,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697f2c5d016327_51489297 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/app/Views/categories';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1824767648697f2c5cf355e4_90673924', 'body_class');
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1660735410697f2c5cf3a311_55691451', 'title');
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_561627221697f2c5cf409d6_67281454', 'body');
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, 'base.tpl', $_smarty_current_dir);
}
/* {block 'body_class'} */
class Block_1824767648697f2c5cf355e4_90673924 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/app/Views/categories';
?>
page-categories-posts<?php
}
}
/* {/block 'body_class'} */
/* {block 'title'} */
class Block_1660735410697f2c5cf3a311_55691451 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/app/Views/categories';
echo htmlspecialchars((string)$_smarty_tpl->getValue('category')['name'], ENT_QUOTES, 'UTF-8', true);?>
 — Web Site<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_561627221697f2c5cf409d6_67281454 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/app/Views/categories';
?>

    <div class="container">
        <p class="back"><a href="/">← Back to home</a></p>
        <h1><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('category')['name'], ENT_QUOTES, 'UTF-8', true);?>
</h1>

        <div class="toolbar">
            <span class="toolbar-label">Order by:</span>

            <a href="/category/<?php echo $_smarty_tpl->getValue('categoryId');?>
/posts?order=publication_date&dir=desc&page=1" class="<?php if ($_smarty_tpl->getValue('activeLink') === 'active_publication_desc') {?>active<?php }?>">Date ↑</a>
            <a href="/category/<?php echo $_smarty_tpl->getValue('categoryId');?>
/posts?order=publication_date&dir=asc&page=1" class="<?php if ($_smarty_tpl->getValue('activeLink') === 'active_publication_asc') {?>active<?php }?>">Date ↓</a>
            <a href="/category/<?php echo $_smarty_tpl->getValue('categoryId');?>
/posts?order=count_views&dir=desc&page=1" class="<?php if ($_smarty_tpl->getValue('activeLink') === 'active_views_desc') {?>active<?php }?>">Views ↑</a>
            <a href="/category/<?php echo $_smarty_tpl->getValue('categoryId');?>
/posts?order=count_views&dir=asc&page=1" class="<?php if ($_smarty_tpl->getValue('activeLink') === 'active_views_asc') {?>active<?php }?>">Views ↓</a>

            <a href="/category/<?php echo $_smarty_tpl->getValue('category')['id'];?>
/posts" class="toolbar__reset">Reset</a>
        </div>

        <p class="posts-count"><?php echo $_smarty_tpl->getValue('total');?>
 post<?php if ($_smarty_tpl->getValue('total') != 1) {?>s<?php }?></p>

        <div class="posts-grid">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('posts'), 'post');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('post')->value) {
$foreach0DoElse = false;
?>
                <article class="post-block">
                    <?php if ($_smarty_tpl->getValue('post')['img_path']) {?>
                        <img class="post-block__img" src="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')['img_path'], ENT_QUOTES, 'UTF-8', true);?>
" alt="" loading="lazy">
                    <?php } else { ?>
                        <div class="post-block__img post-block__img-placeholder">No image</div>
                    <?php }?>
                    <div class="post-block__body">
                        <h3 class="post-block__title">
                            <a href="/post/<?php echo $_smarty_tpl->getValue('post')['id'];?>
"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')['name'], ENT_QUOTES, 'UTF-8', true);?>
</a>
                        </h3>
                        <?php if ($_smarty_tpl->getValue('post')['description']) {?>
                            <p class="post-block__description"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('post')['description'], ENT_QUOTES, 'UTF-8', true);?>
</p>
                        <?php }?>
                        <div class="post-block__meta">
                            <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_fmt')($_smarty_tpl->getValue('post')['count_views']);?>
 views</span>
                            <span><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_fmt')($_smarty_tpl->getValue('post')['publication_date']);?>
</span>
                        </div>
                        <a href="/post/<?php echo $_smarty_tpl->getValue('post')['id'];?>
" class="read-all-link">Read all</a>
                    </div>
                </article>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </div>

        <?php if ($_smarty_tpl->getValue('totalPages') > 1) {?>
            <nav class="pagination" aria-label="Pagination">
                <a href="/category/<?php echo $_smarty_tpl->getValue('categoryId');?>
/posts?order=<?php echo $_smarty_tpl->getValue('orderBy');?>
&dir=<?php echo $_smarty_tpl->getValue('dir');?>
&page=<?php echo $_smarty_tpl->getValue('page')-1;?>
" class="<?php if ($_smarty_tpl->getValue('page') !== 1) {?>current<?php } else { ?>disabled<?php }?>">← Prev</a>

                <?php
$_smarty_tpl->assign('numberPage', null);$_smarty_tpl->tpl_vars['numberPage']->step = 1;$_smarty_tpl->tpl_vars['numberPage']->total = (int) ceil(($_smarty_tpl->tpl_vars['numberPage']->step > 0 ? $_smarty_tpl->getValue('totalPages')+1 - (1) : 1-($_smarty_tpl->getValue('totalPages'))+1)/abs($_smarty_tpl->tpl_vars['numberPage']->step));
if ($_smarty_tpl->tpl_vars['numberPage']->total > 0) {
for ($_smarty_tpl->tpl_vars['numberPage']->value = 1, $_smarty_tpl->tpl_vars['numberPage']->iteration = 1;$_smarty_tpl->tpl_vars['numberPage']->iteration <= $_smarty_tpl->tpl_vars['numberPage']->total;$_smarty_tpl->tpl_vars['numberPage']->value += $_smarty_tpl->tpl_vars['numberPage']->step, $_smarty_tpl->tpl_vars['numberPage']->iteration++) {
$_smarty_tpl->tpl_vars['numberPage']->first = $_smarty_tpl->tpl_vars['numberPage']->iteration === 1;$_smarty_tpl->tpl_vars['numberPage']->last = $_smarty_tpl->tpl_vars['numberPage']->iteration === $_smarty_tpl->tpl_vars['numberPage']->total;?>
                    <a href="/category/<?php echo $_smarty_tpl->getValue('categoryId');?>
/posts?order=<?php echo $_smarty_tpl->getValue('orderBy');?>
&dir=<?php echo $_smarty_tpl->getValue('dir');?>
&page=<?php echo $_smarty_tpl->getValue('numberPage');?>
" class="<?php if ($_smarty_tpl->getValue('numberPage') === $_smarty_tpl->getValue('page')) {?>current<?php }?>"><?php echo $_smarty_tpl->getValue('numberPage');?>
</a>
                <?php }
}
?>

                <a href="/category/<?php echo $_smarty_tpl->getValue('categoryId');?>
/posts?order=<?php echo $_smarty_tpl->getValue('orderBy');?>
&dir=<?php echo $_smarty_tpl->getValue('dir');?>
&page=<?php echo $_smarty_tpl->getValue('page')+1;?>
" class="<?php if ($_smarty_tpl->getValue('page') === $_smarty_tpl->getValue('totalPages')) {?>disabled<?php } else { ?>current<?php }?>">Next →</a>
            </nav>
        <?php }?>
    </div>
<?php
}
}
/* {/block 'body'} */
}
