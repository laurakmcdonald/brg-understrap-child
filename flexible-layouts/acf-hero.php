<?php // Case: Hero layout

	$bgimage = get_sub_field('background_image'); 
    $headline = get_sub_field('headline');
    $subhead = get_sub_field('subhead');
    $cta = get_sub_field('cta');
	$text = get_sub_field('text'); 
	$buttons = get_sub_field('buttons'); 						?>

	<section class="alignfull text-white bg-primary container-fluid hero-section" <?php if ($bgimage) { ?>style="background-image: url(<?php echo esc_url( $bgimage ); ?>)"<?php } ?>> 
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12">
					<header class="entry-header">
						<h1 class="dh2 text-center"><?php echo wp_kses_post(($headline)); ?></h1>
					</header><!-- .entry-header -->
                </div>
			</div>
			<div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h4 class="dh4">
                        <?php echo esc_html($subhead); ?>
                    </h4>
					
					<?php if ($cta == 'text') { ?>
                        <?php echo wp_kses_post( wpautop($text)); ?>
                    <?php } elseif ($cta == 'button') { ?>
					<div class="hero-cta">	
						<?php if( have_rows('buttons') ):
						while( have_rows('buttons') ) : the_row();

								$button_style = get_sub_field('button_style');
								$button_link = get_sub_field('button'); 
								$button_type = get_sub_field('button_type');
								if( $button_type == 'normal' ) { 
									$link_url = $button_link['url'];
									$link_title = $button_link['title'];
									$link_target = $button_link['target'] ? $button_link['target'] : '_self';
									?>
									<a class="btn btn-<?php echo esc_html($button_style); ?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
								<?php } else { ?>
									<!-- Button trigger modal -->
									<button type="button" class="btn btn-<?php echo esc_html($button_style); ?>" data-bs-toggle="modal" data-bs-target="#reservation">Reservations </button>
								<?php } 

							endwhile;
						endif;	?>
					</div>			
					<?php } else { ?>
						<img class="down-arrow" src="<?php bloginfo('stylesheet_directory'); ?>/img/down-arrow.png" />
						
					<?php } ?>
				</div>
			</div>
		</div>
	</section>	