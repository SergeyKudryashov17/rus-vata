<?php

/*
 *  Template Name: Категория товаров
 */

get_header();
?>

<main>
    <section class="top-slide background-slide" style="background: url('<?php the_field('banner-img'); ?>') no-repeat top; background-size: cover">
        <div class="container-fluid">
            <div class="row">
                <div class="wrp-headline">
                    <h2><?php the_title(); ?></h2>
                </div>
            </div>
        </div>
        <div class="shadow"></div>
    </section>
    <section class="catalog">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="headline">Каталог продуктов Русвата</div>
                    <div class="borderBottom"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-5 col-sm-11 mx-auto col-12">
                    <?php get_search_form(); ?>
                    <?php get_template_part('template-part/catalog-menu'); ?>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-12">
                    <div class="row product-type d-md-flex d-sm-none d-none">
                        <?php
                        $terms = get_terms(array(
                            'taxonomy' => 'type-products-taxo',
                            'hide_empty'  => 0,
                        ));
                        foreach ($terms as $term){
                            if($term->parent == 0):
                                $page = get_page_by_title($term->name, ARRAY_A, 'page');
                                $img = get_field('img', 'type-products-taxo_'.$term->term_id);
                                ?>
                                <div class="col-xl-4 col-lg-4 col-md-4">
                                    <div class="img-wrp">
                                        <img src="<?php echo $img; ?>" alt="">
                                        <div class="btn-catalog">
                                            <a href="<?php echo $page['guid'] ?>">Выбрать</a>
                                        </div>
                                    </div>
                                    <div class="desc-img">
                                        <a href="<?php echo $page['guid'] ?>"><?php echo $page['post_title']; ?></a>
                                    </div>
                                </div>
                                <?php
                            endif;
                        }
                        ?>
                    </div>
                    <div class="head-type-product"><?php the_title() ?></div>
                    <div class="desc-character-product">
                        <div class="row">
                            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                                <div class="row">
                                    <div class="col-lg-12 col-md-7 col-sm-8 col-12">
                                        <img src="<?php the_field('image-category'); ?>" alt="">
                                    </div>
                                    <div class="col-lg-12 col-md-5 col-sm-4 d-sm-block d-none">
                                        <span class="section-head">Разделы:</span>
                                        <div class="sections">
                                            <?php
                                            $name_category = get_the_title();

                                            $term = get_term_by('name', $name_category, 'type-products-taxo');

                                            //var_dump($term);

                                            $args = array(
                                                'taxonomy' => 'type-products-taxo',
                                                'hide_empty' => false,
                                                'parent' => $term->term_id
                                            );

                                            $child_terms = get_terms($args);

                                            //var_dump($child_terms);

                                            foreach ($child_terms as $child_term) {
                                                $id_page = get_page_by_title($child_term->name, 'ARRAY_A', 'page');

                                                echo '<div class="item-sections">
                                                  <a href="'.get_permalink($id_page['ID']).'">'
                                                    .$child_term->name.'
                                                  </a>
                                              </div>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                                <div class="desc-text">
                                    <?php the_field('text-desc-category'); ?>
                                </div>
                                <div class="d-sm-none d-block">
                                    <span class="section-head">Разделы:</span>
                                    <div class="sections">
                                        <?php
                                        $name_category = get_the_title();
                                        $term = get_term_by('name', $name_category, 'type-products-taxo');

                                        $args = array(
                                            'taxonomy' => 'type-products-taxo',
                                            'hide_empty' => false,
                                            'parent' => $term->term_id
                                        );

                                        $child_terms = get_terms($args);

                                        foreach ($child_terms as $child_term) {
                                            $id_page = get_page_by_title($child_term->name, 'ARRAY_A', 'page');

                                            echo '<div class="item-sections">
                                                  <a href="'.get_permalink($id_page['ID']).'">'
                                                .$child_term->name.'
                                                  </a>
                                              </div>';
                                        }
                                        ?>
                                    </div>
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
