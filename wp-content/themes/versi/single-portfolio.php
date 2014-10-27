
<?php get_header(); ?>

    <div id="rnr-post-single" class="section post-single"><!-- SECTION -->

    <div class="container">
 <?php if (have_posts()) : while (have_posts()) : the_post();     ?>   
    <!-- BEGIN SECTION TITLE -->
    <div class="header">
        <h1 class="header-text"><?php the_title(); ?></h1>
    </div>
    <!-- END SECTION TITLE -->
<?php endwhile;
endif; 

wp_reset_query();  
?> 
    
    <!-- BEGIN SECTION CAPTION -->
    <div class="caption"></div>
    <!-- END SECTION CAPTION -->   
    
    </div>  
    
    <div class="container">
     <div class="row">
  	
     <div id="ajaxpage">	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <div class="<?php if($smof_data['rnr_portfolio_single_type']=="Side By Side") { echo 'span7';} else { echo 'span12'; } ?> project-media">	
                    <?php if( get_post_meta( get_the_ID(), 'rnr_project_video_embed', true ) == "" ){ ?>
                              
                <?php
				
				 $slider_meta = get_post_meta( get_the_ID( ), 'rnr_project_item_slides', false );	
				 
				 if(!empty($slider_meta)) { ?>           
                   <div id="portfolio-slider" class="flexslider">
                            <ul class="slides">
                            <?php global $wpdb, $post;
                            if ( !is_array( $slider_meta ) )
                                $slider_meta = ( array ) $slider_meta;
                            if ( !empty( $slider_meta ) ) {
                                $slider_meta = implode( ',', $slider_meta );
                                $images = $wpdb->get_col( "
                                SELECT ID FROM $wpdb->posts
                                WHERE post_type = 'attachment'
                                AND ID IN ( $slider_meta )
                                ORDER BY menu_order ASC
                                " );
                                foreach ( $images as $att ) {
                                    // Get image's source based on size, can be 'thumbnail', 'medium', 'large', 'full' or registed post thumbnails sizes
                                    $image_src = wp_get_attachment_image_src( $att, 'full' );
                                    $image_src2= wp_get_attachment_image_src( $att, '');
                                    $image_src = $image_src[0];
                                    $image_src2 = $image_src2[0];
                                    // Show image
                                    echo "<li><img src='{$image_src}' /></li>";
                                }
                            } ?>
                            </ul>
                        </div><!-- end of portfolio slider -->

			
				<?php } if ( has_post_thumbnail()) { ?> 

                     <?php if (empty($slider_meta)) { ?>                     
                    <?php
					$att=get_post_thumbnail_id();
					 $image_src = wp_get_attachment_image_src( $att, 'full' );
					 $image_src = $image_src[0];
					 ?>
                          <span><?php the_post_thumbnail('full'); ?></span>            
                      <?php } ?>

                <?php } ?>  
                                
                    <?php } else { ?>
                                
                        <?php  
                        if (get_post_meta( get_the_ID(), 'rnr_project_video_type', true ) == 'vimeo') {  
                            echo '<div id="portfolio-video"><iframe src="http://player.vimeo.com/video/'.get_post_meta( get_the_ID(), 'rnr_project_video_embed', true ).'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="960" height="540" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';  
                        }  
                        else if (get_post_meta( get_the_ID(), 'rnr_project_video_type', true ) == 'youtube') {  
                            echo '<div id="portfolio-video"><iframe width="960" height="540" src="http://www.youtube.com/embed/'.get_post_meta( get_the_ID(), 'rnr_project_video_embed', true ).'?rel=0&showinfo=0&modestbranding=1&hd=1&autohide=1&color=white" frameborder="0" allowfullscreen></iframe></div>';  
                        }  
                        ?>                        
                    <?php } ?>
                
                </div><!-- end of span -->
                
                <div class="<?php if($smof_data['rnr_portfolio_single_type']=="Side By Side") { echo 'span5';} else { echo 'span12'; } ?>">
                
                <!-- START PROJECT INFO --> 
                 <div class="project-info">                    
                    <div class="portfolio-description">
                        <h3 class="title"><span><?php echo $smof_data['rnr_portfolio_description_title']; ?></span></h3>
                        <div class="portfolio-detail-description-text"><?php the_content(); ?></div>
                    </div>
                   
                    
                    <?php if( get_post_meta( get_the_ID(), 'rnr_project_details', true ) == 1 ) { ?>
                    <div class="project-details">
                        <h3 class="title"><span><?php echo $smof_data['rnr_portfolio_details_title']; ?></span></h3>
                            <ul>
                                <?php if( get_post_meta( get_the_ID(), 'rnr_project_client_name', true ) != "") { ?>
                                <li><strong><?php _e('Client', 'rocknrolla'); ?></strong> <?php echo get_post_meta( get_the_ID(), 'rnr_project_client_name', true ); ?></li>
                                <?php } ?>	
                                <li><strong><?php _e('Tags', 'rocknrolla'); ?></strong> <?php $taxonomy = strip_tags( get_the_term_list($post->ID, 'portfolio_filter', '', ', ', '') ); echo $taxonomy; ?></li>
                            </ul>
                                <?php if( get_post_meta( get_the_ID(), 'rnr_project_link', true ) != "") { ?>
                                <a href="<?php echo get_post_meta( get_the_ID(), 'rnr_project_link', true ); ?>" target="_blank" class="button"><?php _e('View Project', 'rocknrolla'); ?></a>
                                <?php } ?>				
                    </div><!-- end of portfolio detail -->
                    </div><!-- end of span -->
                    <?php } ?>                    
            </div>
          </div>

	<div class="clear"></div>

	
		<?php endwhile; endif;
		      wp_reset_query(); ?>
        </div> <!-- end of ajaxpage -->
        </div><!--END CONTAINER -->
 
              <div class="container">
               <div class="row">  
                <div class="span12">     
                <div class="posts-nav">
                <?php next_post_link( '<span class="next right">%link</span>', '%title <i class="fa fa-arrow-circle-right"></i>', FALSE); ?>
                <?php previous_post_link( '<span class="prev left">%link</span>', '<i class="fa fa-arrow-circle-left"></i> %title', FALSE); ?>
                 <div class="clear"></div>
                </div>
                </div>
              </div>
             </div>   
      </div>

    </div><!--END SECTION -->
<?php get_footer(); ?>