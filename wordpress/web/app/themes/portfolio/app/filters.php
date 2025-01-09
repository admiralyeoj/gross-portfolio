<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

add_filter( 'use_block_editor_for_post_type', '__return_false', 10 );


// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
    return $data;
    }

    $filetype = wp_check_filetype( $filename, $mimes );

    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];

}, 10, 4 );


add_filter( 'upload_mimes', function( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
} );


// WP Forms Hooks
add_action( 'wpforms_display_submit_before', function( $form_data ) {
    if(str_contains($form_data['settings']['form_class'], 'contact-form'))
        echo '<span class="btn-border">';
});

add_action( 'wpforms_display_submit_after', function( $form_data ) {
    if(str_contains($form_data['settings']['form_class'], 'contact-form'))
        echo '</span>';
});
