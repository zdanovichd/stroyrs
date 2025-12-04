<?php
defined('ABSPATH') || exit;
?>

<!DOCTYPE html>
<html>

<?php
get_template_part('template-parts/head');
?>

<body>
    <?php get_header() ?>
    <main class="page-contacts">

    <section class="breadcrumbs" aria-label="Навигация — хлебные крошки">
            <nav aria-label="breadcrumb">
                <?php woocommerce_breadcrumb(); ?>
            </nav>
        </section>

        <section class="contacts">
            <div class="contacts__wrapper">
                <div class="contacts__content">
                    <div class="contacts__header">
                        <h1 class="contacts__title">Контакты</h1>
                        <div></div>
                        <span>Официальная контактная<br> информация</span>
                    </div>

                    <div class="contacts__actions">
                        <div>
                            <a href="tel:+79067057786" class="contacts__phone">+7 (906) 705-77-86</a>
                            <span>Время работы: пн – пт 9:00 – 19:00</span>
                        </div>                        
                        <button class="button button--red contacts__button feedback-button" type="button"
                        data-modal="feedback-modal">
                            <span>Связаться с нами</span>
                            <span class="button__icon">
                                <svg viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 12.5L13 0.5M13 0.5V9.09701M13 0.5H3.91429" stroke="#FFFFFF"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </button>
                    </div>

                    <div class="contacts__info">
                        <div>
                            <span>Адрес производства:</span>
                            <a href="https://yandex.ru/maps/-/CLgQZLMy" target="_blank" class="contacts__address">г. Подольск, Нефтебазовский проезд, 8Бс11</a>
                        </div>
                        <div>
                            <span>Юридический адрес:</span>
                            <a href="https://yandex.ru/maps/-/CLRozB4w" target="_blank" class="contacts__address">г. Москва, уг. Горбунова, 2с3, оф. В412</a>
                        </div>
                    </div>

                    

                    <div class="contacts__divider">
                        <div class="contacts__divider-line contacts__divider-line--horizontal"></div>
                        <div class="contacts__divider-line contacts__divider-line--vertical"></div>
                    </div>

                    <a href="mailto:az@stroyrs.ru" class="contacts__email">az@stroyrs.ru</a>
                </div>

                <div class="contacts__map">
                    <iframe
                        src="https://yandex.ru/map-widget/v1/?um=constructor%3A9eb535b251d7b620439cc752bfa496ee28088a9ec148981542defb9f7913cb62&amp;source=constructor"
                        width="100%" height="535" frameborder="0"></iframe>
                </div>
            </div>
        </section>
        
        <section class="requisites">
            <div class="requisites__header">
                <h2 class="requisites__title"><span>Реквизиты</span> компании</h2>
            </div>
            <div class="requisites__wrapper">
                <div class="requisites__items">
                    <div class="requisites__item">
                        <p class="requisites__item-name">Полное наименование организации</p>
                        <p class="requisites__item-value">ООО СТРОЙРЕСУРС</p>
                    </div>
                    <div class="requisites__item">
                        <p class="requisites__item-name">Юридический адрес</p>
                        <p class="requisites__item-value"><a href="https://yandex.ru/maps/-/CLRozB4w" target="_blank">г. Москва, уг. Горбунова, 2с3, оф. В412</a></p>
                    </div>
                    <div class="requisites__item">
                        <p class="requisites__item-name">ОГРН</p>
                        <p class="requisites__item-value">1215000083902</p>
                    </div>
                    <div class="requisites__item">
                        <p class="requisites__item-name">ОКПО / ОКВЭД</p>
                        <p class="requisites__item-value">73675958</p>
                    </div>
                    <div class="requisites__item">
                        <p class="requisites__item-name">ИНН / КПП</p>
                        <p class="requisites__item-value">5047254779 / 504701001</p>
                    </div>
                    <div class="requisites__item">
                        <p class="requisites__item-name">Банк</p>
                        <p class="requisites__item-value">ПАО Сбербанк г. Москва</p>
                    </div>
                    <div class="requisites__item">
                        <p class="requisites__item-name">Корреспондентский счет</p>
                        <p class="requisites__item-value">30101810400000000225</p>
                    </div>
                    <div class="requisites__item">
                        <p class="requisites__item-name">Расчетный счет</p>
                        <p class="requisites__item-value">40702810740000111890</p>
                    </div>
                    <div class="requisites__item">
                        <p class="requisites__item-name">БИК</p>
                        <p class="requisites__item-value">04452225</p>
                    </div>
                    <div class="requisites__item">
                        <p class="requisites__item-name">Email / сайт</p>
                        <p class="requisites__item-value"><a href="mailto:az@stroyrs.ru">az@stroyrs.ru</a> / <a href="/">https://stroyrs.ru/</a></p>
                    </div>
                </div>
                <div class="requisites__links">
                    <a class="requisites__link requisites__link-accent" href="#">[Скачать реквизиты в PDF]</a>
                    <a class="requisites__link" href="/politika-konfidentsialnosti">Политика конфиденциальности</a>
                    <a class="requisites__link" href="/polzovatelskoe-soglashenie">Пользовательское соглашение</a>
                </div>
            </div>
        </section>

        <?php 
            get_template_part(
                'template-parts/comment-form', 
                '',
                array(
                    'title' => 'Хотите стать нашим партнером?',
                    'image' => get_template_directory_uri().'/assets/img/9d0fe67b4e51325d30b148e3539f4114f1c9d64d-_1_.webp',
                )
            );
        ?>

    </main>
    <?php get_footer() ?>
    <?php wp_footer() ?>

</body>

</html>