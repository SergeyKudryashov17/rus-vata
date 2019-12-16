<?php
/*
 * Template Name: История
 */
get_header();
?>
    <main>
        <section class="history-slide background-slide" style="background: url('http://cy98609-wordpress.tw1.ru/wp-content/themes/artrange/img/img-1.jpg'); background-size: 100% 100%">
            <div class="container-fluid">
                <div class="row">
                    <div class="wrp-headline">
                        <h2><?php the_field('headline_page'); ?></h2>
                    </div>
                </div>
            </div>
            <div class="shadow"></div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="headline">История компании</div>
                        <div class="borderBottom"></div>
                    </div>
                </div>
                <?php
                $times = get_field('history');
                $i = 0;
                foreach ($times as $time){
                    if($i == 0) : ?>
                        <div class="row">
                            <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-12">
                                <div class="img-history">
                                    <img class="w-100" src="<?php echo $time['image']; ?>" alt="">
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                                <?php
                                foreach ($time['time'] as $period) {
                                    echo '<div class="mini-headline">' . $period['date'] . '</div>';
                                    $desc = str_replace('<p>', '<p class="big-desc-text">' , $period['desc']);
                                    echo $desc;
                                }
                                ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="row row-item">
                            <div class="col-xl-5 col-lg-5 col-md-8 col-sm-12 col-12">
                                <div class="img-history">
                                    <img class="w-100" src="<?php echo $time['image']; ?>" alt="">
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                                <?php
                                foreach ($time['time'] as $period) {
                                    echo '<div class="mini-headline">' . $period['date'] . '</div>';
                                    $desc = str_replace('<p>', '<p class="big-desc-text">' , $period['desc']);
                                    echo $desc;
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                    endif;
                    $i++;
                }
                ?>
            </div>
        </section>
    </main>
<?php get_footer(); ?>
