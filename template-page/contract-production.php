<?php
/*
 * Template Name: Контрактное производство
 */
get_header();
?>

    <main>
        <section class="top-slide background-slide" style="background: url('http://cy98609-wordpress.tw1.ru/wp-content/themes/artrange/img/KIR_3722-min.jpg'); background-size: cover; background-position: center">
            <div class="container-fluid">
                <div class="row">
                    <div class="wrp-headline">
                        <h2><?php the_title(); ?></h2>
                        <a class="button open-feedback" href="#">Связаться</a>
                    </div>
                </div>
            </div>
            <div class="shadow"></div>
        </section>
        <section class="no-padding gray-gradient">
            <div class="container">
                <div class="row light-gray-bg">
                    <div class="col-xl-4 col-lg-4 col-md-6 d-md-block d-sm-none d-none" style="background: linear-gradient(to right, #fff, #f2f2f2)">
                        <img class="d-block w-100 gorizontal-shadow-accent" src="<?php echo get_template_directory_uri() ?>/img/2.png" alt="">
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12 d-flex flex-column justify-content-center">
                        <div class="big-desc-text bold-text"><?php the_field('desc_text_1'); ?></div>
                        <div class="row margin-top-lg-50">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 right-lg-border"><?php the_field('desc_text_2_left'); ?></div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12"><?php the_field('desc_text_2_right'); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section style="background: url(<?php echo get_template_directory_uri(); ?>/img/1shadow-bg.png); background-size: cover">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h2 class="headline white-color">ПРОДУКЦИЯ, ВЫПУСКАЕМАЯ КОМПАНИЕЙ</h2>
                        <div class="white-borderBottom"></div>
                    </div>
                </div>
                <div class="row slider-icon-product justify-content-center">
                    <?php
                    $i = 0;
                    $products = get_field('list_product');
                    foreach ($products as $product): ?>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                            <img class="icon-product icon-menu shadow-bottom" src="<?php echo $product['img_product']; ?>" alt="<?php echo $product['name_product']; ?>" data-index = '<?php echo $i; ?>'>
                            <div class="icon-product-name icon-menu white-color" data-index = '<?php echo $i; ?>'><?php echo $product['name_product']; ?></div>
                        </div>
                        <?php
                        $i++;
                    endforeach;
                    ?>
                </div>
            </div>
        </section>
        <section>
            <div class="triangle-top"></div>
            <div class="container">
                <?php
                $i = 0;
                foreach ($products as $product):
                    if($i == 0) {
                        $hide_class = '';
                    } else {
                        $hide_class = 'd-none';
                    }
                    ?>
                    <div class="block-info-product <?php echo $hide_class; ?>" data-index = '<?php echo $i; ?>'>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <h2 class="headline text-left"><?php echo $product['name_product']; ?></h2>
                            </div>
                        </div>
                        <div class="row margin-top-30">
                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                                <div class="row left-border">
                                    <div class="col-11">
                                        <div class="big-desc-text margin-bottom-0"><?php echo $product['desc_product_main'] ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 d-flex flex-wrap">
                                <div class="row left-border align-self-start">
                                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                                        <div class="big-desc-text margin-bottom-0"><?php echo $product['short_info_1'] ?></div>
                                    </div>
                                </div>
                                <div class="row left-border align-self-end">
                                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                                        <div class="big-desc-text margin-bottom-0"><?php echo $product['short_info_2']; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row margin-top-100">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h2 class="headline"><?php echo $product['head_type_product'];  ?></h2>
                            </div>
                        </div>
                        <div class="slider-type-product margin-top-50 d-md-block d-none">
                            <?php
                            $j = 0;
                            foreach ($product['desc_type_product'] as $type_product):
                                if($type_product['varias_view'] == 'circle') $view = 'icon-product shadow-bottom';
                                else $view = '';

                                if($type_product['size_img'] == 'full') $size_img = 'mw-100';
                                else $size_img = '';
                                ?>
                                <div>
                                    <p class="big-desc-text text-center subtype" data-subtype-id="<?php echo $j; ?>">
                                        <?php echo $type_product['name_type'] ?>
                                    </p>
                                    <img class="<?php echo $view; echo $size_img; ?> subtype" src="<?php echo $type_product['img_type']?>" alt="" data-subtype-id="<?php echo $j; ?>">
                                    <p class="big-desc-text text-center subtype" data-subtype-id="<?php echo $j; ?>">
                                        <?php echo $type_product['desc_type_text']; ?>
                                    </p>
                                </div>
                            <?php
                                $j++;
                            endforeach;
                            ?>
                        </div>
                        <div class="row d-md-none d-sm-flex">
                            <?php
                            $j = 0;
                            foreach ($product['desc_type_product'] as $type_product):
                                if($type_product['varias_view'] == 'circle') $view = 'icon-product shadow-bottom';
                                else $view = '';

                                if($type_product['size_img'] == 'full') $size_img = 'mw-100';
                                else $size_img = '';
                                ?>

                                <div class="d-md-none d-sm-block col-sm-6 col-6 margin-top-20">
                                    <img class="<?php echo $view; echo $size_img; ?> subtype" src="<?php echo $type_product['img_type']?>" alt="" data-subtype-id="<?php echo $j; ?>">
                                </div>
                                <div class="d-md-none d-flex col-sm-6 col-6 margin-top-20 flex-column justify-content-center">
                                    <p class="name-subtype subtype" data-subtype-id="<?php echo $j; ?>"><?php echo $type_product['name_type'] ?></p>
                                    <p class="desc-subtype subtype" data-subtype-id="<?php echo $j; ?>"><?php echo $type_product['desc_type_text']; ?></p>
                                </div>
                            <?php
                                $j++;
                            endforeach;
                            ?>
                        </div>
                        <div class="row">
                            <?php
                            foreach ($product['desc_type_product'] as $type_product):
                                if(!empty($type_product['subtype_product'])){
                                    $n = 0;
                                    ?>
                                    <div class="subtype-product-list" data-subtype-parent="<?php echo $n; ?>">
                                        <?php foreach ($type_product['subtype_product'] as $subtype): ?>
                                            <div class="row subtype-product">
                                                <div class="col-md-5">
                                                    <img src="<?php echo $subtype['image'] ?>" alt="">
                                                </div>
                                                <div class="col-md-7 d-flex flex-column justify-content-center">
                                                    <p class="name-subtype"><?php echo $subtype['name']; ?></p>
                                                    <p class="middle-desc-text"><?php echo $subtype['description']; ?></p>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php
                                    $n++;
                                }
                            endforeach;
                            ?>
                        </div>
                    </div>
                <?php
                    $i++;
                endforeach;
                ?>
            </div>
        </section>
    </main>
    <div class="wrp-popup">
        <div class="feedback-popup">
            <form class="feedback-contact full-shadow" style="background: url(<?php echo get_template_directory_uri(); ?>/img/background-form.png); background-size: cover;">
                <div class="close-popup-button">X</div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="headline white-color">Оставьте заявку и наши менеджеры свяжутся с Вами!</div>
                        <input class="input-feedback" name="name" id="name" type="text" placeholder="Имя">
                        <input class="input-feedback" name="email" id="email" type="text" placeholder="E-mail">
                        <input class="input-feedback" name="phone" id="phone" type="text" placeholder="Телефон">
                        <textarea class="input-feedback" name="message" id="text" rows="2" placeholder="Ваше сообщение"></textarea>
                        <input type="hidden" name="id-page" id="id-page" value="<?php echo get_the_ID(); ?>">
                        <input class="input-feedback" type="submit" value="Отправить">
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php get_footer(); ?>
