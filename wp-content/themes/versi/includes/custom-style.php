<?php

global $smof_data;

function rocknrolla_background_image( $kr_temp_back_img, $kr_temp_back_img_repeat, $kr_temp_back_img_horizontal, $kr_temp_back_img_vertical  ){
    
    # Used if your using WP Image uploader for Metaboxes
	/*
	if(!empty($kr_temp_back_img)){
		if(is_numeric($kr_temp_back_img)){
			$kr_temp_back_img = wp_get_attachment_image_src( $kr_temp_back_img , 'full' );
			$kr_temp_back_img =$kr_temp_back_img[0];
		}
	}
	*/

	?>
	background: url('<?php echo $kr_temp_back_img; ?>') <?php echo $kr_temp_back_img_horizontal; ?> <?php echo $kr_temp_back_img_vertical; ?>;	
<?php	
	if( $kr_temp_back_img_repeat == 'no-repeat' ){ ?>
	background-repeat: <?php echo $kr_temp_back_img_repeat; ?>;
	background-size: cover;	
    background-attachment:fixed;	
<?php 
	}	
	else{ ?>
	background-repeat: <?php echo $kr_temp_back_img_repeat; ?>;
<?php 
	}

}

function rocknrolla_background_gradient( $type, $start_color, $end_color){
	
	$rnr_grad_type ='1';		

	switch($type){
		
		case 'radial':
			$rnr_grad = 'radial';
			$rnr_grad_browser = 'center, ellipse cover'; 
			$rnr_grad_def_webkit = ' center center, 0px, center center, 100%';
			$rnr_grad_def = 'ellipse at center';
			break;
			
		case 'horizontal':
			$rnr_grad = 'linear';
			$rnr_grad_browser = 'left'; 
			$rnr_grad_def_webkit = ' left top, right top';
			$rnr_grad_def = 'to right';			
			break;
			
		case 'vertical':
			$rnr_grad = 'linear';
			$rnr_grad_type ='0';
			$rnr_grad_browser = 'top'; 
			$rnr_grad_def_webkit = ' left top, left bottom';
			$rnr_grad_def = 'to bottom';
			break;
			
		case 'diagonal-top':
			$rnr_grad = 'linear';
			$rnr_grad_browser = '45deg'; 
			$rnr_grad_def_webkit = ' left bottom, right top';
			$rnr_grad_def = '45deg';
			break;
			
		case 'diagonal-bottom':
			$rnr_grad = 'linear';
			$rnr_grad_browser = '-45deg'; 
			$rnr_grad_def_webkit = ' left top, right bottom';
			$rnr_grad_def = '135deg';
			break;
			
		default : 
			$rnr_grad = 'linear';
			$rnr_grad_type ='0';
			$rnr_grad_browser = 'top'; 
			$rnr_grad_def_webkit = ' left top, left bottom';
			$rnr_grad_def = 'to bottom';
			break;
	}	?>
   
	background: -moz-<?php echo $rnr_grad; ?>-gradient(<?php echo $rnr_grad_browser; ?>, <?php echo $start_color; ?> 0%, <?php echo $end_color; ?> 100%);
	background: -webkit-gradient(<?php echo $rnr_grad; ?>,<?php echo $rnr_grad_def_webkit; ?>, color-stop(0%,<?php echo $start_color; ?>), color-stop(100%,<?php echo $end_color; ?>));
	background: -webkit-<?php echo $rnr_grad; ?>-gradient(<?php echo $rnr_grad_browser; ?>,  <?php echo $start_color; ?> 0%,<?php echo $end_color; ?> 100%);
	background: -o-<?php echo $rnr_grad; ?>-gradient(<?php echo $rnr_grad_browser; ?>,  <?php echo $start_color; ?> 0%,<?php echo $end_color; ?> 100%);
	background: -ms-<?php echo $rnr_grad; ?>-gradient(<?php echo $rnr_grad_browser; ?>,  <?php echo $start_color; ?> 0%,<?php echo $end_color; ?> 100%);
	background: <?php echo $rnr_grad; ?>-gradient(<?php echo $rnr_grad_def; ?>,  <?php echo $start_color; ?> 0%,<?php echo $end_color; ?> 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=<?php echo $start_color; ?>, endColorstr=<?php echo $end_color; ?>,GradientType=<?php echo $rnr_grad_type; ?> );  
<?php 
}

