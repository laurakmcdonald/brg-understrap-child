<?php 
$form_shortcode = get_sub_field('form_shortcode');
$heading = get_sub_field('heading');
?>

<section class="contact-form alignfull">

	<div class="container">

		<div class="row justify-content-center">

			<div class="col-lg-6">

				<h3><?php echo esc_html($heading); ?></h3>
				<?php if ( $form_shortcode ) { ?>
					<?php echo do_shortcode( $form_shortcode ); ?>
				<?php }  ?>
			</div>
		</div>

	</div>

</section>