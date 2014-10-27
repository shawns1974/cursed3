
var   window_height = jQuery(window).height(),
      testMobile,
	  loadingError = '<p class="error">The Content cannot be loaded.</p>', 
      current,
	  next, 
	  prev,
	  target, 
	  hash,
	  url,
	  page,
	  title,	  	  	  
	  projectIndex,
	  scrollPostition,
	  projectLength,
	  ajaxLoading = false,
	  wrapperHeight,
	  pageRefresh = true,
	  content = false,
	  loader = jQuery('div#loader'),
	  portfolioGrid = jQuery('div#portfolio-wrap'),
	  projectContainer = jQuery('div#ajax-content-inner'),
	  projectNav = jQuery('#project-navigation ul'),
	  exitProject = jQuery('div#closeProject a'),
	  easing = 'easeOutExpo',
	  folderName ='portfolio-item';	




/*----------------------------------------------------*/
// CONTACT FORM WIDGET
/*----------------------------------------------------*/
	var contactFormDefaults=new Array();
	contactFormDefaults['contactName']=rnr_global_vars.contactFormDefaults_name;
	contactFormDefaults['contactEmail']=rnr_global_vars.contactFormDefaults_email;
	contactFormDefaults['contactSubject']=rnr_global_vars.contactFormDefaults_subject;
	contactFormDefaults['contactMessage']=rnr_global_vars.contactFormDefaults_message;
	contactFormDefaults['msg']=jQuery('.contactForm span#msg').html();
	
	jQuery('.contactForm input[type="text"], .contactForm textarea').focus(function() {
		jQuery(this).addClass('inputHighlight').removeClass('errorOutline');
		if(jQuery(this).hasClass('required')) {
			jQuery('.contactForm span#msg').html(rnr_global_vars.contact_form_required_fields_label_ajax).removeClass('errorMsg successMsg');
		} else {
			jQuery('.contactForm span#msg').html(contactFormDefaults['msg']).removeClass('errorMsg successMsg');
		}
		if(jQuery(this).val()==contactFormDefaults[jQuery(this).attr('id')]) {
			jQuery(this).val('');
		}
	});
	jQuery('.contactForm input[type="text"], .contactForm textarea').blur(function() {
		jQuery(this).removeClass('inputHighlight');
		jQuery('.contactForm span#msg').html(contactFormDefaults['msg']).removeClass('errorMsg successMsg');
		if(jQuery(this).val()=='') {
			jQuery(this).val(contactFormDefaults[jQuery(this).attr('id')]);
		}
	});
	
	jQuery('.contactForm input[type="text"], .contactForm textarea').hover(function() {
			jQuery(this).addClass('inputHighlight');
		},
		function() {	
			jQuery(this).not(':focus').removeClass('inputHighlight');
		}
	);
	
	
