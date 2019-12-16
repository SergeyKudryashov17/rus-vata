<?php
/*
 *  Template Name: О нас
 */
get_header();
?>
    <main>
        <section class="top-slide background-slide" style="background: url('http://cy98609-wordpress.tw1.ru/wp-content/themes/artrange/img/picture8-min.png'); background-size: 100% 100%">
            <div class="container-fluid">
                <div class="row">
                    <div class="wrp-headline">
                        <h2>О нас</h2>
                    </div>
                </div>
            </div>
            <div class="shadow"></div>
        </section>
        <section class="shadow-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-7 col-sm-12">
                        <h2 class="headline text-left">КОМПАНИЯ «РУСВАТА» СЕГОДНЯ</h2>
                    </div>
                </div>
                <div class="row margin-top-30 text-content">
                    <div class="col-xl-6 col-lg-6 col-sm-12 col-md-6 right-border">
                        <?php the_field('info-text-1'); ?>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <?php the_field('info-text-2'); ?>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h2 class="headline">ПОСМОТРИТЕ ВИДЕО О НАС</h2>
                        <div class="borderBottom"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 no-xs-padding">
                        <video width="100%" controls poster="<?php the_field('poster'); ?>">
                            <source src="<?php the_field('video'); ?>" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </section>
        <section style="background: url(http://cy98609-wordpress.tw1.ru/wp-content/themes/artrange/img/picture17.png); background-size: cover">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h2 class="headline white-color">ПРИНЦИПЫ РАБОТЫ</h2>
                        <div class="white-borderBottom"></div>
                    </div>
                </div>
                <div class="row">
                    <?php
                        $work_principles = get_field('work-principles');
                        foreach ($work_principles as $principle) {
                            ?>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 item-block">
                                <img src="<?php echo $principle['img']; ?>" alt="" class="d-block mx-auto">
                                <div class="desc-item white-color"><?php echo $principle['name']; ?></div>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>