<?php /* Template Name: Page with social footer */

get_header();
?>

<main class="main_singular" id="site-content" role="main">
    <?php get_template_part('template-parts/sidebar') ?>

    <div class="main-singular_content" id="posts-container">
        <?php

        if (have_posts()) {

            while (have_posts()) {
                the_post();

                get_template_part('template-parts/content-no-header', get_post_type());
            }
        }

        ?>
    </div>

</main><!-- #site-content -->
<?php get_template_part( 'template-parts/social-footer'); ?>

<?php get_template_part('template-parts/footer-menus-widgets'); ?>

<?php get_footer(); ?>