<?php
$event_shortcode = get_sub_field('shortcode');
if( $event_shortcode ) { 
    ?>
<section class="event-shortcode">

    <?php echo do_shortcode( "[tribe_events view='list']" );?>

</section>
<?php } ?>