function rocknrolla_custom_styles() {
global $smof_data; 
?>

<!-- CUSTOM TYPOGRAPHY STYLES -->
	
<style type="text/css">

  
 <?php 

 	$color_args=array(
 	    'post_type' => 'page',
 	    'order' => 'ASC',
 	    'orderby' => 'menu_order',
 	    'posts_per_page' => '-1'
  	 );
 	$wp_query = new WP_Query($color_args); 


     while ($wp_query->have_posts()) : $wp_query->the_post();
		

 	    $color_post_name = strtolower(str_replace(' ','-', get_the_title() ));
	    
	    $color_post_id = get_the_ID();

		$rnr_pagebg_type = get_post_meta( $color_post_id , 'rnr_pagebg_type', true );
		$rnr_pagebg_image_url = get_post_meta( $color_post_id , 'rnr_pagebg_image_url', true );
		$rnr_pagebg_image_repeatpro = get_post_meta( $color_post_id , 'rnr_pagebg_image_repeatpro', true );
		$rnr_pagebg_image_x_position = get_post_meta( $color_post_id , 'rnr_pagebg_image_x_position', true );
		$rnr_pagebg_image_y_position = get_post_meta( $color_post_id , 'rnr_pagebg_image_y_position', true );
		$rnr_pagebg_color = get_post_meta( $color_post_id , 'rnr_pagebg_color', true );
		$rnr_pagebg_grad_type = get_post_meta( $color_post_id , 'rnr_pagebg_grad_type', true ); 
		$rnr_pagebg_grad_start_color = get_post_meta( $color_post_id , 'rnr_pagebg_grad_start_color', true );
		$rnr_pagebg_grad_end_color = get_post_meta( $color_post_id , 'rnr_pagebg_grad_end_color', true );

		$rnr_title_color = get_post_meta( $color_post_id , 'rnr_title_color', true );
		$rnr_subtitle_color = get_post_meta( $color_post_id , 'rnr_subtitle_color', true );
		$rnr_border_color = get_post_meta( $color_post_id , 'rnr_border_color', true );
		$rnr_text_color = get_post_meta( $color_post_id , 'rnr_text_color', true );
		$rnr_link_color = get_post_meta( $color_post_id , 'rnr_link_color', true ); 
		$rnr_link_hover_color = get_post_meta( $color_post_id , 'rnr_link_hover_color', true );
	    
	  //  $separate_page = get_post_meta($color_post_id, "bra_separate_page", true); 
	   
	  //  if ($separate_page != "Yes")
	  //	    {

if ( $rnr_pagebg_type == 'gradient' ) {  # Gradient Code
?> 
.page<?php echo $color_post_id ?>{
<?php rocknrolla_background_gradient( $rnr_pagebg_grad_type, $rnr_pagebg_grad_start_color, $rnr_pagebg_grad_end_color ); ?>
}
<?php } #Ends Gradient Code 

else if ( $rnr_pagebg_type == 'image' ) {  # Background Image Code
?> 

.page<?php echo $color_post_id ?>{
<?php rocknrolla_background_image( $rnr_pagebg_image_url, $rnr_pagebg_image_repeatpro, $rnr_pagebg_image_x_position, $rnr_pagebg_image_y_position ); ?>
}

<?php } #Ends Background Image Code ?>

	 

.page<?php echo $color_post_id ?>{
	background-color: <?php echo $rnr_pagebg_color; ?>; 
	color: <?php echo $rnr_text_color; ?>;
}

.page<?php echo $color_post_id ?> .telephone {
	color: <?php echo $rnr_pagebg_color; ?>;	
}

.page<?php echo $color_post_id ?> .rnr-service-box .rnr-service-box-icon i {
	background: <?php echo $rnr_text_color; ?>;
	color: <?php echo $rnr_pagebg_color; ?>; 
	border: 4px solid <?php echo $rnr_pagebg_color; ?>; 
	box-shadow: 0px 0px 0px 3px <?php echo $rnr_text_color; ?>;
}
.page<?php echo $color_post_id ?> .rnr-service-box:hover .rnr-service-box-icon i {
	box-shadow: 0px 0px 0px 6px <?php echo $rnr_text_color; ?>;
}

.page<?php echo $color_post_id ?> .header h1.header-text,
.page<?php echo $color_post_id ?> h1,
.page<?php echo $color_post_id ?> h2,
.page<?php echo $color_post_id ?> h3,
.page<?php echo $color_post_id ?> h4,
.page<?php echo $color_post_id ?> h5,
.page<?php echo $color_post_id ?> h6{
	color: <?php echo $rnr_title_color; ?>;
}

.page<?php echo $color_post_id ?> .caption{
	color: <?php echo $rnr_subtitle_color; ?>;
}

.page<?php echo $color_post_id ?> a, 
.page<?php echo $color_post_id ?> .skill-title{ 
	color: <?php echo $rnr_link_color; ?>;
}

.page<?php echo $color_post_id ?> a:hover{ 
	color: <?php echo $rnr_link_hover_color; ?>;
}

.page<?php echo $color_post_id ?> #project-navigation ul li#prevProject a, 
.page<?php echo $color_post_id ?> #project-navigation ul li#nextProject a,
.page<?php echo $color_post_id ?> #closeProject a {
	background-color: <?php echo $rnr_text_color; ?>;
}
			
		<?php 
	  //  }

   endwhile;
	wp_reset_postdata();
 ?>





