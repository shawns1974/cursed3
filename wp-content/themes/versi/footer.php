<?php global $smof_data; ?>

   </div>
   <div class="footer">   
   
   <?php if($smof_data['rnr_enable_twitter']==true) { 
   
   		$consumer_key = $smof_data['rnr_twitter_consumer_key'];
		$consumer_secret = $smof_data['rnr_twitter_cosumer_secret'];
		$access_token = $smof_data['rnr_twitter_access_token'];
		$access_token_secret =  $smof_data['rnr_twitter_access_token_secret'];
  		$twitter_id = $smof_data['rnr_twitter_username'];
		$count = '1';
		

		if($twitter_id && $consumer_key && $consumer_secret && $access_token && $access_token_secret && $count) { 
		
			$transName = 'list_tweets_1';
			$cacheTime = 10;
			delete_transient($transName);
			
			if(false === ($twitterData = get_transient($transName))) {
				 // require the twitter auth class
				 @require_once 'includes/widgets/twitteroauth/twitteroauth.php';
				 $twitterConnection = new TwitterOAuth(
								$consumer_key,	// Consumer Key
								$consumer_secret,   	// Consumer secret
								$access_token,       // Access token
								$access_token_secret    	// Access token secret
								);
				               $twitterData = $twitterConnection->get(
								  'statuses/user_timeline',
								  array(
									'screen_name'     => $twitter_id,
									'count'           => $count,
									'exclude_replies' => false
								  )
								);
				 if($twitterConnection->http_code != 200)
				 {
					  $twitterData = get_transient($transName);
				 }
	
				 // Save our new transient.
				 set_transient($transName, $twitterData, 60 * $cacheTime);
			}
			$twitter = get_transient($transName);

	?> 
    
    
    <div class="twitter-feed">
                <div class="container">
                	
                    <div id="tweets-section" class="tweet-feed">
                        <ul>
                            <?php foreach($twitter as $tweet): ?>
                            <li>
                                <p class="jtwt_tweet_text">
                                <?php
                                $latestTweet = $tweet->text;
                                $latestTweet = preg_replace('/http:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '&nbsp;<a href="http://$1" target="_blank">http://$1</a>&nbsp;', $latestTweet);
                                $latestTweet = preg_replace('/@([a-z0-9_]+)/i', '&nbsp;<a href="http://twitter.com/$1" target="_blank">@$1</a>&nbsp;', $latestTweet);
                                echo $latestTweet;
                                ?>
                                </p>
                                <?php
                                $twitterTime = strtotime($tweet->created_at);
                                $timeAgo = ago($twitterTime);
                                ?>
                                <a href="http://twitter.com/<?php echo $tweet->user->screen_name; ?>/statuses/<?php echo $tweet->id_str; ?>" class="jtwt_date"><?php echo $timeAgo; ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    
                    </div>     
                </div>
     </div>    
     
     <?php  } } ?>
        
           
  
               <div class="footer_logo">
               
               
                 <?php if($smof_data['rnr_footer_logo_url'] != "") { ?>
						<a href="<?php echo home_url(); ?>/">
                         <img src="<?php echo $smof_data['rnr_footer_logo_url']; ?>" 
                              alt="<?php bloginfo('name'); ?>"
                          />
                       </a>
					<?php } else { ?>
						<h1><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></h1>
					<?php } ?>
                    
                    
                    
                 <div class="container">
                   <p><?php echo ($smof_data['rnr_footer_caption']); ?></p>
                 </div>
               </div>
               
               <div class="social-icons">

                    <?php if($smof_data['rnr_socialicon_aim'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_aim'] ?>"><i class="social-aim"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_delicious'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_delicious'] ?>"><i class="social-delicious"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_paypal'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_paypal'] ?>"><i class="social-paypal"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_flattr'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_flattr'] ?>"><i class="social-flattr"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_android'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_android'] ?>"><i class="social-android"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_gplus'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_gplus'] ?>"><i class="social-gplus"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_wikipedia'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_wikipedia'] ?>"><i class="social-wikipedia"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_stumbleupon'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_stumbleupon'] ?>"><i class="social-stumbleupon"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_fivehundredpx'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_fivehundredpx'] ?>"><i class="social-fivehundredpx"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_pinterest'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_pinterest'] ?>"><i class="social-pinterest"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_bitcoin'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_bitcoin'] ?>"><i class="social-bitcoin"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_w3c'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_w3c'] ?>"><i class="social-w3c"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_foursquare'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_foursquare'] ?>"><i class="social-foursquare"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_html5'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_html5'] ?>"><i class="social-html5"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_call'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_call'] ?>"><i class="social-call"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_grooveshark'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_grooveshark'] ?>"><i class="social-grooveshark"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_ninetyninedesigns'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_ninetyninedesigns'] ?>"><i class="social-ninetyninedesigns"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_forrst'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_forrst'] ?>"><i class="social-forrst"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_digg'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_digg'] ?>"><i class="social-digg"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_spotify'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_spotify'] ?>"><i class="social-spotify"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_reddit'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_reddit'] ?>"><i class="social-reddit"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_guest'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_guest'] ?>"><i class="social-guest"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_appstore'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_appstore'] ?>"><i class="social-appstore"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_blogger'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_blogger'] ?>"><i class="social-blogger"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_dribbble'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_dribbble'] ?>"><i class="social-dribbble"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_evernote'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_evernote'] ?>"><i class="social-evernote"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_flickr'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_flickr'] ?>"><i class="social-flickr"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_google'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_google'] ?>"><i class="social-google"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_viadeo'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_viadeo'] ?>"><i class="social-viadeo"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_instapaper'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_instapaper'] ?>"><i class="social-instapaper"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_weibo'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_weibo'] ?>"><i class="social-weibo"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_klout'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_klout'] ?>"><i class="social-klout"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_linkedin'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_linkedin'] ?>"><i class="social-linkedin"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_meetup'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_meetup'] ?>"><i class="social-meetup"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_plancast'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_plancast'] ?>"><i class="social-plancast"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_disqus'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_disqus'] ?>"><i class="social-disqus"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_rss'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_rss'] ?>"><i class="social-rss"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_skype'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_skype'] ?>"><i class="social-skype"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_twitter'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_twitter'] ?>"><i class="social-twitter"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_youtube'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_youtube'] ?>"><i class="social-youtube"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_vimeo'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_vimeo'] ?>"><i class="social-vimeo"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_windows'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_windows'] ?>"><i class="social-windows"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_xing'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_xing'] ?>"><i class="social-xing"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_yahoo'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_yahoo'] ?>"><i class="social-yahoo"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_chrome'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_chrome'] ?>"><i class="social-chrome"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_email'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_email'] ?>"><i class="social-email"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_macstore'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_macstore'] ?>"><i class="social-macstore"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_myspace'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_myspace'] ?>"><i class="social-myspace"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_podcast'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_podcast'] ?>"><i class="social-podcast"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_amazon'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_amazon'] ?>"><i class="social-amazon"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_cloudapp'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_cloudapp'] ?>"><i class="social-cloudapp"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_dropbox'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_dropbox'] ?>"><i class="social-dropbox"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_ebay'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_ebay'] ?>"><i class="social-ebay"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_facebook'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_facebook'] ?>"><i class="social-facebook"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_github'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_github'] ?>"><i class="social-github"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_googleplay'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_googleplay'] ?>"><i class="social-googleplay"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_itunes'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_itunes'] ?>"><i class="social-itunes"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_plurk'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_plurk'] ?>"><i class="social-plurk"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_lastfm'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_lastfm'] ?>"><i class="social-lastfm"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_gmail'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_gmail'] ?>"><i class="social-gmail"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_pinboard'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_pinboard'] ?>"><i class="social-pinboard"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_quora'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_quora'] ?>"><i class="social-quora"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_soundcloud'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_soundcloud'] ?>"><i class="social-soundcloud"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_tumblr'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_tumblr'] ?>"><i class="social-tumblr"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_wordpress'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_wordpress'] ?>"><i class="social-wordpress"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_yelp'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_yelp'] ?>"><i class="social-yelp"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_intensedebate'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_intensedebate'] ?>"><i class="social-intensedebate"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_eventbrite'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_eventbrite'] ?>"><i class="social-eventbrite"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_scribd'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_scribd'] ?>"><i class="social-scribd"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_posterous'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_posterous'] ?>"><i class="social-posterous"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_stripe'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_stripe'] ?>"><i class="social-stripe"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_opentable'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_opentable'] ?>"><i class="social-opentable"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_cart'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_cart'] ?>"><i class="social-cart"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_print'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_print'] ?>"><i class="social-print"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_angellist'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_angellist'] ?>"><i class="social-angellist"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_instagram'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_instagram'] ?>"><i class="social-instagram"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_acrobat'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_acrobat'] ?>"><i class="social-acrobat"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_drupal'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_drupal'] ?>"><i class="social-drupal"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_buffer'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_buffer'] ?>"><i class="social-buffer"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_pocket'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_pocket'] ?>"><i class="social-pocket"></i></a>
                    <?php } ?>
                    <?php if($smof_data['rnr_socialicon_github-circled'] != "") { ?>
                      <a class="social-icon" href="<?php echo $smof_data['rnr_socialicon_github-circled'] ?>"><i class="social-github-circled"></i></a>
                    <?php } ?>           

               </div>
               
 
           </div>
	<?php if($smof_data['rnr_custom_js'] != '') { echo $smof_data['rnr_custom_js']; } ?>
        </div>
 	<?php wp_footer(); ?>	      
    </body>
</html>        