<?php

// Подключение стилей и скриптов
add_action( 'wp_enqueue_scripts', 'include_script_css' );
function include_script_css () {
    wp_deregister_script('jquery');
    wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), null, true );
    wp_enqueue_script( 'jquery-migrate', '//code.jquery.com/jquery-migrate-1.2.1.min.js', array(), null, true );
    wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array(), null, true );
    wp_enqueue_script( 'slick-js', get_stylesheet_directory_uri() . '/assets/slick/slick.min.js', array(), null, true );
    wp_enqueue_script( 'yandex-map', get_stylesheet_directory_uri() . '/js/yandexmap.js', array(), null, true );
    wp_enqueue_script( 'mask-input', get_stylesheet_directory_uri() . '/assets/mask-input/jquery.mask.js', array(), null, true );
    wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/script.js', array(), null, true );

    wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', false, null );
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css', false, null );
    wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() . '/assets/slick/slick.css', false, null );
    wp_enqueue_style( 'slick-theme-css', get_stylesheet_directory_uri() . '/assets/slick/slick-theme.css', false, null );
    wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/css/style.css', false, null );
    wp_enqueue_style( 'media-css', get_stylesheet_directory_uri() . '/css/media.css', false, null );

}

// Получение url обработчика ajax-запросов Wordpress
add_action( 'wp_enqueue_scripts', 'get_ajax_url', 99 );
function get_ajax_url(){
    wp_localize_script( 'script', 'ajax_obj',
        array(
            'url' => admin_url('admin-ajax.php')
        )
    );
}

// Обработка ajax-запроса от формы
add_action('wp_ajax_nopriv_send_feedback', 'send_message_feedback');
add_action('wp_ajax_send_feedback'       , 'send_message_feedback');
function send_message_feedback() {
    $data    = $_POST['message'];
    parse_str($data, $data);

    //$to= "sergey_k@artrange.ru";
    //$to = 'ryabuha.olga@rus-vata.ru';

    if($data['id-page'] == 193) {
        $to = get_field('feedback_email_CP', 193);
    } else {
        $to = get_field('email_alert', 144);
    }

    $headers= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "From: Info RusVata <info@rusvata.ru>\r\n";
    $subject = 'Обратная связь с сайта';
    $message = '<html>
                    <body>
                        <h2>Заявка с сайта rusvata.ru</h2>
                        <h3>Имя:</h3>
                        <p>'.$data['name'].'</p>
                        <h3>E-mail:</h3>
                        <p>'.$data['email'].'</p>
                        <h3>Сообщение:</h3>
                        <p>'.$data['message'].'</p>
                    </body>
                </html>';

    $res = mail($to, $subject, $message, $headers);

    if($res) {
        echo "Сообщение успешно отправлено! Ожидайте, с вами свяжутся.";
    } else {
        echo "Произошла ошибка, попробуйте позже";
    }

    wp_die();
}

// Регистрация меню
add_action( 'after_setup_theme', 'theme_register_nav_menu' );
function theme_register_nav_menu() {
    register_nav_menu( 'menu-catalog', 'Меню каталога товаров' );
    register_nav_menu( 'main-menu', 'Главное меню' );
    register_nav_menu( 'footer-menu', 'Меню в подвале' );
}

// Добавление редактируемого логотипа в админку
add_action( 'after_setup_theme', 'danilin_setuplogo' );
function danilin_setuplogo() {
    add_theme_support( 'custom-logo', array(
        'flex-width' => true,
        'flex-height' => true,
    ));
}

//
add_filter( 'query_vars', 'add_custom_query_var' );
function add_custom_query_var( $vars ){
    $vars[] = "section";
    return $vars;
}


?>