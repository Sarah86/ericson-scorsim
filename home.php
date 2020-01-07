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

    <div class="home">
        <div class="posts">

            <?php
            // Novidades
            $posts = new WP_Query(array(
                'category' => pll_get_term(19),
                'posts_per_page' => 3,
            ));
            ?>

            <?php if ($posts->have_posts()) : ?>
                <?php while ($posts->have_posts()) : $posts->the_post(); ?>

                    <div class="posts_box">
                        <div role="button" class="posts_button-open" data-toggle-target=".posts_modal-<?php the_ID();?>" data-toggle-body-class="showing-posts-modal" aria-expanded="false" data-set-focus=".posts_button-close">
                        <h2 class="posts_titulo"><?php the_title(); ?></h2>
                                    <?php if (has_post_thumbnail()) : ?> 
                                        <div class="posts_thumbnail">
                                            <?php the_post_thumbnail('medium_large', '') ?>
                                        </div>
                                    <?php endif; ?>
                        </div>
                        <div class="posts_modal posts_modal-<?php the_ID();?>">
                            <button class="posts_button-close" data-toggle-target=".posts_modal-<?php the_ID();?>" data-toggle-body-class="showing-posts-modal" aria-expanded="true" data-set-focus=".posts_modal-<?php the_ID();?>">
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


        </div>

        <div>
            <h2>
                <?php _e('ver todas as', 'twentytwentychild') ?>
                <?php
                foreach (
                    (get_the_category()) as $category) {
                    echo $category->cat_name . ' ';
                } ?>
            </h2>
        </div>

        <?php get_template_part('template-parts/pagination'); ?>

</main><!-- #site-content -->

<?php get_template_part('template-parts/footer-menus-widgets'); ?>

<?php
get_footer();
