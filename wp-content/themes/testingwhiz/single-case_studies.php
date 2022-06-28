<?php
get_header();
$pdfLink = get_field('pdf_link', $post->ID);
if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <!-- Banner Slider start -->
		<?php
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), '1920w');
        ?>
		<div class="case-study">
			<section class="banner-content">    
				<div class="banner-inner-content w-100" <?php if ($featured_img_url) : ?> style="background-image: url('<?php echo $featured_img_url; ?>')" <?php endif; ?>>  
					<div class="container">
						<div class="d-md-flex flex-wrap slide-content-main align-items-center w-100">
							<div class="banner-caption text-white">
								<h1 class="banner-title text-white">
									<?php the_title(); ?>
								</h1>
							</div>
						</div>
					</div>
				</div>    
			</section>
			<!-- Banner Slider end -->
			<div>
				<section class="bg-white no-min-height">               
						<div class="blog-detail">
							<!--<div class="blog-share-social d-none d-xl-block">
								<div class="sidebar-social">
									<div class="share-social-box">
										<a href="javascript:void(0)" title="Share" class="share-btn"><i class="bi bi-share" aria-hidden="true"></i></a>
										<?php echo sharethis_inline_buttons(); ?>
									</div>
								</div>
							</div>-->
							<div class="container section-container-padding pt-0 pb-0">
								<div class="single-container">                                
									<div class="container-with-sidebar">
										<article class="blog-contents pe-md-3 pe-xl-4 pe-xxl-5">
											<h2 class="section-title mb-3">Summary</h2>
											<!--<div class="blog-share-social d-xl-none mb-5">
												<div class="sidebar-social">
													<div class="share-social-box">
														<a href="javascript:void(0)" title="Share" class="share-btn"><i class="bi bi-share" aria-hidden="true"></i></a>
														<?php echo sharethis_inline_buttons(); ?>
													</div>
												</div>
											</div>-->
											<?php the_content(); ?>
										</article>	
										<aside class="sidebar">
											<div class="sidebar-title">
												<h4>Download My Copy</h4>
											</div>
											<div class="sidebar-block-body">
												<?php echo do_shortcode('[contact-form-7 id="666" title="Download Copy"]'); ?>
											</div>
										</aside>
									</div>
								</div>                            
							</div>
						</div>               
				</section>
			</div>
		</div>
<?php endwhile;
endif; ?>

<!-- Download PDF after submit -->
<script>
    var siteurl = '<?php echo $pdfLink; ?>';
    if (siteurl) {
        document.addEventListener('wpcf7mailsent', function(e) {
            // alert(siteurl);
            if (e.detail.contactFormId == 666) {
                var pdfurl = siteurl ? siteurl : '';

                e.stopPropagation();
                // You can place extra checks here.
                var tab = window.open(pdfurl, '_blank');
                tab.focus();
            }
        }, false);
    }
</script>

<?php get_footer(); ?>