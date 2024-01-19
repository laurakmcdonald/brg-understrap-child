<?php
/**
 * Partial template for content in page.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php if ( is_front_page() ) { ?>

	<div class="entry-content">
	<?php get_template_part( 'flexible-layouts/acf', 'index' ); ?>
	</div><!-- .entry-content -->

	<?php } else { 

		if ( ! is_page_template( 'page-templates/no-title.php' )  ) {
			the_title(
				'<header class="entry-header"><h1 class="entry-title">',
				'</h1></header><!-- .entry-header -->'
			);
		} else { ?>
			<section class="interior-hero alignfull text-white text-center">
				<h1 class="dh3"><?php the_title(); ?></h1>
				<p class="breadcrumbs small"><a href="/" title="Home">Home</a> 
				<span class="spacer"></span>
				<?php the_title(); ?></p>
			</section>
		<?php } 

		echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

		<div class="entry-content">
			
			<?php $content = apply_filters( 'the_content', get_the_content() );
			if ($content) {
				echo '<section class="page-content text-center lead">'. $content .'</section>';
			} 
			understrap_link_pages();

			get_template_part( 'flexible-layouts/acf', 'index' );
			?>

		</div><!-- .entry-content -->

	<?php } ?>

	<footer class="entry-footer">

		<?php understrap_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