body{ 
		
		font-family: <?php echo $smof_data['rnr_body_text']['face']; ?>, Arial, Helvetica, sans-serif; 
		font-size: <?php echo $smof_data['rnr_body_text']['size']; ?>; 
		
		<?php  if( $smof_data['rnr_body_text']['style'] == 'bold' )
		{?>
		font-weight: bold; 		  
		<?php } else if( $smof_data['rnr_body_text']['style'] == 'bold italic' )
		{?>
		font-weight: bold; 	
		font-style: italic;	  
		<?php } else { ?>
		font-style: <?php echo $smof_data['rnr_body_text']['style']; ?>; 		  
		<?php } ?>	   
	   
	   color: <?php echo $smof_data['rnr_body_text']['color']; ?>;
	   font-weight:  <?php echo $smof_data['rnr_body_font_weight']; ?>;
}

	h1{
		font-family: <?php echo $smof_data['rnr_heading_h1']['face']; ?>, Arial, Helvetica, sans-serif !important; 
		font-size: <?php echo $smof_data['rnr_heading_h1']['size']; ?>; 

		<?php  if( $smof_data['rnr_heading_h1']['style'] == 'bold' )
		{?>
		font-weight: bold; 		  
		<?php } else if( $smof_data['rnr_heading_h1']['style'] == 'bold italic' )
		{?>
		font-weight: bold; 	
		font-style: italic;	  
		<?php } else { ?>
		font-style: <?php echo $smof_data['rnr_heading_h1']['style']; ?>; 		  
		<?php } ?>

		color: <?php echo $smof_data['rnr_heading_h1']['color']; ?>; 
	    font-weight:  <?php echo $smof_data['rnr_heading_h1_font_weight']; ?>; 
	    text-transform:  <?php echo $smof_data['rnr_heading_h1_text_transform']; ?>;	
	}
	
	
	h2{ 
		font-family: <?php echo $smof_data['rnr_heading_h2']['face']; ?>, Arial, Helvetica, sans-serif !important; 
		font-size: <?php echo $smof_data['rnr_heading_h2']['size']; ?>; 

		<?php  if( $smof_data['rnr_heading_h2']['style'] == 'bold' )
		{?>
		font-weight: bold; 		  
		<?php } else if( $smof_data['rnr_heading_h2']['style'] == 'bold italic' )
		{?>
		font-weight: bold; 	
		font-style: italic;	  
		<?php } else { ?>
		font-style: <?php echo $smof_data['rnr_heading_h2']['style']; ?>; 		  
		<?php } ?>

		color: <?php echo $smof_data['rnr_heading_h2']['color']; ?>;  
	    font-weight:  <?php echo $smof_data['rnr_heading_h2_font_weight']; ?>; 
	    text-transform:  <?php echo $smof_data['rnr_heading_h2_text_transform']; ?>;	
	}
	h3{ 
		font-family: <?php echo $smof_data['rnr_heading_h3']['face']; ?>, Arial, Helvetica, sans-serif !important; 
		font-size: <?php echo $smof_data['rnr_heading_h3']['size']; ?>; 
		
		<?php  if( $smof_data['rnr_heading_h3']['style'] == 'bold' )
		{?>
		font-weight: bold; 		  
		<?php } else if( $smof_data['rnr_heading_h3']['style'] == 'bold italic' )
		{?>
		font-weight: bold; 	
		font-style: italic;	  
		<?php } else { ?>
		font-style: <?php echo $smof_data['rnr_heading_h3']['style']; ?>; 		  
		<?php } ?>

		color: <?php echo $smof_data['rnr_heading_h3']['color']; ?>;  
	    font-weight:  <?php echo $smof_data['rnr_heading_h3_font_weight']; ?>; 
	    text-transform:  <?php echo $smof_data['rnr_heading_h3_text_transform']; ?>;	
	}
	h4{ 
		font-family: <?php echo $smof_data['rnr_heading_h4']['face']; ?>, Arial, Helvetica, sans-serif !important; 
		font-size: <?php echo $smof_data['rnr_heading_h4']['size']; ?>; 

		<?php  if( $smof_data['rnr_heading_h4']['style'] == 'bold' )
		{?>
		font-weight: bold; 		  
		<?php } else if( $smof_data['rnr_heading_h4']['style'] == 'bold italic' )
		{?>
		font-weight: bold; 	
		font-style: italic;	  
		<?php } else { ?>
		font-style: <?php echo $smof_data['rnr_heading_h4']['style']; ?>;  
	    font-weight:  <?php echo $smof_data['rnr_heading_h4_font_weight']; ?>; 
	    text-transform:  <?php echo $smof_data['rnr_heading_h4_text_transform']; ?>;			  
		<?php } ?>

		color: <?php echo $smof_data['rnr_heading_h4']['color']; ?>; 
	}
	h5{ 
		font-family: <?php echo $smof_data['rnr_heading_h5']['face']; ?>, Arial, Helvetica, sans-serif !important; 
		font-size: <?php echo $smof_data['rnr_heading_h5']['size']; ?>; 

		<?php  if( $smof_data['rnr_heading_h5']['style'] == 'bold' )
		{?>
		font-weight: bold; 		  
		<?php } else if( $smof_data['rnr_heading_h5']['style'] == 'bold italic' )
		{?>
		font-weight: bold; 	
		font-style: italic;	  
		<?php } else { ?>
		font-style: <?php echo $smof_data['rnr_heading_h5']['style']; ?>; 		  
		<?php } ?>

		color: <?php echo $smof_data['rnr_heading_h5']['color']; ?>;  
	    font-weight:  <?php echo $smof_data['rnr_heading_h5_font_weight']; ?>; 
	    text-transform:  <?php echo $smof_data['rnr_heading_h5_text_transform']; ?>;	
	}
	h6{ 
		font-family: <?php echo $smof_data['rnr_heading_h6']['face']; ?>, Arial, Helvetica, sans-serif !important; 
		font-size: <?php echo $smof_data['rnr_heading_h6']['size']; ?>; 

		<?php  if( $smof_data['rnr_heading_h6']['style'] == 'bold' )
		{?>
		font-weight: bold; 		  
		<?php } else if( $smof_data['rnr_heading_h6']['style'] == 'bold italic' )
		{?>
		font-weight: bold; 	
		font-style: italic;	  
		<?php } else { ?>
		font-style: <?php echo $smof_data['rnr_heading_h6']['style']; ?>; 	 
	    font-weight:  <?php echo $smof_data['rnr_heading_h6_font_weight']; ?>; 
	    text-transform:  <?php echo $smof_data['rnr_heading_h6_text_transform']; ?>;	  
		<?php } ?>

		color: <?php echo $smof_data['rnr_heading_h6']['color']; ?>; 
	}

