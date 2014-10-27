<?php

function rnr_shortcodes_formatter($content) {
	$block = join("|",array("blockquote","pullquote","fancy_header", "social_icon", "social_box", "map", "callout", "toggle", "accordion", "accordion_item", "service_box", "skill_bar", "testimonial", "clients_box", "client", "milestone_box", "team_member", "one_third", "one_third_last", "two_third", "two_third_last", "one_half", "one_half_last", "one_fourth", "one_fourth_last", "three_fourth", "three_fourth_last", "one_fifth", "one_fifth_last", "two_fifth", "two_fifth_last", "three_fifth", "three_fifth_last", "four_fifth", "four_fifth_last", "one_sixth", "one_sixth_last", "five_sixth", "five_sixth_last", "center", "pre", "br", "space", "clear", "typography", "video", "tabgroup", "tab", "pricing_table", "pricing_column", "highlight", "button"));

	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);

	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)/","[/$2]",$rep);

	return $rep;
}

add_filter('the_content', 'rnr_shortcodes_formatter');
add_filter('widget_text', 'rnr_shortcodes_formatter');


/*-----------------------------------------------------------------------------------*/
/* Block Quote */
/*-----------------------------------------------------------------------------------*/

function rocknrolla_blockquote( $atts, $content = null){

	$rnr_blockquote .= '<blockquote>' . do_shortcode($content) . '</blockquote>';
   
	return $rnr_blockquote;
}

add_shortcode('blockquote', 'rocknrolla_blockquote');


/*-----------------------------------------------------------------------------------*/
/* Pull Quote */
/*-----------------------------------------------------------------------------------*/

function rocknrolla_pullquote( $atts, $content = null){

	extract( shortcode_atts(array(
        "align" => '',  
    ), $atts) );

    if ( $align == 'right' ) 
        $alignclass = 'align-right';    
    else
    	$alignclass = 'align-left';

	$rnr_pullquote .= '<span class="pullquote ' . $alignclass . '">' . do_shortcode($content) . '</span>';
   
	return $rnr_pullquote;
}

add_shortcode('pullquote', 'rocknrolla_pullquote');

/*-----------------------------------------------------------------------------------*/
/* Fancy Header */
/*-----------------------------------------------------------------------------------*/

function rocknrolla_fancy_header( $atts, $content = null){

    $rnr_fancy_header = '<div class="fancy-header">';
	$rnr_fancy_header .= '<h1>' . do_shortcode($content) . '</h1>';
	$rnr_fancy_header .= '</div>';
   
	return $rnr_fancy_header;
}

add_shortcode('fancy_header', 'rocknrolla_fancy_header');

/*-----------------------------------------------------------------------------------*/
/*	Social Sharing
/*-----------------------------------------------------------------------------------*/

function rocknrolla_social_sharing_box( $atts, $content = null ){

	$rnr_social_box = '<div class="social-icons">';
	$rnr_social_box .= do_Shortcode($content);
	$rnr_social_box .= '</div>';
    
    return $rnr_social_box;

}

function rocknrolla_social_icon($atts, $content = null) {	

	extract( shortcode_atts(array(
        "url" => '#',       
        "icon" => ''
    ), $atts) );  

	$rnr_social_icon = '<a href="'. $url .'" class="social-icon">';
	$rnr_social_icon .= '<i class="social-'. $icon .'"></i>';
	$rnr_social_icon .= '</a>';

	return $rnr_social_icon;
}

add_shortcode('social_icon', 'rocknrolla_social_icon');
add_shortcode('social_box', 'rocknrolla_social_sharing_box');


/*-----------------------------------------------------------------------------------*/
/* Google Maps
/*-----------------------------------------------------------------------------------*/

function rocknrolla_googlemap( $atts, $content = null ){

	extract( shortcode_atts(array(
			      "width" => '100%',
				  "height" => '330px',
				  "url" => '#'
	), $atts) );  
	
	$rnr_googlemap = '<div class="rnr-google-map"><iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'. $url .'&amp;output=embed"></iframe></div>';
	
	return $rnr_googlemap;

}

add_shortcode('map', 'rocknrolla_googlemap');

