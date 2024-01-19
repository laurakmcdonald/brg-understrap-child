<?php 
$bg_color = get_sub_field('background_color');
$contact_info = get_field('contact_info', 'option');
$squiggle_horiz = get_field('squiggle_horizontal', 'option');
$heading = get_sub_field('heading');
if (!isset($heading)) $heading = 'Contact';
$address = $contact_info['address'];
$hours = $contact_info['hours'];
$phone = $contact_info['phone'];
$phone_number = preg_replace( '/\D+/', '', $phone );
$directions = $contact_info['get_directions'];
$map_embed = $contact_info['map_embed'];
?>

<section class="contact alignfull" <?php if (!empty($bg_color)) { ?>style="background-color: var(--<?php echo $bg_color;?>)"<?php } ?>>

	<div class="header-vertical">
		<h2 class="dh1"><?php echo esc_html($heading); ?></h2>
	</div>

	<div class="container">

		<div class="row">
			

			<div class="col-lg-6 text-white bg-primary contact-info">

				<h3><?php echo $heading; ?></h3>
				<?php if ( $address ) { ?>
					<div class="contact-detail"><?php echo esc_html($address); ?></div>

				<?php } if ( $hours ) { ?>
					<div class="contact-detail hours"><p class="label">Hours:</p> <?php echo $hours; ?></div>

				<?php } if ( $phone ) { ?>
					<div class="contact-detail phone"><p class="label">Phone:</p> <a href="tel:<?php echo esc_html($phone_number); ?>"><?php echo esc_html($phone); ?></a></div>
				<?php } ?>
				
				<?php if ($directions) { ?>
					<a target="_blank" class="btn btn-outline-light arrow" href="<?php echo wp_kses_post( wpautop($directions) ); ?>" title="Get Directions">Get Directions &#8594;</a>	
				<?php } ?>

			</div>

			<div class="col-lg-6 contact-map">
				<?php if ( $squiggle_horiz) { ?>
					<div style="background: url(<?php echo esc_url($squiggle_horiz); ?>) no-repeat;" class="squiggle" /></div>
				<?php } ?>

				<?php if ( $map_embed) { ?>
					<?php echo $map_embed; ?>
				<?php } ?>
			</div>
		</div>

	</div>

</section>