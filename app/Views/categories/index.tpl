{extends file='base.tpl'}

{block name=body_class}page-categories-index{/block}
{block name=title}Categories{/block}
{block name=body}
    <div class="container">
        <h1>Categories</h1>
        <p class="back"><a href="/">← Home</a></p>
        <ul>
            {foreach $categories as $cat}
            <li>
                <strong>{$cat.name|escape}</strong>
                {if $cat.description} — {$cat.description|escape}{/if}
            </li>
            {/foreach}
        </ul>
    </div>
{/block}
