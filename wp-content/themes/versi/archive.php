<?php get_header(); ?> 




    <div id="rnr-post-single" class="section post-single"><!-- SECTION -->


        <div class="container">

            <!-- BEGIN SECTION TITLE -->
            <div class="header">
                <h1 class="header-text">
			<?php if (is_category()) { ?>
				<?php _e('Category Archive for:', 'rocknrolla') ?> <?php single_cat_title(); ?>

			<?php } elseif( is_tag() ) { ?>
				<?php _e('Posts Tagged:', 'rocknrolla') ?><?php single_tag_title(); ?>

			<?php } elseif (is_day()) { ?>
				<?php _e('Archive for:', 'rocknrolla') ?> <?php the_time('F jS, Y'); ?>

			<?php } elseif (is_month()) { ?>
				<?php _e('Archive for:', 'rocknrolla') ?> <?php the_time('F, Y'); ?>

			<?php } elseif (is_year()) { ?>
				<?php _e('Archive for:', 'rocknrolla') ?> <?php the_time('Y'); ?>

			<?php } elseif (is_author()) { ?>
				<?php _e('Author Archive:', 'rocknrolla') ?>

			<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<?php _e('Blog Archives:', 'rocknrolla') ?>
			<?php } ?>
            </h1>			
            </div>
            <!-- END SECTION TITLE -->


            <!-- BEGIN SECTION CAPTION -->
            <div class="caption"></div>
            <!-- END SECTION CAPTION -->   

        </div>   


      <div class="container">   
            <div class="row">        
                <div class="span8">                


                   <?php if (have_posts()) : while (have_posts()) : the_post();  

                        get_template_part( 'post-format/content', get_post_format() ); 

                    endwhile; 

                     get_template_part( 'post-format/pagination' ); 

                     else : ?>

                    <h2><?php _e('No Posts Found', 'rocknrolla') ?></h2>

                    <?php

                    endif; 

                    wp_reset_query();


                    ?>

                </div><!-- END SPAN8 -->
                <?php get_sidebar('blog'); ?>
             </div>   
      </div>	
		

    </div><!--END SECTION -->





<?php get_footer(); ?>