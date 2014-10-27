<?php

global $smof_data;


/* Translation */
load_theme_textdomain( 'rocknrolla', get_template_directory() . '/includes/languages' );
$locale = get_locale();
$locale_file = get_template_directory() . "/includes/languages/$locale.php";
if ( is_readable($locale_file) )
	require_once($locale_file);
	
if ( ! isset( $content_width ) )
	$content_width = 1000;	


define('RNR_FUNCTIONS', get_template_directory()  . '/includes');
define('RNR_INDEX_JS', get_template_directory_uri()  . '/js');
define('RNR_INDEX_CSS', get_template_directory_uri()  . '/css');

/** Slightly Modified Options Framework **/
require_once ('admin/index.php');

/* WP 3.1 Post Formats */
add_theme_support( 'post-formats', array('gallery', 'link', 'quote', 'audio', 'video')); 


/* Include Meta Box Framework */
define( 'RWMB_URL', trailingslashit( get_template_directory_uri() . '/includes/metaboxes' ) );
define( 'RWMB_DIR', trailingslashit( get_template_directory() . '/includes/metaboxes' ) );

require_once RWMB_DIR . 'meta-box.php';


include_once(RNR_FUNCTIONS.'/portfolio-post-type.php'); // Portfolio Post Type
include_once RNR_FUNCTIONS.'/tinymce/rnr-shortcodes.php';
include_once RNR_FUNCTIONS.'/shortcodes.php';
include_once RNR_FUNCTIONS.'/metaboxes.php';
include_once RNR_FUNCTIONS.'/custom-style.php';


/* Include Widgets */
include_once(RNR_FUNCTIONS.'/widgets/embed.php');
include_once(RNR_FUNCTIONS.'/widgets/flickr.php');
include_once(RNR_FUNCTIONS.'/widgets/twitter.php');
include_once(RNR_FUNCTIONS.'/widgets/portfolio.php');



function my_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );


if (is_admin() ){
	function rocknrolla_admin_scripts(){	
		wp_register_script('rnrmetajs', RNR_INDEX_JS .'/admin/init.js', array('jquery','media-upload','thickbox'));
		wp_enqueue_script('rnrmetajs');
	}
}

