<?php 
$site_icon = get_field('site_icon_dark', 'options');
$site_icon_light = get_field('site_icon', 'options');
$footer_sections = get_field('footer_sections', 'option');
$newsletter_heading = $footer_sections['newsletter_heading'];
$newsletter_text = $footer_sections['newsletter_text'];
$newsletter_form = $footer_sections['newsletter_form'];
$ig_heading = $footer_sections['ig_heading'];
$ig_handle = $footer_sections['ig_handle'];
$footer_logo = $footer_sections['footer_logo'];
$contact_info = get_field('contact_info', 'option');
$phone = $contact_info['phone'];
$phone_number = preg_replace( '/\D+/', '', $phone );
$directions = $contact_info['get_directions'];

$ig_left = $footer_sections['ig_feed_left'];
$ig_right = $footer_sections['ig_feed_right'];

?>
<section class="newsletter alignfull">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <?php if ($site_icon) { 
					echo wp_get_attachment_image( $site_icon, 'large', "", array( "class" => "aligncenter site-icon" ) );
				} ?>
                <h2 class="h1"><?php echo $newsletter_heading; ?></h2>
                <div class="newsletter-text lead">
                    <?php echo wp_kses_post( $newsletter_text ); ?>

                    <?php echo do_shortcode($newsletter_form); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="instagram alignfull bg-primary text-white">
    <div class="container-flud">
        <div class="row">
            <div class="col-lg-3">
                <?php echo do_shortcode($ig_left); ?>
            </div>
            <div class="col-lg-5 text-center ig-center">
                <div class="ig-container">
                <?php if ($site_icon) { 
					echo wp_get_attachment_image( $site_icon_light, 'large', "", array( "class" => "aligncenter site-icon" ) );
				} ?>

                <h2 class="h1"><?php echo $ig_heading; ?></h2>
                <a class="btn btn-outline-light" target="_blank" href="https://instagram.com/<?php echo esc_html($ig_handle); ?>">@<?php echo esc_html($ig_handle); ?></a>
                </div>
            </div>
            <div class="col-lg-3">
                <?php echo do_shortcode($ig_right); ?>
            </div>
        </div>
    </div>
</section>

<section class="footer-logo bg-primary text-white alignfull">
    <div class="container">
        <div class="row logo">
            <div class="col text-center">
            <?php if ($footer_logo) { 
					echo wp_get_attachment_image( $footer_logo, 'large' );
				} ?>
            </div>
        </div>
        <div class="row contact-info">
            <div class="col-md-6">
                <?php if ($phone) { ?>
                    <p class="small">Phone:</p>
                    <p class="lead"><a href="tel:<?php echo esc_html($phone_number); ?>"><?php echo esc_html($phone); ?></a></p>
                <?php } ?>
            </div>
            <div class="col-md-6">
                <?php if ($directions) { ?>
                    <a target="_blank" href="<?php echo esc_url($directions); ?>" class="btn btn-outline-light">Get Directions</a>
                <?php } ?>
            </div>
        </div>

    </div>

</section>

<div class="footer-menu bg-primary text-white alignfull">
    <div class="container">
    <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
    </div>
</div>
