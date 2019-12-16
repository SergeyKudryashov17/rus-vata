$(document).ready(function () {
    initSlider();                   // Инициализация слайдеров
    showBtn();                      // Отображение кнопки при наведении на блок
    heightMainSlider();             // Автоматический расчет высоты слайдера по высоте экрана
    verticalAlignSlider();          // Вертикальное выравнивание элементов в слайдере
    addActiveClass();               // Добавить класс активному элементу
    openSubTypeProduct();           // Открытие/закрытие списка типов продукции в меню каталога
    openDescProduct();              // Открытие описания продукта
    usingFeedbackForm();            // Работа формы обратной связи
    motionTriangle();               // Анимация передвижения треугольника
    showDetailedInfoProduct();      // Отображение подробной информации о продукте
    openPopup();                    // Открытие попапа
    closePopup();                   // Закрытие попапа
    mobileMenu();                   // Раскрытие мобильного меню
    resizeHieghtSlide();            // Адаптивное изменение слайдера на главной странице
    opneFooterMenu();               // Сворачивание/разворачивание меню в футере (на мобильном разрешении)
    openSubMenuHeader();            // Открытие выпадающего меню в header
    scrollAnchor();                 // Плавные скролл к якорю
    openSubTypeList();              // Открытие/закрытие списка подвидов продуктов на странице "Контракнтное производство"
    expandMenuCatalog();            // Свернуть/Развернуть меню каталога
    openSectionPage();
});

// Отображение кнопки при наведении на блок
function showBtn() {
    var child;
    $('.img-wrp').mouseover(function(){
        child = $(this).children('.btn-catalog');
        $(child).css('display', 'flex');
    });
    $('.img-wrp').mouseleave(function () {
        child = $(this).children('.btn-catalog');
        $(child).css('display', 'none');
    })
}

// Автоматический расчет высоты слайдера по высоте экрана
function heightMainSlider() {
    if($(window).width() > 991) {
        var height_window = $(window).height(),
            height_header = $('header').height(),
            height_slider = height_window - height_header;

        if(height_slider > '800') height_slider = '800';

        $('.main-slider-item').css('height', height_slider);
    }
}

// Вертикальное выравнивание элементов в слайдере
function verticalAlignSlider() {
    $('.main-slider-item').each(function () {
        var height_wrp = $(this).height(),
            height_block = $(this).children('.wrp-headline').height(),
            pos_top = (height_wrp - height_block) / 2;

        var pos_left = $('.main-slider-wrp').children('.slick-prev').position().left;
        pos_left = pos_left + $('.main-slider-wrp').children('.slick-prev').width() + 10;

        $('.main-slider-item').children('.wrp-headline').css({'top': pos_top, 'right': pos_left});
    });

    var name_1 = '.history-slide',
        name_2 = '.top-slide';

    if($('.history-slide').length) adaptiveVerticalPosition(name_1);
    if($('.top-slide').length) adaptiveVerticalPosition(name_2);

    $(window).resize(function () {
        if($('.history-slide').length) adaptiveVerticalPosition(name_1);
        if($('.top-slide').length) adaptiveVerticalPosition(name_2);
    })

    function adaptiveVerticalPosition(name) {
        var height_slide = $(name).innerHeight(),
            height_wrp   = $(name + ' .wrp-headline').innerHeight(),
            top_position = (height_slide - height_wrp) / 2;

        $(name + ' .wrp-headline').css('top', top_position);
    }
}

// Добавить класс активному элементу
function addActiveClass() {
    $('.list-character ul li').click(function (){
        $('.list-character ul li').removeClass('active-item-list-char');
        $(this).addClass('active-item-list-char');
    });
    $('.name-type').click(function (){
        $('.name-type').removeClass('active-type-product');
        $(this).addClass('active-type-product');
    })
}

// Открытие/закрытие списка типов продукции в меню каталога
function openSubTypeProduct() {
    $('.name-type').click(function (){
        var parent = $(this).parent(),
            child_list = $(parent).children('.sub-type-product'),
            child_chevron = $(this).children('.fa');

        if(child_list.css('display') === 'none') {
            child_chevron.css({'transform':'rotate(180deg)', 'transition':'transform 0.5s'})
        } else {
            child_chevron.css({'transform':'rotate(0deg)', 'transition':'transform 0.5s'})
        }
        child_list.slideToggle();
    });
    $('.name-sub-type').click(function () {
        var parent_sub = $(this).parent(),
            child_list_sub = $(parent_sub).children('.quality-product'),
            child_sub_chevron = $(this).children('.fa');


        if(child_list_sub.css('display') === 'none') {
            child_sub_chevron.css({'transform':'rotate(180deg)', 'transition':'transform 0.5s'})
        } else {
            child_sub_chevron.css({'transform':'rotate(0deg)', 'transition':'transform 0.5s'})
        }
        child_list_sub.slideToggle();
    });
}

