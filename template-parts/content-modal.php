<?php

/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <div class="post_content">
        <?php

        get_template_part('template-parts/entry-header', 'modal');

        ?>

        <div class="post-inner <?php echo is_page_template('templates/template-full-width.php') ? '' : 'thin'; ?> ">

            <div class="entry-content ">

                <?php
                get_template_part('template-parts/share');
                the_content(__('Continue reading', 'twentytwenty'));
                ?>

            </div><!-- .entry-content -->
        </div><!-- .post-inner -->
    </div> 
    <?php if (has_post_thumbnail( $post->ID ) ): ?> 
    <div class="post_image">
        <?php
        get_template_part('template-parts/featured-image', 'modal');
        ?>
    </div>
    <?php endif ?>


</article><!-- .post -->