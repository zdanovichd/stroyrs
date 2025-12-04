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
    <main class="page">
       
    <section class="breadcrumbs" aria-label="Навигация — хлебные крошки">
        <nav aria-label="breadcrumb">
            <?php woocommerce_breadcrumb(); ?>
        </nav>
    </section>
    <section class="page__content">
        <?php the_content(); ?>
    </section>

    </main>
    <?php get_footer() ?>
    <?php wp_footer() ?>

</body>

</html>