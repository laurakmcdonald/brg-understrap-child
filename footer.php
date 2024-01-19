<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
$footer_sections = get_field('footer_sections', 'option');
$social_media = $footer_sections['social_media'];
?>
<?php get_template_part( 'loop-templates/content', 'footer'); ?>

<?php //get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info">

						<?php understrap_site_info(); ?>

					</div><!-- .site-info -->


					<?php if( $social_media ) { ?>
					<div class="social-media">
						<?php 
						echo '<ul class="social">';
							foreach( $social_media as $social ) {
								$name = esc_html($social['social_media_name']);
								$link = esc_html($social['social_media_link']);
								echo '<li><a target="_blank" href="'. $link .'" title="'. $name .'"><img src="/wp-content/themes/brg-understrap-child/img/'. $name .'.png" alt="'. $name . '" /></a></li>';  
							}
							echo '</ul>'; ?>
					</div>
					<?php } ?>

				</footer><!-- #colophon -->

			</div><!-- col -->

		</div><!-- .row -->

	</div><!-- .container(-fluid) -->

</div><!-- #wrapper-footer -->

<?php // Closing div#page from header.php. ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>