add_action('admin_enqueue_scripts', 'rocknrolla_admin_scripts');

	if (!is_admin() ){
		function rocknrolla_front_scripts(){		
			wp_register_script('rnrplugins', RNR_INDEX_JS .'/rnr_plugins.js', array('jquery'), true);	
			wp_register_script('rnrImagesload', RNR_INDEX_JS .'/jquery.waitforimages.js', true);				
			wp_register_script('fittext', RNR_INDEX_JS .'/jquery.fittext.js', array('jquery'), true);	
			wp_register_script('fitvids', RNR_INDEX_JS .'/jquery.fitvids.js', array('jquery'), true);
			wp_register_script('selectnav', RNR_INDEX_JS .'/selectnav.min.js', array('jquery'), true);	
			wp_register_script('rnrscripts', RNR_INDEX_JS .'/scripts.js', array('jquery'), true);	
			wp_register_script('shortcodes', RNR_INDEX_JS .'/shortcodes.js', array('jquery'), true);
		
			wp_enqueue_script( 'jquery', false, array(), false, true);								
			wp_enqueue_script('fittext');
			wp_enqueue_script('rnrImagesload');
			wp_enqueue_script('fitvids');
			wp_enqueue_script('rnrplugins');
			wp_enqueue_script('selectnav');
			wp_enqueue_script('rnrscripts');
			wp_enqueue_script('shortcodes');		
			
	wp_localize_script( 'rnrscripts', 'rnr_global_vars', array( 
		'contact_form_required_fields_label_ajax' =>  __('This is a required field', 'rocknrolla'),
		'contact_form_warning' => __('Please verify fields and try again.', 'rocknrolla'),
		'contact_form_email_warning' =>  __('Please enter a valid e-mail address and try again.', 'rocknrolla'),
		'contact_form_error' => __('There was an error sending your email. Please try again later.', 'rocknrolla'),
		'contact_form_success_message' => __('Thanks, we got your mail and will get back to you in 24h!', 'rocknrolla'),
		'contactFormDefaults_name' => __('Name', 'rocknrolla'),
		'contactFormDefaults_email' => __('E-mail', 'rocknrolla'),
		'contactFormDefaults_subject' => __('Subject', 'rocknrolla'),
		'contactFormDefaults_message' => __('Message', 'rocknrolla'),
		'commentFormDefaults_author' => __('Name', 'rocknrolla'),
		'commentFormDefaults_email' => __('E-mail', 'rocknrolla'),
		'commentFormDefaults_url' => __('http://', 'rocknrolla'),
		'searchFormDefaults_search' => __('Search', 'rocknrolla')
	) );				
	
	}
  add_action('wp_footer', 'rocknrolla_front_scripts'); 


	
      if( $smof_data['rnr_enable_googlemap']) {	
		function rocknrolla_head_scripts(){		
		  wp_register_script('gmap', 'https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places', array('jquery'), '2.1', false );  
	      wp_register_script('infoBox', 'http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js', array('jquery'), '2.1', false );	
			wp_enqueue_script( 'gmap');
			wp_enqueue_script( 'infoBox');
	
		}
      add_action('wp_print_scripts', 'rocknrolla_head_scripts'); 

	  }


}
/* Register Stylesheets */
function rocknrolla_print_styles() {  	
	if ( !is_admin() ){

		wp_register_style( 'reset', RNR_INDEX_CSS. '/reset.css', array(), '1', 'all' );	
		wp_register_style( 'bootstrap', RNR_INDEX_CSS. '/bootstrap.css', array(), '1', 'all' );	
		wp_register_style( 'flexslider', RNR_INDEX_CSS. '/flexslider.css', array(), '1', 'all' );	
		wp_register_style( 'fontawesome', RNR_INDEX_CSS. '/font-awesome.css', array(), '1', 'all' );	
		wp_register_style( 'prettyPhoto', RNR_INDEX_CSS. '/prettyPhoto.css', array(), '1', 'all' );	
		wp_register_style( 'customfonts', RNR_INDEX_CSS. '/custom-fonts.css', array(), '1', 'all' );	
		wp_register_style( 'fontello', RNR_INDEX_CSS. '/fontello.css', array(), '1', 'all' );		
		wp_register_style( 'theme-style', RNR_INDEX_CSS. '/theme.css', array(), '1', 'all' );	
		wp_register_style( 'shortcodes', RNR_INDEX_CSS. '/shortcodes.css', array(), '1', 'all' );	
		wp_register_style( 'responsive-media', RNR_INDEX_CSS. '/media.css', array(), '1', 'all' );	
		
		
					
		wp_enqueue_style( 'reset' ); 	 
		wp_enqueue_style( 'bootstrap' ); 	 
		wp_enqueue_style( 'flexslider' ); 	 
		wp_enqueue_style( 'fontawesome' ); 	 
		wp_enqueue_style( 'prettyPhoto' ); 	 
		wp_enqueue_style( 'customfonts' ); 	 
		wp_enqueue_style( 'fontello' );  	 			
	    wp_enqueue_style( 'style', get_stylesheet_uri(), array(), '1', 'all' );
		wp_enqueue_style( 'theme-style' ); 	 	 
		wp_enqueue_style( 'shortcodes' ); 
		wp_enqueue_style( 'responsive-media' ); 
	}  
}
add_action( 'wp_print_styles', 'rocknrolla_print_styles' );











/* Post Thumbnails */
if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );

/* Custom Image Sizes */	
//if($smof_data['rnr_enable_widescreen'] == "1") {
	
	  // ULTRA RESPONSIVE 1200PX GRID SIZES

		  add_image_size( 'blog-standard', 770, 330, true );
		  add_image_size( 'span12', 1172, 400, true ); 
		  add_image_size( 'span7', 670, 400, true );		  
		  add_image_size( 'span6', 570, 372, true );		
		  add_image_size( 'span4', 370, 241, true ); 		
		  add_image_size( 'span3', 270, 176, true );	  
		  add_image_size( 'blog-span6', 570, 210, true );		
		  add_image_size( 'blog-span4', 370, 150, true ); 		
		  add_image_size( 'blog-span3', 270, 120, true );			  
		  add_image_size( 'mini', 60, 60, true ); 			


 function ago($time) {
	   $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
	   $lengths = array("60","60","24","7","4.35","12","10");

	   $now = time();

	       $difference     = $now - $time;
	       $tense         = "ago";

	   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
	       $difference /= $lengths[$j];
	   }

	   $difference = round($difference);

	   if($difference != 1) {
	       $periods[$j].= "s";
	   }

	   return "$difference $periods[$j] ago ";
	}
	 
	 
	
