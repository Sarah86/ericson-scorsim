<?php

/**
 * Home Page
 */

get_header();
?>

<main id="site-content" role="main">

    <div class="main_home">
        <?php get_template_part('template-parts/sidebar') ?>
        <div class="posts" id="posts-container">
            <?php
            // Novidades
            $posts = new WP_Query(array(
                'category' => pll_get_term(19) && pll_get_term(26) && pll_get_term(28),
                'posts_per_page' => 3,
            ));
            ?>

            <?php if ($posts->have_posts()) : ?>
                <?php while ($posts->have_posts()) : $posts->the_post(); ?>

                    <div class="posts_box posts_box-modal animated fadeIn" to="<?php esc_url(the_permalink()) ?>">
                        <div role="button" class="posts_button-open">
                        <h2 class="posts_titulo mobile-only">
                            <?php
                            $text = get_the_title($posts->post);
                            echo $text;
                            ?>
                        </h2>
                        <h2 class="posts_titulo desktop-only">
                            <?php
                            $text = get_the_title($posts->post);
                            echo wp_trim_words($text, 25, '...');
                            ?>
                        </h2>
                            <?php if 
                                ( has_post_thumbnail() ) {
                                echo '<div class="posts_thumbnail">';
                                    the_post_thumbnail('medium_large', '');
                                echo '</div>';
                                } else {
                                echo '<div class="posts_thumbnail">';
                                echo '<img src="' . get_stylesheet_directory_uri() . '/assets/images/basic-thumb.png" />';
                                echo '</div>';
                                }
                            ?>
                        </div>
                        <div class="posts_modal posts_modal-<?php the_ID(); ?>">
                            <?php get_template_part( '/template-parts/modal_button', 'close' ) ?>
                            <div class="posts_content">

                                <?php get_template_part('/template-parts/content',  'modal') ?>

                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php __('No News'); ?></p>
            <?php endif; ?>

            <div class="posts_box posts_box-modal" to="/novidades">
                <div role="button" class="posts_button-open">
                    <div class=" posts_vejamais">
                        <img class="posts_vejamais_logo" src="/wp-content/uploads/2020/01/logo-branca.svg" />
                        <h2 class="posts_vejamais_titulo">
                            <?php _e('Ver todas as novidades', 'ericsonscorsim') ?>
                        </h2>
                    </div>
                </div>
                <div class="posts_modal posts_modal-vejamais">
                    <?php get_template_part( '/template-parts/modal_button', 'close' ) ?>
                    <div class="posts_content">
                        <?php get_template_part('/template-parts/content',  'modal-novidades') ?>
                    </div>
                </div>
            </div>

        </div>


</main><!-- #site-content -->

<?php get_template_part('template-parts/footer-menus-widgets'); ?>

<?php
get_footer();
