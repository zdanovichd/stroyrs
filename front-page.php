<!DOCTYPE html>
<html>

<?php 
    get_template_part('template-parts/head');
?>

<body>
    <?php get_header() ?>
    <main class="main-page">
        <section class="hero">
            <img class="hero__banner" src="<?php echo get_template_directory_uri(); ?>/assets/img/banner.webp" alt="">
            <div class="overlay overlay-hero"></div>
            <div class="hero__wrapper">
                <div class="hero__top">
                    <h1 class="hero__title"><span class="hero__title-highlight">Металл</span> для строительства <br>и
                        промышленности</h1>
                    <p class="hero__description">Изготовление, поставка и монтаж металлоконструкций. <br>Широкий
                        ассортимент металлопроката</p>
                </div>
                <div class="line"></div>
                <div class="hero__bottom">
                    <button class="hero__button hero__button--primary">
                        Рассчитать <br>стоимость
                        <svg viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 12.5L13 0.5M13 0.5V9.09701M13 0.5H3.91429" stroke="#FFFFFF"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <button class="hero__button hero__button--secondary">
                        Скачать <br>прайслист
                        <svg viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 12.5L13 0.5M13 0.5V9.09701M13 0.5H3.91429" stroke="#FFFFFF"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
        </section>

        <?php 
            get_template_part('template-parts/categories');
        ?>

        <?php 
            // get_template_part(
            //     'template-parts/popular-products', 
            //     '',
            //     array( // массив с параметрами
            //         'title' => '<span>Популярные</span> товары'
            //     )
            // );
        ?>


        <section class="advantages">
            <div class="advantages__hero">
                <img class="advantages__hero-image" src="<?php echo get_template_directory_uri(); ?>/assets/img/advantages.webp" alt="" />
            </div>

            <div class="advantages__wrapper">
                <div class="advantages__header">
                    <h2 class="advantages__title">Наши преимущества</h2>
                    <p class="advantages__subtitle">
                        У нас выгодные условия для постоянных заказчиков, так как мы ценим долгосрочные отношения и
                        делаем сотрудничество максимально комфортным.
                    </p>
                </div>

                <div class="advantages__list">
                    <article class="advantage-card">
                        <div class="advantage-card__number">01</div>
                        <div class="advantage-card__content">
                            <p class="advantage-card__title">Быстрая доставка продукции</p>
                            <p class="advantage-card__description">
                                Доставляем заказы в&nbsp;кратчайшие сроки&nbsp;&mdash; точно по&nbsp;графику, без
                                задержек и&nbsp;простоев на&nbsp;стройке. Ваш объект получает материалы тогда, когда это
                                нужно, а&nbsp;не&nbsp;когда удобно поставщику.
                            </p>
                        </div>
                    </article>

                    <article class="advantage-card">
                        <div class="advantage-card__number">02</div>
                        <div class="advantage-card__content">
                            <p class="advantage-card__title">Комплексная поставка стройматериалов</p>
                            <p class="advantage-card__description">
                                Закупайте всё необходимое в&nbsp;одном месте&nbsp;&mdash; широкий ассортимент
                                металлопроката. Экономьте время и&nbsp;бюджет, избегая множества мелких поставщиков
                                и&nbsp;согласований.
                            </p>
                        </div>
                    </article>

                    <article class="advantage-card">
                        <div class="advantage-card__number">03</div>
                        <div class="advantage-card__content">
                            <p class="advantage-card__title">Широкий ассортимент продукции</p>
                            <p class="advantage-card__description">
                                В&nbsp;нашем каталоге&nbsp;&mdash; полный спектр стройматериалов для любых задач:
                                от&nbsp;фундамента до&nbsp;финишной отделки, от&nbsp;металлопроката
                                до&nbsp;пиломатериалов и&nbsp;сухих смесей. Всё в&nbsp;наличии или под заказ
                                с&nbsp;минимальными сроками поставки.
                            </p>
                        </div>
                    </article>

                    <article class="advantage-card">
                        <div class="advantage-card__number">04</div>
                        <div class="advantage-card__content">
                            <p class="advantage-card__title">Вся продукция сертифицирована и&nbsp;соответствует ГОСТу
                            </p>
                            <p class="advantage-card__description">
                                Каждая позиция сопровождается сертификатами качества и&nbsp;соответствует действующим
                                ГОСТам.
                            </p>
                        </div>
                    </article>
                </div>
            </div>

        </section>

        <section class="projects">
            <div class="projects__header">
                <h2 class="projects__title">
                    Реализованные <span class="projects__title-accent">проекты</span>
                </h2>

                <div class="projects__controls">
                    <button class="projects__button projects__button--prev" aria-label="Предыдущий проект">
                        <svg viewBox="0 0 23 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21.5 6.5C22.0523 6.5 22.5 6.94772 22.5 7.5C22.5 8.05228 22.0523 8.5 21.5 8.5V7.5V6.5ZM0.792892 8.20711C0.402369 7.81658 0.402369 7.18342 0.792892 6.79289L7.15685 0.428932C7.54738 0.0384078 8.18054 0.0384078 8.57107 0.428932C8.96159 0.819457 8.96159 1.45262 8.57107 1.84315L2.91421 7.5L8.57107 13.1569C8.96159 13.5474 8.96159 14.1805 8.57107 14.5711C8.18054 14.9616 7.54738 14.9616 7.15685 14.5711L0.792892 8.20711ZM21.5 7.5V8.5H1.5V7.5V6.5H21.5V7.5Z"
                                fill="#F9F9F9" />
                        </svg>
                    </button>
                    <button class="projects__button projects__button--next" aria-label="Следующий проект">
                        <svg viewBox="0 0 23 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.5 6.5C0.947715 6.5 0.5 6.94772 0.5 7.5C0.5 8.05228 0.947715 8.5 1.5 8.5V7.5V6.5ZM22.2071 8.20711C22.5976 7.81658 22.5976 7.18342 22.2071 6.79289L15.8431 0.428932C15.4526 0.0384078 14.8195 0.0384078 14.4289 0.428932C14.0384 0.819457 14.0384 1.45262 14.4289 1.84315L20.0858 7.5L14.4289 13.1569C14.0384 13.5474 14.0384 14.1805 14.4289 14.5711C14.8195 14.9616 15.4526 14.9616 15.8431 14.5711L22.2071 8.20711ZM1.5 7.5V8.5H21.5V7.5V6.5H1.5V7.5Z"
                                fill="#F9F9F9" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="projects__slider swiper">
                <div class="swiper-wrapper">
                    <article class="project-card swiper-slide">
                        <a href="#" class="project-card__link">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/71d3debfe5770f702575ab5ed74c08be5b0c9e93.jpg" alt="" class="project-card__image" />

                            <div class="project-card__content">
                                <div class="project-card__header">
                                    <p class="project-card__name">Гостинично-деловой комплекс Hilton Moscow Strogino</p>
                                    <time class="project-card__year" datetime="2024">2024</time>
                                </div>
                                <p class="project-card__description">
                                    Изготовление, поставка и монтаж металлоконструкции для перепланировки помещений спортивного зала
                                </p>
                            </div>
                        </a>
                    </article>

                    <article class="project-card swiper-slide">
                        <a href="#" class="project-card__link">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/2de8c231d98b089186a82d9516ef02d180a506fa.jpg" alt="" class="project-card__image" />

                            <div class="project-card__content">
                                <div class="project-card__header">
                                    <p class="project-card__name">Металлопрокат для школ</p>
                                    <time class="project-card__year" datetime="2024">2024</time>
                                </div>
                                <p class="project-card__description">
                                    Поставка металлопроката для программы реконструкции школ 
                                </p>
                            </div>
                        </a>
                    </article>

                    <article class="project-card swiper-slide">
                        <a href="#" class="project-card__link">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/71d3debfe5770f702575ab5ed74c08be5b0c9e93.jpg" alt="" class="project-card__image" />

                            <div class="project-card__content">
                                <div class="project-card__header">
                                    <p class="project-card__name">Городские поликлиники</p>
                                    <time class="project-card__year" datetime="2024">2024</time>
                                </div>
                                <p class="project-card__description">
                                    Поставка металлопроката для модернизации медицинских учреждений Москвы
                                </p>
                            </div>
                        </a>
                    </article>

                    <article class="project-card swiper-slide">
                        <a href="#" class="project-card__link">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/2de8c231d98b089186a82d9516ef02d180a506fa.jpg" alt="" class="project-card__image" />

                            <div class="project-card__content">
                                <div class="project-card__header">
                                    <p class="project-card__name">СберСити</p>
                                    <time class="project-card__year" datetime="2024">2024</time>
                                </div>
                                <p class="project-card__description">
                                    Более 1000 тонн металлопроката для строительства квартала СБЕРСИТИ
                                </p>
                            </div>
                        </a>
                    </article>

                    <article class="project-card swiper-slide">
                        <a href="#" class="project-card__link">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/71d3debfe5770f702575ab5ed74c08be5b0c9e93.jpg" alt="" class="project-card__image" />

                            <div class="project-card__content">
                                <div class="project-card__header">
                                    <p class="project-card__name">ОЗЭП на станции «Столбово»</p>
                                    <time class="project-card__year" datetime="2024">2024</time>
                                </div>
                                <p class="project-card__description">
                                    Строительные материалы для ОЗЭП на станции «Столбово» — объединенного здания эксплуатационного персонала Троицкой линии метрополитена.
                                </p>
                            </div>
                        </a>
                    </article>
                </div>
            </div>
        </section>

        <section class="buy-metal">
            <div class="buy-metal__wrapper">
                <div class="buy-metal__top">
                    <div class="buy-metal__image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/86c7a80cfff060577bb822c2e683dd3f89d5462b.webp"
                            alt="Пример металлопроката">
                    </div>
                    <div class="buy-metal__content">
                        <h2 class="buy-metal__title">Как купить <br>металлопрокат <br>в розницу и оптом?</h2>
                        <p class="buy-metal__text">
                            Мы предлагаем выгодные условия для покупки металлопроката и строительных материалов как для
                            розничных, так и для оптовых клиентов. Для юридических лиц возможны индивидуальные условия
                            по скидки и отсрочки платежа. 
                            <br><br>
                            Поставляется продукция металлопроката со складов Москвы и других регионов, где находится в
                            условиях, обеспечивающих надежность хранения и быстроту отгрузки.
                        </p>
                        <div class="buy-metal__buttons">
                            <a href="#" class="button button--red">Скачать прайс-лист</a>
                            <button href="#" class="button button--light feedback-button" type="button"
                                data-modal="feedback-modal">Задать вопрос</button>
                        </div>
                    </div>
                </div>

                <div class="buy-metal__bottom">
                    <div class="order">
                        <div class="order__left">
                            <h2 class="order__title">Как сделать заказ?</h2>
                            <a href="#" class="button button--light orders__button">Перейти в каталог</a>
                            <div class="order__controls">
                                <button class="order__button order__button--prev" aria-label="Предыдущий проект">
                                    <svg viewBox="0 0 23 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M21.5 6.5C22.0523 6.5 22.5 6.94772 22.5 7.5C22.5 8.05228 22.0523 8.5 21.5 8.5V7.5V6.5ZM0.792892 8.20711C0.402369 7.81658 0.402369 7.18342 0.792892 6.79289L7.15685 0.428932C7.54738 0.0384078 8.18054 0.0384078 8.57107 0.428932C8.96159 0.819457 8.96159 1.45262 8.57107 1.84315L2.91421 7.5L8.57107 13.1569C8.96159 13.5474 8.96159 14.1805 8.57107 14.5711C8.18054 14.9616 7.54738 14.9616 7.15685 14.5711L0.792892 8.20711ZM21.5 7.5V8.5H1.5V7.5V6.5H21.5V7.5Z"
                                            fill="#F9F9F9" />
                                    </svg>
                                </button>
                                <button class="order__button order__button--next" aria-label="Следующий проект">
                                    <svg viewBox="0 0 23 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.5 6.5C0.947715 6.5 0.5 6.94772 0.5 7.5C0.5 8.05228 0.947715 8.5 1.5 8.5V7.5V6.5ZM22.2071 8.20711C22.5976 7.81658 22.5976 7.18342 22.2071 6.79289L15.8431 0.428932C15.4526 0.0384078 14.8195 0.0384078 14.4289 0.428932C14.0384 0.819457 14.0384 1.45262 14.4289 1.84315L20.0858 7.5L14.4289 13.1569C14.0384 13.5474 14.0384 14.1805 14.4289 14.5711C14.8195 14.9616 15.4526 14.9616 15.8431 14.5711L22.2071 8.20711ZM1.5 7.5V8.5H21.5V7.5V6.5H1.5V7.5Z"
                                            fill="#F9F9F9" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="order__right">
                            <div class="order__steps swiper">
                                <div class="swiper-wrapper">
                                    <div class="order__step swiper-slide">
                                        <div class="order__number">01</div>
                                        <div class="order__line"></div>
                                        <p class="order__text">Выберите металл и его количество</p>
                                    </div>
                                    <div class="order__step swiper-slide">
                                        <div class="order__number">02</div>
                                        <div class="order__line"></div>
                                        <p class="order__text">Укажите способ доставки</p>
                                    </div>
                                    <div class="order__step swiper-slide">
                                        <div class="order__number">03</div>
                                        <div class="order__line"></div>
                                        <p class="order__text">
                                            Оплатите заказ любым удобным способом
                                            Подробнее: <a href="#" class="order__link">доставка, оплата</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="button button--light orders__button">Перейти в каталог</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- <section class="stocks">
            <div class="stocks__wrapper">
                <div class="stocks__header">
                    <h2 class="stocks__title">
                        Наши действующие акции
                    </h2>
                    <a href="#" class="stocks__link">
                        Смотреть все акции
                        <svg viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 12.5L13 0.5M13 0.5V9.09701M13 0.5H3.91429" stroke="#FFFFFF"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
                <div class="stocks__content">
                    <article class="stock">
                        <a href="#" class="stock__link">
                            <div class="stock__content">
                                <h3 class="stock__title">Наименование <br>акции</h3>
                                <div class="stock__description">
                                    <p>Описание и условия</p>
                                </div>
                            </div>
                            <div class="stock__image">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/stock.webp" alt="">
                                <div class="stock__icon">
                                    <svg viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 12.5L13 0.5M13 0.5V9.09701M13 0.5H3.91429" stroke="#FFFFFF"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </article>
                    <article class="stock">
                        <a href="#" class="stock__link">
                            <div class="stock__content">
                                <h3 class="stock__title">Наименование <br>акции</h3>
                                <div class="stock__description">
                                    <p>Описание и условия</p>
                                </div>
                            </div>
                            <div class="stock__image">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/stock.webp" alt="">
                                <div class="stock__icon">
                                    <svg viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 12.5L13 0.5M13 0.5V9.09701M13 0.5H3.91429" stroke="#FFFFFF"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </article>
                </div>
            </div>
        </section> -->

        <section class="about">
            <div class="about__top">
                <div class="about__content">
                    <h2 class="about__title">О нас</h2>
                    <p class="about__text">
                        Компания Стройресурс на рынке металлопроката, металлоконструкций и стройматериалов с 2021 года.
                        Профиль нашей деятельности оптово-розничная торговля. Мы предлагаем широкий ассортимент
                        сертифицированной продукции российских и зарубежных производителей. 
                        <br><br>
                        Наш секрет успеха это крепкий сплочённый коллектив профессионалов. Мы готовы к решению самых
                        сложных задач. Все наши клиенты знают нас, как надёжного, ответственного партнёра уже длительное
                        время.
                    </p>
                    <a href="#" class="button button--red about__button">
                        <span>Узнать больше</span>
                        <span class="button__icon">
                            <svg viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 12.5L13 0.5M13 0.5V9.09701M13 0.5H3.91429" stroke="#FFFFFF"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </a>
                </div>

                <div class="about__image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/advantages.webp" alt="О компании">
                </div>
            </div>

            <div class="about__stats">
                <div class="about__stat about__stat--red">
                    <div class="about__number">40+</div>
                    <div class="about__label">
                        Единиц техники <br>в нашем автопарке
                    </div>
                </div>

                <div class="about__stat about__stat--light">
                    <div class="about__number about__number--small">
                        <span>до</span>
                        30
                        <span>дней</span>
                    </div>
                    <div class="about__label">
                        Можем работать <br>в отсрочку
                    </div>
                </div>

                <div class="about__stat about__stat--dark">
                    <div class="about__number">4+</div>
                    <div class="about__label">Года на рынке</div>
                </div>
            </div>
        </section>

        <section class="partners">
            <div class="partners__wrapper">
                <div class="partners__header">
                    <h2 class="partners__title">
                        Наши <span>партнеры</span>
                    </h2>
                </div>
                <div class="partners__content">
                    <div class="partner">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partners/sberbank.svg" alt="СберБанк">
                    </div>
                    <div class="partner">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partners/metserv.svg" alt="Металл Сервис">
                    </div>
                    <div class="partner">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partners/dipos.svg" alt="Дипос">
                    </div>
                    <div class="partner">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partners/evraz.svg" alt="Евраз">
                    </div>
                </div>
            </div>
        </section>

        <section class="consult">
            <div class="consult__wrapper">
                <div class="consult__image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/consult.webp" alt="Консультация специалистов">
                </div>
                <div class="consult__content">
                    <p class="consult__text">
                        Нужна помощь в подборе? Наши специалисты проконсультируют вас по любым позициям.
                    </p>
                    <form class="consult__form" action="#" method="post">
                        <div class="consult__fields">
                            <label class="consult__field">
                                <input type="text" name="name" placeholder="Имя" required>
                            </label>

                            <label class="consult__field">
                                <input type="tel" name="phone" placeholder="Телефон" required>
                            </label>

                            <label class="consult__field">
                                <input type="email" name="email" placeholder="Email" required>
                            </label>

                            <button type="submit" class="consult__button">Отправить заявку</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section class="reviews">
            <div class="reviews__header">
                <h2 class="reviews__title">
                    <span class="reviews__title-accent">Отзывы</span> наших клиентов
                </h2>
                <div class="reviews__controls">
                    <button class="reviews__button reviews__button--prev" aria-label="Предыдущий проект">
                        <svg viewBox="0 0 23 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21.5 6.5C22.0523 6.5 22.5 6.94772 22.5 7.5C22.5 8.05228 22.0523 8.5 21.5 8.5V7.5V6.5ZM0.792892 8.20711C0.402369 7.81658 0.402369 7.18342 0.792892 6.79289L7.15685 0.428932C7.54738 0.0384078 8.18054 0.0384078 8.57107 0.428932C8.96159 0.819457 8.96159 1.45262 8.57107 1.84315L2.91421 7.5L8.57107 13.1569C8.96159 13.5474 8.96159 14.1805 8.57107 14.5711C8.18054 14.9616 7.54738 14.9616 7.15685 14.5711L0.792892 8.20711ZM21.5 7.5V8.5H1.5V7.5V6.5H21.5V7.5Z"
                                fill="#F9F9F9" />
                        </svg>
                    </button>
                    <button class="reviews__button reviews__button--next" aria-label="Следующий проект">
                        <svg viewBox="0 0 23 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.5 6.5C0.947715 6.5 0.5 6.94772 0.5 7.5C0.5 8.05228 0.947715 8.5 1.5 8.5V7.5V6.5ZM22.2071 8.20711C22.5976 7.81658 22.5976 7.18342 22.2071 6.79289L15.8431 0.428932C15.4526 0.0384078 14.8195 0.0384078 14.4289 0.428932C14.0384 0.819457 14.0384 1.45262 14.4289 1.84315L20.0858 7.5L14.4289 13.1569C14.0384 13.5474 14.0384 14.1805 14.4289 14.5711C14.8195 14.9616 15.4526 14.9616 15.8431 14.5711L22.2071 8.20711ZM1.5 7.5V8.5H21.5V7.5V6.5H1.5V7.5Z"
                                fill="#F9F9F9" />
                        </svg>
                    </button>
                </div>
                <a href="#" class="reviews__link ">
                    Оставить отзыв
                    <svg viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 12.5L13 0.5M13 0.5V9.09701M13 0.5H3.91429" stroke="#FFFFFF" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
            <div class="reviews__slider swiper">
                <div class="swiper-wrapper">
                    <article class="review-card swiper-slide">
                        <div class="review-card__header">
                            <div class="review-card__info">
                                <p class="review-card__name">Ирина</p>
                                <div class="review-card__rating">
                                    <span class="review-card__star">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </span>
                                    <span class="review-card__star">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </span>
                                    <span class="review-card__star">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </span>
                                    <span class="review-card__star">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </span>
                                    <span class="review-card__star">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <time class="review-card__date" datetime="2025-06-2">22.06.2025</time>
                        </div>
                        <p class="review-card__text">
                            Заказывала профильную трубу для навеса — всё пришло вовремя, ровно как обещали. Менеджер
                            Дарья подробно проконсультировала по толщине стенки и помогла подобрать нужный размер.
                            Доставка — на следующий день, водитель даже помог выгрузить. Металл без ржавчины, чистый, с
                            сертификатом. Очень довольна!
                        </p>
                    </article>

                    <article class="review-card swiper-slide">
                        <div class="review-card__header">
                            <div class="review-card__info">
                                <p class="review-card__name">Сергей В.</p>
                                <div class="review-card__rating">
                                    <span class="review-card__star">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </span>
                                    <span class="review-card__star">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </span>
                                    <span class="review-card__star">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </span>
                                    <span class="review-card__star">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </span>
                                    <span class="review-card__star">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <time class="review-card__date" datetime="2025-03-18">18.03.2025</time>
                        </div>
                        <p class="review-card__text">
                            Брал швеллер и уголок на монтаж каркаса. Менеджер согласовал детали по WhatsApp — быстро и
                            без лишних слов. Даже сертификат скинули в тот же день.
                        </p>
                    </article>

                    <article class="review-card swiper-slide">
                        <div class="review-card__header">
                            <div class="review-card__info">
                                <p class="review-card__name">Константин</p>
                                <div class="review-card__rating">
                                    <span class="review-card__star">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </span>
                                    <span class="review-card__star">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </span>
                                    <span class="review-card__star">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </span>
                                    <span class="review-card__star">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </span>
                                    <span class="review-card__star">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <time class="review-card__date" datetime="2024-04-06">06.04.2024</time>
                        </div>
                        <p class="review-card__text">
                            Рекомендую, большой выбор товара в наличии и доставляют в срок. Все вопросы решают
                            оперативно.
                        </p>
                    </article>

                    <article class="review-card swiper-slide">
                        <div class="review-card__header">
                            <div class="review-card__info">
                                <p class="review-card__name">Владислав</p>
                                <div class="review-card__rating">
                                    <span class="review-card__star">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </span>
                                    <span class="review-card__star">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </span>
                                    <span class="review-card__star">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </span>
                                    <span class="review-card__star">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </span>
                                    <span class="review-card__star">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <time class="review-card__date" datetime="2024-06-12">12.06.2024</time>
                        </div>
                        <p class="review-card__text">
                            Металл ровный, без дефектов, упакован аккуратно. Обслуживание на высоте — от звонка до
                            выгрузки.
                        </p>
                    </article>

                    <article class="review-card swiper-slide">
                        <div class="review-card__header">
                            <div class="review-card__info">
                                <p class="review-card__name">Артём</p>
                                <div class="review-card__rating">
                                    <span class="review-card__star">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </span>
                                    <span class="review-card__star">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </span>
                                    <span class="review-card__star">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </span>
                                    <span class="review-card__star">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </span>
                                    <span class="review-card__star">
                                        <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18 7.207C17.9911 7.41898 17.879 7.66108 17.6616 7.85228C16.791 8.61705 15.9199 9.38111 15.0484 10.1445C14.6415 10.5015 14.234 10.858 13.826 11.2139C13.7677 11.2646 13.7528 11.3095 13.7708 11.3882C14.084 12.757 14.3947 14.1263 14.7028 15.4962C14.7652 15.7715 14.8266 16.0473 14.894 16.3217C14.9923 16.728 14.8668 17.1295 14.5501 17.3568C14.2017 17.6067 13.8317 17.623 13.4634 17.4046C12.2903 16.7072 11.1187 16.007 9.94856 15.3041C9.67539 15.1408 9.39888 14.9814 9.13025 14.8122C9.04039 14.7556 8.97514 14.7551 8.88289 14.8105C7.45993 15.6647 6.03387 16.5136 4.61258 17.3675C4.31073 17.5487 4.00243 17.6168 3.6688 17.4798C3.22738 17.2987 2.99675 16.8346 3.10645 16.3523C3.41666 14.9872 3.72735 13.622 4.03852 12.2569C4.104 11.9701 4.16256 11.6812 4.23354 11.3965C4.25409 11.3143 4.23975 11.2658 4.17737 11.2116C3.64267 10.7465 3.10932 10.2798 2.57732 9.81153C1.8319 9.15717 1.08362 8.50735 0.342505 7.84821C0.0399405 7.57959 -0.0747758 7.23663 0.0492612 6.84445C0.173298 6.45226 0.450529 6.21614 0.863986 6.17359C1.59674 6.09855 2.33068 6.0357 3.06415 5.96854C3.78973 5.9021 4.51531 5.83614 5.24089 5.77065C5.48275 5.74891 5.72461 5.72453 5.96671 5.70613C6.04462 5.70039 6.08621 5.66621 6.11536 5.59523C6.77259 4.05086 7.43094 2.50713 8.09039 0.964041C8.27251 0.53744 8.59778 0.299165 9.01123 0.309919C9.42469 0.320674 9.72295 0.522622 9.8869 0.902381C10.3331 1.93554 10.7736 2.9711 11.2159 4.00617C11.4411 4.53196 11.6667 5.05917 11.888 5.58735C11.9219 5.6686 11.9704 5.70015 12.0553 5.70684C12.6384 5.75623 13.2214 5.80802 13.8042 5.86219C14.6528 5.9393 15.5013 6.01705 16.3497 6.09544C16.6193 6.11934 16.8891 6.14324 17.158 6.17336C17.647 6.23119 18.0038 6.63915 18 7.207Z"
                                                fill="var(--color-accent)" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <time class="review-card__date" datetime="2025-02-20">20.02.2025</time>
                        </div>
                        <p class="review-card__text">
                             Компания надежная, рекомендую строителям и частникам!
                        </p>
                    </article>
                </div>
                <a href="#" class="reviews__link ">
                    Оставить отзыв
                    <svg viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 12.5L13 0.5M13 0.5V9.09701M13 0.5H3.91429" stroke="#FFFFFF" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </a>
            </div>

        </section>

        <!-- <section class="blog">
            <div class="blog__header">
                <h2 class="blog__title">
                    Блог
                </h2>

                <div class="blog__controls">
                    <button class="blog__button blog__button--prev" aria-label="Предыдущий проект">
                        <svg viewBox="0 0 23 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21.5 6.5C22.0523 6.5 22.5 6.94772 22.5 7.5C22.5 8.05228 22.0523 8.5 21.5 8.5V7.5V6.5ZM0.792892 8.20711C0.402369 7.81658 0.402369 7.18342 0.792892 6.79289L7.15685 0.428932C7.54738 0.0384078 8.18054 0.0384078 8.57107 0.428932C8.96159 0.819457 8.96159 1.45262 8.57107 1.84315L2.91421 7.5L8.57107 13.1569C8.96159 13.5474 8.96159 14.1805 8.57107 14.5711C8.18054 14.9616 7.54738 14.9616 7.15685 14.5711L0.792892 8.20711ZM21.5 7.5V8.5H1.5V7.5V6.5H21.5V7.5Z"
                                fill="#F9F9F9" />
                        </svg>
                    </button>
                    <button class="blog__button blog__button--next" aria-label="Следующий проект">
                        <svg viewBox="0 0 23 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.5 6.5C0.947715 6.5 0.5 6.94772 0.5 7.5C0.5 8.05228 0.947715 8.5 1.5 8.5V7.5V6.5ZM22.2071 8.20711C22.5976 7.81658 22.5976 7.18342 22.2071 6.79289L15.8431 0.428932C15.4526 0.0384078 14.8195 0.0384078 14.4289 0.428932C14.0384 0.819457 14.0384 1.45262 14.4289 1.84315L20.0858 7.5L14.4289 13.1569C14.0384 13.5474 14.0384 14.1805 14.4289 14.5711C14.8195 14.9616 15.4526 14.9616 15.8431 14.5711L22.2071 8.20711ZM1.5 7.5V8.5H21.5V7.5V6.5H1.5V7.5Z"
                                fill="#F9F9F9" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="blog__slider swiper">
                <div class="swiper-wrapper">
                    <article class="post-card swiper-slide">
                        <a href="#" class="post-card__link">
                            <div class="post-card__image">
                                <img src="https://placehold.co/320x283" alt="">
                                <div class="post-card__icon">
                                    <svg viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 12.5L13 0.5M13 0.5V9.09701M13 0.5H3.91429" stroke="#FFFFFF"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                            <div class="post-card__content">
                                <div class="post-card__header">
                                    <h3 class="post-card__name">Название статьи</h3>
                                    <time class="post-card__year" datetime="2025-01-02">01.02.2025</time>
                                </div>
                                <p class="post-card__description">
                                    Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые
                                    модификации, например, юмористические вставки или слова....
                                </p>
                            </div>
                        </a>
                    </article>

                    <article class="post-card swiper-slide">
                        <a href="#" class="post-card__link">
                            <div class="post-card__image">
                                <img src="https://placehold.co/320x283" alt="">
                                <div class="post-card__icon">
                                    <svg viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 12.5L13 0.5M13 0.5V9.09701M13 0.5H3.91429" stroke="#FFFFFF"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                            <div class="post-card__content">
                                <div class="post-card__header">
                                    <h3 class="post-card__name">Название статьи</h3>
                                    <time class="post-card__year" datetime="2025-01-02">01.02.2025</time>
                                </div>
                                <p class="post-card__description">
                                    Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые
                                    модификации, например, юмористические вставки или слова....
                                </p>
                            </div>
                        </a>
                    </article>

                    <article class="post-card swiper-slide">
                        <a href="#" class="post-card__link">
                            <div class="post-card__image">
                                <img src="https://placehold.co/320x283" alt="">
                                <div class="post-card__icon">
                                    <svg viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 12.5L13 0.5M13 0.5V9.09701M13 0.5H3.91429" stroke="#FFFFFF"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                            <div class="post-card__content">
                                <div class="post-card__header">
                                    <h3 class="post-card__name">Название статьи</h3>
                                    <time class="post-card__year" datetime="2025-01-02">01.02.2025</time>
                                </div>
                                <p class="post-card__description">
                                    Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые
                                    модификации, например, юмористические вставки или слова....
                                </p>
                            </div>
                        </a>
                    </article>

                    <article class="post-card swiper-slide">
                        <a href="#" class="post-card__link">
                            <div class="post-card__image">
                                <img src="https://placehold.co/320x283" alt="">
                                <div class="post-card__icon">
                                    <svg viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 12.5L13 0.5M13 0.5V9.09701M13 0.5H3.91429" stroke="#FFFFFF"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                            <div class="post-card__content">
                                <div class="post-card__header">
                                    <h3 class="post-card__name">Название статьи</h3>
                                    <time class="post-card__year" datetime="2025-01-02">01.02.2025</time>
                                </div>
                                <p class="post-card__description">
                                    Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые
                                    модификации, например, юмористические вставки или слова....
                                </p>
                            </div>
                        </a>
                    </article>

                    <article class="post-card swiper-slide">
                        <a href="#" class="post-card__link">
                            <div class="post-card__image">
                                <img src="https://placehold.co/320x283" alt="">
                                <div class="post-card__icon">
                                    <svg viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 12.5L13 0.5M13 0.5V9.09701M13 0.5H3.91429" stroke="#FFFFFF"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                            <div class="post-card__content">
                                <div class="post-card__header">
                                    <h3 class="post-card__name">Название статьи</h3>
                                    <time class="post-card__year" datetime="2025-01-02">01.02.2025</time>
                                </div>
                                <p class="post-card__description">
                                    Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые
                                    модификации, например, юмористические вставки или слова....
                                </p>
                            </div>
                        </a>
                    </article>

                    <article class="post-card swiper-slide">
                        <a href="#" class="post-card__link">
                            <div class="post-card__image">
                                <img src="https://placehold.co/320x283" alt="">
                                <div class="post-card__icon">
                                    <svg viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 12.5L13 0.5M13 0.5V9.09701M13 0.5H3.91429" stroke="#FFFFFF"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                            <div class="post-card__content">
                                <div class="post-card__header">
                                    <h3 class="post-card__name">Название статьи</h3>
                                    <time class="post-card__year" datetime="2025-01-02">01.02.2025</time>
                                </div>
                                <p class="post-card__description">
                                    Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые
                                    модификации, например, юмористические вставки или слова....
                                </p>
                            </div>
                        </a>
                    </article>
                </div>
            </div>
        </section> -->

        <section class="contacts">
            <div class="contacts__wrapper">
                <div class="contacts__content">
                    <h2 class="contacts__title">Контакты</h2>

                    <div class="contacts__info">
                        <a href="tel:+74953637297" class="contacts__phone">8 (495) 363-72-97</a>
                        <a href="https://yandex.ru/maps/-/CLRozB4w" class="contacts__address">г. Москва, ул. Горбунова
                            2, стр. 3</a>
                    </div>

                    <button class="button button--red contacts__button feedback-button" type="button"
                        data-modal="feedback-modal">
                        <span>Заказать звонок</span>
                        <span class="button__icon">
                            <svg viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 12.5L13 0.5M13 0.5V9.09701M13 0.5H3.91429" stroke="#FFFFFF"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </button>

                    <div class="contacts__divider">
                        <div class="contacts__divider-line contacts__divider-line--horizontal"></div>
                        <div class="contacts__divider-line contacts__divider-line--vertical"></div>
                    </div>

                    <a href="mailto:info@stroyrs.ru" class="contacts__email">info@stroyrs.ru</a>
                </div>

                <div class="contacts__map">
                    <iframe
                        src="https://yandex.ru/map-widget/v1/?um=constructor%3A9eb535b251d7b620439cc752bfa496ee28088a9ec148981542defb9f7913cb62&amp;source=constructor"
                        width="100%" height="535" frameborder="0"></iframe>
                </div>
            </div>
        </section>

        <section class="faqsection">
            <div class="faqsection__wrapper">
                <div class="faqsection__inner">
                    <div class="faqsection__content">
                        <h2 class="faqsection__title">Часто задаваемые <br><span>вопросы</span></h2>
                    </div>
                </div>
                <div class="faqsection__inner">
                    <div class="accordion __active">
                        <div class="accordion__inner">
                            <h3 class="accordion__question">Какой минимальный объем товаров Вы отгружаете?</h3>
                            <button class="accordion__toggle">
                                <svg viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="44" height="44" rx="22" fill="none" fill-opacity="0.19" />
                                    <path d="M22 12V32M12 22H32" stroke="black" stroke-width="2"
                                        stroke-linecap="round" />
                                </svg>
                            </button>
                        </div>
                        <div class="accordion__answer">
                            <p>В нашей компании Вы можете приобрести металлопрокат от 1 метра. Но стоит заметить, что
                                некоторые категории товаров отпускаются кратно минимальной длине (некоторые виды
                                профильных труб и металлических уголков отпускаются кратно 3-ем метрам)</p>
                        </div>
                    </div>
                    <div class="accordion">
                        <div class="accordion__inner">
                            <h3 class="accordion__question">Металлопрокат каких производителей вы продаете?</h3>
                            <button class="accordion__toggle">
                                <svg viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="44" height="44" rx="22" fill="none" fill-opacity="0.19" />
                                    <path d="M22 12V32M12 22H32" stroke="black" stroke-width="2"
                                        stroke-linecap="round" />
                                </svg>

                            </button>
                        </div>
                        <div class="accordion__answer">
                            <p>Наша компания сотрудничает с ведущими производителями металлопроката России. Основными
                                поставщиками нашей продукции являются заводы НЛМК, Северсталь, ММК, Тула-Сталь, Мечел,
                                Евраз и пр. Все поставки сопровождаются соответствующими сертификатами, подтверждающими
                                качество представленных товаров.</p>
                        </div>
                    </div>
                    <div class="accordion">
                        <div class="accordion__inner">
                            <h3 class="accordion__question">Как узнать стоимость доставки?</h3>
                            <button class="accordion__toggle">
                                <svg viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="44" height="44" rx="22" fill="none" fill-opacity="0.19" />
                                    <path d="M22 12V32M12 22H32" stroke="black" stroke-width="2"
                                        stroke-linecap="round" />
                                </svg>

                            </button>
                        </div>
                        <div class="accordion__answer">
                            <p>Предварительную стоимость доставки Вы можете узнать на сайте в разделе Доставка. Очень
                                часто итоговая стоимость оказывается ниже предварительной (попутная доставка), о чем Вам
                                сообщит менеджер отдела продаж после согласования деталей заказа.</p>
                        </div>
                    </div>
                    <div class="accordion">
                        <div class="accordion__inner">
                            <h3 class="accordion__question">Сколько стоит резка металлопроката?</h3>
                            <button class="accordion__toggle">
                                <svg viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="44" height="44" rx="22" fill="none" fill-opacity="0.19" />
                                    <path d="M22 12V32M12 22H32" stroke="black" stroke-width="2"
                                        stroke-linecap="round" />
                                </svg>

                            </button>
                        </div>
                        <div class="accordion__answer">
                            <p>Резка рассчитывается индивидуально в зависимости от сложности, способа резки и объёма
                                заказа.</p>
                        </div>
                    </div>
                    <div class="accordion">
                        <div class="accordion__inner">
                            <h3 class="accordion__question">Каким образом можно получить сертификат на металлопрокат,
                                приобретенный в компании Стройресурс?</h3>
                            <button class="accordion__toggle">
                                <svg viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="44" height="44" rx="22" fill="none" fill-opacity="0.19" />
                                    <path d="M22 12V32M12 22H32" stroke="black" stroke-width="2"
                                        stroke-linecap="round" />
                                </svg>

                            </button>
                        </div>
                        <div class="accordion__answer">
                            <p>Все сертификаты на продукцию могут быть предоставлены в электронном или печатном виде по
                                предварительному запросу у менеджера отдела продаж компании. Также по многим позициям
                                товаров Вы можете найти и скачать сертификаты непосредственно в карточке товара на сайте
                                нашего интернет магазина.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php get_footer() ?>
    <?php wp_footer() ?>
</body>

</html>