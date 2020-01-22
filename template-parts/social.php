<?php if (has_nav_menu('social')) { ?>

<nav aria-label="<?php esc_attr_e('Expanded Social links', 'twentytwenty'); ?>" role="navigation">
    <ul class="social-menu reset-list-style social-icons fill-children-current-color">

        <?php
        wp_nav_menu(
            array(
                'theme_location'  => 'social',
                'container'       => '',
                'container_class' => '',
                'items_wrap'      => '%3$s',
                'menu_id'         => '',
                'menu_class'      => '',
                'depth'           => 1,
                'link_before'     => '<span class="screen-reader-text">',
                'link_after'      => '</span>',
                'fallback_cb'     => '',
            )
        );
        ?>

    </ul>
</nav><!-- .social-menu -->

<?php } ?>