/* Comments Function */		
function rocknrolla_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>	
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
   <div id="comment-<?php comment_ID(); ?>" class="comment-body clearfix"> 	   		
		<div class="avatar"><?php echo get_avatar($comment, $size = '50'); ?></div>	         
		 <div class="comment-text">	         
			 <div class="author">
				<span><?php printf( __( '%s', 'rocknrolla'), get_comment_author_link() ) ?></span>
				<div class="date">
				<?php printf(__('%1$s at %2$s', 'rocknrolla'), get_comment_date(),  get_comment_time() ) ?></a><?php edit_comment_link( __( '(Edit)', 'rocknrolla'),'  ','' ) ?>
				&middot; <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>  </div>  
			 </div>				 
			 <div class="text"><?php comment_text() ?></div>				 
			 <?php if ( $comment->comment_approved == '0' ) : ?>
			 <em><?php _e( 'Your comment is awaiting moderation.', 'rocknrolla' ) ?></em>
			 <br />
			<?php endif; ?>		      	
		</div>	      
   </div>	
<?php }



   
  
/* Pagination Function*/   
function rocknrolla_pagination($pages = '', $range = 4) {
	$showitems = ($range * 2)+1;
	
	global $paged;
	if(empty($paged)) $paged = 1;
	
	if($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages) {
			$pages = 1;
		}
	}
	
	if(1 != $pages) {
		echo "<span class='allpages'>" . __('Page', 'rocknrolla') . " ".$paged." " . __('of', 'rocknrolla') . " ".$pages."</span>";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; " . __('First', 'rocknrolla') . "</a>";
		if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; " . __('Previous', 'rocknrolla') . "</a>";
		
		for ($i=1; $i <= $pages; $i++) {
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
				echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
			}
		}
	
		if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">" . __('Next', 'rocknrolla') . " &rsaquo;</a>";
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>" . __('Last', 'rocknrolla') . " &raquo;</a>";
	}
}
	

/* Add RSS Links to head section */
add_theme_support( 'automatic-feed-links' );
add_filter('widget_text', 'do_shortcode');
/* Add prettyPhoto to content anchor tags */	
add_filter( 'wp_get_attachment_link', 'rocknrolla_custom_prettyphoto');



	function rocknrolla_excerpt_more($more) {
		global $post;
		return '&hellip;<p><a href="'. get_permalink($post->ID) . '" class="read-more-link">' . '' . __('Read More', 'rocknrolla') . ' &rarr;' . '</a></p>';
	}
	add_filter('excerpt_more', 'rocknrolla_excerpt_more');

	
	
	

function rocknrolla_custom_prettyphoto($content) {
	$content = preg_replace("/<a/","<a data-rel=\"prettyPhoto\"",$content,1);
	return $content;
}

  
  register_sidebar(array(
	 'name' => __('Blog Sidebar','rocknrolla' ),
	 'id'   => 'blog-widgets',
	  'description'   => __( 'These are widgets for the Blog page.','rocknrolla' ),
	  'before_widget' => '<div id="%1$s" class="widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h3>',
	  'after_title'   => '</h3>'
  ));  


// THIS GIVES US SOME OPTIONS FOR STYLING THE ADMIN AREA
function custom_colors() {
   echo '<style type="text/css">
     i.mce-ico.mce-i-rnrscg:before {
	content: "R";
	font-size: 12px;
	font-weight: bold;
	color: white;
	background: #000000;
	padding: 5px 7px;
	border-radius: 4px;
}
         </style>';
}

add_action('admin_head', 'custom_colors');





if($smof_data['rnr_home_type']=="Slider") { 
function rnr_scripts(){ 

global $smof_data;

if ( $smof_data['rnr_slider_effect'] )
$rnr_slider_effect = $smof_data['rnr_slider_effect'];
else
$rnr_slider_effect = "slide";

if ( $smof_data['rnr_slider_autoplay'] )
{
	if ( $smof_data['rnr_slider_autoplay'] == 1 )
		$rnr_slider_autoplay = 'true';
	else
		$rnr_slider_autoplay = 'false';
}
else
$rnr_slider_autoplay = 'false';

if ( $smof_data['rnr_slideshow_speed'] )
$rnr_slideshow_speed = $smof_data['rnr_slideshow_speed'];
else
$rnr_slideshow_speed = 3500;

if ( $smof_data['rnr_animation_speed'] )
$rnr_animation_speed = $smof_data['rnr_animation_speed'];
else
$rnr_animation_speed = 600;

?>

<script type="text/javascript">

jQuery.noConflict(); (function($) {				  
				  
	$(document).ready(function() {  	
		$('.flexslider').flexslider({						
				animation: "<?php echo $rnr_slider_effect; ?>",
				direction: "horizontal", 
				slideshow: <?php echo $rnr_slider_autoplay; ?>,
				slideshowSpeed: <?php echo $rnr_slideshow_speed; ?>,
				animationSpeed: <?php echo $rnr_animation_speed; ?>,
				directionNav: true,
				controlNav: false				
		 }); 
	});

})(jQuery);

</script>

<?php }
  add_action('wp_footer', 'rnr_scripts', 120);
  }
  
 