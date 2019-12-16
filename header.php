<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
    <title><?php the_title(); ?></title>
</head>
<body>
<header>
    <div class="turquoise-bg">
        <div class="top-header container">
            <div class="row">
                <div class="col-xl-4 col-lg-3 col-md-5 col-sm-6 col-6 logo-wrp">
                    <a href="<?php echo home_url() ?>">
                        <?php if( $custom_logo_id = get_theme_mod('custom_logo') ): $logo_img = wp_get_attachment_image_url( $custom_logo_id, 'full');  ?>
                            <img class="logo" src="<?php echo $logo_img; ?>" alt="">
                        <?php endif; ?>
                    </a>
                </div>
                <div class="col-xl-8 col-lg-9 col-md-7 col-sm-6 col-6">
                    <div class="row">
                        <nav>
                            <i class="fa fa-bars" aria-hidden="true"></i>
                            <ul>
                                <?php
                                if( $menu_items = wp_get_nav_menu_items('main-menu') ) :
                                    $count = 0;
                                    $last_parent = 0;
                                    $close_hide_menu = false;
                                    foreach ($menu_items as $menu_item) :
                                        if($menu_item->menu_item_parent == 0):
                                            if($close_hide_menu) echo '</ul>'; $close_hide_menu = false;
                                            if($count != 0) echo '</li>';
                                            echo '<li><a href="'.$menu_item->url.'">'.$menu_item->title.'</a>';
                                            $last_parent = $menu_item->menu_item_parent;
                                        else:
                                            if($last_parent == 0) echo '<ul class="hide-menu">';
                                            echo '<li><a href="'.$menu_item->url.'">'.$menu_item->title.'</a></li>';
                                            $last_parent = $menu_item->menu_item_parent;
                                            $close_hide_menu = true;
                                        endif;
                                        $count++;
                                    endforeach;
                                    if($close_hide_menu) : echo '</ul></li>'; $close_hide_menu = false;
                                    else: echo '</li>';
                                    endif;
                                endif;
                                ?>
                                <li>
                                    <a href="http://cy98609-wordpress.tw1.ru">Рус</a>|
                                    <a href="http://en.cy98609-wordpress.tw1.ru">Eng</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-menu container">
            <div class="col-12">
                <ul>
                    <?php
                    if( $menu_items = wp_get_nav_menu_items('main-menu') ) :
                        $count = 0;
                        $last_parent = 0;
                        $close_hide_menu = false;
                        foreach ($menu_items as $menu_item) :
                            if($menu_item->menu_item_parent == 0):
                                if($close_hide_menu) echo '</ul>'; $close_hide_menu = false;
                                if($count != 0) echo '</li>';
                                echo '<li><a href="'.$menu_item->url.'">'.$menu_item->title.'</a>';
                                $last_parent = $menu_item->menu_item_parent;
                            else:
                                if($last_parent == 0) {
                                    echo '<i class="fa fa-caret-down" aria-hidden="true"></i>';
                                    echo '<ul class="hide-menu-mobile">';
                                }
                                echo '<li><a href="'.$menu_item->url.'">'.$menu_item->title.'</a></li>';
                                $last_parent = $menu_item->menu_item_parent;
                                $close_hide_menu = true;
                            endif;
                            $count++;
                        endforeach;
                        if($close_hide_menu) : echo '</ul></li>'; $close_hide_menu = false;
                        else: echo '</li>';
                        endif;
                    endif;
                    ?>
                    <li><a href="#">Рус</a>|<a href="#">Eng</a></li>
                    <li class="address">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <address>г. Рязань, 2-й Мервинский проезд, д.8</address>
                    </li>
                    <li class="contacts-phone">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <a href="tel:+74912559899">+7 (4912) 55-98-99</a>
                    </li>
                    <li class="contacts-email">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <a href="mailto:sales@rus-vata.ru">sales@rus-vata.ru</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="bottom-header">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-2 d-lg-block d-md-none"></div>
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <address>г. Рязань, 2-й Мервинский проезд, д.8</address>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                    <div class="row">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <a href="tel:+74912559899">+7 (4912) 55-98-99</a>
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <a href="mailto:sales@rus-vata.ru">sales@rus-vata.ru</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>