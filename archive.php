<!-- Вывод моделей продуктов -->

<?php
get_header();

$list_taxo = get_the_terms(get_the_ID(), 'type-products-taxo');

$queried_object = get_queried_object();         // Получаем объект запроса (будет получен термин таксономии)
$term = get_term($queried_object->parent);      // Получаем родителя данного термина
$parent_term = get_term($term->parent);         // Получаем корневой родительский термин текущей таксономии

// По названию родительского термина находим страницу категории.
// Далее используем её ID для отображение главного слайда с данной страницы
$page = get_page_by_title($parent_term->name, ARRAY_A, page);
?>

<main>
    <section class="top-slide background-slide" style="background: url('<?php the_field('banner-img', $page['ID']); ?>') no-repeat top; background-size: cover">
        <div class="container-fluid">
            <div class="row">
                <div class="wrp-headline">
                    <!-- Вывод названия категории продукта по по таксономии -->
                    <h2><?php echo $parent_term->name; ?></h2>
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
                <div class="col-xl-8 col-lg-8 col-md-7 d-md-block d-sm-none d-none">
                    <div class="row head-type-product"><?php echo $list_taxo[0]->name ?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-5 col-sm-11 mx-auto col-12">
                    <?php get_template_part('template-part/catalog-menu'); ?>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-12">
                    <div class="row product-type">
                        <div class="d-md-none d-sm-block col-sm-12 col-12">
                            <div class="head-type-product"><?php echo $list_taxo[0]->name ?></div>
                        </div>
                        <!-- Вывод продуктов -->
                        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6">
                                <div class="img-product-wrp">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <img src="<?php echo get_field('img-product'); ?>" alt="">
                                    </a>
                                </div>
                                <div class="desc-products">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </div>
                            </div>
                        <?php endwhile; endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
