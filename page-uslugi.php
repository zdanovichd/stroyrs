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
    <main class="page-uslugi">

    <section class="breadcrumbs" aria-label="Навигация — хлебные крошки">
        <nav aria-label="breadcrumb">
            <?php woocommerce_breadcrumb(); ?>
        </nav>
    </section>

    <!-- <section class="uslugi">
        <h1 class="uslugi__title">Корзина</h1>
    </section> -->
    <section class="uslugi">
        <div class="uslugi__wrapper">
            <div class="uslugi__header">
                <div class="uslugi__title">
                    <h1>
                        <span>Услуги</span> металлообработки
                    </h1>
                </div>
            </div>
            <div class="uslugi__content">
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>
    </section>
        
        <?php 
            get_template_part(
                'template-parts/consult', 
                '',
                array(
                    'title' => 'Остались вопросы? Напишите нам!',
                    'image' => get_template_directory_uri().'/assets/img/consult.webp',
                )
            );
        ?>
    </main>
    <?php get_footer() ?>
    <?php wp_footer() ?>

</body>

</html>