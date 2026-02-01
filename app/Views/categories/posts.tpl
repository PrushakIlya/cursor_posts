{extends file='base.tpl'}

{block name=body_class}page-categories-posts{/block}
{block name=title}{$category.name|escape} — Web Site{/block}
{block name=body}
    <div class="container">
        <p class="back"><a href="/">← Back to home</a></p>
        <h1>{$category.name|escape}</h1>

        <div class="toolbar">
            <span class="toolbar-label">Order by:</span>

            <a href="/category/{$categoryId}/posts?order=publication_date&dir=desc&page=1" class="{if $activeLink === 'active_publication_desc'}active{/if}">Date ↑</a>
            <a href="/category/{$categoryId}/posts?order=publication_date&dir=asc&page=1" class="{if $activeLink === 'active_publication_asc'}active{/if}">Date ↓</a>
            <a href="/category/{$categoryId}/posts?order=count_views&dir=desc&page=1" class="{if $activeLink === 'active_views_desc'}active{/if}">Views ↑</a>
            <a href="/category/{$categoryId}/posts?order=count_views&dir=asc&page=1" class="{if $activeLink === 'active_views_asc'}active{/if}">Views ↓</a>

            <a href="/category/{$category.id}/posts" class="toolbar__reset">Reset</a>
        </div>

        <p class="posts-count">{$total} post{if $total != 1}s{/if}</p>

        <div class="posts-grid">
            {foreach $posts as $post}
                <article class="post-block">
                    {if $post.img_path}
                        <img class="post-block__img" src="{$post.img_path|escape}" alt="" loading="lazy">
                    {else}
                        <div class="post-block__img post-block__img-placeholder">No image</div>
                    {/if}
                    <div class="post-block__body">
                        <h3 class="post-block__title">
                            <a href="/post/{$post.id}">{$post.name|escape}</a>
                        </h3>
                        {if $post.description}
                            <p class="post-block__description">{$post.description|escape}</p>
                        {/if}
                        <div class="post-block__meta">
                            <span>{$post.count_views|number_fmt} views</span>
                            <span>{$post.publication_date|date_fmt}</span>
                        </div>
                        <a href="/post/{$post.id}" class="read-all-link">Read all</a>
                    </div>
                </article>
            {/foreach}
        </div>

        {if $totalPages > 1}
            <nav class="pagination" aria-label="Pagination">
                <a href="/category/{$categoryId}/posts?order={$orderBy}&dir={$dir}&page={$page - 1}" class="{if $page !== 1}current{else}disabled{/if}">← Prev</a>

                {for $numberPage=1 to $totalPages }
                    <a href="/category/{$categoryId}/posts?order={$orderBy}&dir={$dir}&page={$numberPage}" class="{if $numberPage === $page}current{/if}">{$numberPage}</a>
                {/for}

                <a href="/category/{$categoryId}/posts?order={$orderBy}&dir={$dir}&page={$page + 1}" class="{if $page === $totalPages}disabled{else}current{/if}">Next →</a>
            </nav>
        {/if}
    </div>
{/block}