.navigation {
	background: <?php echo $smof_data['rnr_menu_background']; ?>;
}

.navigation li a {
		font-family: <?php echo $smof_data['rnr_menu']['face']; ?>, Arial, Helvetica, sans-serif; 
		font-size: <?php echo $smof_data['rnr_menu']['size']; ?>; 
		
		<?php  if( $smof_data['rnr_menu']['style'] == 'bold' )
		{?>
		font-weight: bold; 		  
		<?php } else if( $smof_data['rnr_menu']['style'] == 'bold italic' )
		{?>
		font-weight: bold; 	
		font-style: italic;	  
		<?php } else { ?>
		font-style: <?php echo $smof_data['rnr_menu']['style']; ?>; 		  
		<?php } ?>	   
	   
	   color: <?php echo $smof_data['rnr_menu']['color']; ?>;	
	   font-weight:  <?php echo $smof_data['rnr_menu_font_weight']; ?>; 
	   text-transform:  <?php echo $smof_data['rnr_menu_text_transform']; ?>;   	   	
}
.navigation li a:hover, .navigation li.active a {
	   color: <?php echo $smof_data['rnr_menu_link_hover_color']; ?>;		
	   background: <?php echo $smof_data['rnr_menu_link_hover_bg_color']; ?>;		   
}

