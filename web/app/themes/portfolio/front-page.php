<?php get_header(); ?>
    <div class="pt-table">
        <div class="pt-tablecell page-home relative" style="background-image: url('<?= get_stylesheet_directory_uri(); ?>/img/banner.jpg');">
            <div class="overlay"></div>

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                        <div class="page-title home text-center">
                            <img src="<?= get_stylesheet_directory_uri(); ?>/img/phantom.png" alt="">
                            <p>A product designer from England, who focuses on interactive design &amp; A freelance designer focusing on typography &amp; clean interfaces. Also works in Google.</p>
                        </div>

                        <?php
                            $menus = get_nav_menu_locations();
                            $menu_items = array();

                            if(!empty($menus['primary']))
                                $menu_items = wp_get_nav_menu_items($menus['primary']);
                            ?>
                        
                        <div class="hexagon-menu clear">
                            <?php if(!empty($menu_items)) :
                                foreach($menu_items as $item) :
                                    $icon = get_field('icon', $item); ?>
                                    <div class="hexagon-item">
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <div class="hex-item">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                        <a href="<?= $item->url ?>" class="hex-content">
                                            <span class="hex-content-inner">
                                                <span class="icon">
                                                    <i class="<?= $icon ?>"></i>
                                                </span>
                                                <span class="title"><?= $item->title ?></span>
                                            </span>
                                            <svg viewbox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
                                        </a>
                                    </div>
                                <?php endforeach;
                            endif; ?>
                            
                        </div> <!-- /.hexagon-menu -->

                    </div> <!-- /.col-xs-12 -->

                </div> <!-- /.row -->
            </div> <!-- /.container -->

        </div> <!-- /.pt-tablecell -->
    </div> <!-- /.pt-table -->
<?php get_footer(); ?>