/*-----------------------------------------------------------------------------------*/
/* Callout Box
/*-----------------------------------------------------------------------------------*/

function rocknrolla_callout_shortcode( $atts, $content = null ){

	extract( shortcode_atts(array(
			"title" => 'Callout Title',
			"btn_title" => 'Purchase Now',
			"btn_url" => '#'
	), $atts) );  
	
	$rnr_callout = '<div class="callout clearfix">';
	$rnr_callout .= '<div class="callout-content">';
	$rnr_callout .= '<h3 class="highlight">'. $title .'</h3>';
	$rnr_callout .= '<p class="lead">' . do_shortcode($content) . '</p></div>';
	$rnr_callout .= '<div class="callout-button">';
	$rnr_callout .= '<a class="button large" href="'. $btn_url .'" target="_blank">'. $btn_title .'</a>';
	$rnr_callout .= '</div>';
	$rnr_callout .= '</div>';

	return $rnr_callout;

}

add_shortcode('callout', 'rocknrolla_callout_shortcode');


/*-----------------------------------------------------------------------------------*/
/* Callout Box
/*-----------------------------------------------------------------------------------*/

function rocknrolla_button_shortcode( $atts, $content = null ){

	extract( shortcode_atts(array(
			"btn_title" => 'Purchase Now',
			"btn_url" => '#',
			"target" => '_self',
			
	), $atts) );  
	
	$rnr_button = '<a class="button large" href="'. $btn_url .'" target="'. $target .'">'. $btn_title .'</a>';

	return $rnr_button;

}

add_shortcode('button', 'rocknrolla_button_shortcode');


/*-----------------------------------------------------------------------------------*/
/* Toggle Item
/*-----------------------------------------------------------------------------------*/

function rocknrolla_toggle_shortcode( $atts, $content = null ){

	extract( shortcode_atts(array(
			"title" => 'Accordion Title',
			"open" => '0'
	), $atts) );  
	
	if ( $open == '1' || $open == 'yes') {
		$active = 'active';
	}
	else{
		$active = '';
	}

	$rnr_toggle_item = '<div class="toggle">';
	$rnr_toggle_item .= '<div class="toggle-title '. $active .'">';
	$rnr_toggle_item .= '<h3>';
	$rnr_toggle_item .= '<i></i>';
	$rnr_toggle_item .= '<span class="title-name">'. $title .'</span>';
	$rnr_toggle_item .= '</h3>';
	$rnr_toggle_item .= '</div>';
	$rnr_toggle_item .= '<div class="toggle-inner">';
	$rnr_toggle_item .= '<p>' . do_shortcode($content) . '</p>';
	$rnr_toggle_item .= '</div>';
	$rnr_toggle_item .= '</div><!-- END OF TOGGLE -->';

	return $rnr_toggle_item;

}

add_shortcode('toggle', 'rocknrolla_toggle_shortcode');


/*-----------------------------------------------------------------------------------*/
/* Accordions
/*-----------------------------------------------------------------------------------*/

/* ACCORDION BLOCK */
function rocknrolla_accordion_shortcode( $atts, $content = null ){
		
	$rnr_accordion = '<div class="accordion" rel="1">  ' . do_shortcode($content) . '</div>';
	
	return $rnr_accordion;

}

add_shortcode('accordion', 'rocknrolla_accordion_shortcode');


/* ACCORDION ITEM */
function rocknrolla_accordion_item_shortcode( $atts, $content = null ){

	extract( shortcode_atts(array(
			"title" => 'Accordion Title'
	), $atts) );  
	
    $rnr_acc_item = '<div class="accordion-title">';
	$rnr_acc_item .= '<h3><span></span><a href="#">'. $title .'</a></h3>';
	$rnr_acc_item .= '</div>';
	$rnr_acc_item .= '<div class="accordion-inner">' . do_shortcode($content) . '</div>';
	
	return $rnr_acc_item;

}

add_shortcode('accordion_item', 'rocknrolla_accordion_item_shortcode');



/*-----------------------------------------------------------------------------------*/
/* Testimonial
/*-----------------------------------------------------------------------------------*/

