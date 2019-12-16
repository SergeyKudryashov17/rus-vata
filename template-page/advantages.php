<?php
 /*
  * Template Name: Преимущества
  */
 get_header();
?>

    <main>
        <section class="top-slide background-slide" style="background: url('http://cy98609-wordpress.tw1.ru/wp-content/themes/artrange/img/1-min.png'); background-size: cover; background-position: center">
            <div class="container-fluid">
                <div class="row">
                    <div class="wrp-headline">
                        <h2 class="d-block"><?php the_title(); ?></h2>
                        <a class="button open-feedback" href="#">Связаться</a>
                    </div>
                </div>
            </div>
            <div class="shadow"></div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-12 no-sm-padding">
                        <h3 class="bold-text"><?php the_field('headline_first'); ?></h3>
                        <p class="left-border margin-top-50">
                            <?php the_field('text_1'); ?>
                        </p>
                        <p class="left-border margin-top-50">
                            <?php the_field('text_1'); ?>
                        </p>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-10 col-12 mx-auto d-flex align-items-center">
                        <img class="mw-100" src="<?php the_field('image_1'); ?>" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section style="background: url('http://cy98609-wordpress.tw1.ru/wp-content/themes/artrange/img/bg-vata.png'); background-size: cover;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="headline white-color"><?php the_field('headline_2'); ?></h2>
                        <div class="white-borderBottom"></div>
                    </div>
                </div>
                <div class="row justify-content-between slider-advantages">
                    <?php
                    $repeat = get_field('repeat');
                    foreach ($repeat as $value): ?>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                            <img class="icon-product shadow-bottom" src="<?php echo $value['image_repeat']; ?>" alt="Ватные диски">
                            <p class="desc-item white-color no-padding"><?php echo $value['image-text-repeat']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-6 col-lg-7 col-md-12 order-lg-first order-last">
                        <p class="left-border middle-desc-text">
                            <?php the_field('text_3'); ?>
                        </p>
                    </div>
                    <div class="col-xl-5 col-lg-6 col-md-8 order-lg-last order-first d-flex flex-column justify-content-center">
                        <div class="main-slogan"><?php the_field('slogan_1'); ?></div>
                        <div class="desc-slogan"><?php the_field('desc_slogan_1'); ?></div>
                    </div>
                </div>
                <div class="row justify-content-between margin-top-50">
                    <div class="col-xl-6 col-lg-6 col-md-12 order-lg-first order-last">
                        <p class="left-border middle-desc-text">
                            <?php the_field('text_4'); ?>
                        </p>
                    </div>
                    <div class="col-xl-5 col-lg-6 col-md-8 order-lg-last order-first d-flex flex-column justify-content-center">
                        <div class="main-slogan"><?php the_field('slogan_2') ?></div>
                        <div class="desc-slogan"><?php the_field('desc_slogan_2'); ?></div>
                    </div>
                </div>
                <div class="row margin-top-50">
                    <div class="col-12">
                        <img class="full-page-img" src="<?php the_field('image_2'); ?>" alt=""">
                    </div>
                    <div class="col-10 mx-auto">
                        <div class="text-center middle-desc-text">
                            <?php the_field('desc_image_2'); ?>
                        </div>
                    </div>
                </div>
                <div class="row margin-top-50">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-10 mx-auto no-padding">
                        <img class="mw-100" src="<?php the_field('image_3'); ?>" alt="" >
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex flex-column justify-content-center">
                        <p class="left-border middle-desc-text margin-bottom-75">
                            <?php the_field('text_5'); ?>
                        </p>
                        <p class="left-border middle-desc-text margin-bottom-75">
                            <?php the_field('text_6'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section style="background: url('http://cy98609-wordpress.tw1.ru/wp-content/themes/artrange/img/gradient-bg.png'); background-size: cover;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-6 col-12 order-md-first order-last d-flex flex-column justify-content-center">
                        <p class="left-white-border white-color middle-desc-text">
                            <?php the_field('text_7') ?>
                        </p>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 order-md-last order-first">
                        <img class="mw-100" src="<?php the_field('image_4'); ?>" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-10 mx-auto">
                        <div class="text-center middle-desc-text">
                            <?php the_field('text_8') ?>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-between margin-top-100">
                    <?php $group = get_field('group'); ?>
                    <div class="col-xl-3 col-lg-4 col-md-7 col-sm-10 mx-auto no-xl-padding">
                        <div class="main-slogan text-lg-left text-center"><?php echo $group['headline_1_item']; ?></div>
                        <div class="mini-slogan text-lg-left text-center"><?php echo $group['caption_item']; ?></div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-7 col-sm-10 mx-auto no-xl-padding">
                        <div class="main-slogan text-lg-left text-center"><?php echo $group['headline_2_item'] ?></div>
                        <div class="mini-slogan text-lg-left text-center"><?php echo $group['caption_2_item'] ?></div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-7 col-sm-10 mx-auto no-xl-padding">
                        <div class="main-slogan text-lg-left text-center"><?php echo $group['headline_3_item'] ?></div>
                        <div class="mini-slogan text-lg-left text-center"><?php echo $group['caption_3_item'] ?></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="no-md-padding-top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-10 mx-auto no-padding">
                        <img class="mw-100" src="<?php the_field('image_5'); ?>" alt="">
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-10 mx-auto d-flex flex-column justify-content-center">
                        <p class="left-border middle-desc-text">
                            <?php the_field('text_9'); ?>
                        </p>
                        <p class="left-border middle-desc-text margin-top-50">
                            <?php the_field('text_10'); ?>
                        </p>
                    </div>
                </div>
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
                        <input class="input-feedback" type="submit" value="Отправить">
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php get_footer(); ?>
