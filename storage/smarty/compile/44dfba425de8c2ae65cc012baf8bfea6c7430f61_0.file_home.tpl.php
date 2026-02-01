<?php
/* Smarty version 5.7.0, created on 2026-01-30 21:31:59
  from 'file:home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.7.0',
  'unifunc' => 'content_697d234f3b8640_59079916',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '44dfba425de8c2ae65cc012baf8bfea6c7430f61' => 
    array (
      0 => 'home.tpl',
      1 => 1769808712,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697d234f3b8640_59079916 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/prushak/Projects/ii/app/Views';
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->getValue('title') ?? null)===null||$tmp==='' ? 'Home' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,600;0,9..40,700;1,9..40,400&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #0f0f0f;
            --surface: #1a1a1a;
            --border: #2a2a2a;
            --text: #e5e5e5;
            --muted: #888;
            --accent: #3b82f6;
            --accent-hover: #2563eb;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'DM Sans', system-ui, sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.6;
            min-height: 100vh;
        }
        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
        }
        header {
            border-bottom: 1px solid var(--border);
            padding-bottom: 1.5rem;
            margin-bottom: 2.5rem;
        }
        header h1 {
            margin: 0;
            font-size: 1.75rem;
            font-weight: 700;
        }
        header a {
            color: var(--accent);
            text-decoration: none;
        }
        header a:hover { color: var(--accent-hover); }
        .section {
            margin-bottom: 3rem;
        }
        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 0.75rem;
            margin-bottom: 1.25rem;
        }
        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin: 0;
            padding-bottom: 0.5rem;
            color: var(--text);
            border-bottom: 2px solid var(--accent);
        }
        .section-header .see-all {
            color: var(--accent);
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 600;
        }
        .section-header .see-all:hover { color: var(--accent-hover); }
        .posts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }
        .post-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
            transition: border-color 0.2s, transform 0.2s;
        }
        .post-card:hover {
            border-color: var(--accent);
            transform: translateY(-2px);
        }
        .post-card__img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            background: var(--border);
        }
        .post-card__body {
            padding: 1.25rem;
        }
        .post-card__title {
            margin: 0 0 0.5rem 0;
            font-size: 1.1rem;
            font-weight: 600;
            line-height: 1.35;
        }
        .post-card__title a {
            color: var(--text);
            text-decoration: none;
        }
        .post-card__title a:hover { color: var(--accent); }
        .post-card__description {
            margin: 0 0 0.75rem 0;
            font-size: 0.9rem;
            color: var(--muted);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .post-card__meta {
            font-size: 0.8rem;
            color: var(--muted);
            margin-bottom: 1rem;
        }
        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: var(--accent);
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            transition: background 0.2s;
        }
        .btn:hover { background: var(--accent-hover); }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1><a href="/">Web Site</a></h1>
            <p style="margin: 0.5rem 0 0 0;"><a href="/categories">All categories</a></p>
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
                                    <div class="post-card__img" style="display:flex;align-items:center;justify-content:center;color:var(--muted);font-size:0.9rem;">No image</div>
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
</body>
</html>
<?php }
}
