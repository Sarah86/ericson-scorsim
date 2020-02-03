<?php

/**
 * Displays the menu icon and modal
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>

<div class="menu-modal cover-modal header-footer-group" data-modal-target-string=".menu-modal">

    <div class="menu-modal-inner modal-inner">

        <div class="menu-wrapper section-inner">

            <div class="menu-top">

                <button class="toggle close-nav-toggle fill-children-current-color" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".menu-modal">
                    <span class="toggle-text"><?php _e('Close Menu', 'twentytwenty'); ?></span>
                    <?php twentytwenty_the_theme_svg('cross'); ?>
                </button><!-- .nav-toggle -->

                <div class="menu-top_logo">
                    <?php
                    // Site title or logo.
                    twentytwenty_site_logo();

                    ?>
                </div>

                <?php

                $mobile_menu_location = '';

                // If the mobile menu location is not set, use the primary and expanded locations as fallbacks, in that order.
                if (has_nav_menu('mobile')) {
                    $mobile_menu_location = 'mobile';
                } elseif (has_nav_menu('primary')) {
                    $mobile_menu_location = 'primary';
                } elseif (has_nav_menu('expanded')) {
                    $mobile_menu_location = 'expanded';
                }

                if (has_nav_menu('expanded')) {

                    $expanded_nav_classes = '';

                    if ('expanded' === $mobile_menu_location) {
                        $expanded_nav_classes .= ' mobile-menu';
                    }

                ?>

                    <nav class="expanded-menu<?php echo esc_attr($expanded_nav_classes); ?>" aria-label="<?php esc_attr_e('Expanded', 'twentytwenty'); ?>" role="navigation">

                        <ul class="modal-menu reset-list-style">
                            <?php
                            if (has_nav_menu('expanded')) {
                                wp_nav_menu(
                                    array(
                                        'container'      => '',
                                        'items_wrap'     => '%3$s',
                                        'show_toggles'   => true,
                                        'theme_location' => 'expanded',
                                    )
                                );
                            }
                            ?>
                        </ul>

                    </nav>

                <?php
                }

                if ('expanded' !== $mobile_menu_location) {
                ?>

                    <nav class="mobile-menu" aria-label="<?php esc_attr_e('Mobile', 'twentytwenty'); ?>" role="navigation">

                        <ul class="modal-menu reset-list-style">

                            <?php
                            if ($mobile_menu_location) {

                                wp_nav_menu(
                                    array(
                                        'container'      => '',
                                        'items_wrap'     => '%3$s',
                                        'show_toggles'   => true,
                                        'theme_location' => $mobile_menu_location,
                                    )
                                );
                            } else {

                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_toggles'       => true,
                                        'title_li'           => false,
                                        'walker'             => new TwentyTwenty_Walker_Page(),
                                    )
                                );
                            }
                            ?>

                        </ul>

                    </nav>

                <?php
                }
                ?>

            </div><!-- .menu-top -->

            <div class="menu-modal_bottom">
                <div class="newsletter">
                    <form class="newsletter_input-group" action="https://netlify.us4.list-manage.com/subscribe/post?u=<?php echo get_theme_mod( 'mailchimp_user' ); ?>&id=<?php echo get_theme_mod( 'mailchimp_audience' ); ?>" method="POST" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                        <input class="newsletter_input-group-field" type="email" placeholder="<?php _e('Assine nossa newsletter_', 'twentytwentychild'); ?>" required name="EMAIL" id="mailchimp_email">
                        <div id="mce-responses" class="clear">
                            <div class="response" id="mce-error-response" style="display:none"></div>
                            <div class="response" id="mce-success-response" style="display:none"></div>
                        </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <button type="submit" name="subscribe" id="mc-embedded-subscribe" class="newsletter_button"><i class="fas fa-angle-right"></i></button>
                    </form>
                </div>
                <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->

                <ul class="menu-modal_language">
                    <?php pll_the_languages(); ?>
                </ul>
            </div>

        </div><!-- .menu-wrapper -->

    </div><!-- .menu-modal-inner -->

</div><!-- .menu-modal -->