<?php
/*
 * Template Name: User Manual
 * description: User Manual pages
*/

get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();
	
	/* flexible content Start */
	   $pageId = get_the_ID();
	   require_once(__DIR__ . "/flexible-content.php");

	/* Top Tab Section block */
	if (have_rows('top_tab_content')) :  ?>
		<div class="top-tab <?php echo the_field('top_tab_section_class'); ?>"> 
			<div class="top-tab-label"><?php echo the_field('tab_label'); ?> :</div>
			<div class="top-tab-main-section">
				<?php while (have_rows('top_tab_content')) : the_row(); ?>
					<?php if (get_sub_field('tab_title')){ ?>
						<div class="top-tab-inner <?php if(get_sub_field('tab_position') == 'sub'){ ?>tab-sub-class<?php } ?>">
							<a href="#<?php echo the_sub_field('tab_id'); ?>"><?php echo the_sub_field('tab_title'); ?></a>
						</div>
					<?php } ?>
				<?php endwhile;	 ?>
			</div>
		</div>
	<?php endif;
	/* End Top Tab Section block */	
	
endwhile; // End of the loop.

get_footer();
