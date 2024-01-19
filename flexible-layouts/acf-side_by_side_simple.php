<?php 
$custom_id = get_sub_field('custom_id');
$heading = get_sub_field('sbs_heading');
$text = get_sub_field('sbs_text');
$image = get_sub_field('image');
$imgside = get_sub_field('image_placement');
if ( $imgside == 'left' ) {
	$order1 = "order-1 order-lg-2"; 
	$order2 = "order-2 order-lg-1";
}
?>

<section <?php if ( !empty($custom_id) ) { ?>id="<?php echo esc_html($custom_id); ?>"<?php } ?> class="side-by-side simple alignfull">

	<div class="container">

		<div class="row">
			<div class="col-lg-6 txt <?php echo $order1; ?>">

				<h3><?php echo esc_html($heading); ?></h3>
				<?php if ( $text ) : ?>
					<?php echo wp_kses_post( wpautop($text)); ?>
				<?php endif; ?>

			</div>

			<div class="col-lg-6 img <?php echo $order2; ?>">
			
				<?php if( $image ) {
					echo wp_get_attachment_image( $image, 'large' );
				} ?>
			</div>
		</div>

	</div>

</section>