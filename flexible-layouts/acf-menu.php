<?php 
$site_icon = get_field('site_icon_dark', 'options');
$menu_pdf = get_sub_field('menu_pdf');
$num_col = get_sub_field('number_columns');
$header = get_sub_field('heading');           
    if ($num_col == 3) {
        $col_class = 'col-lg-4 col-md-6';  
        $row_max = ''; 
    } else {
        $col_class = 'col-lg-6';
        $row_max = 'row-max';
    }
$header_vert = get_sub_field('vertical_heading');
?>
<section class="our-menu alignfull">

    <?php if ($header_vert) { ?>
        <div class="header-vertical">
        <h2 class="dh1"><?php echo esc_html($header_vert); ?></h2>
        </div>
    <?php } ?>

    <div class="container">

        <div class="row <?php echo $row_max; ?> menu-row">

            <div class="col-12 text-center ">
                <?php if ($site_icon) { 
					echo wp_get_attachment_image( $site_icon, 'large' );
				} ?>
                <h2 class="h1"><?php echo esc_html($header); ?></h2>

            </div>

            <?php if( have_rows('menu_group') ): while( have_rows('menu_group') ): the_row(); 

            $heading = get_sub_field('heading');
            $menu_item = get_sub_field('menu_item');
            ?>

            <div class="<?php echo $col_class; ?> menu-column">
                <h4><?php echo esc_html($heading); ?></h4>

                <?php if( have_rows('menu_item') ): while( have_rows('menu_item') ): the_row();  ?>

                <div class="d-flex flex-column menu-item">
                    <div class="row">
                        <div class="col-8">
                        <p class="item-title"><?php esc_html(the_sub_field('item_title')); ?></p>
                        <p class="item-description small"><?php esc_textarea(the_sub_field ('item_description')); ?></p>
                        </div>
                        <div class="col-4 item-price lead">
                            <?php esc_html(the_sub_field('item_price')); ?>
                        </div>
                    </div>
                </div>

                <?php endwhile; endif; ?>

            </div>

            <?php endwhile; endif; ?>

            <?php if ( $menu_pdf) { ?>
            <div class="col-12">
                <div class="row">
                    <div class="col text-center">
                        <a class="btn btn-primary button-one arrow" href="<?php echo esc_url($menu_pdf); ?>" >View Menu PDF <img src="<?php bloginfo('stylesheet_directory'); ?>/img/arrow.png" class="button-arrow" alt="" /></a>
                        <?php if ( is_front_page() ) { ?>
                        <a class="btn btn-primary arrow" href="/menu/" >Go to menu page <img src="<?php bloginfo('stylesheet_directory'); ?>/img/arrow.png" class="button-arrow" alt="" /></a>
                        <?php } ?>
                    </div>
                <div>
             </div>
            <?php } ?>

        </div>

    </div>

</section>