function rocknrolla_testimonial( $atts, $content = null) {
	
	extract( shortcode_atts(array(
        "author_info" => '',        
        "img" => ''
    ), $atts) ); 

    $rnr_testimonial = '<div class="testimonial">';
	$rnr_testimonial .= '<!-- BEGIN CLIENT IMAGE -->';
	$rnr_testimonial .= '<div class="client-image">';
	$rnr_testimonial .= '<img src="'. $img .'" alt="'. $author_info .'">';
	$rnr_testimonial .= '</div>';
	$rnr_testimonial .= '<!-- END CLIENT IMAGE -->';
	$rnr_testimonial .= '<!-- BEGIN CLIENT TESTIMONIAL -->';
	$rnr_testimonial .= '<div class="client-testimonial">';
	$rnr_testimonial .= '<p>'. do_Shortcode($content) .'</p>';
	$rnr_testimonial .= '<cite>'. $author_info .'</cite>';
	$rnr_testimonial .= '</div>';
	$rnr_testimonial .= '<!-- END CLIENT TESTIMONIAL -->';
	$rnr_testimonial .= '</div>';

	return $rnr_testimonial;

}

add_shortcode('testimonial', 'rocknrolla_testimonial');

/*-----------------------------------------------------------------------------------*/
/*	Service Box Shortcode
/*-----------------------------------------------------------------------------------*/
  function rocknrolla_service_box_shortcode( $atts, $content = null ){
          
    extract( shortcode_atts(array(
        "icon" => '',        
        "title" => ''
    ), $atts) );    
      
	$rnr_service_box = '<!-- BEGIN SERVICE BOX  --> ';
	$rnr_service_box .= '<div class="rnr-service-box">';
	$rnr_service_box .= '<!-- BEGIN SERVICE BOX ICON -->';
	$rnr_service_box .= '<div class="rnr-service-box-icon">';
	$rnr_service_box .= '<i class="fa '. $icon .'"></i>';
	$rnr_service_box .= '</div>';
	$rnr_service_box .= '<!-- END SERVICE BOX ICON -->';
	$rnr_service_box .= '<!-- BEGIN SERVICE BOX CONTENT -->';
	$rnr_service_box .= '<div class="rnr-service-box-content">';
	$rnr_service_box .= '<h2 class="rnr-service-box-title">'. $title .'</h2>';
	$rnr_service_box .= '<p>'. do_Shortcode($content) .'</p>';
	$rnr_service_box .= '</div>';
	$rnr_service_box .= '<!-- END SERVICE BOX CONTENT -->';
	$rnr_service_box .= '</div> ';
	$rnr_service_box .= '<!-- END SERVICE BOX -->';
    
    return $rnr_service_box;

}

add_shortcode('service_box', 'rocknrolla_service_box_shortcode');


/*-----------------------------------------------------------------------------------*/
/*	Skill Bar
/*-----------------------------------------------------------------------------------*/

function rocknrolla_skill_bars($atts, $content = null) {	

	extract( shortcode_atts(array(
        "percentage" => '50',       
        "title" => ''
    ), $atts) );  

	$rnr_skill = '<div class="skillbar" data-perc="'. $percentage .'">';
	$rnr_skill .= '<div class="skill-title">'. $title .'</div>';
	$rnr_skill .= '<div class="skill-percentage"></div>';
	$rnr_skill .= '</div>';

	return $rnr_skill;
}

add_shortcode('skill_bar', 'rocknrolla_skill_bars');


/*-----------------------------------------------------------------------------------*/
/*	Clients
/*-----------------------------------------------------------------------------------*/



function rocknrolla_client($atts, $content = null) {	

	extract( shortcode_atts(array(
        "logo" => '',
        "url" => '500',       
        "title" => '',
		"target" =>''
    ), $atts) );  

	return '<li><a href="'. $url .'" title="'. $title .'" class="clients" target="'. $target .'"><img src="'. $logo .'" alt="'. $title .'"></a></li>';

	return $$rnr_client;
}

add_shortcode('client', 'rocknrolla_client');

function rocknrolla_clients_box( $atts, $content = null ){

	return '<ul class="client-logos styled-list">'. do_shortcode($content) .'</ul>';
    

}
add_shortcode('clients_box', 'rocknrolla_clients_box');

