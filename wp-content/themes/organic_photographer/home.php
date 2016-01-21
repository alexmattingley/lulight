<?php get_header(); ?>

<!-- BEGIN .container -->
<div class="container">

	<!-- BEGIN .row -->
	<div class="row">
		<!-- BEGIN .twelve columns -->
		<div class="twelve columns">
			
			<!-- BEGIN #slideshow -->
			<div id="slideshow">
			
				<!-- BEGIN .flexslider -->
				<div class="flexslider loading" data-speed="<?php echo of_get_option('transition_interval'); ?>">
					<!-- BEGIN .slides -->
					<ul class="slides">
						<?php $wp_query = new WP_Query(array('cat'=>of_get_option('category_slideshow_home'),'posts_per_page'=>of_get_option('postnumber_slideshow_home'))); ?>
						<?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
						<?php $meta_box = get_post_custom($post->ID); $video = $meta_box['custom_meta_video'][0]; ?>
						<?php global $more; $more = 0; ?>
						
						<li>
							<?php if ( $video ) : ?>
							    <div class="featurevid"><?php echo $video; ?></div>
							<?php else: ?>
							    <?php if ( has_post_thumbnail()) { ?>
							    	<div class="featureimg">
								    	<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail( 'featured-img' ); ?></a>
								    	<div class="share-holder">
								    		<?php
								    		$title=urlencode(get_the_title());
								    		$url=urlencode(get_permalink($post->ID));
								    		$summary=urlencode(get_the_excerpt());
								    		$image=wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
								    		?>
								    		<a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;&amp;p[images][0]=<?php echo $image; ?>','sharer','toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)" class="sm_32_icon sm_32_facebook"><span></span></a>
								    		
								    		<a title="<?php the_title(); ?>" href="http://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?> <?php _e("via @", 'organicthemes'); ?><?php echo of_get_option('twitter_user'); ?>, " class="sm_32_icon sm_32_twitter" target="_blank" rel="nofollow"><span></span></a>
								    		
								    		<a title="<?php the_title(); ?>" href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($post->ID)); ?>&media=<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo $feat_image; ?>&description=<?php the_title_attribute(); ?>" class="sm_32_icon sm_32_pinterest" target="_blank" rel="nofollow"><span></span></a>
								    	</div>
							    	</div>
							    <?php } else { ?>
							    	<a class="featureimg" href="<?php the_permalink(); ?>" rel="bookmark"><img src="<?php bloginfo('template_directory'); ?>/images/default-slide.png" alt="<?php the_title(); ?>" /></a>
							    <?php } ?>
							<?php endif; ?>
						</li>
						
						<?php endwhile; ?>
						<?php endif; ?>
					<!-- END .slides -->
					</ul>
				<!-- END .flexslider -->
				</div>
			
			<!-- END #slideshow -->
			</div>
		
		<!-- END .twelve columns -->
		</div>
	<!-- END .row -->
	</div>
	
	<?php if(of_get_option('display_home_content') == '1') { ?>
	
	<!-- BEGIN .row -->
	<div class="row">
		<!-- BEGIN #homepage -->
		<div id="homepage">
			
		<?php if ( is_active_sidebar( 'home-sidebar' ) ) : ?>
			
			<div class="six columns">
				<?php get_template_part( 'loop', 'home' ); ?>
			</div>
			
			<div class="six columns">
				<a class="home-btn" href="<?php echo of_get_option('home_btn_link', ''); ?>"><?php echo of_get_option('home_btn_text', ''); ?></a>
				<?php get_sidebar('home'); ?>
			</div>
			
		<?php else : ?>
			
			<div class="twelve columns">
				<?php get_template_part( 'loop', 'home' ); ?>
			</div>
			
		<?php endif; ?>
		
		<!-- END #homepage -->
		</div>
	<!-- END .row -->
	</div>
	
	<?php } ?>

<!-- END .container -->
</div>

<?php get_footer(); ?>