jQuery(document).ready(function($){
		
	$('.contactForm').submit(function() {
		$form = $('.contactForm');
		$('.contactForm .submit').attr("disabled", "disabled");
		$('#msg').html('<span class="loading-animation"></span>').removeClass('errorMsg successMsg');
		var isError=false;
		$('.contactForm input, .contactForm textarea').each(function() {
			if($(this).hasClass('required') && ($.trim($(this).val())==contactFormDefaults[$(this).attr('id')] || $.trim($(this).val())=='')) {
				$(this).addClass('errorOutline');
				$('#msg').html(rnr_global_vars.contact_form_warning).addClass('errorMsg');
				isError=true;
			}
			if($(this).attr('id')=='contactEmail') {
				var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
				if(reg.test($(this).val())==false) {
					$(this).addClass('errorOutline');
					if(!isError) {
						$('#msg').html(rnr_global_vars.contact_form_email_warning).addClass('errorMsg');
					}
					isError=true;
				}
			}
		});
		if(isError) {
			$('.contactForm .submit').removeAttr("disabled");
			return false;
		} else {
			var name = $('#contactName').val(), email = $('#contactEmail').val(), subject = $('#contactSubject').val(), message = $('#contactMessage').val();
			$.ajaxSetup ({
				cache: false
			});
			var str = $form.serialize();
			$.ajax({
				type: "POST",
				url: $('#contact-form').attr('action'),
				data: str,
				success: function(msg) {
					// Check to see if the mail was successfully sent

						// Update the progress bar
						$('#msg').html(rnr_global_vars.contact_form_success_message).addClass('successMsg');
												// Reset the subject field and message textbox
						if(contactFormDefaults['contactSubject']) {
							$('#contactSubject').val(contactFormDefaults['contactSubject']);
						} else {
							$('#contactSubject').val('');
						}
						if(contactFormDefaults['contactMessage']) {
							$('#contactMessage').val(contactFormDefaults['contactMessage']);
						} else {
							$('#contactMessage').val('');
						}

					// Activate the submit button
					$('.contactForm .submit').removeAttr("disabled");
				},
				error: function(ob,errStr) {
					$('#msg').html(rnr_global_vars.contact_form_error).addClass('errorMsg');
					//Activate the submit button
					$('.contactForm .submit').removeAttr("disabled");
				}
			});
			return false;
		}
	});
	
});
/* ------------------------------------------------------------------------ */
/* FLEX SLIDER */
/* ------------------------------------------------------------------------ */    
	// jQuery('.flexslider').flexslider({						
	// 		animation: "slide",
	// 		direction: "horizontal", 
	// 		slideshow: false,
	// 		slideshowSpeed: 3500,
	// 		animationDuration: 500,
	// 		directionNav: true,
	// 		controlNav: false
				
	//  });    

/*----------------------------------------------------*/
// ISOTOPE
/*----------------------------------------------------*/	  

  jQuery(window).load(function(){   
  jQuery(document).ready(function(jQuery){    
	var container = jQuery('#portfolio-wrap .row');	


	container.isotope({
		animationEngine : 'best-available',
	  	animationOptions: {
	     	duration: 200,
	     	queue: false
	   	},
		layoutMode: 'fitRows'
	});	


	// filter items when filter link is clicked
	jQuery('#filters a').click(function(){
		jQuery('#filters a').removeClass('active');
		jQuery(this).addClass('active');
		var selector = jQuery(this).attr('data-filter');
	  	container.isotope({ filter: selector });
	  	return false;
	});	


		function setProjects() { 
			container.isotope('reLayout');
		}		

		
	
		jQuery(window).bind('resize', function () { 
			setProjects();			
		});	
});
});