.footer {
	background: <?php echo $smof_data['rnr_footer_background']; ?>;
	font-family: <?php echo $smof_data['rnr_footer']['face']; ?>, Arial, Helvetica, sans-serif; 
	font-size: <?php echo $smof_data['rnr_footer']['size']; ?>; 
	
	<?php  if( $smof_data['rnr_footer']['style'] == 'bold' )
	{?>
	font-weight: bold; 		  
	<?php } else if( $smof_data['rnr_footer']['style'] == 'bold italic' )
	{?>
	font-weight: bold; 	
	font-style: italic;	  
	<?php } else { ?>
	font-style: <?php echo $smof_data['rnr_footer']['style']; ?>; 		  
	<?php } ?>	  
   
   color: <?php echo $smof_data['rnr_footer']['color']; ?>;		
}
.footer a, .footer .social-icons .social-icon {
	   color: <?php echo $smof_data['rnr_footer_link_color']; ?>;	   
}
.footer a:hover {
	   color: <?php echo $smof_data['rnr_footer_link_hover_color']; ?>;	   
}

#rnr-post-single {
       background: <?php echo $smof_data['rnr_blog_bgcolor']; ?>;
       color: <?php echo $smof_data['rnr_blog_textcolor']; ?>;		
}
#rnr-post-single h1, #rnr-post-single h2, #rnr-post-single h3, #rnr-post-single h4, #rnr-post-single h5, #rnr-post-single h6  {
       color: <?php echo $smof_data['rnr_blog_headingscolor']; ?>;		
}
#rnr-post-single a {
       color: <?php echo $smof_data['rnr_blog_linkcolor']; ?>;		
}
#rnr-post-single a:hover {
       color: <?php echo $smof_data['rnr_blog_linkhovercolor']; ?>;		
}

