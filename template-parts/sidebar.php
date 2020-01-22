<?php

/**
 * Sidebar for Ericson Scorsim
 *
 *
 * @package WordPress
 * @subpackage Ericson_Scorsim
 * @since 1.0.0
 */

?>

<div class="info desktop-only" id="info-container">
    <?php
    // Site title or logo.
    twentytwenty_site_logo();

    ?>
    <div class="footer-home">
        <ul class="footer-home_language">
            <?php pll_the_languages(); ?>
        </ul>
        <address class="footer-home_contato">
            <strong><?php echo get_theme_mod('cidade_pais', ''); ?></strong><br>
            <?php echo get_theme_mod('endereco', ''); ?>
            <?php echo get_theme_mod('fone', ''); ?><br>
            <a href="mailto:<?php echo get_theme_mod('email', ''); ?>"><?php echo get_theme_mod('email', ''); ?></a>
        </address>
    </div>
</div>