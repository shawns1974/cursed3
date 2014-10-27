<?php 

/*
Template name: Blog Template
*/

get_header(); 

if (have_posts()) : while (have_posts()) : the_post();

    global $post, $smof_data;

    $post_name = $post->post_name;

    $post_id = get_the_ID();

    ?>  


      <div id="<?php echo $post_name; ?>" class="page<?php echo $post_id; ?> section<?php if((get_post_meta($post_id, "rnr_assign_type", true) == "home-section") ){ echo ' fullscreen home'; if(($smof_data['rnr_slider_type']!="Boxed") && ($smof_data['rnr_home_type']=="Slider")) { echo ' full-width-slider';}} else { echo ' '.$post_name; }?>"><!-- SECTION -->


        <?php if( ( get_post_meta( get_the_ID(), 'rnr_disable_title', true ) != true ) && ( get_post_meta( get_the_ID(), "rnr_assign_home", true) != true ) ){ ?>    

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

            <div class="row">

                <div class="span8">                

                    <?php 

                    if(get_query_var('paged')){
                        $paged = get_query_var('paged');
                    } elseif ( get_query_var('page') ) { 
                        $paged = get_query_var('page');
                    } else {
                        $paged = 1;
                    }

                    $args = array( 
                        'post_type' => 'post',
                        'posts_per_page' => $smof_data['rnr_blog_number'],
                        'paged' => $paged 
                    );

                    if(is_page()){
                        query_posts($args);
                    }else{
                        global $wp_query;
                        $query_args = array_merge( $wp_query->query, $args );
                        query_posts($query_args);
                    } 

                    if (have_posts()) : while (have_posts()) : the_post();  

                        get_template_part( 'post-format/content', get_post_format() ); 

                    endwhile; 

                     get_template_part( 'post-format/pagination' ); 

                     else : ?>

                    <h2><?php _e('No Posts Found', 'rocknrolla') ?></h2>

                    <?php

                    endif; 

                    wp_reset_query();

                    ?>

                </div><!--END Span 8 -->
                
                <?php get_sidebar('blog'); ?>

            </div><!--END ROW -->

        </div>  <!--END Container -->

    </div><!--END SECTION -->

    <?php 

endwhile;
endif; 

wp_reset_query();

get_footer(); 

?>

