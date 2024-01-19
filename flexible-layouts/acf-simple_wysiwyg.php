<?php 
$bg_color = get_sub_field('background_color');
$custom_id = get_sub_field('custom_id');
$heading = get_sub_field('heading');
$text = get_sub_field('text');
$site_icon = get_field('site_icon_dark', 'options');
$site_icon_boo = get_sub_field('site_icon');
?>

<section <?php if ( !empty($custom_id) ) { ?>id="<?php echo esc_html($custom_id); ?>"<?php } ?> class="simple-wysiwyg alignfull" <?php if (!empty($bg_color)) { ?>style="background-color: var(--<?php echo $bg_color;?>)"<?php } ?>>

	<div class="container">

		<div class="row justify-content-center text-center">
			<div class="col-lg-6">

				<?php if ($site_icon_boo == 'yes') { 
					echo wp_get_attachment_image( $site_icon, 'large' );
				} ?>

				<h2 class="h1"><?php echo esc_html($heading); ?></h2>
				<?php if ( $text ) : ?>
					<?php echo wp_kses_post( wpautop($text)); ?>
				<?php endif; ?>

			</div>
		</div>

	</div>

	<div class="sbs-image" <?php if ( $image ) { ?>style="background-image: url(<?php echo wp_url($image); ?>);"<?php } ?>>
	</div>

</section>