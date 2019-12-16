<?php
/*
 * Template Name: Контакты
 */

get_header();
?>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <main>
        <section class="top-slide background-slide" style="background: url('http://cy98609-wordpress.tw1.ru/wp-content/themes/artrange/img/top-slide-img.jpeg'); background-size: cover;">
            <div class="container-fluid">
                <div class="row">
                    <div class="wrp-headline">
                        <h2>Контакты</h2>
                    </div>
                </div>
            </div>
            <div class="shadow"></div>
        </section>
        <section id="contact-info-block">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6 col-10">
                        <h3 class="sub-headline turquoise-color">ОФИС</h3>
                        <?php the_field('contact_1') ?>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-7 col-sm-6 col-10">
                        <h3 class="sub-headline turquoise-color">ПРОИЗВОДСТВО</h3>
                        <?php the_field('contact_2') ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="vertical-shadow no-padding">
            <div class="container-fluid no-padding">
                <script scr="<?php echo get_template_directory_uri(); ?>/js/yandexmap.js"></script>
                <div id="map-yandex" data-address="<?php the_field('address_map') ?>"></div>
            </div>
        </section>
        <section id="feedback-form-block">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h2 class="headline">ФОРМА ОБРАТНОЙ СВЯЗИ</h2>
                        <div class="borderBottom"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <form class="feedback-contact full-shadow" style="background: url(<?php echo get_template_directory_uri(); ?>/img/background-form.png); background-size: cover;">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <input class="input-feedback" name="name" id="name" type="text" placeholder="Имя">
                                    <input class="input-feedback" name="email" id="email" type="email" placeholder="E-mail">
                                    <input class="input-feedback" name="phone" id="phone" type="text" placeholder="Телефон">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <textarea class="input-feedback" name="message" id="text" rows="2" placeholder="Ваше сообщение"></textarea>
                                    <input type="hidden" name="id-page" id="id-page" value="<?php echo get_the_ID(); ?>">
                                    <input class="input-feedback" type="submit" value="Отправить">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>
