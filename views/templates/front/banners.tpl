{extends file=$layout}
{block name='content'}

<dl>
    {foreach from=$banners item=banner}
        <dd><img src="{$banner.path}" height="{$superbanner_height}" width="{$superbanner_width}" /></dd>
    {/foreach}
</dl>
{/block}