<?php get_header(); ?>
<main>
    <section class="top-slide background-slide" style="background: url(<?php the_field('banner-img', $id_head_page); ?>) no-repeat top; background-size: cover">
        <div class="container-fluid">
            <div class="row">
                <div class="wrp-headline">
                    <h2><?php echo $category_product; ?></h2>
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
                    <div class="head-type-product">Результаты поиска: <?php echo get_search_query(); ?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-5 col-sm-11 mx-auto col-12">
                    <?php get_template_part('template-part/catalog-menu') ?>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-12">
                    <div class="row">
                        <!--Результаты поиска-->
                        <?php
                        if (have_posts()) :
                            while (have_posts()) : the_post();
                                ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6">
                                    <div class="img-product-wrp">
                                        <img src="<?php echo get_field('img-product'); ?>" alt="">
                                        <div class="btn-catalog">
                                            <a href="">Выбрать</a>
                                        </div>
                                    </div>
                                    <div class="desc-products">
                                        <a href="<?php echo get_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <div class="col-12">
                                <div class="search-result">
                                    Извините, по Вашему результату ничего не найдено
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
