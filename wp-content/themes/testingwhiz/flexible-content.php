<div class="main">
	<?php
	/* banner content */
		if (have_rows('banner')) : ?>
			<section class="banner-content <?php echo the_field('banner_class'); ?>">    
				<?php while (have_rows('banner')) : the_row(); ?>
					<div class="banner-inner-content w-100" style="background-image:url('<?php echo the_sub_field('background_image'); ?>')">  
						<div class="container-fluid">
						 <div class="row" >
							<div class="col-lg-7">
								<div class="d-flex align-items-center h-100">
									<div class="text-content ">
										<?php if (get_sub_field('title')) :  ?>
											<h1 class="wow fadeInUp" data-wow-delay="0.3s"><?php echo the_sub_field('title'); ?></h1>
										<?php endif; ?>
										<?php if (get_sub_field('sub_title')) :  ?>
											<h3 class="text-white wow fadeInUp" data-wow-delay="0.6s"><?php echo the_sub_field('sub_title'); ?></h3>
										<?php endif; ?>										
										<?php if (get_sub_field('primary_button_url') && get_sub_field('primary_button_label') && !is_front_page()) : ?>
											<a href="<?php echo the_sub_field('primary_button_url'); ?>" class="btn me-3 wow fadeInUp" data-wow-delay="0.9s"><?php echo the_sub_field('primary_button_label'); ?></a>
										<?php endif; ?>
										<?php if (get_sub_field('secondary_button_url') && get_sub_field('secondary_button_label')) : ?>
											<a href="<?php echo the_sub_field('secondary_button_url'); ?>" class="btn wow fadeInUp" data-wow-delay="0.9s"><?php echo the_sub_field('secondary_button_label'); ?></a>
										<?php endif; ?>
									</div>
								</div>
							</div>
							<div class="col-lg-5 d-md-none d-none d-lg-block">
								<div class="img-content">
								<?php if(get_sub_field('video_url')){ 
									?>
									<!--<iframe class="banner-video" src="<?php echo the_sub_field('video_url'); ?>?autoplay=1&amp;modestbranding=1&amp;showinfo=0" allowfullscreen="allowfullscreen"></iframe>-->
									<video class="banner-video animate__animated wow fadeIn " data-wow-duration="3s" data-wow-delay="1s" loop="true" autoplay="autoplay" muted/> 										  
										<source src="<?php echo the_sub_field('video_url'); ?>" type="video/mp4"> 
									</video>
									<?php
								} else {
									if (get_sub_field('image')) :
										?><img src="<?php echo the_sub_field('image'); ?>" class="w-100 wow fadeIn" data-wow-duration="3s" data-wow-delay="1s" alt="<?php echo the_sub_field('title'); ?>"><?php
									endif;
								} ?>
								<?php /* if (get_sub_field('image')) : ?>
									<img src="<?php echo the_sub_field('image'); ?>" class="w-100" alt="<?php echo the_sub_field('title'); ?>">
								<?php endif; */ ?>
								</div>
							</div>
						</div>
						</div>
					</div>    
				<?php endwhile;	?> 
			</section>
		<?php endif;
	/* End banner content */	
	
	/* Home Content Sections */ 
	if (get_field('features_title') || get_field('features_content') || get_field('features_sub_title')){ ?>
	<section class="py-0">
		 <div class="container section-container-padding">
			<div class="title-heading">
				<?php if (get_field('features_title')){ ?>
					<h2 class="wow fadeInUp" data-wow-delay="0.3s"><?php echo the_field('features_title'); ?>
						<span class="heading-border"></span> 
					</h2>
				<?php } ?>
				<?php if (get_field('features_sub_title')){ ?>
					<h3 class="wow fadeInUp" data-wow-delay="0.6s" ><?php echo the_field('features_sub_title'); ?></h3>
				<?php } ?>
			</div>
			<div class="row">
				<div class="col-md-12 col-xl-12 align-self-center industry-highlight-text">
					<?php echo the_field('features_content'); ?>
				</div>
			</div>
		</div>
	</section>
	<?php } 
	/* End Home Content Sections */
	
	/* Product Features Sections */
	if (have_rows('product_features')) : ?>
	<section class="py-0">
		<div class="product-feature-tab">
			<ul class="nav nav-tabs">
				<?php $cnt = 1;
				while (have_rows('product_features')) : the_row(); 
					$dynamicid = str_replace(' ', '_', get_sub_field('tab_title'));  ?>				
					<li class="nav-item">						
						<a href="#<?php echo $dynamicid; ?>" class="nav-link <?php if($cnt==1){ ?>active<?php } ?>" data-bs-toggle="tab">
							<?php if (get_sub_field('tab_image')){ ?>
								<span class="icon">
									<?php $extension = pathinfo(get_sub_field('tab_image'), PATHINFO_EXTENSION);
										if($extension == 'svg'){
											$tab_image = get_sub_field('tab_image');
											$stream_opts = [
												"ssl" => [
													"verify_peer"=>false,
													"verify_peer_name"=>false,
												]
											];														 
											echo file_get_contents($tab_image, false, stream_context_create($stream_opts));
										} else { ?>
											<img src="<?php echo the_sub_field('tab_image'); ?>" alt="<?php echo the_sub_field('tab_title'); ?>">
									<?php } ?>
								</span>
							<?php } ?> <?php echo the_sub_field('tab_title'); ?>
						</a>
					</li>
				<?php $cnt++;
				endwhile; ?>
			</ul>
			<span class="ac-fow"><i class="fas fa-angle-left"></i></span>
			<span class="ac-back"><i class="fas fa-angle-right"></i></span>
		</div>
		<div class="product-feature">	
			<div class="tab-content">
				<?php $o=1; $tabcnt = 1;
				while (have_rows('product_features')) : the_row(); 
				$dynamicinnerid = str_replace(' ', '_', get_sub_field('tab_title'));  ?>
				<section id="<?php echo $dynamicinnerid; ?>" class="tab-pane <?php if($tabcnt==1){ ?>show active<?php } ?>">
					<div class="container">
						<div class="two-colum-layout cfr-tw-col-item left-title">																					
							<div class="d-flex align-items-center h-100 ">
								<div>
									<?php if (get_sub_field('title')){ ?>
									<div class="content-title-heading">
										<h2 class=""><?php echo the_sub_field('title'); ?>
											<span class="heading-border"></span>
										</h2>
									</div>
									<?php } ?>						   
									<?php if (get_sub_field('description')){ ?>
										<div class="description p2"><?php echo the_sub_field('description'); ?></div>
									<?php } ?>
								</div>
							</div>
						</div>				
						<?php if (have_rows('features')) :  ?>
							<div class="accordion" id="accordionExample<?php echo $o; ?>">								
								<?php $m=1;
								while (have_rows('features')) : the_row(); ?>
									<div class="accordion-content-item">
										<div class="accordion-item">
											<h2 class="accordion-header" id="heading<?php echo $o.'_'.$m; ?>">
											  <!--<button class="accordion-button <?php if($m != 1){ ?> collapsed <?php } ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $o.'_'.$m; ?>" aria-expanded="true" aria-controls="collapse<?php echo $o.'_'.$m; ?>">-->
											  <button class="accordion-button <?php if($m == 1 && $o == 1){ echo ''; } else { ?> collapsed <?php } ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $o.'_'.$m; ?>" aria-expanded="true" aria-controls="collapse<?php echo $o.'_'.$m; ?>">
												<?php if (get_sub_field('feature_title')){ ?>
													<span><?php echo the_sub_field('feature_title'); ?></span>
												<?php } ?>	
											  </button>
											</h2>
											<div id="collapse<?php echo $o.'_'.$m; ?>" class="accordion-collapse collapse <?php if($m == 1 && $o == 1){ ?> show <?php } ?>" aria-labelledby="heading<?php echo $o.'_'.$m; ?>" data-bs-parent="#accordionExample<?php echo $o; ?>">
											  <div class="accordion-body">
												<?php if (get_sub_field('feature_description')){ ?>
													<div class="description p2"><?php echo the_sub_field('feature_description'); ?></div>
												<?php } ?>
											  </div>
											</div>
										</div>
										<?php /*if (get_sub_field('feature_title')){ ?>
											<span><?php echo the_sub_field('feature_title'); ?></span>
										<?php } ?>						   
										<?php if (get_sub_field('feature_description')){ ?>
											<div class="description p2"><?php echo the_sub_field('feature_description'); ?></div>
										<?php } */ ?>
									</div>
								<?php $m++; 
								endwhile; ?>
							</div>
						<?php $o++;  
						endif; ?>
						<?php if (get_sub_field('button_url')){ ?>							
							<div class="col-md-12 text-center">
								<a href="<?php echo the_sub_field('button_url'); ?>" class="link" ><?php echo the_sub_field('button_label'); ?></a>
							</div>
						<?php } ?>
					</div>
				</section>
			<?php $tabcnt++;
			endwhile;  ?>		
			</div>
		</div>	
	</section>
	<?php endif; 
	/* End Product Features Sections */	
	
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
	

	/* Manage content block */
	if (have_rows('manage_content')) :
		while (have_rows('manage_content')) : the_row(); 
			if (get_sub_field('top_tab_id')){
				//$slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '', get_sub_field('top_tab_id')));
				$slugid = 'id="'.get_sub_field('top_tab_id').'"';
			} else {
				$slugid = '';
			}
			
			/* Default Content Start */
			if (get_row_layout() == 'default_content') : ?>
				<section class="curved-section default-content <?php echo the_sub_field('default_section_custom_class'); ?>" <?php echo $slugid; ?>>
					 <?php if (get_sub_field('default_page_content')) : ?>
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
						 <div class="row">
								<div class="col-md-12 col-xl-12 align-self-center industry-highlight-text">
									<?php echo the_sub_field('default_page_content'); ?>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</section>
			<?php endif; 
			/* Default Content End */			
			
			/* Icon Box Start */
			if (get_row_layout() == 'icon_box') : ?>
				<section class="<?php echo the_sub_field('icon_box_custom_class'); ?>" <?php echo $slugid; ?>>
					<div class="container-fluid">
						<div class="title-heading">
							<?php if (get_sub_field('title')){ ?>
								<h2 class="wow fadeInUp" data-wow-offset="50"><?php echo the_sub_field('title'); ?>
									<span class="heading-border"></span>
								</h2>
							<?php } ?>
							<?php if (get_sub_field('sub_title')){ ?>
								<h3 class="wow fadeInUp" data-wow-delay=".5s" data-wow-offset="50"><?php echo the_sub_field('sub_title'); ?></h3>
							<?php } ?>
						</div>
						<?php 
						$dynamic_col = get_sub_field('columns');
						if (have_rows('icon_box_content')) : $s = 1;  ?>
								<div class="row icon-box-list">
								<?php while (have_rows('icon_box_content')) : the_row(); ?>
									<div class="col-lg-<?php echo $dynamic_col; ?>">
									<div class="icon-box wow fadeInUp" data-wow-delay="<?php echo $s; ?>s" data-wow-offset="30">
											<?php if (get_sub_field('icon_box_image')){ ?>
											<div class="icon">
												<?php $extension = pathinfo(get_sub_field('icon_box_image'), PATHINFO_EXTENSION);
													if($extension == 'svg'){
														$icon_box_image = get_sub_field('icon_box_image');
														$stream_opts = [
															"ssl" => [
																"verify_peer"=>false,
																"verify_peer_name"=>false,
															]
														];														 
														echo file_get_contents($icon_box_image, false, stream_context_create($stream_opts));
													} else { ?>
														<img src="<?php echo the_sub_field('icon_box_image'); ?>" alt="<?php echo the_sub_field('icon_box_title'); ?>">
												<?php } ?>
											</div>
											<?php } ?>
											<?php if (get_sub_field('icon_box_title')){ ?>
												<div class="icon-box-title-content">
													<h3><?php echo the_sub_field('icon_box_title'); ?></h3>
												</div>
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
			if (get_row_layout() == 'client_logos') : ?>
				<section class="<?php echo the_sub_field('client_logos_section_custom_class'); ?>" <?php echo $slugid; ?>>
					<div class="container">
						<div class="title-heading">
							<?php if (get_sub_field('title')){ ?>
								<h2 class="wow fadeInUp" data-wow-offset="50"><?php echo the_sub_field('title'); ?>
									<span class="heading-border"></span>
								</h2>
							<?php } ?>
							<?php if (get_sub_field('sub_title')){ ?>
								<h3 class="wow fadeInUp" data-wow-offset="50"><?php echo the_sub_field('sub_title'); ?></h3>
							<?php } ?>
						</div>
						<?php if (have_rows('logo_list')) : ?>					
							<div class="client-logos">
								<div class="owl-carousel client-logo-slider">
								   <?php while (have_rows('logo_list')) : the_row(); ?>
										<?php if (get_sub_field('logo_image')) { ?>
												<img src="<?php echo the_sub_field('logo_image'); ?>" alt="<?php echo the_sub_field('logo_title'); ?>" >
										<?php } ?>
								   <?php endwhile;?>
								</div>
							</div>
							<script>
							jQuery(document).ready(function() {
								jQuery('.client-logo-slider').length && jQuery('.client-logo-slider').owlCarousel({
									loop: false,
									
									autoplay: true,
									nav: false,
									dots: true,
									
									navText: [
										'<span><i class=\'bi bi-chevron-left\'></i></span>Previous',
										'Next<span><i class=\'bi bi-chevron-right\'></i></span>'
									],
									responsive : {
											// breakpoint from 0 up
											0 : {
												items:2,
												margin: 40,
											},
											768 : {
												items:3,
												margin: 60,
											},
											992 : {
												items:3,
												margin: 60,
											},
											1200 : {
												items: 5,
												margin: 100,
											},											
										}
									
								})
							})
							</script>
					<?php endif; ?>
					</div>
				</section>
			<?php  endif; 
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
									<div class="content-title-heading">
										<?php if (get_sub_field('content_title')){ ?>
											<h2><?php echo the_sub_field('content_title'); ?>
												<span class="heading-border"></span>
											</h2>
										<?php } ?>
										<?php if (get_sub_field('content_sub_title')){ ?>
											<h3><?php echo the_sub_field('content_sub_title'); ?></h3>
										<?php } ?>
									</div>
									<?php if (get_sub_field('description')){ ?>
										<?php echo the_sub_field('description'); ?>
									<?php } ?>
									</div>
								</div>
							</div>
							<div class="col-right">
								<?php if (get_sub_field('image')){ ?>
									<img src="<?php echo the_sub_field('image'); ?>"  alt="image" class="wow fadeIn" data-wow-delay="0.3s">
								<?php } ?>
							</div>
						</div>
					</div>
				</section>
		    <?php endif; 
			/* Two Column Layout End */
			
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
									<a href="<?php echo the_sub_field('contact_us'); ?>" class="btn wow fadeInUp" data-wow-offset="50" ><?php echo the_sub_field('cta_button_label'); ?></a>
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
				<section class="background_image_with_content <?php echo the_sub_field('background_image_with_content_custom_class'); ?>" <?php if (get_sub_field('background_image')): ?> style="background-image:url('<?php echo get_sub_field('background_image'); ?>')" <?php endif; ?> <?php echo $slugid; ?>>
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
									<div class="dynamic-btn wow fadeInUp"><a href="<?php echo the_sub_field('button_url'); ?>" class="btn btn-white wow fadeInUp" ><span class="text"><?php echo the_sub_field('button_label'); ?></span></a></div>
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
					<div class="container-fluid">
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
						<?php 
						$dynamic_col = get_sub_field('columns');
						if (have_rows('icon_box_content')) :  ?>
								<div class="row icon-box-list">
									<div class="owl-carousel icon-slider">
										<?php while (have_rows('icon_box_content')) : the_row(); ?>
											<div class="icon-box wow fadeInUp" data-wow-delay="<?php echo $s; ?>s" data-wow-offset="50">
												<?php if (get_sub_field('icon_box_image')){ ?>
												<div class="icon">
													<?php $extension = pathinfo(get_sub_field('icon_box_image'), PATHINFO_EXTENSION);
														if($extension == 'svg'){
															$icon_box_image = get_sub_field('icon_box_image');
															$stream_opts = [
																"ssl" => [
																	"verify_peer"=>false,
																	"verify_peer_name"=>false,
																]
															];														 
															echo file_get_contents($icon_box_image, false, stream_context_create($stream_opts));
														} else { ?>
															<img src="<?php echo the_sub_field('icon_box_image'); ?>" alt="<?php echo the_sub_field('icon_box_title'); ?>">
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
										dots: true,
										mouseDrag:false,
									
										navText: [
											'<span><img src="<?php echo THEME_PATH; ?>images/icon-angle.svg" alt="navigation right" /></span>',
											'<span><img src="<?php echo THEME_PATH; ?>images/icon-angle.svg" alt="navigation left" /></span>'
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
			
			/* Video Section Start */
			if (get_row_layout() == 'video_section') : ?>
				<section class="videos-section <?php echo the_sub_field('videos_custom_class'); ?>" <?php echo $slugid; ?>>
					<div class="container">						
						<?php if (have_rows('videos')) : ?>
						<div class="zick-zack-content pt-4">
							<?php while (have_rows('videos')) : the_row();	?>
									<div class="">
										<div class="card h-100 wow fadeInUp" data-wow-delay="<?php echo $s; ?>s" data-wow-offset="30">
										  <div class="card-image-box">
											<?php if (get_sub_field('video_id') && get_sub_field('video_url')) : ?>	
												<a href="#" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#videoModal" data-tagVideo="<?php echo the_sub_field('video_url'); ?>" >
												  <div class="card-image cover-bg" loading="lazy" style="background-image: url('https://img.youtube.com/vi/<?php echo the_sub_field('video_id'); ?>/0.jpg');"></div>
												</a>
											<?php endif; ?>
										  </div>
										  <div class="card-body">
											<?php if (get_sub_field('video_title')) : ?>
											  <h5 class="card-title">
												  <?php echo the_sub_field('video_title'); ?>
											  </h5>
											<?php endif; ?>
											<?php
											if (get_sub_field('video_description')) : ?>
											  <p class="card-text"><?php echo the_sub_field('video_description'); ?></p>
											<?php endif; ?>
										  </div>
										</div>
									  </div>
							<?php endwhile; ?>
						</div>
						<div class="modal fade" id="videoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
						  <div class="modal-dialog modal-lg">
							<div class="modal-content">
							  <div class="modal-body">
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								<div class="ratio ratio-16x9">								  
								  <iframe src="" allow="autoplay;" allowfullscreen></iframe>
								</div>
							  </div>
							</div>
						  </div>
						</div>
						<script>
						  jQuery(document).ready(function() {
							autoPlayYouTubeModal();
						  });
						  function autoPlayYouTubeModal() {
							  var triggerOpen = jQuery("body").find('[data-tagVideo]');
							  triggerOpen.click(function() {
								var theModal = jQuery(this).data("bs-target"),
								  videoSRC = jQuery(this).attr("data-tagVideo"),
								  videoSRCauto = videoSRC + "?autoplay=1";
								jQuery(theModal + ' iframe').attr('src', videoSRCauto);
								jQuery(theModal + ' button.btn-close').click(function() {
								  jQuery(theModal + ' iframe').attr('src', videoSRC);
								});
							  });
							}
						</script>
						<?php endif; ?>
					</div>
				</section>
		    <?php endif; 
			/* Video Section End */
			
			/* Alert box section Start */
			if (get_row_layout() == 'alert_box') : 	?>
				<section class="alert_box <?php echo the_sub_field('alert_box_custom_class'); ?>" <?php echo $slugid; ?>>
					<div class="container">						
						<div class="row">
							<div class="col-md-12">
								<?php if (get_sub_field('alert_box_description')){ ?>
									<div class="alert <?php echo the_sub_field('alert_box_options'); ?> d-flex align-items-center" role="alert">
										<?php if (get_sub_field('alert_box_options') == 'alert-primary'){ ?>
											<i class="fas fa-info-circle"></i>
										<?php } else if(get_sub_field('alert_box_options') == 'alert-success') { ?>	
											<i class="fas fa-check-circle"></i>
										<?php } else if(get_sub_field('alert_box_options') == 'alert-warning' || get_sub_field('alert_box_options') == 'alert-danger') { ?>	
											<i class="fas fa-exclamation-triangle"></i>
										<?php } ?>
										<div><?php echo the_sub_field('alert_box_description'); ?></div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</section>
			<?php endif; 
			/* Alert box section End */
			
			/* Table section Start */
			if (get_row_layout() == 'table_section') :
			?>
				<section class="table-section <?php echo the_sub_field('table_custom_class'); ?>" <?php echo $slugid; ?>>
					<div class="container">
						<div class="title-heading">
							<?php if (get_sub_field('table_main_title')){ ?>
								<h2><?php echo the_sub_field('table_main_title'); ?>
									<span class="heading-border"></span>
								</h2>
							<?php } ?>
							<?php if (get_sub_field('table_sub_title')){ ?>
								<h3><?php echo the_sub_field('table_sub_title'); ?></h3>
							<?php } ?>
						</div>
						<?php if (have_rows('table_rows')) : ?>
							<div class="row">
								<table class="table">
									<?php while (have_rows('table_rows')) : the_row();	?>								
										<tr class="<?php echo the_sub_field('row_custom_class'); ?>">
											<td>
												<?php if (get_sub_field('first_column')){
													echo the_sub_field('first_column'); 
												} ?>
											</td>
											<td>
												<?php if (get_sub_field('second_column')){
													echo the_sub_field('second_column'); 
												} ?>
											</td>
										</tr>								
									<?php endwhile; ?>
								</table>
							</div>
						<?php endif; ?>
						<div class="table-bottom-text">
							<?php if (get_sub_field('table_bottom_text')){ ?>
								<h3><?php echo the_sub_field('table_bottom_text'); ?></h3>
							<?php } ?>
						</div>
					</div>
				</section>
		    <?php endif; 
			/* Table section End */
			
		endwhile;
	endif; 	
	?>
</div>