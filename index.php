<?php get_header(); ?>

<main>
    <section class="main-slider">
        <div class="container-fluid">
            <div class="row main-slider-wrp">
                <?php
                $slides_page = get_field('slider_page');
                foreach ($slides_page as $slide) : ?>
                    <div class="main-slider-item">
                        <img class="<?php echo $slide['height-100'][0]; ?>" src="<?php echo $slide['image_slide']; ?>" alt="">
                        <div class="wrp-headline">
                            <h2><?php echo $slide['name_slide']; ?></h2>
                            <a class="button" href="<?php echo $slide['page']; ?>">Подробнее</a>
                        </div>
                        <div class="shadow"></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="headline">Видео о компании</div>
                    <div class="borderBottom"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-11 mx-auto no-xs-padding">
                    <div class="video-block">
                        <video controls width="100%" controls poster="<?php echo get_field('poster'); ?>">
                            <source src="<?php echo get_field('video'); ?>" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="bg-image" style="background: url(<?php echo get_template_directory_uri() ?>/img/image4.jpeg); background-size: cover; "></div>
        <div class="bg-color">
            <img src="<?php echo get_template_directory_uri() ?>/img/bg1.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="headline">Производитель готовой продукции</div>
                    <div class="borderBottom"></div>
                </div>
            </div>
            <div class="row product-type justify-content-center">
                <?php
                // Сделать вывод типов продуктов из корневых терминов таксономиии "Типы продуктов"
                // Изображения будут браться из доп полей
                $terms = get_terms(array(
                    'taxonomy' => 'type-products-taxo',
                    'hide_empty'  => 0,
                ));

                foreach ($terms as $term){
                    if($term->parent == 0):
                        $page = get_page_by_title($term->name, ARRAY_A, 'page');
                        $img = get_field('img', 'type-products-taxo_'.$term->term_id);
                        ?>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="img-wrp">
                                <img src="<?php echo $img; ?>" alt="">
                                <div class="btn-catalog">
                                    <a href="<?php echo $page['guid']; ?>">Перейти<br>в каталог</a>
                                </div>
                            </div>
                            <div class="desc-img"><?php echo $page['post_title']; ?></div>
                        </div>
                        <?php
                    endif;
                }
                ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
