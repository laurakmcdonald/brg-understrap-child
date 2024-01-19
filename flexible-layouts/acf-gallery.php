<?php
$site_icon = get_field('site_icon_dark', 'options');
$title = get_sub_field('gallery_title'); 
// Load value (array of ids).
$image_ids = get_sub_field('gallery');
if( $image_ids ) { ?>
<section class="brg-gallery alignfull">
    <div class="container">
    <?php if ($title) { ?>
        <?php if ($site_icon) { 
                        echo wp_get_attachment_image( $site_icon, 'large', "", array( "class" => "aligncenter site-icon" ) );
        } ?>
        <h2 class="h1 gallery-title text-center"><?php echo esc_html($title); ?></h2>
    <?php } ?>

    <?php    // Generate string of ids
    $images_string = implode( ',', $image_ids );
    // Generate and do shortcode.
    // Note: The following string is split to simply prevent our own website from rendering the gallery shortcode.
    $shortcode = sprintf( '[' . 'gallery size="gallery" ids="%s"]', esc_attr($images_string) );
    echo do_shortcode( $shortcode );?>
    </div>
</section>
<?php } ?>