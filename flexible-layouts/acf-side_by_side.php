<?php 
$site_icon = get_field('site_icon', 'options');
$squiggle = get_field('squiggle', 'options');
$custom_id = get_sub_field('custom_id');
$heading = get_sub_field('sbs_heading');
$text = get_sub_field('sbs_text');
$image = get_sub_field('sbs_image');

?>

<section <?php if ( !empty($custom_id) ) { ?>id="<?php echo esc_html($custom_id); ?>"<?php } ?> class="side-by-side alignfull text-white">

	<div class="bg-primary" id="sbs-background">
	</div>

	<?php if ( $squiggle) { ?>
		<div style="background: url(<?php echo esc_url($squiggle); ?>) no-repeat;" class="squiggle" /></div>
	<?php } ?>

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

	<div class="sbs-image" <?php if ( $image ) { ?>style="background-image: url(<?php echo esc_url($image); ?>);"<?php } ?>>
	</div>

</section>