<!doctype html>
<html <?php language_attributes(); ?>>

  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <title><?php wp_title( '-', true, 'right' ); ?></title>
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>

    <style>
      .preloader {
        bottom: 0;
        left: 0;
        position: fixed;
        right: 0;
        top: 0;
        z-index: 1000;
        display: -moz-flex;
        display: flex;
      }
      .preloader.active.hidden {
        display: none;
      }
      .loading-mask {
        background-color: #fff;
        height: 100%;
        left: 0;
        position: absolute;
        top: 0;
        width: 20%;
        transition: all 0.6s cubic-bezier(0.61, 0, 0.6, 1) 0s;
      }
      .loading-mask:nth-child(2) {
        left: 20%;
        transition-delay: 0.1s;
      }
      .loading-mask:nth-child(3) {
        left: 40%;
        transition-delay: 0.2s;
      }
      .loading-mask:nth-child(4) {
        left: 60%;
        transition-delay: 0.3s;
      }
      .loading-mask:nth-child(5) {
        left: 80%;
        transition-delay: 0.4s;
      }
      .preloader.active.done {
        z-index: 0;
      }
      .preloader.active .loading-mask {
        width: 0;
      }
    </style>
  </head>

  <body <?php body_class(); ?>>

    <div class="preloader">
        <div class="loading-mask"></div>
        <div class="loading-mask"></div>
        <div class="loading-mask"></div>
        <div class="loading-mask"></div>
        <div class="loading-mask"></div>
    </div>

    <?php wp_body_open(); ?>
    <?php do_action('get_header'); ?>

    <div id="app">
      <?php echo view(app('sage.view'), app('sage.data'))->render(); ?>
    </div>

    <?php do_action('get_footer'); ?>
    <?php wp_footer(); ?>
  </body>
</html>
