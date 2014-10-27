<!--BEGIN HOME SECTION -->
<div class="home-text-wrapper">
<?php 
global $smof_data;

if($smof_data['rnr_home_type']=="Callout Text") { ?>

     <div class="container clearfix">			
         <h2 class="cs-text animated fadeInDown delay05s">
             <span class="cs-text-cut"><?php echo $smof_data['rnr_callout_top']; ?></span>
             <span class="cs-text-mid"><?php echo $smof_data['rnr_callout_middle']; ?></span>
             <span class="cs-text-cut medium"><?php echo $smof_data['rnr_callout_bottom']; ?></span>
         </h2>
     </div><!-- END CONTAINER -->
 <?php }
 else if($smof_data['rnr_home_type']=="Slider") { ?>
      
 <?php 
 if($smof_data['rnr_slider_type']=="Boxed") { ?>
     <div class="container clearfix">	
  <?php } ?>		
     <div class="flexslider <?php if($smof_data['rnr_slider_type']!="Boxed") { echo 'full-width';} ?> animated fadeInDown delay05s">
     <ul class="slides">

	  
<?php $home_slider = $smof_data['rnr_home_slider'];
	
	if ( !empty( $home_slider )) {
		
		
	foreach( $home_slider  as $slide){ ?>
		<?php if($slide['title'] || ($slide['url'] || $slide['description'])) { ?>
       
        <li>
          <?php if($slide['link']) { ?>
                <a href="<?php echo $slide['link']; ?>">
          <?php } ?>
          
          
          <?php if($slide['url']) { ?>
              <img src="<?php echo $slide['url']; ?>" alt="<?php $slide['title']; ?>" />
          <?php } ?>
          
          
          <?php if($slide['description'] || $slide['title']){ ?>
              <div class="flex-caption">
			  <h2 class="animated fadeInDown"><?php echo $slide['title']; ?></h2>              
			  <p class="animated fadeInDown delay05s"><?php echo $slide['description']; ?></p>
              </div>
          <?php } ?>
          
          
          <?php if($slide['link']) { ?>
          </a>
          <?php } ?>
        </li>
        
        <?php } ?>
    <?php } //end foreach ?>
    
     <?php } //end homeslider ?>
     
        </ul>
  </div> 

<?php if($smof_data['rnr_enable_slider_callout']==true) { ?>
    <div class="callout-text animated fadeInDown delay1s">
    <h1><?php echo $smof_data['rnr_slider_callout']; ?></h1>
    </div>       
<?php } ?>           
  
<?php if($smof_data['rnr_slider_type']=="Boxed") { ?>
  </div><!-- END CONTAINER --> 
  <?php } ?>	  



	 
	 <?php } ?>      
</div><!-- END HOME TEXT WRAPPER -->
