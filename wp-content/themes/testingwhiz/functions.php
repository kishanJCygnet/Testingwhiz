<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() { 
$parenthandle = 'twentytwentyone-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
	
    wp_enqueue_style( 'testingwhiz-style', get_stylesheet_uri());
}

//Custom walker class file include for Wp navigation menu.
require_once('inc/custom-wp-walker-class.php');

require_once('inc/ajax_functions_group.php');

/**
 * Advanced custom field option page
 */
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'  => 'Theme Options',
        'menu_title'  => 'Theme Options',
        'menu_slug'   => 'theme-options',
        'capability'  => 'edit_posts',
        'redirect'    => false
    ));
}

/**
  Function name : testingwhiz_setup
  Sets up theme defaults and registers support for various WordPress features.
  Note that this function is hooked into the after_setup_theme hook, which
  runs before the init hook. The init hook is too late for some features, such
  as indicating support for post thumbnail .
 */
function testingwhiz_setup()
{
    //Load testingwhiz-deparments theme
    load_theme_textdomain('testingwhiz');
    //Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');
    //Add the size of featured image on posts and pages.
    //add_image_size('testingwhiz_setup-featured-image', 2000, 1200, true);
    //Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support('html5', array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    //Enable support for Post Formats.
    add_theme_support('post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
    ));

    update_option('image_default_link_type', 'none');
    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus(
        array(
            'header_menu' => __('Header Menu', 'testingwhiz'),
            'footer_menu' => __('Footer Menu', 'testingwhiz'),
            'user_manual' => __('User Manual', 'testingwhiz')
        )
    );
    //Add different image sizes
    /*add_image_size('400w', 400);
    add_image_size('800w', 800);
    add_image_size('1250w', 1250);
    add_image_size('1920w', 1900);*/
}
add_action('after_setup_theme', 'testingwhiz_setup');


