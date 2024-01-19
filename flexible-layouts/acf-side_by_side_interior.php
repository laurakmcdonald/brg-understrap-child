<?php 
$site_icon = get_field('site_icon_dark', 'options');
$custom_id = get_sub_field('custom_id');
$squiggle_2 = get_sub_field('squiggle_2');
$heading = get_sub_field('sbs_heading');
$text = get_sub_field('sbs_text');
$images = get_sub_field('images');
$image_front = $images['image_front'];
$image_middle = $images['image_middle'];
$image_back = $images['image_back'];
?>

<section <?php if ( !empty($custom_id) ) { ?>id="<?php echo esc_html($custom_id); ?>"<?php } ?> class="side-by-side interior alignfull">

	<div class="container">

		<div class="row align-items-center">
			<div class="col-lg-6">

				<?php if ($site_icon) { 
					echo wp_get_attachment_image( $site_icon, 'large' );
				} ?>

				<h2 class="h1"><?php echo esc_html($heading); ?></h2>
				<?php if ( $text ) : ?>
					<?php echo wp_kses_post( wpautop($text)); ?>
				<?php endif; ?>

			</div>
		</div>

	</div>

	<div class="sbs-images">
	<?php 	if( $image_back ) {
    	echo wp_get_attachment_image( $image_back, 'medium', "", array( "class" => "img-back img" ) );
	}
	if( $image_middle ) {
    	echo wp_get_attachment_image( $image_middle, 'medium', "", array( "class" => "img-middle img" ) );
	}
	if( $image_front ) {
    	echo wp_get_attachment_image( $image_front, 'medium', "", array( "class" => "img-front img" ));
	}
	?>

	</div>
	<?php if ( $squiggle_2) { ?>
		<div style="background: url(<?php echo esc_url($squiggle_2); ?>) no-repeat;" class="squiggle" /></div>
	<?php } ?>

</section>