/*-----------------------------------------------------------------------------------*/
/*	Milestone Box Shortcode
/*-----------------------------------------------------------------------------------*/
function rocknrolla_milestone_box_shortcode( $atts, $content = null ){
          
    extract( shortcode_atts(array(
        "icon" => '',
        "count" => '500',       
        "title" => ''
    ), $atts) );    

	$rnr_milestone_box = '<div class="rnr-icon-middle">';
	$rnr_milestone_box .= '<i class="fa '. $icon .'"></i>';
	$rnr_milestone_box .= '<div class="milestone-counter" data-perc="'. $count .'">';
	$rnr_milestone_box .= '<span class="milestone-count"></span>';
	$rnr_milestone_box .= '</div>';
	$rnr_milestone_box .= '<h2>'. $title .'</h2>';
	$rnr_milestone_box .= '</div>';
    
    return $rnr_milestone_box;

}

add_shortcode('milestone_box', 'rocknrolla_milestone_box_shortcode');



/*-----------------------------------------------------------------------------------*/
/*	Team Member
/*-----------------------------------------------------------------------------------*/

function rocknrolla_team_member( $atts, $content = null) {
	extract( shortcode_atts( array(
		'img' 	=> '',
		'name' 	=> '',
		'role'	=> '',
		'twitter' => '',
		'facebook' => '',
		'google' => '',
		'mail' => '',
		'instagram' => '',
		'linkedin' => '',
		'skype' => '',
    ), $atts ) );


if( $twitter != '' || $facebook != '' || $google != '' || $linkedin != '' || $mail != '' || $instagram != '' || $skype != ''  ){
	$rnr_team_social_start = '<div class="social"><ul>';
	$rnr_team_social_end= '</ul></div>';

	if($twitter != '') {
		$rnr_team_twitter = '<li><a href="'.$twitter.'" target="_blank"><i class="fa fa-twitter"></i></a></li>';
	} else{
		$rnr_team_twitter = ''; 
	}

	if($facebook != '') {
		$rnr_team_facebook = '<li><a href="'.$facebook.'" target="_blank"><i class="fa fa-facebook"></i></a></li>';
	} else{
		$rnr_team_facebook = ''; 
	}
	      
	if($google != '') {
		$rnr_team_google = '<li class="last"><a href="'.$google.'" target="_blank"><i class="fa fa-google-plus"></i></a></li>';
	} else{
		$rnr_team_google = ''; 
	}
	
	if($mail != '') {
		$rnr_team_mail = '<li><a href="mailto:'.$mail.'" target="_blank"><i class="fa fa-envelope-o"></i></a></li>';
	} else{
		$rnr_team_mail = ''; 
	}	
	
	if($linkedin != '') {
		$rnr_team_linkedin = '<li><a href="'.$linkedin.'" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
	} else{
		$rnr_team_linkedin = ''; 
	}	
	
	if($instagram != '') {
		$rnr_team_instagram = '<li><a href="'.$instagram.'" target="_blank"><i class="fa fa-instagram"></i></a></li>';
	} else{
		$rnr_team_instagram = ''; 
	}	
	
	if($skype != '') {
		$rnr_team_skype = '<li class="last"><a href="'.$skype.'" target="_blank"><i class="fa fa-skype"></i></a></li>';
	} else{
		$rnr_team_skype = ''; 
	}

	$rnr_team_social = $rnr_team_social_start . $rnr_team_twitter . $rnr_team_facebook . $rnr_team_google . $rnr_team_mail . $rnr_team_linkedin . $rnr_team_instagram . $rnr_team_skype . $rnr_team_social_end; 

}  else {
	$rnr_team_social = '';
}   

$rnr_team_member = '<div class="team-member">';
$rnr_team_member .= '<img src="'. $img .'" class="team-image" alt="'. $name .'" />';
$rnr_team_member .= '<h3 class="team-member-name">'. $name .'</h3>';
$rnr_team_member .= '<div class="team-member-position">'. $role .'</div>';
$rnr_team_member .= '<p>'.do_shortcode($content).'</p>';
$rnr_team_member .= $rnr_team_social;
$rnr_team_member .= '</div>';

return $rnr_team_member;

}

