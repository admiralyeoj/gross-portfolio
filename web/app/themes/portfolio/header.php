<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="apple-touch-icon" sizes="180x180" href="<?= get_stylesheet_directory_uri(); ?>/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= get_stylesheet_directory_uri(); ?>/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= get_stylesheet_directory_uri(); ?>/favicon/favicon-16x16.png">
        <link rel="manifest" href="<?= get_stylesheet_directory_uri(); ?>/favicon/site.webmanifest">

        <title><?php wp_title( '-', true, 'right' ); ?></title>
        <link rel="profile" href="https://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php wp_head(); ?>
    </head>

    <body class="dark">

        <div class="preloader">
            <div class="loading-mask"></div>
            <div class="loading-mask"></div>
            <div class="loading-mask"></div>
            <div class="loading-mask"></div>
            <div class="loading-mask"></div>
        </div>

        <main class="site-wrapper">