{extends file='base.tpl'}

{block name=body_class}page-post-show{/block}
{block name=title}{$post.name|escape}{/block}
{block name=body}
    <div class="container">
        <p class="back"><a href="/">← Back to home</a></p>
        <p class="meta">
            {$post.publication_date|date_long}
            {if $post.count_views}&nbsp;·&nbsp;{$post.count_views|number_fmt} views{/if}
        </p>
        <h1>{$post.name|escape}</h1>
        {if $post.img_path}
            <img class="post-img" src="{$post.img_path|escape}" alt="">
        {/if}
        {if $post.description}
            <p class="post-description">{$post.description|escape}</p>
        {/if}
        <div class="post-text">{$post.text|nl2br_esc}</div>

        {if $recommendedPosts}
            <section class="recommended">
                <h2>Recommended Posts</h2>
                <div class="recommended-grid">
                    {foreach $recommendedPosts as $rec}
                        <article class="rec-card">
                            {if $rec.img_path}
                                <a href="/post/{$rec.id}"><img class="rec-card__img" src="{$rec.img_path|escape}" alt="" loading="lazy"></a>
                            {else}
                                <a href="/post/{$rec.id}"><div class="rec-card__img rec-card__img-placeholder">No image</div></a>
                            {/if}
                            <div class="rec-card__body">
                                <h3 class="rec-card__title"><a href="/post/{$rec.id}">{$rec.name|escape}</a></h3>
                            </div>
                        </article>
                    {/foreach}
                </div>
            </section>
        {/if}
    </div>
{/block}
