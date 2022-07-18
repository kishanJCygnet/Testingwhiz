<?php
/*
 * Template Name: User Manual
 * description: User Manual pages
*/

get_header();
?>
<div class="user-manual-main-class">
<?php
// User Manual Menu
wp_nav_menu( array( 
    'theme_location' => 'user_manual', 
	'menu_id' => 'nav',
    'container_class' => 'user-manual-menu-class' ) ); 
?>
</div>
<?php

/* Start the Loop */
while ( have_posts() ) :
	the_post();
	
		/* flexible content Start */
		   $pageId = get_the_ID();
		   require_once(__DIR__ . "/flexible-content.php");
		
		/* Next/Prev button*/  ?>
		<div class="next-prev-class">
			<div id="arrow-prev" class="slide-prev" style="display:none;">
				<a href="#" class="prev-button" title="Previous">
					Previous
				</a>
			</div>
			<div id="arrow-next" class="slide-next" style="display:none;">
				<a href="#" class="next-button" title="Next">
					Next
				</a>
			</div>
		</div>
	
	
		<?php 
		/* Top Tab Section block */
		/*if (have_rows('top_tab_content')) :  ?>
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
		<?php endif;*/
		/* End Top Tab Section block */	
		
endwhile; // End of the loop.

get_footer();
?>
<script>
jQuery(document).ready(function () {
	
	jQuery('#nav li.menu-item a').each(function(i, e){
		jQuery(this).attr("id", i);
	});
		
    jQuery('.next-button').click(function () {
		var currentmenu = Number(jQuery('#nav .current-menu-item a').attr('id')) + 1;
		var otherInput = jQuery('#'+currentmenu).attr('href');
		window.location.href = otherInput;
    });

    jQuery('.prev-button').click(function () {
        var currentmenu = Number(jQuery('#nav .current-menu-item a').attr('id')) - 1;
		var otherInput = jQuery('#'+currentmenu).attr('href');
		window.location.href = otherInput;
    });
});

//jQuery(window).on('load', function() {
jQuery(document).ready(function () {
	//jQuery("#arrow-next").hide();
	//jQuery("#slide-prev").hide();
	var currentid = jQuery('#nav .current-menu-item a').attr("id");
	var lastid = jQuery('#nav a').last().attr("id");
	var firstid = jQuery('#nav a').first().attr("id");
	
	if(currentid == firstid){
		jQuery(".slide-prev").hide();
		jQuery(".slide-next").show();
	} else if(currentid == lastid){
		jQuery(".slide-next").hide();
		jQuery(".slide-prev").show();
	} else {
		jQuery(".slide-next").show();
		jQuery(".slide-prev").show();
	}
});
</script>
