{extends file='base.tpl'}

{block name=body_class}page-home{/block}
{block name=title}{$title|default:'Home'|escape}{/block}
{block name=body}
    <div class="container">
        <header>
            <h1><a href="/">Web Site</a></h1>
        </header>

        {foreach $sections as $section}
                <section class="section">
                    <div class="section-header">
                        <h2 class="section-title">{$section.category.name|escape}</h2>
                        <a href="/category/{$section.category.id}/posts" class="see-all">See all</a>
                    </div>
                    <div class="posts-grid">
                        {foreach $section.posts as $post}
                            <article class="post-card">
                                {if $post.img_path}
                                    <img class="post-card__img" src="{$post.img_path|escape}" alt="" loading="lazy">
                                {else}
                                    <div class="post-card__img post-block__img-placeholder">No image</div>
                                {/if}
                                <div class="post-card__body">
                                    <h3 class="post-card__title">
                                        <a href="/post/{$post.id}">{$post.name|escape}</a>
                                    </h3>
                                    {if $post.description}
                                        <p class="post-card__description">{$post.description|escape}</p>
                                    {/if}
                                    <p class="post-card__meta">
                                        {$post.publication_date|date_fmt}
                                    </p>
                                    <a href="/post/{$post.id}" class="btn">Read all</a>
                                </div>
                            </article>
                        {/foreach}
                    </div>
                </section>
        {/foreach}
    </div>
{/block}