// Открытие описания продукта
function openDescProduct() {
    $('.list-character li').click(function () {
        var attr = $(this).attr('id');
        if(attr === 'desc-product') {
            $('.desc-text').css('display','block');
            $('.app-text').css('display', 'none');
            $('.media-product').css('display', 'none');
            $('.product-img').css('display', 'block');
        }
        else if (attr === 'app-product') {
            $('.desc-text').css('display','none');
            $('.app-text').css('display', 'block');
            $('.media-product').css('display', 'none');
            $('.product-img').css('display', 'block');
        }
        else if (attr === 'media-product') {
            $('.desc-text').css('display','none');
            $('.app-text').css('display', 'none');
            $('.media-product').css('display', 'block');
            $('.product-img').css('display', 'none');
        }
    })
}

// Работа формы обратной связи
function usingFeedbackForm() {
    $('.feedback-contact #phone').mask('+7 (000) 000-00-00');
    $('.feedback-contact input[type=submit]').click(function (event) {
        event.preventDefault();

        var name = $('.feedback-contact #name').val(),
            email = $('.feedback-contact #email').val(),
            phone = $('.feedback-contact #phone').val(),
            text = $('.feedback-contact #text').val(),
            pattern = /^[a-z0-9_-]+@[a-z0-9-]+\.[a-z]{2,6}$/i;

        if((name === '') && (email === '') && (phone === '') && (text === '')) {
            alert('Ошибка: Форма пустая!');
        }
        else if((name === '') || (email === '') || (phone === '') || (text === '')) {
            alert('Ошибка: Имеются незаполненные поля!');
        }
        else if(email.search(pattern) != 0) {
            alert('Ошибка: Введите корректный email!');
        }
        else {
            var info = $('.feedback-contact').serialize();
            ajaxSendFeedback(info);
            $('.feedback-contact #name').val('');
            $('.feedback-contact #email').val('');
            $('.feedback-contact #phone').val('');
            $('.feedback-contact #text').val('');
        }
    })
}

// Отправка данных из формы через ajax
function ajaxSendFeedback(data) {
    $.ajax({
        url  : ajax_obj.url,
        type : "POST",
        data : {
            action : 'send_feedback',
            message: data
        },
        success : function(text){
            alert(text);
        },
        error: function(error) {
            alert(error);
        }
    });
}

// Анимация передвижения треугольника к активному элементу (Контрактное производство)
function motionTriangle() {
    if($('.triangle-top').length){
        var start_pos = $('.icon-product[data-index=0]').offset().left + ($('.icon-product').width() / 2) - 40;
        $('.triangle-top').css('left', start_pos);
        // Обработчик нажатия на иконку или её название
        $('.icon-menu').click(function () {
            var left_position = $(this).offset().left + ($(this).width() / 2) - 40;
            $('.triangle-top').css({
                'left' : left_position,
                'display' : 'block'
            });
        });
        // Событие прокрутки слайдреа
        $('.slider-icon-product').on('afterChange', function(event, slick, currentSlide, nextSlide){
            $('.triangle-top').css('display', 'none');
        });
    }
}

// Отображение подробной информации о выбранном товаре (Контрактное производство)
function showDetailedInfoProduct() {
    var array_block_info = [];
    $('.block-info-product').each(function (index) {
        array_block_info[index] = $(this);
        // Инициализация слайдера типов продуктов в первой секции при открытии страницы
        if(index === 0){
            var object = $(array_block_info[index]).find('.slider-type-product');
            if($(window).width() > 991) {
                $(object).slick({
                    slidesToScroll: 1,
                    slidesToShow: 3,
                    dots: true
                });
            }
            else if(($(window).width() < 992) && ($(window).width() > 767)) {
                $(object).slick({
                    slidesToScroll: 1,
                    slidesToShow: 2,
                    dots: true
                });
            }
        }
    });

    $('.icon-menu').click(function () {
        var index = $(this).attr('data-index');
        $('.block-info-product').addClass('d-none');
        $(array_block_info[index]).removeClass('d-none');

        // Инициализация слайдера типов продуктов при открытии выбранной секции
        var object = $(array_block_info[index]).find('.slider-type-product');
        if($(window).width() > 991) {
            $(object).slick({
                slidesToScroll: 1,
                slidesToShow: 3,
                dots: true
            });
        }
        else if(($(window).width() < 992) && ($(window).width() > 767)) {
            $(object).slick({
                slidesToScroll: 1,
                slidesToShow: 2,
                dots: true
            });
        }

    });
}

