{extends file="parent:frontend/index/header.tpl"}

{block name='frontend_index_header_meta_tags'}
    {if !empty($onionLocation)}
        <meta http-equiv="onion-location" content="{$onionLocation}">
    {/if}

    {$smarty.block.parent}
{/block}
