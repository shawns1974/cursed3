<?php global $smof_data; ?>
<div class="socialsharing clearfix">
	<h4><?php _e('Share the Story', 'rocknrolla'); ?></h4>
	<ul class="social-icons">
			<?php if($smof_data['rnr_share_facebook'] == true) { ?>	
			<li>
				<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" title="<?php _e( 'Facebook', 'rocknrolla' ) ?>" target="_blank"><i class="social-facebook"></i></a>
			</li>
			<?php } ?>
			<?php if($smof_data['rnr_share_twitter'] == true) { ?>	
			<li>
				<a href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?>" title="<?php _e( 'Twitter', 'rocknrolla' ) ?>" target="_blank"><i class="social-twitter"></i></a>
			</li>
			<?php } ?>
			<?php if($smof_data['rnr_share_linkedin'] == true) { ?>	
			<li>
			<a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink();?>&amp;title=<?php the_title();?>" title="<?php _e( 'LinkedIn', 'rocknrolla' ) ?>" target="_blank"><i class="social-linkedin"></i></a>
			</li>
			<?php } ?>
			<?php if($smof_data['rnr_share_reddit'] == true) { ?>	
			<li>
				<a href="http://www.reddit.com/submit?url=<?php the_permalink() ?>&amp;title=<?php echo urlencode(the_title('', '', false)) ?>" title="<?php _e( 'Reddit', 'rocknrolla' ) ?>" target="_blank"><i class="social-reddit"></i></a></a>
			</li>
			<?php } ?>
			<?php if($smof_data['rnr_share_digg'] == true) { ?>	
			<li>
				<a href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink() ?>&amp;bodytext=&amp;tags=&amp;title=<?php echo urlencode(the_title('', '', false)) ?>" target="_blank" title="<?php _e( 'Digg', 'rocknrolla' ) ?>"><i class="social-digg"></i></a>
			</li>
			<?php } ?>
			<?php if($smof_data['rnr_share_delicious'] == true) { ?>	
			<li>
				<a href="http://www.delicious.com/post?v=2&amp;url=<?php the_permalink() ?>&amp;notes=&amp;tags=&amp;title=<?php echo urlencode(the_title('', '', false)) ?>" title="<?php _e( 'Delicious', 'rocknrolla' ) ?>" target="_blank"><i class="social-delicious"></i></a>
			</li>
			<?php } ?>
			<?php if($smof_data['rnr_share_google'] == true) { ?>	
			<li>
				<a href="http://google.com/bookmarks/mark?op=edit&amp;bkmk=<?php the_permalink() ?>&amp;title=<?php echo urlencode(the_title('', '', false)) ?>" title="<?php _e( 'Google+', 'rocknrolla' ) ?>" target="_blank"><i class="social-gplus"></i></a>
			</li>
			<?php } ?>
			<?php if($smof_data['rnr_share_email'] == true) { ?>	
			<li>
				<a href="mailto:?subject=<?php the_title();?>&amp;body=<?php the_permalink() ?>" title="<?php _e( 'E-Mail', 'rocknrolla' ) ?>" target="_blank"><i class="social-gmail"></i></a>
			</li>
			<?php } ?>
	 </ul>
</div>