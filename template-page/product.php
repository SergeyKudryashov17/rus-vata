<?php
/*
 * Template Name: Продукт
 * Template Post Type: products
 */

get_header();

$id = get_the_ID();

// Получаем все термины таксономии type-products-taxo, относящиеся к данному продукту
$terms = get_the_terms($id, 'type-products-taxo');
// Находим количество терминов, чтобы затем обратится к последнему (родительскому) термину
$count_terms = count($terms);
// Находим страницу с названием совпадающим с родительским термином
$page = get_page_by_title($terms[$count_terms-1]->name, ARRAY_A, page);
?>

<main>
    <section class="top-slide background-slide" style="background: url(<?php the_field('banner-img', $page['ID']); ?>) no-repeat top; background-size: cover">
        <div class="container-fluid">
            <div class="row">
                <div class="wrp-headline">
                    <h2><?php echo $terms[$count_terms-1]->name; ?></h2>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-5 col-sm-11 mx-auto col-12">
                    <?php get_search_form(); ?>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-7 d-md-block d-sm-none d-none">
                    <div class="head-type-product"><?php the_title(); ?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-5 col-sm-11 mx-auto col-12">
                    <?php get_template_part('template-part/catalog-menu') ?>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-12">
                    <div class="head-type-product d-md-none d-sm-block"><?php the_title(); ?></div>
                    <div class="list-character">
                        <ul>
                            <li class="active-item-list-char" id="desc-product">Описание</li>
                            <li id="app-product">Применение</li>
                            <?php if(!empty(get_field('headline_media'))): ?>
                                <li id="media-product">Мультимедиа</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="desc-character-product">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-7 col-12">
                                <img class="product-img" src="<?php the_field('img-product'); ?>" alt="">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-5 col-12">
                                <div class="desc-text">
                                    <?php
                                        $group      = get_field('desc-product');
                                        $TM         = get_field('TM');
                                        $material   = get_field('material');
                                        $count      = get_field('count');
                                        $color      = get_field('color');
                                        $pack       = get_field('pack');
                                    ?>
                                    <p><span>Торговая марка:</span><br><?php echo $TM; ?></p>
                                    <p><span>Материал:</span><br><?php echo $material; ?></p>
                                    <p><span>Количество:</span><br><?php echo $count; ?></p>
                                    <p><span>Цвет:</span><br><?php echo $color; ?></p>
                                    <p><span>Упаковка:</span><br><?php echo $pack; ?></p>
                                </div>
                                <div class="app-text">
                                    <?php the_field('app-product'); ?>
                                </div>
                            </div>
                            <div class="col-10 media-product">
                                <p><?php the_field('headline_media'); ?></p>
                                <video class="w-100" controls>
                                    <source src="<?php the_field('video'); ?>" type="video/mp4">
                                </video>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="desc-text">
                                    <p><?php the_field('desc-product'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
