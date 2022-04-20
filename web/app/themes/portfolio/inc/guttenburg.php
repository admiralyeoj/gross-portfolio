<?php

function custom_allowed_block_types($original_blocks)
{
// Alter the allowed block types:
	return [
		'core/block',
		// Text
		'core/heading',
		'core/paragraph',
		'core/list',
    'core/code',
		'core/quote',
    'code/table',
    
    // Media
    'core/image',
    'core/gallery',
    'core/cover',

    // Design
    'core/group',
    'core/columns',
    'core/buttons',
    'core/seperator',
    'core/spacer',

    // Widgets
    'core/shortcode',

    // Embed
    'core/embed',
	];
}
add_filter('allowed_block_types', 'custom_allowed_block_types');

?>