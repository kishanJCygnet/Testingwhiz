<div class="main">
<?php /*if( function_exists( 'aioseo_breadcrumbs' ) ) aioseo_breadcrumbs(); */ ?>
	<?php
	/* banner content */
		if (have_rows('banner')) : ?>
			<section class="banner-content <?php echo the_field('banner_class'); ?>">    
				<span class="bottom-arrow"></span>  
				<div <?php if ( is_front_page() ) : ?> class="owl-carousel banner-slider" <?php endif; ?> >
				<!--<div class="owl-carousel banner-slider">-->
					<?php while (have_rows('banner')) : the_row(); ?>
						<div class="banner-inner-content w-100" style="background-image:url('<?php echo the_sub_field('background_image'); ?>')">  
							<div class="container">
							 <div class="row" >
								<div class="col-lg-7">
									<div class="d-flex align-items-center h-100">
										<div class="text-content ">
											<div class="banner-text-heading-content">
										   <?php if (get_sub_field('title')) :  ?>
												<h1 class="wow fadeInUp" data-wow-delay="0.3s"><?php echo the_sub_field('title'); ?></h1>												
											<?php endif; ?>
											<?php if (get_sub_field('sub_title')) :  ?>
												<h3 class="text-white wow fadeInUp" data-wow-delay="0.6s"><?php echo the_sub_field('sub_title'); ?></h3>
											<?php endif; ?>
											</div>
											<?php if (get_sub_field('primary_button_url') && get_sub_field('primary_button_label')) : ?>
												<a href="<?php echo the_sub_field('primary_button_url'); ?>" class="btn btn-primary me-3 wow fadeInUp" data-wow-delay="0.9s"><?php echo the_sub_field('primary_button_label'); ?></a>
											<?php endif; ?>
											<?php if (get_sub_field('secondary_button_url') && get_sub_field('secondary_button_label')) : ?>
												<a href="<?php echo the_sub_field('secondary_button_url'); ?>" class="btn wow fadeInUp" data-wow-delay="0.9s"><?php echo the_sub_field('secondary_button_label'); ?></a>
											<?php endif; ?>
											<?php //if( function_exists( 'aioseo_breadcrumbs' ) ) aioseo_breadcrumbs();  ?>
										</div>
									</div>
									<?php if (get_sub_field('left_image')) : ?>
										<div class="banner-left-image" style="background-image: url(<?php echo the_sub_field('left_image'); ?>)"></div>
									<?php endif; ?>
								</div>
								<div class="col-lg-5 d-md-none d-none d-lg-block">
									<div class="img-content">
										<div class="inner-img-content mask1">
											<?php if(get_sub_field('video_url')){ 
												?>
												<!--<iframe class="banner-video" src="<?php echo the_sub_field('video_url'); ?>?autoplay=1&amp;modestbranding=1&amp;showinfo=0" allowfullscreen="allowfullscreen"></iframe>-->
												<video class="banner-video animate__animated wow fadeIn " data-wow-duration="3s" data-wow-delay="1s" loop="true" autoplay="autoplay" muted/> 										  
													<source src="<?php echo the_sub_field('video_url'); ?>" type="video/mp4"> 
												</video>
												<?php
											} else {
												if (get_sub_field('image')) :
													?>
													<div class="bg-animation" style="background-image: url(<?php echo the_sub_field('image'); ?>)"></div>
												  <?php
												endif;
											} ?>
											<?php /* if (get_sub_field('image')) : ?>
												<img src="<?php echo the_sub_field('image'); ?>" class="w-100" alt="<?php echo the_sub_field('title'); ?>">
											<?php endif; */ ?>
										</div>
									</div>
									<?php if (get_sub_field('right_content')) : ?>
									<div class="banner-right-content">
										<?php echo the_sub_field('right_content'); ?>
									</div>
									<?php endif; ?>
								</div>
							</div>
							</div>
						</div>    
					<?php endwhile;	?> 
				</div>
				<script>
				jQuery(document).ready(function() {
					jQuery('.banner-slider').length && jQuery('.banner-slider').owlCarousel({
						loop: true,
						autoplay: true,
						nav: false,
						dots: true,
						mouseDrag:false,
						animateOut: 'fadeOut',
						animateIn: 'fadeIn',
						items: 1,
						autoplayTimeout: 7500,
					});
				});
				</script>
				<!-- Start count section -->				
				<?php if (have_rows('count_section')) :  ?>
					<div class="count-section-main <?php echo the_field('count_section_class'); ?>">
						<?php if (get_field('count_section_title')){ ?>
							<div class="count-section-title">
								<h2 class="wow fadeInUp" data-wow-delay="0.9s"><?php echo the_field('count_section_title'); ?></h2>
							</div>
						<?php } ?>
						<div class="count-section-main-inner">
							<?php $cnt=1;
							while (have_rows('count_section')) : the_row(); 
								if($cnt < 7){ ?>
								<div class="count-inner">
									<?php if (get_sub_field('count_section_icon_image')){ ?>
										<!--<div class="count-icon-image">
											<img src="<?php echo the_sub_field('count_section_icon_image'); ?>" alt="<?php echo the_sub_field('count_section_label'); ?>">
										</div>-->							
										
										<?php $extension = pathinfo(get_sub_field('count_section_icon_image'), PATHINFO_EXTENSION);
											if($extension == 'svg'){
												$count_section_icon_image = get_sub_field('count_section_icon_image');
												$stream_opts = [
													"ssl" => [
														"verify_peer"=>false,
														"verify_peer_name"=>false,
													]
												];														 
												echo file_get_contents($count_section_icon_image, false, stream_context_create($stream_opts));
											} else { ?>
												<img src="<?php echo the_sub_field('count_section_icon_image'); ?>" alt="<?php echo the_sub_field('count_section_label'); ?>">
										<?php } ?>										
										
									<?php } ?>
									<?php if (get_sub_field('count_section_value')){ ?>
										<!--<div class="count-label">
											<?php echo the_sub_field('count_section_value'); ?>
										</div>-->
										<div class="count-label">
											<span class="counter" data-count="<?php echo the_sub_field('count_section_value');?>">0</span>+
										</div>
									<?php } ?>
									<?php if (get_sub_field('count_section_label')){ ?>
										<div class="count-value">
											<h2>
												<?php echo the_sub_field('count_section_label'); ?>
											</h2>
										</div>
									<?php } ?>
								</div>
								<?php }
								$cnt++;
							endwhile;	?> 
						</div>
					</div>
				<?php endif; ?>
				<!-- End count section -->
			</section>
		<?php endif;
	/* End banner content */	
	
	/* Top Tab Section block */
	if (have_rows('top_tab_content')) :  ?>
		<div class="top-tab <?php echo the_field('top_tab_section_class'); ?>"> 
			<!--<div class="top-tab-label"><?php echo the_field('tab_label'); ?> :</div>-->
			<div class="top-tab-main-section">
				<?php while (have_rows('top_tab_content')) : the_row(); ?>
					<?php /*if (get_sub_field('tab_title')){ ?>
						<div class="top-tab-inner">
							<a href="#<?php echo the_sub_field('tab_id'); ?>"><?php echo the_sub_field('tab_title'); ?></a>
						</div>
					<?php }*/ ?>
					<div class="top-tab-inner">
						<a href="#" data-bs-toggle="modal" data-bs-target="#toptabModal" data-tagtoptab="<?php echo the_sub_field('tab_id'); ?>">
							<?php $extension = pathinfo(get_sub_field('top_tab_icon'), PATHINFO_EXTENSION);
								if($extension == 'svg'){
									$top_tab_icon = get_sub_field('top_tab_icon');
									$stream_opts = [
										"ssl" => [
											"verify_peer"=>false,
											"verify_peer_name"=>false,
										]
									];														 
									echo file_get_contents($top_tab_icon, false, stream_context_create($stream_opts));
								} else { ?>
									<img src="<?php echo the_sub_field('top_tab_icon'); ?>" alt="<?php echo the_sub_field('tab_title'); ?>" />
							<?php } ?>
							<span><?php echo the_sub_field('tab_title'); ?></span>
						</a>
					</div>
				<?php endwhile;	 ?>
			</div>
		</div>
		
		
		<div class="modal fade" id="toptabModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="toptabModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
			<div class="modal-content">
			<div class="modal-header">
				<?php $header_logo_url = get_field("desktop_logo", "option"); ?>
				<img src="<?php echo $header_logo_url; ?>" alt="<?php echo the_field('logo_title', 'option'); ?>">
				<div class="text-end"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
			</div>
			  <div class="modal-body">
				<div class="bodycontent">				  
				</div>
			  </div>
			</div>
		  </div>
		</div>
		<script>
			
		  jQuery(document).ready(function() {
			autoPlaytoptabModal();
		  });
		  function autoPlaytoptabModal() {
			  var triggerOpen = jQuery("body").find('[data-tagtoptab]');
			  triggerOpen.click(function() {
				var theModal = jQuery(this).data("bs-target"),
				  toptabSRC = jQuery(this).attr("data-tagtoptab");
				  //finalcontent = jQuery('#'+toptabSRC).html();
				  finalcontent = jQuery('#'+toptabSRC)[0].outerHTML;
				  //alert(finalcontent);
				  //console.log(jQuery('.bodycontent').html());
				  jQuery('.bodycontent').html(finalcontent);
				  jQuery(theModal + ' button.btn-close').click(function() {
				});
			  });
			}
		</script>
		
		
		
		
	<?php endif;
	/* End Top Tab Section block */	
	
	/* Manage content block */
	if (have_rows('manage_content')) :		
		$logo_slider_cnt = 1;
		while (have_rows('manage_content')) : the_row(); 
			if (get_sub_field('top_tab_title')){
				//$slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '', get_sub_field('top_tab_title')));
				$slugid = 'id="'.get_sub_field('top_tab_title').'"';
			} else {
				$slugid = '';
			}
				/* Two Column Layout Start */
				if (get_row_layout() == 'two_column_layout') :
					if( get_sub_field('position_of_image_section') == 'left' ) {
						$clsl = 'pos-left';
					} else {
						$clsl = '';
					}
				?>
					<section class="two-colum-layout <?php echo $clsl; ?> <?php echo the_sub_field('two_column_section_custom_class'); ?>" <?php echo $slugid; ?>>
						<div class="container">
							<div class="title-heading">
							<?php if (get_sub_field('title')){ ?>
								<h2 class="wow fadeInUp" data-wow-delay="0.3s"><?php echo the_sub_field('title'); ?>
									<span class="heading-border"></span>
								</h2>
							<?php } ?>
							<?php if (get_sub_field('sub_title')){ ?>
								<h3 class="wow fadeInUp" data-wow-delay="0.6s"><?php echo the_sub_field('sub_title'); ?></h3>
							<?php } ?>
							</div>
							<div class="two-colum-content">
								<div class="col-left">								
									<div class="d-flex align-items-center h-100">
										<div>
										<div class="content-title-heading wow fadeInUp" data-wow-delay="0.6s">
											<?php if (get_sub_field('content_title')){ ?>
												<h2><?php echo the_sub_field('content_title'); ?>
													<span class="heading-border"></span>
												</h2>
											<?php } ?>
											<?php if (get_sub_field('content_sub_title')){ ?>
												<h3><?php echo the_sub_field('content_sub_title'); ?></h3>
											<?php } ?>
										</div>
										<div class="wow fadeInUp" data-wow-delay="0.6s" data-wow-offset="50">
										<?php if (get_sub_field('description')){ ?>
											<?php echo the_sub_field('description'); ?>
										<?php } ?>
										</div>
										</div>
									</div>
								</div>
								<div class="col-right">
									<div class="two-inner-image-content">
										<?php if (get_sub_field('image')){ ?>
											<img src="<?php echo the_sub_field('image'); ?>"  alt="image" class="wow fadeIn" data-wow-delay="0.3s">
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</section>
				<?php endif; 
				/* Two Column Layout End */
			/* Default Content Start */
			if (get_row_layout() == 'default_content') : ?>
				<section class="curved-section default-content <?php echo the_sub_field('default_section_custom_class'); ?>" <?php echo $slugid; ?>>
					 <?php //if (get_sub_field('default_page_content')) : ?>
						<div class="container section-container-padding">
							<div class="title-heading">
								<?php if (get_sub_field('title')){ ?>
									<h2 class="wow fadeInUp" data-wow-delay="0.3s"><?php echo the_sub_field('title'); ?>
										<span class="heading-border"></span>
									</h2>
								<?php } ?>
								<?php if (get_sub_field('sub_title')){ ?>
									<h3 class="wow fadeInUp" data-wow-delay="0.6s" ><?php echo the_sub_field('sub_title'); ?></h3>
								<?php } ?>
							</div>
							<?php if (get_sub_field('default_page_content')) : ?>
							<div class="row">
								<div class="col-md-12 col-xl-12 align-self-center industry-highlight-text">
									<?php echo the_sub_field('default_page_content'); ?>
								</div>
							</div>
							<?php endif; ?>
						</div>
					<?php //endif; ?>
				</section>
			<?php endif; 
			/* Default Content End */			
			
			/* Icon Box Start */
			if (get_row_layout() == 'icon_box') : ?>
				<section class="<?php echo the_sub_field('icon_box_custom_class'); ?>" <?php echo $slugid; ?>>
					<div class="container">
						<div class="title-heading">
							<?php if (get_sub_field('title')){ ?>
								<h2 class="wow fadeInUp" data-wow-offset="50"><?php echo the_sub_field('title'); ?>
									<span class="heading-border"></span>
								</h2>
							<?php } ?>
							<?php if (get_sub_field('sub_title')){ ?>
								<h3 class="wow fadeInUp" data-wow-delay=".5s"><?php echo the_sub_field('sub_title'); ?></h3>
							<?php } ?>
						</div>
						<?php 
						$dynamic_col = get_sub_field('columns');
						if (have_rows('icon_box_content')) : $s = 1;  ?>
								<div class="row icon-box-list">
								<?php while (have_rows('icon_box_content')) : the_row(); ?>
									<div class="col-lg-<?php echo $dynamic_col; ?>">
										<div class="icon-box wow fadeInUp" data-wow-delay="<?php echo $s; ?>s" data-wow-offset="30">
											<div class="icon-box-inner">
												<?php if (get_sub_field('icon_box_image')){ ?>
												<div class="icon">
												<?php $extension = pathinfo(get_sub_field('icon_box_image'), PATHINFO_EXTENSION);
													if($extension == 'svg'){
														$icon_box_image = get_sub_field('icon_box_image');
														//echo file_get_contents($icon_box_image);  
														/*$response = wp_remote_get($icon_box_image);
														if ( is_array( $response ) && ! is_wp_error( $response ) ) {
															//$headers = $response['headers']; // array of http header lines
															echo $body = $response['body']; // use the content
														}*/
														$stream_opts = [
															"ssl" => [
																"verify_peer"=>false,
																"verify_peer_name"=>false,
															]
														];														 
														echo file_get_contents($icon_box_image, false, stream_context_create($stream_opts));
													} else { ?>
														<img src="<?php echo the_sub_field('icon_box_image'); ?>" alt="<?php echo the_sub_field('icon_box_title'); ?>" />
												<?php } ?>
												</div>
												<?php } ?>
												<?php if (get_sub_field('icon_box_title')){ ?>
													<div class="icon-box-title-content">
														<h3><?php echo the_sub_field('icon_box_title'); ?></h3>
													</div>
												<?php } ?>						   
												<?php if (get_sub_field('icon_box_description')){ ?>
													<div class="iconbox-description p2 showlesscontent"><?php echo the_sub_field('icon_box_description'); ?></div>
												<?php } ?>
												<?php if (get_sub_field('icon_box_url')){ ?>
													<div class="action">
														<a href="<?php echo the_sub_field('icon_box_url'); ?>" class="readmore text-uppercase">Read More</a>
													</div>
												<?php } else { ?>
													<!-- <div class="action">
														<a href="javascript:void(0);" class="readmore text-uppercase">Read More</a>
													</div> -->
												<?php } ?>
											</div>
										</div>
									</div>
								<?php $s = $s + 0.2;
								endwhile; ?>
								</div>
						<?php endif; ?>
					</div>
				</section>
			<?php endif; 
			/* Icon Box end */
			
			/* Testimonial Start */
			if (get_row_layout() == 'testimonials') :  ?>
				<div <?php echo $slugid; ?>>
					<?php echo do_shortcode('[testimonials]');  ?>
				</div>
		    <?php endif; 
			/* Testimonial End */
			
			/* Client Logo section Start */ 
			if (get_row_layout() == 'client_logos') : 
				//$html = "Testing";
				//if( geot_target( 'India' ) ) { ?>
				<section class="<?php echo the_sub_field('client_logos_section_custom_class'); ?>" <?php echo $slugid; ?>>
					<div class="container">
						<div class="title-heading">
							<?php if (get_sub_field('title')){ ?>
								<h2 class="wow fadeInUp" data-wow-offset="50"><?php echo the_sub_field('title'); ?>
									<span class="heading-border"></span>
								</h2>
								<?php //echo do_shortcode('[geot_filter country="" exclude_country="India"]'. $html . '[/geot_filter]'); ?>
							<?php } ?>
							<?php if (get_sub_field('sub_title')){ ?>
								<h3 class="wow fadeInUp" data-wow-offset="50"><?php echo the_sub_field('sub_title'); ?></h3>
							<?php } ?>
						</div>
						<?php $dynamic_col_logo = get_sub_field('columns');						
						if (have_rows('logo_list')) : ?>					
							<div class="client-logos">
								<div class="owl-carousel client-logo-slider" id="<?php echo 'logo_slider_'.$logo_slider_cnt; ?>">
								   <?php while (have_rows('logo_list')) : the_row(); ?>
										<?php if (get_sub_field('logo_image')) { ?>											
											    	<!--<img src="<?php echo the_sub_field('logo_image'); ?>" alt="<?php echo the_sub_field('logo_title'); ?>" >-->
													<?php $extension = pathinfo(get_sub_field('logo_image'), PATHINFO_EXTENSION);
														if($extension == 'svg'){
															$logo_image = get_sub_field('logo_image');
															echo file_get_contents($logo_image);  
														} else { ?>
															<img src="<?php echo the_sub_field('logo_image'); ?>" alt="<?php echo the_sub_field('logo_title'); ?>" />
													<?php } ?>							
										<?php } ?>										
								   <?php endwhile;?>
								</div>
							</div>
							<script>
							jQuery(document).ready(function() {
								jQuery(<?php echo 'logo_slider_'.$logo_slider_cnt; ?>).length && jQuery(<?php echo 'logo_slider_'.$logo_slider_cnt; ?>).owlCarousel({
									loop: true,									
									autoplay: true,
									autoplayTimeout:3000,
									nav: true,
									dots: false,									
									navText: [
										'<span><img src="<?php echo THEME_PATH; ?>/images/icon-angle.svg" alt="navigation right" /></span>',
										'<span><img src="<?php echo THEME_PATH; ?>/images/icon-angle.svg" alt="navigation left" /></span>'									
									],
									responsive : {
											// breakpoint from 0 up
											0 : {
												items:1,
												margin: 20,
											},
											768 : {
												margin: 40,
												items:2,
											},
											992 : {
												margin: 40,
												items:3,
											},											
											1200 : {
												margin: 40,
												items: <?php echo $dynamic_col_logo; ?>,
											},											
										}
									
								})
							})
							</script>
					<?php endif; ?>
					</div>
				</section>
				<?php // } 
				endif; 
			/* Client Logo section End */
			
			/* Insights Start */
			if (get_row_layout() == 'insights') :  ?>
				<div <?php echo $slugid; ?>>
					<?php echo do_shortcode('[insights]'); ?>
				</div>
		    <?php endif; 
			/* Insights End */
			
			/* Case Studies Start */
			if (get_row_layout() == 'case_studies') : ?>
				<div <?php echo $slugid; ?>>
					<?php echo do_shortcode('[case_studies]');  ?>
				</div>
		    <?php endif; 
			/* Case Studies End */
			
		
			
			/* Zig Zag Section Start */
			if (get_row_layout() == 'zig_zag_section') : ?>
				<section class="why-cygnature <?php echo the_sub_field('zig_zag_section_custom_class'); ?>" <?php echo $slugid; ?>>
					<div class="container">
						<div class="title-heading">
							<?php if (get_sub_field('title')){ ?>
								<h2 class="wow fadeInUp" data-wow-delay="0.3s" data-wow-offset="50"><?php echo the_sub_field('title'); ?>
									<span class="heading-border"></span>
								</h2>
							<?php } ?>
							<?php if (get_sub_field('sub_title')){ ?>
								<h3 class="wow fadeInUp" data-wow-delay="0.6s" data-wow-offset="50"><?php echo the_sub_field('sub_title'); ?></h3>
							<?php } ?>
						</div>
						<?php if (have_rows('zig_zag_content')) : ?>
						<div class="zick-zack-content pt-4">
							<?php while (have_rows('zig_zag_content')) : the_row();	?>
									<div class="zick-zack-inner-content">
										<div class="zig-zag-inner-div">
											<div class="col-img">
												<?php if(get_sub_field('image_with_gradient')) { ?>
													<div class="img-content wow fadeInUp" data-wow-delay="0.3s" style="background-image:url('<?php echo the_sub_field('image'); ?>'),linear-gradient(0deg, rgba(12,55,97,1) 0%, rgba(188,217,165,1) 100%)">
														<!-- <img src="" alt="<?php echo the_sub_field('title'); ?>"> -->
													</div>
												<?php } else { ?>
													<div class="img-content wow fadeInUp" data-wow-delay="0.6s" style="background-image:url('<?php echo the_sub_field('image'); ?>')">
														<!-- <img src="" alt="<?php echo the_sub_field('title'); ?>"> -->
													</div>
												<?php } ?>
												<?php if(get_sub_field('icon_image')) { ?>
												<div class="icon-image">
													<?php $extension = pathinfo(get_sub_field('icon_image'), PATHINFO_EXTENSION);
														if($extension == 'svg'){
															$icon_image = get_sub_field('icon_image');
															echo file_get_contents($icon_image);  
														} else { ?>
															<img src="<?php echo the_sub_field('icon_image'); ?>" alt="<?php echo the_sub_field('title'); ?>" />
													<?php } ?>
												</div>
											<?php } ?>
											</div>										
											<div class="col-text">
												<div class="text-content">
													<div>
														<h3 class="wow fadeInUp" data-wow-delay="0.3s"><?php echo the_sub_field('title'); ?></h3>
														<p class="wow fadeInUp" data-wow-delay="0.6s"><?php echo the_sub_field('description'); ?></p>
													</div>
												</div>
											</div>
										</div>
									</div>
							<?php endwhile; ?>
						</div>
						<?php endif; ?>
					</div>
				</section>
		    <?php endif; 
			/* Zig Zag Section End */
			
			/* Contact Us Button Start */
			if (get_row_layout() == 'contact_us_button') : ?>
				<?php if (get_sub_field('contact_us')){ ?>
					<section class="CTA-btn text-center bg-white pb-5 <?php echo the_sub_field('contact_us_button_section_custom_class'); ?>" <?php echo $slugid; ?>>
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<a href="<?php echo the_sub_field('contact_us'); ?>" class="btn" ><?php echo the_sub_field('cta_button_label'); ?></a>
								</div>
							</div>
						</div>
				  </section>
				<?php }
			endif; 
			/* Contact Us Button End */
			
			/* Three Column Layout Start */
			if (get_row_layout() == 'three_column_layout') :
			?>
				<section class="esignature-solution <?php echo the_sub_field('three_column_section_custom_class'); ?>" <?php echo $slugid; ?>>
					<div class="container">
						<div class="title-heading">
							<?php if (get_sub_field('title')){ ?>
								<h2 class="wow fadeInUp" data-wow-delay="0.3s"><?php echo the_sub_field('title'); ?>
									<span class="heading-border"></span>
								</h2>
							<?php } ?>
							<?php if (get_sub_field('sub_title')){ ?>
								<h3 class="wow fadeInUp" data-wow-delay="0.6s"><?php echo the_sub_field('sub_title'); ?></h3>
							<?php } ?>
						</div>
						<?php if (have_rows('three_column_content')) : ?>
							<div class="">
								<div class="row">
								<?php while (have_rows('three_column_content')) : the_row();	?>								
									<div class="col-md-4">
										<div class="d-flex align-items-center h-100">											
											<div class="title-heading text-start">												
												<?php if (get_sub_field('column_image')){ ?>
													<div class="">
														<img src="<?php echo the_sub_field('column_image'); ?>" alt="<?php echo the_sub_field('column_title'); ?>">
													</div>
												<?php } ?>
												<?php if (get_sub_field('column_title')){ ?>
													<h2><?php echo the_sub_field('column_title'); ?>
														<span class="heading-border"></span>
													</h2>
												<?php } ?>
												<?php if (get_sub_field('column_description')){ ?>
													<p class="sub-title"><?php echo the_sub_field('column_description'); ?></p>
												<?php } ?>
												<?php if (get_sub_field('column_url')){ ?>
													<a class="readmore text-uppercase" href="<?php echo the_sub_field('column_url'); ?>">Read More</a>
												<?php } ?>
											</div>
										</div>
									</div>								
								<?php endwhile; ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</section>
		    <?php endif; 
			/* Three Column Layout End */
			
			/* Background Image with Content section Start */
			if (get_row_layout() == 'background_image_with_content') : 	?>
				<section class="background_image_with_content <?php echo the_sub_field('background_image_with_content_custom_class'); ?>" <?php if (get_sub_field('background_image')): ?> style="background-image:url('<?php echo get_sub_field('background_image'); ?>')" <?php endif; ?> <?php echo $slugid; ?> >
					<?php if (get_sub_field('title')){ ?>
						<div class="tag-title">
							<?php echo the_sub_field('tag_title'); ?>
						</div>
					<?php } ?>
					<div class="container">						
						<div class="row">
							<div class="col-md-12">
								<div class="title-heading">
								<?php if (get_sub_field('title')){ ?>
									<h2 class="wow fadeInUp" data-wow-delay="0.3s"><?php echo the_sub_field('title'); ?>
										<span class="heading-border"></span>
									</h2>
								<?php } ?>
								<?php if (get_sub_field('sub_title')){ ?>
									<h3 class="wow fadeInUp" data-wow-delay="0.6s"><?php echo the_sub_field('sub_title'); ?></h3>
								<?php } ?>
								</div>
								<?php if (get_sub_field('description')){ ?>
									<div class="editor-description wow fadeInUp"><?php echo the_sub_field('description'); ?></div>
								<?php } ?>
								<?php if (get_sub_field('button_url')){ ?>
									<div class="dynamic-btn wow fadeInUp"><a href="<?php echo the_sub_field('button_url'); ?>" class="btn wow fadeInUp" ><?php echo the_sub_field('button_label'); ?></a></div>
								<?php } ?>
							</div>
						</div>
					</div>
				</section>
			<?php endif; 
			/* Background Image with Content section End */
				
			/* Icon Box Slider Start */
			if (get_row_layout() == 'icon_box_slider') : ?>
				<section class="<?php echo the_sub_field('icon_box_custom_class'); ?>" <?php echo $slugid; ?>>
					<div class="container">
						<div class="title-heading">
							<?php if (get_sub_field('title')){ ?>
								<h2 class="wow fadeInUp" data-wow-offset="50"><?php echo the_sub_field('title'); ?>
									<span class="heading-border"></span>
								</h2>
							<?php } ?>
							<?php if (get_sub_field('sub_title')){ ?>
								<h3><?php echo the_sub_field('sub_title'); ?></h3>
							<?php } ?>
						</div>
						<div class="icon-box-top-image">
							<?php if (get_sub_field('icon_box_top_image')){ ?>
								<img src="<?php echo the_sub_field('icon_box_top_image'); ?>" alt="<?php echo the_sub_field('title'); ?>">
							<?php } ?>
						</div>
						<?php 
						$dynamic_col = get_sub_field('columns');
						$s = 0;
						if (have_rows('icon_box_content')) :  ?>
								<div class="row icon-box-list">
									<div class="owl-carousel icon-slider">
										<?php while (have_rows('icon_box_content')) : the_row(); ?>
											<div class="icon-box wow fadeInUp" data-wow-delay="<?php echo $s; ?>s">
												<?php if (get_sub_field('icon_box_image')){ ?>
												<div class="icon">
												<?php $extension = pathinfo(get_sub_field('icon_box_image'), PATHINFO_EXTENSION);
													if($extension == 'svg'){
														$icon_box_image = get_sub_field('icon_box_image');
														//echo file_get_contents($icon_box_image);  
														$stream_opts = [
															"ssl" => [
																"verify_peer"=>false,
																"verify_peer_name"=>false,
															]
														];														 
														echo file_get_contents($icon_box_image, false, stream_context_create($stream_opts));
													} else { ?>
														<img src="<?php echo the_sub_field('icon_box_image'); ?>" alt="<?php echo the_sub_field('icon_box_title'); ?>" />
												<?php } ?>
												</div>
												<?php } ?>
												<?php if (get_sub_field('icon_box_title')){ ?>
													<h3><?php echo the_sub_field('icon_box_title'); ?></h3>
												<?php } ?>						   
												<?php if (get_sub_field('icon_box_description')){ ?>
													<div class="description p2 showlesscontent"><?php echo the_sub_field('icon_box_description'); ?></div>
												<?php } ?>
												<?php if (get_sub_field('icon_box_url')){ ?>
													<div class="action">
														<a href="<?php echo the_sub_field('icon_box_url'); ?>" class="readmore text-uppercase">Read More</a>
													</div>
												<?php } else { ?>
													<!-- <div class="action">
														<a href="javascript:void(0);" class="readmore text-uppercase">Read More</a>
													</div> -->
												<?php } ?>
											</div>
										<?php $s = $s + 0.2; endwhile; ?>
									</div>
								</div>
								<script>
								jQuery(document).ready(function() {
									jQuery('.icon-slider').length && jQuery('.icon-slider').owlCarousel({
										loop: false,
										margin: 10,
										autoplay: false,
										nav: true,
										dots: false,
										mouseDrag:false,
									
										navText: [
											'<span><img src="<?php echo THEME_PATH; ?>/images/icon-angle.svg" alt="navigation right" /></span>',
											'<span><img src="<?php echo THEME_PATH; ?>/images/icon-angle.svg" alt="navigation left" /></span>'
										],
										responsive : {
											// breakpoint from 0 up
											0 : {
												items:1,
											},
											768 : {
												items:2,
											},
											992 : {
												items:3,
											},
											1200 : {
												margin: 20,
												items: <?php echo $dynamic_col; ?>,
											},
											// breakpoint from 1 up
											1400 : {
												margin: 40,
												items: <?php echo $dynamic_col; ?>,
											}
										}										
									})
								})
								</script>
						<?php endif; ?>
					</div>
				</section>
			<?php endif; 
			/* Icon Box Slider End */
			
			/* Accordion code start */  
			if (get_row_layout() == 'accordion') : ?> 
			<section class="accordion_section faq-accordian" <?php echo $slugid; ?>>
				<div class="container">
					<div class="title-heading">
						<?php if (get_sub_field('accordion_image')){ ?>
							<div class="icon">
								<img src="<?php echo the_sub_field('accordion_image'); ?>" alt="<?php echo the_sub_field('accordion_title'); ?>" />
							</div>
						<?php } ?>
						<?php if (get_sub_field('accordion_title')){ ?>
							<h2><?php echo the_sub_field('accordion_title'); ?>
								<span class="heading-border"></span>
							</h2>
						<?php } ?>
						<?php if (get_sub_field('accordion_sub_title')){ ?>
							<h3><?php echo the_sub_field('accordion_sub_title'); ?></h3>
						<?php } ?>
					</div>		
					<?php $o = str_replace(' ', '_', get_sub_field('accordion_title'));
					if (have_rows('accordion_content')) : ?>
						<div class="accordion" id="accordionSection<?php echo $o; ?>">								
								<?php $m=1;
								while (have_rows('accordion_content')) : the_row(); ?>
									<div class="accordion-content-item">
										<div class="accordion-item">
											<h2 class="accordion-header" id="accordionheading<?php echo $o.'_'.$m; ?>">
											  <!--<button class="accordion-button <?php if($m != 1){ ?> collapsed <?php } ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $o.'_'.$m; ?>" aria-expanded="true" aria-controls="collapse<?php echo $o.'_'.$m; ?>">  -->
											  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $o.'_'.$m; ?>" aria-expanded="true" aria-controls="collapse<?php echo $o.'_'.$m; ?>">
												<?php if (get_sub_field('accordion_content_title')){ ?>
													<span><?php echo the_sub_field('accordion_content_title'); ?></span>
												<?php } ?>	
											  </button>
											</h2>
											<!--<div id="collapse<?php echo $o.'_'.$m; ?>" class="accordion-collapse collapse <?php if($m == 1){ ?> show <?php } ?>" aria-labelledby="accordionheading<?php echo $o.'_'.$m; ?>" data-bs-parent="#accordionSection<?php echo $o; ?>">-->
											<div id="collapse<?php echo $o.'_'.$m; ?>" class="accordion-collapse collapse" aria-labelledby="accordionheading<?php echo $o.'_'.$m; ?>" data-bs-parent="#accordionSection<?php echo $o; ?>">
											  <div class="accordion-body">
												<?php if (get_sub_field('accordion_content_description')){ ?>
													<div class="description p2"><?php echo the_sub_field('accordion_content_description'); ?></div>
												<?php } ?>
											  </div>
											</div>
										</div>
									</div>
								<?php $m++; 
								endwhile; ?>
						</div>
					<?php $o++;  
					endif; ?>								
				</div>
			</section>
			<?php endif;  
			/* Accordion code end */
			
			/* Offering Tab code start */  
			if (get_row_layout() == 'offering_tab') : ?> 
			<section class="offering-tab" <?php echo $slugid; ?>>
				<div class="container">
					<div class="title-heading">
						<?php if (get_sub_field('offering_tab_title')){ ?>
							<h2 class="wow fadeInUp" data-wow-delay="0.3s"><?php echo the_sub_field('offering_tab_title'); ?>
								<span class="heading-border"></span>
							</h2>
						<?php } ?>
						<?php if (get_sub_field('offering_tab_sub_title')){ ?>
							<h3 class="wow fadeInUp" data-wow-delay="0.6s"><?php echo the_sub_field('offering_tab_sub_title'); ?></h3>
						<?php } ?>
					</div>	
					<?php if (have_rows('tabs')) : ?>					
							<div class="row">
								<?php while (have_rows('tabs')) : the_row();	?>								
									<div class="col-md-3">
										<div class="content">											
											<div class="title text-start">												
												<?php if (get_sub_field('tab_icon')){ ?>
													<div class="">
														<img src="<?php echo the_sub_field('tab_icon'); ?>" alt="<?php echo the_sub_field('tab_title'); ?>">
													</div>
												<?php } ?>
												<?php if (get_sub_field('tab_title')){ ?>
													<h3><?php echo the_sub_field('tab_title'); ?>
														<span class="heading-border"></span>
													</h2>
												<?php } ?>		
											</div>
											<?php //$c = str_replace(' ', '_', get_sub_field('tab_title'));
											$c = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '_', get_sub_field('tab_title')));
											if (have_rows('inner_content')) : 
											$cm=1;
											?>
												<div class="list-tabs accordion" id="accordionSection<?php echo $c; ?>">
													<?php while (have_rows('inner_content')) : the_row(); ?>
														<div class="list-item wow fadeInDown" data-wow-delay="0.3s">
															<?php if (get_sub_field('inner_content_title')){ ?>
																<h4 class="list-title accordion-header" id="accordionheading<?php echo $c.'_'.$cm; ?>">
																	<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $c.'_'.$cm; ?>" aria-expanded="true" aria-controls="collapse<?php echo $c.'_'.$cm; ?>">
																		<span><?php echo the_sub_field('inner_content_title'); ?></span>
																	</button>
																</h4>
																<div id="collapse<?php echo $c.'_'.$cm; ?>" class="accordion-collapse collapse" aria-labelledby="accordionheading<?php echo $c.'_'.$cm; ?>" data-bs-parent="#accordionSection<?php echo $c; ?>">
																  <div class="accordion-body">
																	<?php if (get_sub_field('inner_content_description')){ ?>
																		<div class="description"><?php echo the_sub_field('inner_content_description'); ?></div>
																	<?php } ?>
																  </div>
																</div>
															<?php } ?>
														</div>
													<?php $cm++;  
													endwhile; ?>
												</div>
											<?php $c++; 
											endif; ?>
										</div>
									</div>								
								<?php endwhile; ?>
							</div>					
					<?php endif; ?>								
				</div>
			</section>
			<?php endif;  
			/* Offering Tab code end */
			
			/* Global Address Section Start */
			if (get_row_layout() == 'global_address') : ?>
				<section class="address-cls <?php echo the_sub_field('global_address_class'); ?>" <?php echo $slugid; ?>>
					<div class="container">
						<?php if (have_rows('address')) : ?>
						<div class="address-content pt-4">
							<?php $j = 0;
							while (have_rows('address')) : the_row();	?>
									<div class="address-inner-content">
										<div class="address-inner-div">
											<div class="address-top-section <?php echo the_sub_field('address_class'); ?>">
												<?php if(get_sub_field('country_icon')) { ?>
													<div class="country-icon">
														<img src="<?php echo the_sub_field('country_icon'); ?>" alt="<?php echo the_sub_field('country_name'); ?>" />
													</div>
												<?php } ?>
												<?php if(get_sub_field('country_name')) { ?>
													<div class="country-name">
														<h3><?php echo the_sub_field('country_name'); ?></h3>
													</div>
												<?php } ?>												
											</div>						
											<?php if(get_sub_field('address_description')) {
												$add_desc = get_sub_field('address_description');
												$pieces = explode(" ", $add_desc);
												$first_part = implode(" ", array_splice($pieces, 0, 8));
											?>
											<div class="address-bottom-section">
												<div class="text-content">
													<div class="address-description"><?php echo $first_part; ?></div>
													<?php //echo wp_trim_words( $add_desc, 15 ); ?>
													<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#exampleModal-<?php echo $j; ?>" class="read-more-link" title="Read More">Read More<i class="bi bi-arrow-right" aria-hidden="true"></i></a>
												</div>
											</div>
											<?php } ?>
										</div>
									</div>
									
									<!-- Modal popup section start -->
									<div class="modal fade" id="exampleModal-<?php echo $j; ?>" tabindex="-1" aria-labelledby="exampleModalLabel-<?php echo $j; ?>" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered modal-lg">
											<div class="modal-content">
												<div class="modal-header flex-lg-row flex-column border-bottom-0">
													<?php if (get_sub_field('country_name')) : ?>
														<h4 class="modal-title order-1 order-lg-0" id="exampleModalLabel-<?php echo $j; ?>"><?php echo the_sub_field('country_name'); ?></h4>
													<?php endif; ?>
													<a href="javascript:void(0);" class="back-link mb-4 mb-lg-0 align-self-end" data-bs-dismiss="modal" aria-label="Close" style="top:-4px;"><i class="bi bi-x-lg position-relative" aria-hidden="true"></i></a>
												</div>
												<div class="modal-body pt-0">
													<?php
													if (get_sub_field('address_description')) :
														echo the_sub_field('address_description');
													endif;
													?>
												</div>
											</div>
										</div>
									</div>
									<!-- Modal popup section end --> 
							<?php $j++;
							endwhile; ?>
						</div>
						<?php endif; ?>
					</div>
				</section>
		    <?php endif; 
			/* Global Address Section End */
			
			/* Our Solution Section Start */
			if (get_row_layout() == 'our_solution_section') : ?>
				<section class="our-solution-cls <?php echo the_sub_field('our_solution_custom_class'); ?>" <?php echo $slugid; ?>>
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="title-heading">
								<?php if (get_sub_field('our_solution_title')){ ?>
									<h2 class="wow fadeInUp" data-wow-delay="0.3s"><?php echo the_sub_field('our_solution_title'); ?>
										<span class="heading-border"></span>
									</h2>
								<?php } ?>
								<?php if (get_sub_field('our_solution_sub_title')){ ?>
									<h3 class="wow fadeInUp" data-wow-delay="0.6s"><?php echo the_sub_field('our_solution_sub_title'); ?></h3>
								<?php } ?>
								</div>
								<?php if (get_sub_field('our_solution_main_content')){ ?>
									<div class="editor-description wow fadeInUp"><?php echo the_sub_field('our_solution_main_content'); ?></div>
								<?php } ?>
							</div>
						</div>
						<?php if (have_rows('our_solution')) : 
						$img_cnt = 1; 
						$con_cnt = 1;  ?>
						<div class="d-flex align-items-start solution-tab-content">								
							<div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
								<?php while (have_rows('our_solution')) : the_row(); ?>
									<div class="nav-link <?php if($img_cnt == 1){ ?> active <?php } ?>" id="v-pills-home-tab-<?php echo $img_cnt; ?>" data-bs-toggle="pill" data-bs-target="#v-pills-home-<?php echo $img_cnt; ?>" role="tab" aria-controls="v-pills-home-<?php echo $img_cnt; ?>" aria-selected="true">
										<?php echo the_sub_field('our_solution_content'); ?>
									</div>
								<?php $img_cnt++; 
									endwhile; ?>	
							</div>
							<div class="tab-content" id="v-pills-tabContent">
								<?php while (have_rows('our_solution')) : the_row(); ?>
									<div class="tab-pane fade <?php if($con_cnt == 1){ ?> show active <?php } ?> " id="v-pills-home-<?php echo $con_cnt; ?>" role="tabpanel" aria-labelledby="v-pills-home-tab-<?php echo $con_cnt; ?>">
										<div class="img-content">
											<img src="<?php echo the_sub_field('our_solution_image'); ?>" alt="" />
										</div>
									</div> 
								<?php $con_cnt++; 
								endwhile; ?>
							</div>
						</div>
						<?php endif; ?>
					</div>
				</section>
		    <?php endif; 
			/* Our Solution Section End */
			
			$logo_slider_cnt++;
		endwhile;
	endif; 	
	?>
</div>