// Закрытие попапа
function closePopup() {
    $('.close-popup-button').click(function(){
        $('body').css('overflow','scroll');
        $('.wrp-popup').css('display','none');
        $('.feedback-popup').css('display', 'none');
    });
}

// Открытие попапа
function openPopup() {
    $('.open-feedback').click(function () {
        $('body').css('overflow','hidden');
        $('.wrp-popup').css('display','flex');
        $('.feedback-popup').css('display', 'block');
        var height_window = $(window).height();
        $('.wrp-popup').css('height', height_window);
    })
}

// Инициализация слайдеров
function initSlider() {
    // Создание слайдера на главной странице
    $('.main-slider-wrp').slick();

    // Создание слайдера на странице "Преимущества"
    if($(window).width() < 768) $('.slider-advantages').slick();

    // Создание слайдера на странице "Контрактное производство" (в зависимости от количество продукции на странице)
    var i = 0;
    $('.slider-icon-product > .col-xl-3').each(function () {
        i++;
    });
    // инициализация с разным количеством слайдов в зависимомсти от размера экрана
    // 2 слайда: 320px-576px, 3 слайда: 576px - 767px, 4 слайда: больше 767px
    if(($(window).width() > 767) && (i > 4))
        $('.slider-icon-product').slick({ slidesToScroll: 1, slidesToShow: 4});
    if(($(window).width() > 575) && ($(window).width() < 768) && (i > 3))
        $('.slider-icon-product').slick({ slidesToScroll: 1, slidesToShow: 3 });
    if(($(window).width() < 576) && (i > 2))
        $('.slider-icon-product').slick({ slidesToScroll: 1, slidesToShow: 2, });

    $(window).resize(function () {
        if(($(window).width() > 767) && (i > 4)){
            $('.slider-icon-product').slick('unslick');
            $('.slider-icon-product').slick({ slidesToScroll: 1, slidesToShow: 4 });
        }
        else if(($(window).width() > 575) && ($(window).width() < 768) && (i > 3)) {
            $('.slider-icon-product').slick('unslick');
            $('.slider-icon-product').slick({ slidesToScroll: 1, slidesToShow: 3 });
        }
        else if(($(window).width() < 576) && (i > 2)){
            $('.slider-icon-product').slick('unslick');
            $('.slider-icon-product').slick({ slidesToScroll: 1, slidesToShow: 2,});
        }
        else {
            $('.slider-icon-product').slick('unslick');
        }
    });
}

// Открытие и закрытие мобильного меню
function mobileMenu() {
    $('.fa-bars').click(function () {
        $('.mobile-menu').slideToggle();
    });
}

// Адаптивное изменение элементов слайдера на главной странице (меньше 576px)
function resizeHieghtSlide() {
    if(($('.main-slider').length) && ($(window).width() < 576)) {
        // Рассчитываем высоту слайда при изменении ширины экрана
        $(window).resize(function (){
            adaptiveHeight();
        });

        // Выполняем тоже самое при первоначальной загрузке страницы
        $(document).ready(function () {
            adaptiveHeight();
        });
    }

    function adaptiveHeight() {
        var height_slider = 0,
            number,
            img,
            img_height = 0,
            min_height = 0;

        $('.main-slider-item').each( function (index) {
            // Находим минимальную высоту слайда
            img = $(this).find('img');
            img_height = $(img).height();

            if(index === 0) {
                if(img_height != 0)
                    min_height = img_height;
            }
            else if(min_height > img_height){
                if(img_height != 0)
                    min_height = img_height;
            }
        });

        // Устанавливаем высоту всех слайдов равной найденной
        $('.main-slider-item').each( function () {
            $(this).height(min_height);
        });
        // Размещаем элементы по середине слайда
        verticalAlignSlider();
    }
}

// Сворачивание/разворачивание меню в футере (на мобильном разрешении)
function opneFooterMenu() {
    $('.headline-footer-menu').click(function () {
        if($(window).width() < 576) {
            var parent = $(this).parent('ul');
            $(parent)
                .find('.item-footer-menu')
                .slideToggle();

            $(parent)
                .find('.fa')
                .toggleClass('rotate');
        }
    })
}

