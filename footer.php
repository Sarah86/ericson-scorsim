<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>
			<footer id="site-footer" role="contentinfo" class="header-footer-group">

			<div class="footer-home">
				<div class="footer-home_logo desktop-only">
					<?php 
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
						echo '<img src="' . $image[0] . '"/>'; 
					?>
				</div>
				<div class="footer-home_language desktop-only">
					<?php pll_the_languages();?>
				</div>
				<address class="footer-home_contato">
					<strong><?php echo get_theme_mod( 'cidade_pais', '' ); ?></strong><br>
					<?php echo get_theme_mod( 'endereco', '' ); ?><br>
					<?php echo get_theme_mod( 'fone', '' ); ?><br>
					<a href="mailto:<?php echo get_theme_mod( 'email', '' ); ?>"><?php echo get_theme_mod( 'email', '' ); ?></a>
				</address>
			</div>

				<div class="section-inner">

					<a class="to-the-top" href="#site-header">
						<span class="to-the-top-long">
							<?php
							/* translators: %s: HTML character for up arrow */
							printf( __( 'To the top %s', 'twentytwenty' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
							?>
						</span><!-- .to-the-top-long -->
						<span class="to-the-top-short">
							<?php
							/* translators: %s: HTML character for up arrow */
							printf( __( 'Up %s', 'twentytwenty' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
							?>
						</span><!-- .to-the-top-short -->
					</a><!-- .to-the-top -->

				</div><!-- .section-inner -->

			</footer><!-- #site-footer -->

		<?php wp_footer(); ?>

	</body>
</html>
