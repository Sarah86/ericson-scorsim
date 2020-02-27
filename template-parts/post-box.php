<?php

/**
 * Template for the regular post box
 */

?>

<a href="<?php esc_url(the_permalink()) ?>">
<div class="posts_box animated fadeIn">
   
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

</div>
</a>