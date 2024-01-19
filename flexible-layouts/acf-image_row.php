<?php if( have_rows('image_group') ): ?>
<section class="image-group alignfull ">
    <div class="container">
        <div class="row justify-content-between">
        <?php while( have_rows('image_group') ): the_row(); 
            $image = get_sub_field('image'); ?>
            
            <div class="col-md-4 single-image">
                <?php echo wp_get_attachment_image( $image, 'large' ); ?>
            </div>
        <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>