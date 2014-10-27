<?php get_header(); ?> 

<?php

if (have_posts()) : while (have_posts()) : the_post();

    global $post;
    
    $post_name = $post->post_name;
    
    $post_id = get_the_ID();
		
?>  

      <div id="<?php echo $post_name; ?>" class="page<?php echo $post_id; ?> section<?php if((get_post_meta($post_id, "rnr_assign_type", true) == "home-section") ){ echo ' fullscreen home'; if(($smof_data['rnr_slider_type']!="Boxed") && ($smof_data['rnr_home_type']=="Slider")) { echo ' full-width-slider';}} else { echo ' '.$post_name; }?>"><!-- SECTION -->


    <?php if((get_post_meta( get_the_ID(), 'rnr_disable_title', true )!= true) && (get_post_meta($post_id, 'rnr_assign_home', true)!= true) ){ ?>    
    <div class="container">
 
    <!-- BEGIN SECTION TITLE -->
    <div class="header">
        <h1 class="header-text"><?php the_title(); ?></h1>
    </div>
    <!-- END SECTION TITLE -->
    
    
    <!-- BEGIN SECTION CAPTION -->
    <div class="caption"><?php if(get_post_meta( get_the_ID(), 'rnr_subtitle', true )){ echo get_post_meta( get_the_ID(), 'rnr_subtitle', true ); } ?></div>
    <!-- END SECTION CAPTION -->   
    
    </div>      
  <?php } ?>   


      <div class="container">           
           <?php the_content(); ?>
           <?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
           <?php comments_template(); ?>  
      </div>	  

				

    </div><!--END SECTION -->
<?php
  
    endwhile;
    endif; 
	wp_reset_query();
?>




<?php get_footer(); ?>
