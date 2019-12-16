<?php
/*
 *  Template Name: Тип продукта
 */

get_header();

$name_category = get_field('category-product');
$page = get_page_by_title($name_category, ARRAY_A, page);

?>

<!-- Вывод типов продуктов -->

<main>
    <section class="top-slide background-slide" style="background: url('<?php the_field('banner-img', $page['ID']); ?>') no-repeat top; background-size: cover">
        <div class="container-fluid">
            <div class="row">
                <div class="wrp-headline">
                    <h2><?php echo $name_category; ?></h2>
                </div>
            </div>
        </div>
        <div class="shadow"></div>
    </section>
    <section class="catalog">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-5 col-sm-11 mx-auto col-12">
                    <div class="search-product">
                        <input type="search" placeholder="Поиск продуктов">
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-12">
                    <?php
                        $term = get_field('type-product');
                        $term_name = $term->name;
                        $taxo_name = $term->taxonomy;
                    ?>
                    <div class="row head-type-product d-md-block d-sm-none d-none"><?php echo $term_name ?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-5 col-sm-11 mx-auto col-12">
                    <?php get_template_part('template-part/catalog-menu'); ?>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-12">
                    <div class="row product-type">
                        <div class="d-md-none d-sm-block col-sm-12 col-12">
                            <div class="head-type-product"><?php echo $term_name ?></div>
                        </div>
                        <!-- Вывод типов продуктов -->
                        <?php
                        $terms_children = get_term_children($term->term_id, $taxo_name);
                        foreach($terms_children as $child) {
                            $child_term = get_term_by('id', $child, $taxo_name);
                            ?>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6">
                                <div class="img-wrp">
                                    <a href="<?php echo get_term_link($child_term->term_id, $child_term->taxonomy) ?>">
                                        <img src="<?php echo get_field('img', $taxo_name. '_' .$child); ?>" alt="">
                                        <div class="btn-catalog">Выбрать</div>
                                    </a>
                                </div>
                                <div class="desc-img">
                                    <a href="<?php echo get_term_link($child_term->term_id, $child_term->taxonomy) ?>">
                                        <?php echo $child_term->name; ?>
                                    </a>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