.cs-text-cut {
	font-family: <?php echo $smof_data['rnr_callout_top_font']['face']; ?>, Arial, Helvetica, sans-serif; 
	font-size: <?php echo $smof_data['rnr_callout_top_font']['size']; ?>; 
	
	<?php  if( $smof_data['rnr_callout_top_font']['style'] == 'bold' )
	{?>
	font-weight: bold; 		  
	<?php } else if( $smof_data['rnr_callout_top_font']['style'] == 'bold italic' )
	{?>
	font-weight: bold; 	
	font-style: italic;	  
	<?php } else { ?>
	font-style: <?php echo $smof_data['rnr_callout_top_font']['style']; ?>; 		  
	<?php } ?>	  
   
    color: <?php echo $smof_data['rnr_callout_top_font']['color']; ?>;	
	font-weight:  <?php echo $smof_data['rnr_callout_top_font_weight']; ?>; 
	text-transform:  <?php echo $smof_data['rnr_callout_top_text_transform']; ?>;   
}

.cs-text-mid {
	font-family: <?php echo $smof_data['rnr_callout_middle_font']['face']; ?>, Arial, Helvetica, sans-serif; 
	font-size: <?php echo $smof_data['rnr_callout_middle_font']['size']; ?>; 
	
	<?php  if( $smof_data['rnr_callout_middle_font']['style'] == 'bold' )
	{?>
	font-weight: bold; 		  
	<?php } else if( $smof_data['rnr_callout_middle_font']['style'] == 'bold italic' )
	{?>
	font-weight: bold; 	
	font-style: italic;	  
	<?php } else { ?>
	font-style: <?php echo $smof_data['rnr_callout_middle_font']['style']; ?>; 		  
	<?php } ?>	  
   
    color: <?php echo $smof_data['rnr_callout_middle_font']['color']; ?>;	
	font-weight:  <?php echo $smof_data['rnr_callout_middle_font_weight']; ?>; 
	text-transform:  <?php echo $smof_data['rnr_callout_middle_text_transform']; ?>;   
}

.cs-text-cut.medium {
	font-family: <?php echo $smof_data['rnr_callout_bottom_font']['face']; ?>, Arial, Helvetica, sans-serif; 
	font-size: <?php echo $smof_data['rnr_callout_bottom_font']['size']; ?>; 
	
	<?php  if( $smof_data['rnr_callout_bottom_font']['style'] == 'bold' )
	{?>
	font-weight: bold; 		  
	<?php } else if( $smof_data['rnr_callout_bottom_font']['style'] == 'bold italic' )
	{?>
	font-weight: bold; 	
	font-style: italic;	  
	<?php } else { ?>
	font-style: <?php echo $smof_data['rnr_callout_bottom_font']['style']; ?>; 		  
	<?php } ?>	  
   
    color: <?php echo $smof_data['rnr_callout_bottom_font']['color']; ?>;	
	font-weight:  <?php echo $smof_data['rnr_callout_bottom_font_weight']; ?>; 
	text-transform:  <?php echo $smof_data['rnr_callout_bottom_text_transform']; ?>;   
}

.callout-text h1 {
	font-family: <?php echo $smof_data['rnr_slider_callout_font']['face']; ?>, Arial, Helvetica, sans-serif; 
	font-size: <?php echo $smof_data['rnr_slider_callout_font']['size']; ?>; 
	
	<?php  if( $smof_data['rnr_slider_callout_font']['style'] == 'bold' )
	{?>
	font-weight: bold; 		  
	<?php } else if( $smof_data['rnr_slider_callout_font']['style'] == 'bold italic' )
	{?>
	font-weight: bold; 	
	font-style: italic;	  
	<?php } else { ?>
	font-style: <?php echo $smof_data['rnr_slider_callout_font']['style']; ?>; 		  
	<?php } ?>	  
   
    color: <?php echo $smof_data['rnr_slider_callout_font']['color']; ?>;	
	font-weight:  <?php echo $smof_data['rnr_slider_callout_font_weight']; ?>; 
	text-transform:  <?php echo $smof_data['rnr_slider_callout_text_transform']; ?>; 
}

<?php echo $smof_data['rnr_custom_css']; ?>
</style>

<?php }
add_action( 'wp_footer', 'rocknrolla_custom_styles', 100 );
?>