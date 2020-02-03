<?php

/**
 * Novidades
 */

get_header();
?>

<main class="main_singular" id="site-content" role="main">
    <?php get_template_part('template-parts/sidebar') ?>

    <div class="main-singular_content" id="posts-container">

        <?php

        get_template_part('template-parts/content-modal-novidades');

        ?>


        <?php get_template_part('template-parts/pagination'); ?>

</main><!-- #site-content -->

<?php get_template_part('template-parts/footer-menus-widgets'); ?>

<?php
get_footer();