add_shortcode('team_member', 'rocknrolla_team_member');


/*-----------------------------------------------------------------------------------*/
/*	Columns
/*-----------------------------------------------------------------------------------*/
function rocknrolla_one_third( $atts, $content = null ) {

   return '<div class="one_third">' . do_shortcode($content) . '</div>';
}

function rocknrolla_one_third_last( $atts, $content = null ) {
   return '<div class="one_third last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function rocknrolla_two_third( $atts, $content = null ) {
   return '<div class="two_third">' . do_shortcode($content) . '</div>';
}

function rocknrolla_two_third_last( $atts, $content = null ) {
   return '<div class="two_third last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function rocknrolla_one_half( $atts, $content = null ) {
   return '<div class="one_half">' . do_shortcode($content) . '</div>';
}

function rocknrolla_one_half_last( $atts, $content = null ) {
   return '<div class="one_half last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function rocknrolla_one_fourth( $atts, $content = null ) {
   return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
}

function rocknrolla_one_fourth_last( $atts, $content = null ) {
   return '<div class="one_fourth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function rocknrolla_three_fourth( $atts, $content = null ) {
   return '<div class="three_fourth">' . do_shortcode($content) . '</div>';
}

function rocknrolla_three_fourth_last( $atts, $content = null ) {
   return '<div class="three_fourth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function rocknrolla_one_fifth( $atts, $content = null ) {
   return '<div class="one_fifth">' . do_shortcode($content) . '</div>';
}

function rocknrolla_one_fifth_last( $atts, $content = null ) {
   return '<div class="one_fifth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function rocknrolla_two_fifth( $atts, $content = null ) {
   return '<div class="two_fifth">' . do_shortcode($content) . '</div>';
}

function rocknrolla_two_fifth_last( $atts, $content = null ) {
   return '<div class="two_fifth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function rocknrolla_three_fifth( $atts, $content = null ) {
   return '<div class="three_fifth">' . do_shortcode($content) . '</div>';
}

function rocknrolla_three_fifth_last( $atts, $content = null ) {
   return '<div class="three_fifth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function rocknrolla_four_fifth( $atts, $content = null ) {
   return '<div class="four_fifth">' . do_shortcode($content) . '</div>';
}

function rocknrolla_four_fifth_last( $atts, $content = null ) {
   return '<div class="four_fifth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function rocknrolla_one_sixth( $atts, $content = null ) {
   return '<div class="one_sixth">' . do_shortcode($content) . '</div>';
}

