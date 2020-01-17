<?php

/**
 * Home Page
 */

get_header();
?>

<main id="site-content" role="main">

    <?php

    $archive_title    = '';
    $archive_subtitle = '';

    if (is_search()) {
        global $wp_query;

        $archive_title = sprintf(
            '%1$s %2$s',
            '<span class="color-accent">' . __('Search:', 'twentytwenty') . '</span>',
            '&ldquo;' . get_search_query() . '&rdquo;'
        );

        if ($wp_query->found_posts) {
            $archive_subtitle = sprintf(
                /* translators: %s: Number of search results */
                _n(
                    'We found %s result for your search.',
                    'We found %s results for your search.',
                    $wp_query->found_posts,
                    'twentytwenty'
                ),
                number_format_i18n($wp_query->found_posts)
            );
        } else {
            $archive_subtitle = __('We could not find any results for your search. You can give it another try through the search form below.', 'twentytwenty');
        }
    } elseif (!is_home()) {
        $archive_title    = get_the_archive_title();
        $archive_subtitle = get_the_archive_description();
    }

    if ($archive_title || $archive_subtitle) {
    ?>

        <header class="archive-header has-text-align-center header-footer-group">

            <div class="archive-header-inner section-inner medium">

                <?php if ($archive_title) { ?>
                    <h1 class="archive-title"><?php echo wp_kses_post($archive_title); ?></h1>
                <?php } ?>

                <?php if ($archive_subtitle) { ?>
                    <div class="archive-subtitle section-inner thin max-percentage intro-text"><?php echo wp_kses_post(wpautop($archive_subtitle)); ?></div>
                <?php } ?>

            </div><!-- .archive-header-inner -->

        </header><!-- .archive-header -->

    <?php
    }


    ?>

    <div class="main_home">
        <div class="info desktop-only" id="info-container">
            <?php
                // Site title or logo.
                twentytwenty_site_logo();

            ?>
            <address class="footer-home_contato">
					<strong><?php echo get_theme_mod( 'cidade_pais', '' ); ?></strong><br>
					<?php echo get_theme_mod( 'endereco', '' ); ?><br>
					<?php echo get_theme_mod( 'fone', '' ); ?><br>
					<a href="mailto:<?php echo get_theme_mod( 'email', '' ); ?>"><?php echo get_theme_mod( 'email', '' ); ?></a>
				</address>
        </div>
        <div class="posts" id="posts-container">
            <div class="posts_box"></div>

            <?php
            // Novidades
            $posts = new WP_Query(array(
                'category' => pll_get_term(19) && pll_get_term(26) &&  pll_get_term(28),
                'posts_per_page' => 6,
            ));
            ?>

            <?php if ($posts->have_posts()) : ?>
                <?php while ($posts->have_posts()) : $posts->the_post(); ?>

                    <div class="posts_box"  to="<?php esc_url(the_permalink()) ?>">
                        <div role="button" class="posts_button-open">
                        <?php the_title('<h2 class="posts_titulo">', '</h2>'); ?>
                                    <?php if (has_post_thumbnail()) : ?> 
                                        <div class="posts_thumbnail">
                                            <?php the_post_thumbnail('medium_large', '') ?>
                                        </div>
                                    <?php endif; ?>
                        </div>
                        <div class="posts_modal posts_modal-<?php the_ID();?>">
                            <button class="posts_button-close">
                                <svg class="svg-icon" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><polygon fill="" fill-rule="evenodd" points="6.852 7.649 .399 1.195 1.445 .149 7.899 6.602 14.352 .149 15.399 1.195 8.945 7.649 15.399 14.102 14.352 15.149 7.899 8.695 1.445 15.149 .399 14.102"></polygon></svg>				
                            </button>
                            <div class="posts_content">
                           
                                    <?php get_template_part( 'content',  'modal' ) ?>
                         
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php __('No News'); ?></p>
            <?php endif; ?>

            <div class="posts_box">
                <div class=" posts_vejamais">
                    <img src="/themes/ericson_scorsim/assets/images/logo-branca.svg"/>
                    <h2>
                        <?php _e('ver todas as novidades ', 'twentytwentychild') ?>
                    </h2>
                </div>
            </div>

        </div>

        <?php get_template_part('template-parts/pagination'); ?>

</main><!-- #site-content -->

<?php get_template_part('template-parts/footer-menus-widgets'); ?>

<?php
get_footer();