// Открытие выпадающего меню в header
function openSubMenuHeader() {
    // Декстопная версия
    $('nav ul li').mouseover(function () {
        $(this).find('.hide-menu').css({'display' : 'block', 'opacity' : '1'});
    });
    $('nav > ul > li').mouseout(function () {
        $(this).find('.hide-menu').css({'display' : 'none', 'opacity' : '0'});
    })

    // Мобильная версия
    var flag = 'close';
    $('.mobile-menu li').click(function () {
        if(flag === 'close') {
            $(this).find('.hide-menu-mobile').slideToggle();
            $(this).find('.fa-caret-down').css('transform', 'rotate(180deg)');
            $(this).children('a').css('text-decoration','underline');
            flag = 'open';
        }
        else if(flag === 'open'){
            $(this).find('.hide-menu-mobile').slideToggle();
            $(this).find('.fa-caret-down').css('transform', 'rotate(0deg)');
            $(this).children('a').css('text-decoration','none');
            flag = 'close';
        }

    });
}

// Плавные скролл к якорю
function scrollAnchor() {
    // Плавный скролл при переходе на другую страницу
    $(window).on('load', function () {
        var id_block = window.location.hash;
        if (id_block) {
            $('html, body').animate({
                scrollTop: $(id_block + "-block").offset().top
            }, 1000, 'swing', function () {});
        }
    });
    // Плавный скролл к якорю на открытой странице (декстоп)
    $('nav a').click(function(){
        var link = $(this).attr('href');

        var from = link.search('#'),
            to = link.length,
            id = link.substring(from,to);

        if(id) {
            $('html, body').animate({
                scrollTop: $(id + "-block").offset().top
            }, 1000, 'swing', function () {});
        }
    });
    // Плавный скролл к якорю на открытой странице (мобилка)
    $('.mobile-menu a').click(function(){
        $('.mobile-menu').css('display','none');

        var link = $(this).attr('href'),
            from = link.search('#'),
            to = link.length,
            id = link.substring(from,to),
            height_menu = $('.mobile-menu').height(),
            scroll = $(id + "-block").offset().top + 10,
            full_scroll = scroll - height_menu;

        if(id) {
            $('html, body').animate({
                scrollTop: scroll
            }, 1000, 'swing', function () {});
        }
    });
}

// Открытие/закрытие списка подвидов продуктов на странице "Контракнтное производство"
function openSubTypeList() {
    $('.subtype').click(function () {
        var id_subtype = $(this).attr('data-subtype-id'),
            parent = $(this).closest('.block-info-product'),
            child = $(parent).find('*[data-subtype-parent="' + id_subtype + '"]');

        // Если нет дочерних элементов, прячем все блоки
        if(!child[0]) $('.subtype-product-list').slideUp();

        $(child).slideToggle();
    })
}

// Свернуть/Развернуть меню каталога
function expandMenuCatalog() {
    $('.expand-menu').click(function () {
        $('.list-type-product > ul').slideToggle();
        $('.expand-menu .fa').toggleClass('rotate');
    })
}

// Открытие разделов "Контрактное производство" при переходе по ссылке
function openSectionPage() {
    // Получить параметр из url
    var param = window.location.search,
        id_section = param.replace('?section=','');

    if(id_section != ''){
        // Скрываем все разделы, кроме указанного в параметре
        $('.block-info-product').each(function (index) {
            var id = $(this).attr('data-index');
            if(id === id_section) {
                $(this).removeClass('d-none');

                // Переместить треугольник
                var start_pos = $('.icon-product[data-index=' + id_section + ']').offset().left + ($('.icon-product').width() / 2) - 40;
                $('.triangle-top').css('left', start_pos);

                // Прокрутить страницу до выбранной секции
                var parent = $(this).closest('section'),
                    scroll = $(parent).offset().top;
                console.log(scroll);
                $('html, body').animate({ scrollTop: scroll }, 1000, 'swing', function () {});

                // Инициализация слайдера типов продуктов при открытии выбранной секции
                if(id_section != 0) {
                    var object = $(this).find('.slider-type-product');
                    if($(window).width() > 991) {
                        $(object).slick({
                            slidesToScroll: 1,
                            slidesToShow: 3,
                            dots: true
                        });
                    }
                    else if(($(window).width() < 992) && ($(window).width() > 767)) {
                        $(object).slick({
                            slidesToScroll: 1,
                            slidesToShow: 2,
                            dots: true
                        });
                    }
                }

            }
            else $(this).addClass('d-none');

        });
    }
}
