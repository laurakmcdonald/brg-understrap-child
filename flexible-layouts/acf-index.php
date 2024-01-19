<?php

/**
 * Template Part for displaying all ACF Templates on any pages
 */

if (have_rows('page_content')) : // if there are custom section templates on the page

	$group_count = 0; // number of product information groups

    while (have_rows('page_content')) : the_row();
 
        get_template_part( 'flexible-layouts/acf-'. get_row_layout() );
		
?>


    <?php endwhile; ?>
<?php endif; ?>