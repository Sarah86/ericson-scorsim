<?php

/**
 * Template for the regular post box
 */

?>

<a href="<?php esc_url(the_permalink()) ?>">
<div class="posts_box animated fadeIn">
   
        <div role="button" class="posts_button-open">
            <h2 class="posts_titulo">
                <?php
                $text = get_the_title($posts->post);
                echo wp_trim_words($text, 10, '..');
                ?>
            </h2>
            <?php if (has_post_thumbnail()) : ?>
                <div class="posts_thumbnail">
                    <?php the_post_thumbnail('medium_large', '') ?>
                </div>
            <?php endif; ?>
        </div>

</div>
</a>