/*----------------------------------------------------*/
// LOAD PROJECT
/*----------------------------------------------------*/ 


	  
function initializePortfolio() {


  jQuery(window).bind( 'hashchange', function() {
	  
	  		 
 hash = jQuery(window.location).attr('hash'); 
 var root = '#!'+ folderName +'/';
 var rootLength = root.length;	
 
 	 
	if( hash.substr(0,rootLength) != root ){
		return;						
	} else {	

		 var correction = 50;
		 var headerH = jQuery('nav').outerHeight()+correction;
		 hash = jQuery(window.location).attr('hash'); 
	     url = hash.replace(/[#\!]/g, '' ); 
		 
		 
       
		portfolioGrid.find('div.portfolio-item.current').children().removeClass('active');
		portfolioGrid.find('div.portfolio-item.current').removeClass('current' );
		
		


		/* IF URL IS PASTED IN ADDRESS BAR AND REFRESHED */
		if(pageRefresh == true && hash.substr(0,rootLength) ==  root){	

				jQuery('html,body').stop().animate({scrollTop: (projectContainer.offset().top-20)+'px'},800,'easeOutExpo', function(){											
					loadProject();																									  
				});
				
		/* CLICKING ON PORTFOLIO GRID OR THROUGH PROJECT NAVIGATION */
		}else if(pageRefresh == false && hash.substr(0,rootLength) == root){				
					jQuery('html,body').stop().animate({scrollTop: (projectContainer.offset().top-headerH)+'px'},800,'easeOutExpo', function(){ 		
		
					if(content == false){						
						loadProject();							
					}else{	
						projectContainer.animate({opacity:0,height:wrapperHeight},function(){
						loadProject();
						});
					}
							
					projectNav.fadeOut('100');
					exitProject.fadeOut('100');
							
					});
			
		/* USING BROWSER BACK BUTTON WITHOUT REFRESHING */	
		}else if(hash=='' && pageRefresh == false || hash.substr(0,rootLength) != root && pageRefresh == false || hash.substr(0,rootLength) != root && pageRefresh == true){	
		        scrollPostition = hash; 
				console.log(scrollPostition);
				jQuery('html,body').stop().animate({scrollTop: scrollPostition+'px'},1000,function(){				
							
					deleteProject();								
							
				});
				
		/* USING BROWSER BACK BUTTON WITHOUT REFRESHING */	
		}
		
		
		
		/* ADD ACTIVE CLASS TO CURRENTLY CLICKED PROJECT */
		 portfolioGrid.find('div.portfolio-item .portfolio a[href$="#!' + url + '"]' ).parent().parent().addClass( 'current' );
		 portfolioGrid.find('div.portfolio-item.current').find('.portfolio').addClass('active');
		

	
  }
	  
	});	  
	  	/* LOAD PROJECT */		
		function loadProject(){
			loader.fadeIn().removeClass('projectError').html('');
			
			
			if(!ajaxLoading) {				
	            ajaxLoading = true;
								
				projectContainer.load( url +' div#ajaxpage', function(xhr, statusText, request){
																   
						if(statusText == "success"){				
								
								ajaxLoading = false;
								
									page =  jQuery('#ajaxpage');		
			
									jQuery('.flexslider').flexslider({
												
												animation: "fade",
												slideDirection: "horizontal",
												slideshow: true,
												slideshowSpeed: 3500,
												animationDuration: 500,
												directionNav: true,
												controlNav: true
												
										});
			
									jQuery('#ajaxpage').waitForImages(function() {
										hideLoader();  
									});			  
											
										jQuery(".container").fitVids();	
										rnr_shortcodes();
								
						}
						
						if(statusText == "error"){
						
								loader.addClass('projectError').append(loadingError);
								
								loader.find('p').slideDown();

						}
					 
					});
				
			}
			
		}
		

		
		function hideLoader(){													  
	        loader = jQuery('div#loader'); 
			loader.delay(400).fadeOut('fast', function(){
					showProject();					
			});	
					 
		}	
		
		
		function showProject(){
			if(content==false){
				    wrapperHeight = projectContainer.children('div#ajaxpage').outerHeight()+'px';
					projectContainer.animate({opacity:1,height:wrapperHeight}, function(){
				        jQuery(".container").fitVids();
						scrollPostition = jQuery('html,body').scrollTop();
						projectNav.fadeIn();
						exitProject.fadeIn();
						content = true;	
								
					});
					
			}else{
                    wrapperHeight = projectContainer.children('div#ajaxpage').outerHeight()+'px';
					projectContainer.animate({opacity:1,height:wrapperHeight}, function(){																		  
					jQuery(".container").fitVids();
						scrollPostition = jQuery('html,body').scrollTop();
						projectNav.fadeIn();
						exitProject.fadeIn();
						
					});					
			}
					
			
			projectIndex = portfolioGrid.find('div.portfolio-item.current').index();
			projectLength = jQuery('div.portfolio-item .portfolio').length-1;
			
			
			if(projectIndex == projectLength){
				
				jQuery('ul li#nextProject a').addClass('disabled');
				jQuery('ul li#prevProject a').removeClass('disabled');
				
			}else if(projectIndex == 0){
				
				jQuery('ul li#prevProject a').addClass('disabled');
				jQuery('ul li#nextProject a').removeClass('disabled');
				
			}else{
				
				jQuery('ul li#nextProject a,ul li#prevProject a').removeClass('disabled');
				
			}
		
	  }
	  
	  
	  
	  function deleteProject(closeURL){
				projectNav.fadeOut(100);
				exitProject.fadeOut(100);				
				projectContainer.animate({opacity:0,height:'0px'});
				projectContainer.empty();
				
			if(typeof closeURL!='undefined' && closeURL!='') {
				location = '#_';
			}
			portfolioGrid.find('div.portfolio-item.current').children().removeClass('active');
			portfolioGrid.find('div.portfolio-item.current').removeClass('current' );			
	  }
	  
	  
     /* LINKING TO PREIOUS AND NEXT PROJECT VIA PROJECT NAVIGATION */
	  jQuery('#nextProject a').on('click',function () {											   							   
					 
		    current = portfolioGrid.find('.portfolio-item.current');
		    next = current.next('.portfolio-item');
		    target = jQuery(next).children('div').children('a').attr('href');
			jQuery(this).attr('href', target);
			
		
			if (next.length === 0) { 
				 return false;			  
			 } 
		   
		   current.removeClass('current'); 
		   current.children().removeClass('active');
		   next.addClass('current');
		   next.children().addClass('active');
		   
		  
		   
		});



	    jQuery('#prevProject a').on('click',function () {			
			
		  current = portfolioGrid.find('.portfolio-item.current');
		  prev = current.prev('.portfolio-item');
		  target = jQuery(prev).children('div').children('a').attr('href');
		  jQuery(this).attr('href', target);
			
		   
		   if (prev.length === 0) {
			  return false;			
		   }
		   
		   current.removeClass('current');  
		   current.children().removeClass('active');
		   prev.addClass('current');
		   prev.children().addClass('active');
		   
		});
		
		
         /* CLOSE PROJECT */
		 jQuery('#closeProject a').on('click',function () {
			 
		    deleteProject(jQuery(this).attr('href')); 			
			portfolioGrid.find('div.portfolio-item.current').children().removeClass('active');			
			loader.fadeOut();
			return false;
			
		});
		 

		 
		 pageRefresh = false;	  


};


jQuery(document).ready(function(){   

  initializePortfolio();  
  rnr_shortcodes();

 jQuery('.cs-text-cut').fitText(0.5,{ minFontSize: '50px', maxFontSize: '150px' });
 jQuery('.cs-text-cut.medium').fitText(2, { minFontSize: '30px', maxFontSize: '70px' }); 
 jQuery('.callout-text h1').fitText(1, { minFontSize: '30px', maxFontSize: '56px' });  
 jQuery(".e-mail").fitText(1.3);
 jQuery(".telephone").fitText(1.6);
 jQuery(".address").fitText(3.2);
/* ------------------------------------------------------------------------ */
/* SELECTNAV - A DROPDOWN NAVIGATION FOR SMALL SCREENS */
/* ------------------------------------------------------------------------ */ 
	selectnav('nav', {
		nested: true,
		indent: '-'
	}); 
		 
 
 
	 
/*----------------------------------------------------*/
/* FULLSCREEN IMAGE HEIGHT
/*----------------------------------------------------*/	     
	
	  function fullscreenImgHeight(){
          var window_height = jQuery(window).height();
		  jQuery('.fullscreen').css({height:window_height});
	  }	  
	  
          fullscreenImgHeight();	
	  		  
	  jQuery(window).bind('resize',function() {	  
		  fullscreenImgHeight();	 		  
	  });	  
	 

	  	 
     jQuery(window).load(function(){
        jQuery('.loader').fadeOut('slow');
        jQuery('body').delay(400).addClass('loaded');
     });	 

/*----------------------------------------------------*/
/* NAVIGATION WHILE SCROLLING
/*----------------------------------------------------*/

	   		if (jQuery(window).scrollTop() > (jQuery(window).height())){
	   			jQuery('header').addClass('scroll');		
	   		} else {
	   			jQuery('header').removeClass('scroll');				
	   		}

	   	
		jQuery(window).on("scroll", function(){
			var winHeight = jQuery(window).height() - 10;
			var windowWidth = jQuery(window).width();
			var windowScroll = jQuery(window).scrollTop();
			

				if (jQuery(window).scrollTop() > winHeight){
					jQuery('header').addClass('scroll');									
				} else {
					jQuery('header').removeClass('scroll');								
				}

			
});

/*----------------------------------------------------*/
/* PRETTYPHOTO FUNCTION
/*----------------------------------------------------*/

  	jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({
  	  show_title: false
  	});


	
	
/*----------------------------------------------------*/
/* FITVIDS
/*----------------------------------------------------*/
	jQuery(".container").fitVids();
	
	  
/* ------------------------------------------------------------------------ */
/* Mlestone Counter */
/* ------------------------------------------------------------------------ */
	jQuery('.milestone-counter').appear(function() {
		jQuery('.milestone-counter').each(function(){
			dataperc = jQuery(this).attr('data-perc'),
			jQuery(this).find('.milestone-count').delay(6000).countTo({
            from: 0,
            to: dataperc,
            speed: 2000,
            refreshInterval: 100
        });
     });	 
	});
	
 	
	 
/* ------------------------------------------------------------------------ */
/* SELECTNAV - A DROPDOWN NAVIGATION FOR SMALL SCREENS */
/* ------------------------------------------------------------------------ */ 
	selectnav('.nav-container', {
		nested: true,
		indent: '-'
	}); 
		 
	
/*----------------------------------------------------*/
/* BOOTSTRAP SCROLL SPY
/*----------------------------------------------------*/	
//scrollspy function used to navigate on the page with easing
jQuery(function() {
  jQuery('ul.nav a, .logo a, a.scroll').bind('click',function(event){
  var jQueryanchor = jQuery(this);

  jQuery('[data-spy="scroll"]').each(function () {
    var jQueryspy = jQuery(this).scrollspy('refresh');
	
  });




  jQuery('html, body').stop().animate({
    scrollTop: jQuery(jQueryanchor.attr('href')).offset().top
  }, 1300,'easeInOutExpo');

  event.preventDefault();
});
});	

});

	
// BEGIN WINDOW.LOAD FUNCTION		
jQuery(window).load(function(){
	jQuery(window).trigger( 'hashchange' );
/* ------------------------------------------------------------------------ */
/* Skillbar */
/* ------------------------------------------------------------------------ */	
	jQuery('.skillbar').appear(function() {
		jQuery('.skillbar').each(function(){
			dataperc = jQuery(this).attr('data-perc');
			jQuery(this).find('.skill-percentage').animate({ "width" : dataperc + "%"}, dataperc*10);
		});
	 }); 	
	
});
 



 (function(jQuery) {
    jQuery.fn.countTo = function(options) {
        // merge the default plugin settings with the custom options
        options = jQuery.extend({}, jQuery.fn.countTo.defaults, options || {});

        // how many times to update the value, and how much to increment the value on each update
        var loops = Math.ceil(options.speed / options.refreshInterval),
            increment = (options.to - options.from) / loops;

        return jQuery(this).delay(1000).each(function() {
            var _this = this,
                loopCount = 0,
                value = options.from,
                interval = setInterval(updateTimer, options.refreshInterval);

            function updateTimer() {
                value += increment;
                loopCount++;
                jQuery(_this).html(value.toFixed(options.decimals));

                if (typeof(options.onUpdate) == 'function') {
                    options.onUpdate.call(_this, value);
                }

                if (loopCount >= loops) {
                    clearInterval(interval);
                    value = options.to;

                    if (typeof(options.onComplete) == 'function') {
                        options.onComplete.call(_this, value);
                    }
                }
            }
        });
    };

    jQuery.fn.countTo.defaults = {
        from: 0,  // the number the element should start at
        to: 100,  // the number the element should end at
        speed: 1000,  // how long it should take to count between the target numbers
        refreshInterval: 100,  // how often the element should be updated
        decimals: 0,  // the number of decimal places to show
        onUpdate: null,  // callback method for every time the element is updated,
        onComplete: null,  // callback method for when the element finishes updating
    };
})(jQuery);
