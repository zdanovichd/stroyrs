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
    <main>
       
    <?php woocommerce_content(); ?>

    </main>
    <?php get_footer() ?>
    <?php wp_footer() ?>

</body>

</html>