function rocknrolla_one_sixth_last( $atts, $content = null ) {
   return '<div class="one_sixth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

function rocknrolla_five_sixth( $atts, $content = null ) {
   return '<div class="five_sixth">' . do_shortcode($content) . '</div>';
}

function rocknrolla_five_sixth_last( $atts, $content = null ) {
   return '<div class="five_sixth last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

add_shortcode('one_third', 'rocknrolla_one_third');
add_shortcode('one_third_last', 'rocknrolla_one_third_last');
add_shortcode('two_third', 'rocknrolla_two_third');
add_shortcode('two_third_last', 'rocknrolla_two_third_last');
add_shortcode('one_half', 'rocknrolla_one_half');
add_shortcode('one_half_last', 'rocknrolla_one_half_last');
add_shortcode('one_fourth', 'rocknrolla_one_fourth');
add_shortcode('one_fourth_last', 'rocknrolla_one_fourth_last');
add_shortcode('three_fourth', 'rocknrolla_three_fourth');
add_shortcode('three_fourth_last', 'rocknrolla_three_fourth_last');
add_shortcode('one_fifth', 'rocknrolla_one_fifth');
add_shortcode('one_fifth_last', 'rocknrolla_one_fifth_last');
add_shortcode('two_fifth', 'rocknrolla_two_fifth');
add_shortcode('two_fifth_last', 'rocknrolla_two_fifth_last');
add_shortcode('three_fifth', 'rocknrolla_three_fifth');
add_shortcode('three_fifth_last', 'rocknrolla_three_fifth_last');
add_shortcode('four_fifth', 'rocknrolla_four_fifth');
add_shortcode('four_fifth_last', 'rocknrolla_four_fifth_last');
add_shortcode('one_sixth', 'rocknrolla_one_sixth');
add_shortcode('one_sixth_last', 'rocknrolla_one_sixth_last');
add_shortcode('five_sixth', 'rocknrolla_five_sixth');
add_shortcode('five_sixth_last', 'rocknrolla_five_sixth_last');



/*-----------------------------------------------------------------------------------*/
/* Align Center
/*-----------------------------------------------------------------------------------*/

function rocknrolla_align_center( $atts, $content = null ) {
   return '<div class="aligncenter">' . do_shortcode($content) . '</div>';
}

add_shortcode('center', 'rocknrolla_align_center');


/*-----------------------------------------------------------------------------------*/
/* Preformatted Boxes
/*-----------------------------------------------------------------------------------*/

function rocknrolla_pre_box( $atts, $content = null ){	

return '<pre>' . $content . '</pre>';

}

add_shortcode('pre', 'rocknrolla_pre_box');

/*-----------------------------------------------------------------------------------*/
/*	Br-Tag
/*-----------------------------------------------------------------------------------*/

function rocknrolla_br() {
   return '<br />';
}

 add_shortcode('br', 'rocknrolla_br');



/*-----------------------------------------------------------------------------------*/
/*	Space Dividers
/*-----------------------------------------------------------------------------------*/

function rocknrolla_space( $atts, $content = null) {

extract( shortcode_atts( array(
      'height' 	=> '10'
      ), $atts ) );
      
      if($height == '') {
		  $rnr_space_height = '';
	  }
	  else{
		  $rnr_space_height = 'style="height: '.$height.'px;"';
	  }
      
      return '<div class="space" ' . $rnr_space_height . '></div>';
}

add_shortcode('space', 'rocknrolla_space');

/*-----------------------------------------------------------------------------------*/
/*	Clear-Tag
/*-----------------------------------------------------------------------------------*/

function rocknrolla_clear() {  
    return '<div class="clear"></div>';  
}

add_shortcode('clear', 'rocknrolla_clear');

/*-----------------------------------------------------------------------------------*/
/*	Custom Typography 
/*-----------------------------------------------------------------------------------*/

function rocknrolla_typography( $atts, $content = null) {
extract( shortcode_atts( array(
      	'font' => 'Oswald',
      	'size' => '42px',
      	'margin' => '0px',
      	'weight' => '400'
      ), $atts ) );
	  
	  global $rocknrolla_fonts_regular;
	  
	  if(!in_array($font,$rocknrolla_fonts_regular)) {
	  
      $google = preg_replace("/ /","+",$font);
      
     $typography = '<link href="http://fonts.googleapis.com/css?family='.$google.'" rel="stylesheet" type="text/css">';
	 
	  } else { $typography = '';}
      		return	$typography.'<div class="custom-typography" style="font-family:\'' .$font. '\', serif !important; font-size:' .$size. ' !important; margin: ' .$margin. ' !important; font-weight:' .$weight .'">' . do_shortcode($content) . '</div>';

}

add_shortcode('typography', 'rocknrolla_typography');




/*-----------------------------------------------------------------------------------*/
/* Media */
/*-----------------------------------------------------------------------------------*/

function rocknrolla_video($atts) {
	extract(shortcode_atts(array(
		'type' 	=> '',
		'id' 	=> '',
		'autoplay' 	=> ''
	), $atts));
	
	if ($height && !$width) $width = intval($height * 16 / 9);
	if (!$height && $width) $height = intval($width * 9 / 16);
	if (!$height && !$width){
		$height = 315;
		$width = 560;
	}
	
	$autoplay = ($autoplay == 'yes' ? '1' : false);
		
	if($type == "vimeo") $rnr_video = "<div class='video-embed'><iframe src='http://player.vimeo.com/video/$id?autoplay=$autoplay&amp;title=0&amp;byline=0&amp;portrait=0' width='$width' height='$height' class='iframe'></iframe></div>";
	
	else if($type == "youtube") $rnr_video = "<div class='video-embed'><iframe src='http://www.youtube.com/embed/$id?HD=1;rel=0;showinfo=0' width='$width' height='$height' class='iframe'></iframe></div>";
		
	if (!empty($id)){
		return $rnr_video;
	}
}

add_shortcode('video', 'rocknrolla_video');



/*-----------------------------------------------------------------------------------*/
/*	Tabs
/*-----------------------------------------------------------------------------------*/

function rocknrolla_tabgroup( $atts, $content = null ) {
	$GLOBALS['tab_count'] = 0;
	$i = 1;
	$randomid = rand();

	do_shortcode( $content );

	if( is_array( $GLOBALS['tabs'] ) ){
	
		foreach( $GLOBALS['tabs'] as $tab ){	
			if( $tab['icon'] != '' ){
				$icon = '<i class="fa '.$tab['icon'].'"></i>';
			}
			else{
				$icon = '';
			}
			$tabs[] = '<li class="tab"><a href="#panel'.$randomid.$i.'">'.$icon . $tab['title'].'</a></li>';
			$panes[] = '<div class="panel" id="panel'.$randomid.$i.'"><p>'.$tab['content'].'</p></div>';
			$i++;
			$icon = '';
		}
		$return = '<div class="tabset"><ul class="tabs styled-list">'.implode( "\n", $tabs ).'</ul>'.implode( "\n", $panes ).'</div>';
	}
	return $return;
}
add_shortcode( 'tabgroup', 'rocknrolla_tabgroup' );

function rocknrolla_tab( $atts, $content = null) {
	extract(shortcode_atts(array(
			'title' => '',
			'icon'  => ''
	), $atts));
	
	$x = $GLOBALS['tab_count'];
	$GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'icon' => $icon, 'content' =>  do_shortcode($content) );
	$GLOBALS['tab_count']++;
}
add_shortcode( 'tab', 'rocknrolla_tab' );

	
/*-----------------------------------------------------------------------------------*/
/* Pricing Table */
/*-----------------------------------------------------------------------------------*/

function rocknrolla_pricing_table($atts, $content = null) {  

    extract(shortcode_atts(array(
    	"columns" => '4'
    ), $atts));

	$column_class = null;
	
	switch ($columns) {
		case '2' :
			$column_class = 'two';
			break;
		case '3' :
			$column_class = 'three';
			break;
		case '4' :
			$column_class = 'four';
			break;	
		case '5' :
			$column_class = 'five';
			break;
	}
	
    return '<div class="pricing-table '.$column_class.'">' . do_shortcode($content) . '</div>';

}
add_shortcode('pricing_table', 'rocknrolla_pricing_table');

function rocknrolla_pricing_column($atts, $content = null) {
	extract(shortcode_atts(array(
		"title"=>'Column title',
		"highlight" => 'false',
		"highlight_reason" => 'Most Popular',
		"price" => "99",
		"currency_symbol" => '$',
		"interval" => 'Per Month',
		"button_link" => '#',
		"button_text" => 'Buy Now'
	), $atts));
	
	$highlight_class = null;
	$hightlight_reason_html = null;
	
	if($highlight == 'true') {
		$highlight_class = 'highlight'; 
		$hightlight_reason_html = '<span class="highlight-reason">'.$highlight_reason.'</span>';
	}
	
    $pricing_column = '<div class="pricing-column '.$highlight_class.'">';
	$pricing_column .= '<h3>'.$title. $hightlight_reason_html .'</h3>';
	$pricing_column .=  '<div class="pricing-column-content">';
	$pricing_column .= '<h4><span class="dollar-sign">'.$currency_symbol.'</span> '.$price.' </h4>';
	$pricing_column .= '<span class="interval">'.$interval.'</span>' . do_shortcode($content);
	$pricing_column .= '<a class="button" href="'.$button_link .'">'.$button_text.'</a></div>';		
	$pricing_column .= '</div>';

	return $pricing_column;
}
add_shortcode('pricing_column', 'rocknrolla_pricing_column');

	

/*-----------------------------------------------------------------------------------*/
/* Highlight
/*-----------------------------------------------------------------------------------*/	
function rocknrolla_highlight( $atts, $content = null ) {	

   return '<span class="highlight">'. do_shortcode($content) . '</span>';  

}

add_shortcode('highlight', 'rocknrolla_highlight');
	
?>