/* Added code 22-3-2022 */
/* Remove Query Strings */
function remove_cssjs_ver($src)
{
    if (strpos($src, '?ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}
add_filter('style_loader_src', 'remove_cssjs_ver', 10, 2);
add_filter('script_loader_src', 'remove_cssjs_ver', 10, 2);
/* Remove RSD Links */
remove_action('wp_head', 'rsd_link');
/* Disable Emoticons */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');
/* Remove Shortlink */
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
/* Disable Embeds */
function disable_embed()
{
    wp_dequeue_script('wp-embed');
}
add_action('wp_footer', 'disable_embed');
/* Hide WordPress Version */
remove_action('wp_head', 'wp_generator');
/* Remove WLManifest Link */
remove_action('wp_head', 'wlwmanifest_link');
/* Remove JQuery Migrate */
/* function deregister_qjuery()
{
    if (!is_admin()) {
        wp_deregister_script('jquery');
    }
}
add_action('wp_enqueue_scripts', 'deregister_qjuery'); */
/* Disable Self Pingback */
function disable_pingback(&$links)
{
    foreach ($links as $l => $link)
        if (0 === strpos($link, get_option('home')))
            unset($links[$l]);
}
add_action('pre_ping', 'disable_pingback');

/* Disable Heartbeat */
add_action('init', 'stop_heartbeat', 1);
function stop_heartbeat()
{
    wp_deregister_script('heartbeat');
}
/* Disable Dashicons on Front-end */
function wpdocs_dequeue_dashicon()
{
    if (current_user_can('update_core')) {
        return;
    }
    wp_deregister_style('dashicons');
}
add_action('wp_enqueue_scripts', 'wpdocs_dequeue_dashicon');
function add_rel_preload($html, $handle, $href, $media)
{

    if (is_admin())
        return $html;

    $html = <<<EOT
<link rel='preload stylesheet' as='style' onload="this.onload=null;this.rel='preload stylesheet'" id='$handle' href='$href' type='text/css' media='all' />
EOT;
    return $html;
}
add_filter('style_loader_tag', 'add_rel_preload', 10, 4);
function defer_parsing_of_js($url)
{
    if (is_user_logged_in()) return $url; //don't break WP Admin
    if (FALSE === strpos($url, '.js')) return $url;
    if (strpos($url, 'jquery.min.js')) return $url;
	if (strpos($url, 'primary-navigation.js')) return $url;
    return str_replace(' src', ' defer src', $url);
}
add_filter('script_loader_tag', 'defer_parsing_of_js', 10);
/**
 * Remove the WordPress version
 */
add_filter('the_generator', '__return_false');
/**
 * Disable HTML in WordPress comments
 */
add_filter('pre_comment_content', 'esc_html');
/**
 * Enqueue scripts and styles admin.
 */
function cygnet_add_editor_css()
{
    wp_enqueue_style('admin-main-css', get_theme_file_uri('/assets/css/admin_style.css'), array(), '', 'all');
}
add_action('admin_enqueue_scripts', 'cygnet_add_editor_css');
/**
 * Disable WordPress Login Hints
 */
function no_wordpress_errors()
{
    return 'Please try the right user/pass combination';
}
add_filter('login_errors', 'no_wordpress_errors');
/* End code 22-3-2022 */

/**
 * Testimonials Shortcode
 */
add_shortcode('testimonials', 'testimonial_slider');
function testimonial_slider()
{
    ob_start();
    global $post;
    $currPageId = $post->ID;
    $testimonials = get_sub_field('select_testimonials', $currPageId);
	//$testimonials = get_field('choose_testimonials', $currPageId);
	
    if ($testimonials && count($testimonials) > 0) :?>
        <section class="testimonial-section <?php echo the_sub_field('testimonials_section_custom_class'); ?>">
            <div class="container">                
						<?php /*if (is_page(array('technology-partners'))) : ?>
                            <?php if (get_field('testimonial_title_partner')) : ?>
                                <h2 class="section-title"><?php echo the_field('testimonial_title_partner'); ?></h2>
                            <?php endif; ?>
                            <?php if (get_field('testimonial_content_partner')) {
                                echo the_field('testimonial_content_partner');
                            } ?>
                        <?php else: ?>
                            <?php if (get_field('testimonial_title', 'option')) : ?>
                                <h2 class="section-title"><?php echo the_field('testimonial_title', 'option'); ?></h2>
                            <?php endif; ?>

                            <?php if (get_field('testimonial_content', 'option')) {
                                echo the_field('testimonial_content', 'option');
                            } ?>
                        <?php endif; */ ?>
						<?php if (get_field('testimonial_title', 'option')) : ?>
							<div class="title-heading">
                                <h2 class="wow fadeInUp" data-wow-offset="50"><?php echo the_field('testimonial_title', 'option'); ?> <span class="heading-border"></span></h2>
							</div>
						<?php endif; ?>                    

                <div class="testimonial">
                    <ul class="testimonial-slider">
                       <?php foreach ($testimonials as $testimonial) :?>
                            <li class="testimonial-content">
                                <div class="client-details text-dark-blue wow fadeIn" >
                                    <div class="img">
                                        <?php if (get_field('image', $testimonial->ID)) { ?>
                                                <img src="<?php echo the_field('image', $testimonial->ID); ?>" >
                                        <?php } ?>                                 
                                    </div>   
                                </div>
                                <div class="short-decoration">
                                    <h3 class="p1 wow fadeInUp" data-wow-delay="0.3s" ><?php echo $testimonial->post_title;?></h3>
                                    <div class="p2 wow fadeInUp"  data-wow-delay="0.6s"><?php if (get_field('designation', $testimonial->ID)) {
                                            echo the_field('designation', $testimonial->ID);
                                        }?></div>
                                    <p class="p2 wow fadeInUp"  data-wow-delay="0.9s">
                                   <?php                                  
                                   $testimonialContent = $testimonial->post_content;
                                    echo wp_trim_words( $testimonial->post_content, 250 );
                                   ?>
                                   </p>

                                </div>                                   
                                    </li>
                       <?php endforeach;?>
                    </ul>
                    <div class="nav-arrow">
                        <span class="arrow-prev"><img src="<?php echo THEME_PATH; ?>assets/images/right-arrow.png" alt="" /></span>
                        <span class="arrow-next"><img src="<?php echo THEME_PATH; ?>assets/images/right-arrow.png" alt="" /></span>
                    </div>
                </div>
            </div>
        </section>
		<!-- <script>
		jQuery(document).ready(function() {
			jQuery('.testimonial-slider').length && jQuery('.testimonial-slider').owlCarousel({
				loop: false,
				autoplay: false,
				nav: true,
				dots: false,
				mouseDrag:false,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
				items: 1,
				navText: [
					'<span><img src="<?php echo THEME_PATH; ?>assets/images/right-arrow.png" alt="" /></span>',
                    '<span><img src="<?php echo THEME_PATH; ?>assets/images/right-arrow.png" alt="" /></span>'
				],               
				
			})
		})
		</script> -->
   <?php
        $testimonialVar = ob_get_clean();
        return $testimonialVar;
    endif;
}

/**
 * Insights Shortcode
 */
add_shortcode('insights', 'insights_slider');
function insights_slider()
{
    ob_start();
    global $post;
    $currPageId = $post->ID;
    $insights = get_sub_field('select_insights', $currPageId);
	
    if ($insights && count($insights) > 0) :?>
        <section class="insights-section light-bg <?php echo the_sub_field('insights_section_custom_class'); ?>">
            <div class="container">
                <div class="title-heading">
                    <?php if (get_field('insight_title', 'option')) : ?>
                        <h2 class="wow fadeInUp" data-wow-offset="50"><?php echo the_field('insight_title', 'option'); ?> <span class="heading-border"></span></h2>
                    <?php endif; ?>
                </div>
                <div class="insights-inner">
                <?php foreach ($insights as $insights) :
					   $img = wp_get_attachment_image_src( get_post_thumbnail_id($insights->ID), 'large');
					   ?>
                        <div class="insights-card card wow fadeInUp" data-wow-delay="<?php echo $s; ?>s" data-wow-offset="50">
                            <div class="insights-content card-body">
								<?php 
								$post_type = get_post_type_object(get_post_type($insights->ID));
								//echo "<pre>";print_r($post_type);
								if($post_type->labels->singular_name == 'Post'){
									$display_cpt_title = "Blog";
									$url = site_url().'/blog';
								} else {
									$display_cpt_title = $post_type->labels->singular_name;
									$url = site_url().'/'.$post_type->rewrite['slug'];
								}								
								?>
								<a href="<?php echo $url; ?>" class="btn"><?php echo $display_cpt_title; ?></a>								
                                <div class="client-details" <?php if ((has_post_thumbnail( $insights->ID ) )) { ?>style="background-image:url('<?php echo $img[0]; ?>')" <?php } ?> >
                                
                                </div>
                                <div class="insight-in-content">
                                    <h2 class="slider-title">
										<?php
										if($post_type->labels->singular_name == 'Case Study'){
											?><a href="<?php echo get_field('pdf_link', $insights->ID); ?>" target="_blank"><?php echo $insights->post_title;?></a><?php
										} else {
											?><a href="<?php echo esc_url( get_permalink($insights->ID) ); ?>"><?php echo $insights->post_title;?></a><?php
										}
										?>										
									</h2>
                                    <div class="short-decoration">
                                       <p class="p2">
                                       <?php
                                        $insightsContent = $insights->post_content;
                                        echo wp_trim_words( $insights->post_content, 20 );
                                        ?>
                                        <p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php $s = $s + 0.2; endforeach;?>
                </div>
            </div>
        </section>
   <?php
        $insightsVar = ob_get_clean();
        return $insightsVar;
    endif;
}

/**
 * Case Studies Shortcode
 */
add_shortcode('case_studies', 'case_studies_slider');
function case_studies_slider()
{
    ob_start();
    global $post;
    $currPageId = $post->ID;
    $case_studies = get_sub_field('select_case_studies', $currPageId);
	
    if ($case_studies && count($case_studies) > 0) :?>
        <script>
		jQuery(document).ready(function() {
			jQuery('.case-studies-slider').length && jQuery('.case-studies-slider').owlCarousel({
				loop: false,
				
				autoplay: false,
				nav: false,
				dots: true,
				items: 3,
				navText: [
					'<span><i class=\'bi bi-chevron-left\'></i></span>Previous',
					'Next<span><i class=\'bi bi-chevron-right\'></i></span>'
				],
                responsive : {
                        // breakpoint from 0 up
                        0 : {
                            margin: 15,
                            items: 1,
                        },
                        768 : {
                            margin: 15,
                            items: 2,
                        },
                        992 : {
                            margin: 20,
                            items: 3,
                        },
                        1200 : {
                            margin: 40,
                        },
                    }	
				
			})
		})
		</script>
        <section class="insights-section light-bg <?php echo the_sub_field('case_studies_section_custom_class'); ?>">
            <div class="container">
                <div class="title-heading">
                    <?php if (get_sub_field('title')) : ?>
                        <h2 class="wow fadeInUp" data-wow-offset="50"><?php echo the_sub_field('title'); ?> <span class="heading-border"></span></h2>
                    <?php endif; ?>
                </div>
                <div class="insights-inner">
					<div class="owl-carousel case-studies-slider">
						<?php foreach ($case_studies as $case_studies) :
						   $img = wp_get_attachment_image_src( get_post_thumbnail_id($case_studies->ID), 'full');
						   $casestudy_url = get_field('pdf_link', $case_studies->ID);
						   ?>
							<div class="insights-card card wow fadeInUp" data-wow-delay="<?php echo $s; ?>s" data-wow-offset="30" >
								<div class="insights-content card-body">
									<?php 
									/*$post_type = get_post_type_object(get_post_type($case_studies->ID));
									if($post_type->labels->singular_name == 'Post'){
										$display_cpt_title = "Blog";
									} else {
										$display_cpt_title = $post_type->labels->singular_name;
									}*/
									//esc_url( get_permalink($case_studies->ID) )
									?>
									<!--<span class="btn"><?php echo $display_cpt_title; ?></span>-->							
									<div class="client-details" <?php if ((has_post_thumbnail( $case_studies->ID ) )) { ?>style="background-image:url('<?php echo $img[0]; ?>')" <?php } ?> >
									
									</div>
									<div class="insight-in-content">
										<h2 class="slider-title"><a href="<?php echo $casestudy_url; ?>" target="_blank"><?php echo $case_studies->post_title;?></a></h2>
										<div class="short-decoration">
										   <p class="p2">
										   <?php
											$case_studiesContent = $case_studies->post_content;
											echo wp_trim_words( $case_studies->post_content, 250 );
											?>
											</p>
										</div>
										<?php if ($casestudy_url != '') : ?>
											  <a href="<?php echo $casestudy_url; ?>" title="Read More" target="_blank">Read More <img src="<?php echo THEME_PATH; ?>images/Iconfeather-arrow-right.svg" alt="navigation right" /></a>											
										<?php endif; ?>
										<!--<a href="<?php echo esc_url( get_permalink($case_studies->ID) ); ?>" class="">Read More <img src="<?php echo THEME_PATH; ?>images/Iconfeather-arrow-right.svg" alt="navigation right" /> </a>-->
									</div>
								</div>
							</div>
						<?php $s = $s + 0.2; endforeach;?>
					</div>
                </div>
            </div>
        </section>
		
   <?php
        $case_studiesVar = ob_get_clean();
        return $case_studiesVar;
    endif;
}

/* Custom URL Rewriting for Blog Detail */
function filter_post_link($permalink, $post)
{
    if ($post->post_type != 'post')
        return $permalink;
    return 'blog' . $permalink;
}
add_filter('pre_post_link', 'filter_post_link', 10, 2);

add_action('generate_rewrite_rules', 'add_blog_rewrites');
function add_blog_rewrites($wp_rewrite)
{
    $wp_rewrite->rules = array(
        'blog/([^/]+)/?$' => 'index.php?name=$matches[1]',
        'blog/[^/]+/attachment/([^/]+)/?$' => 'index.php?attachment=$matches[1]',
        'blog/[^/]+/attachment/([^/]+)/trackback/?$' => 'index.php?attachment=$matches[1]&tb=1',
        'blog/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?attachment=$matches[1]&feed=$matches[2]',
        'blog/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?attachment=$matches[1]&feed=$matches[2]',
        'blog/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$' => 'index.php?attachment=$matches[1]&cpage=$matches[2]',
        'blog/([^/]+)/trackback/?$' => 'index.php?name=$matches[1]&tb=1',
        'blog/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?name=$matches[1]&feed=$matches[2]',
        'blog/([^/]+)/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?name=$matches[1]&feed=$matches[2]',
        'blog/([^/]+)/page/?([0-9]{1,})/?$' => 'index.php?name=$matches[1]&paged=$matches[2]',
        'blog/([^/]+)/comment-page-([0-9]{1,})/?$' => 'index.php?name=$matches[1]&cpage=$matches[2]',
        'blog/([^/]+)(/[0-9]+)?/?$' => 'index.php?name=$matches[1]&page=$matches[2]',
        'blog/[^/]+/([^/]+)/?$' => 'index.php?attachment=$matches[1]',
        'blog/[^/]+/([^/]+)/trackback/?$' => 'index.php?attachment=$matches[1]&tb=1',
        'blog/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?attachment=$matches[1]&feed=$matches[2]',
        'blog/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?attachment=$matches[1]&feed=$matches[2]',
        'blog/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$' => 'index.php?attachment=$matches[1]&cpage=$matches[2]',
    ) + $wp_rewrite->rules;
}
/* End */

function pagely_security_headers( $headers ) {
    $headers['X-XSS-Protection'] = '1; mode=block';
    $headers['X-Content-Type-Options'] = 'nosniff';
    $headers['X-Content-Security-Policy'] = 'default-src \'self\'; script-src \'self\';';

    return $headers;
}

add_filter( 'wp_headers', 'pagely_security_headers' );

/** 
 * Enables the HTTP Strict Transport Security (HSTS) header in WordPress. 
 */
function tg_enable_strict_transport_security_hsts_header_wordpress() {
    header( 'Strict-Transport-Security: max-age=31536000' );
}
add_action( 'send_headers', 'tg_enable_strict_transport_security_hsts_header_wordpress' ); 

/**
* Remove custom post type within search page
*/
function remove_post_type_page_from_search() {
    global $wp_post_types;
    $wp_post_types['testimonials']->exclude_from_search = true;
    $wp_post_types['case_studies']->exclude_from_search = true;
}
add_action('init', 'remove_post_type_page_from_search');

/* Display favicon icon on admin side */
function favicon4admin() {
echo '<link rel="icon" type="image/x-icon" href="' . get_theme_file_uri() . '/images/favicons/favicon.ico" />';
}
add_action( 'admin_head', 'favicon4admin' );


/* Start Display image icon within menu item */
add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects( $items, $args ) {	
	// loop
	foreach( $items as &$item ) {		
		// vars
		$icon = get_field('icon_image', $item);	
		// append icon
		if( $icon ) {			
			$extension = pathinfo($icon, PATHINFO_EXTENSION);
			if($extension == 'svg'){			
				$stream_opts = [
					"ssl" => [
						"verify_peer"=>false,
						"verify_peer_name"=>false,
					]
				];			
				$item->title .= file_get_contents($icon, false, stream_context_create($stream_opts));
			} else {
				$item->title .= ' <img src="'.$icon.'">';
			}
		}		
	}	
	// return
	return $items;	
}
/* End Display image icon within menu item */

/* Same email validation for forms */
function is_already_submitted($formName, $fieldName, $fieldValue) {
    require_once(ABSPATH . 'wp-content/plugins/contact-form-7-to-database-extension/CFDBFormIterator.php');
    $exp = new CFDBFormIterator();
    $atts = array();
    $atts['show'] = $fieldName;
	
    $atts['filter'] = "$fieldName=$fieldValue";
    $atts['unbuffered'] = 'true';
    $exp->export($formName, $atts);
    $found = false;
    while ($row = $exp->nextRow()) {
        $found = true;
    }
    return $found;
}
 
/**
 * @param $result WPCF7_Validation
 * @param $tag array
 * @return WPCF7_Validation
 */
function my_validate_email($result, $tag) {
    $formName = 'Contact Us'; // Change to name of the form containing this field
    $fieldName = 'your-email'; // Change to your form's unique field name
	
	$formName1 = 'Enterprise form'; // Change to name of the form containing this field
    $fieldName1 = 'enterprise-email'; // Change to your form's unique field name
    
	$errorMessage = 'Email has already been submitted'; // Change to your error message
    $name = $tag['name'];
    if ($name == $fieldName) {
        if (is_already_submitted($formName, $fieldName, $_POST[$name])) {
            $result->invalidate($tag, $errorMessage);
        }
    } else if($name == $fieldName1){		
		if (is_already_submitted($formName1, $fieldName1, $_POST[$name])) {
            $result->invalidate($tag, $errorMessage);
        } 
	}
	
	/* Check domain name */
	if (get_field('list_of_block_domains', 'option')) :	
		$value = $_POST[$name];
		/*add the domain names you want to block in the $domains array*/
		//$domains = array("gmail.com", "yahoo.com", "hotmial.com"); 		  
		$block_domain_list=esc_attr(get_field('list_of_block_domains', 'option'));
		$spit_domains=array_map('trim',explode(",",$block_domain_list));
		$domains = $spit_domains;
		$udomain = explode('@', $value);

		//select the email domain from the above splitted array
		$email_domain = strtolower($udomain[1]);
		$list_of_email_fields=esc_attr(get_field('list_of_email_fields_new', 'option'));
		$split_email_field=array_map('trim',explode(",",$list_of_email_fields));

		$email_value=$tag->name;
		if(in_array($email_value,$split_email_field) ) {
			//check entered value = $value exists in $domain array
			if(in_array($email_domain, $domains)) {
				//display error
				$system_error='E-mail addresses with @'. explode('@', $value, 2)[1] .' are not allowed!';
				$error_message=esc_attr(get_field('display_error_message_new', 'option'));
				if(!empty($error_message)){
					$result->invalidate( $tag, $error_message );
				} else {
					$result->invalidate( $tag, $system_error );
				}
			}
		}
	endif;
	/* End check domain name */
	
    return $result;
}
// use the next line if your field is a **required email** field on your form
add_filter('wpcf7_validate_email*', 'my_validate_email', 10, 2);

/* COMMUNITY form API call start */
add_action('wpcf7_before_send_mail', 'cf7_validate_api', 10, 3);

function cf7_validate_api($cf7, &$abort, $submission) {
	if ($cf7->id() == 24966 || $cf7->id() == 31185 || $cf7->id() == 31298) 
    {        
		if($_POST['buttonclicked'] == 'Community'){
			$versionid = PRODUCT_COMMUNITY_VERSION_ID;
			$name = $_POST['community-name'];
			$product = $_POST['buttonclicked'];
			$email = $_POST['community-email'];
			$company = $_POST['community-company-name'];
			$phone = $_POST['community-contact'];
			$country = $_POST['community-country'];
			$message = $_POST['community-message'];
			$downloadpurpose = '';
		} else {
			$versionid = PRODUCT_ENTERPRISE_VERSION_ID;
			$name = $_POST['enterprise-name'];
			$product = $_POST['buttonclicked'];
			$email = $_POST['enterprise-email'];
			$company = $_POST['enterprise-company-name'];
			$phone = $_POST['enterprise-contact'];
			$country = $_POST['enterprise-country'];
			$message = $_POST['enterprise-message'];
			$downloadpurpose = $_POST['enterprise-ddlPurpose'];
		}
		/*$apicall = RegisterNewUser_testingwhiz($_POST);
		if($apicall == 1){
			//echo "1==========";
			return;
		} else {
			//echo "0=========";
			$errMsg = "Something went wrong:API Error status 0";
			$abort = true;
			$submission->set_response($cf7->message('validation_failed'));
			$submission->set_response($cf7->filter_message($errMsg)); //custom msg;
		}*/
				
		$url = "http://staging.usercentral.testing-whiz.com/regservice/".$versionid;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS =>'{
		"userId": "",
		"productVersionId": "'.$versionid.'",
		"licenseType": "Trial",
		"validity": "",
		"maxConcurrentUsers": "1",
		"amount": "",
		"comment": "",
		"name": "'.(string)$name.'",
		"product": "'.(string)$product.'",
		"email": "'.$email.'",
		"company": "'.(string)$company.'",
		"orderNo": "",
		"qty": "1",
		"number": "",
		"promoCode": "",
		"phone": "'.(string)$phone.'",
		"title": "",
		"country": "'.(string)$country.'",
		"state": "",
		"city": "",
		"source": "",
		"liveDemo": "true",
		"message": "'.(string)$message.'",
		"downloadPurpose": "'.(string)$downloadpurpose.'",
		"resellerCode": "",
		"numberOfUser": "1",
		"getStarted": "",
		"tellUs": "",
		"attachedDocUrl": "",
		"loggedInAdminId": "",
		"transactionId": "",
		"GDPRPurpose": "I agree to the TestingWhiz Privacy Policy and Terms of Use",
		"consent": "Yes",
		"maxExecutorUsers": "1"
		}',
		CURLOPT_HTTPHEADER => array(
			'Content-Type: application/json'
		),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		if($response == 1){
			return;
		} else {
			$errMsg = "Something went wrong:API Error status 0";
			$abort = true;
			$submission->set_response($cf7->message('validation_failed'));
			$submission->set_response($cf7->filter_message($errMsg)); //custom msg;
		}		
    } else {
		return;
	}
}
/* COMMUNITY form API call end */