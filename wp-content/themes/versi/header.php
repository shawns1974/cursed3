<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- PAGE TITLE -->
<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php global $smof_data; ?>

<!-- Mobile Specific Metas & Favicons
========================================================= -->

<?php if($smof_data['rnr_favicon_url'] != "") { ?><link rel="shortcut icon" href="<?php echo $smof_data['rnr_favicon_url']; ?>"><?php } ?>


<!-- WordPress Stuff
========================================================= -->
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<!-- Google Web Fonts -->

 <?php get_template_part( 'includes/googlefonts'); ?>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> data-spy="scroll" data-target=".navigation">

  <table class="loader">
    <tr>
      <td><img src="<?php echo get_template_directory_uri().'/images/loading.gif'; ?>" alt="loading please wait.." /></td>
    </tr>
  </table>
    
  <!-- HEADER SECTION -->	
        <header class="navigation animated fadeInDown <?php echo $smof_data['rnr_menu_type']; ?>"><!--- REMOVE "iconic" CLASS FOR A PLAIN MENU NAVIGATION -->
        
        
          <div class="container">
          <!-- BEGIN LOGO SECTION -->
           <div class="logo-container">
            <div class="logo"><?php if($smof_data['rnr_logo_url'] != "") { ?>
						<a href="<?php echo home_url(); ?>/">
                         <img src="<?php echo $smof_data['rnr_logo_url']; ?>" 
                              alt="<?php bloginfo('name'); ?>" 
                              width="<?php echo $smof_data['rnr_logo_width']; ?>" 
                              height="<?php echo $smof_data['rnr_logo_height'];?>"  
                          />
                       </a>
					<?php } else { ?>
						<h1><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></h1>
					<?php } ?>
             </div>
           </div>
          <!-- END LOGO SECTION -->                
         
           <!-- BEGIN NAVIGATION SECTION --> 
           <div class="nav-container">   
           <nav>         
            <ul class="nav" id="nav">
            <?php
            if (is_front_page()) $link_prefix = "#"; else $link_prefix = home_url()."/#";
            $page_args = array('sort_order' => 'ASC', 'sort_column' => 'menu_order');
            $pages = get_pages($page_args); 
			global $menu_icon;
            $k = 0;
            foreach ($pages as $single_page) {
                  if(get_post_meta($single_page->ID, "rnr_disable_section_from_menu", true)!=true) {
                  $separate_page = get_post_meta($single_page->ID, "rnr_separate_page", true);
				  $menu_icon = get_post_meta($single_page->ID, 'rnr_page_icon', true);
                  $k++;
                  if ($separate_page != true)
                  {
                    $option = '<li><a href="' . $link_prefix . $single_page->post_name . '"><i class="fa '.$menu_icon.'"></i><span>' . $single_page->post_title . '</span></a></li> '; 
                  }
                  else
                  {
                     $option = '<li><a href="' . get_page_link( $single_page->ID ) . '"><i class="fa '.$menu_icon.'"></i><span>' . $single_page->post_title . '</span></a></li> '; 
                  }
                  echo $option;
            } }
            ?>          
            </ul>
            </nav>
           </div> 
           <!-- END NAVIGATION SECTION -->
            
          </div><!-- END CONTAINER -->
        </header><!-- END HEADER SECTION -->    
       	
        <div id="page">