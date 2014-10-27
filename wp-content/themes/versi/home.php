<?php get_header(); 
?> 


   
<?php
$args=array(
    'post_type' => 'page',
    'order' => 'ASC',
    'orderby' => 'menu_order',
    'posts_per_page' => '-1'
  );
$wp_query = new WP_Query($args); 


    while ($wp_query->have_posts()) : $wp_query->the_post();

    global $post;   
    $post_name = $post->post_name;
    
    $post_id = get_the_ID();
    
    $separate_page = get_post_meta($post_id, "rnr_separate_page", true); 
    if ($separate_page!= true)
    {
		
?>



   
   
   
   
   
   

    <div id="<?php echo $post_name; ?>" class="page<?php echo $post_id; ?> section<?php if((get_post_meta($post_id, "rnr_assign_type", true) == "home-section") ){ echo ' fullscreen home'; if(($smof_data['rnr_slider_type']!="Boxed") && ($smof_data['rnr_home_type']=="Slider")) { echo ' full-width-slider';}} else { echo ' '.$post_name; }?>"><!-- SECTION -->


<?php if((get_post_meta( get_the_ID(), 'rnr_disable_title', true )!= true) && (get_post_meta($post_id, "rnr_assign_type", true) != "home-section") ){ ?>    
    <div class="container">
    <div class="row">
    <div class="span12">
 
    <!-- BEGIN SECTION TITLE -->
    <div class="header">
        <h1 class="header-text"><?php the_title(); ?></h1>
    </div>
    <!-- END SECTION TITLE -->
    
    
    <!-- BEGIN SECTION CAPTION -->
    <div class="caption"><?php if(get_post_meta( get_the_ID(), 'rnr_subtitle', true )){ echo get_post_meta( get_the_ID(), 'rnr_subtitle', true ); } ?></div>
    <!-- END SECTION CAPTION -->   
    </div><!-- END SPAN12 -->  
    </div><!-- END ROW -->         
    </div><!-- END CONTAINER -->       
  <?php } ?>   

   <?php
	if (get_post_meta($post_id, "rnr_assign_type", true) == "home-section") { ?>
      <?php get_template_part('home_section');
	  
	}
	else if (get_post_meta($post_id, "rnr_assign_type", true) == "portfolio-section") { ?>
      <div class="container">
         <?php the_content(); ?>
      </div>	
      <?php get_template_part('portfolio_section');
	}
	else if (get_post_meta($post_id, "rnr_assign_type", true) == "contact-section") { ?>
      <div class="container">
         <?php the_content(); ?>
      </div>	
      <?php get_template_part('contact_section');
	}
	else { ?>

      <div class="container">
         <?php the_content(); ?>
      </div>	
		
	<?php } ?> 

    </div><!--END SECTION -->
<?php
    }
    endwhile;
	wp_reset_postdata();
?>




<?php get_footer(); ?>
