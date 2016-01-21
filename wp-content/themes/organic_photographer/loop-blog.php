<?php $wp_query = new WP_Query(array('cat'=>of_get_option('category_blog'), 'posts_per_page'=>of_get_option('postnumber_blog'), 'paged'=>$paged)); ?>
<?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
<?php global $more; $more = 0; ?>

<!-- BEGIN .blog-holder -->
<div class="blog-holder">
	
    <h1 class="headline text-center"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr(the_title_attribute()); ?>"><?php the_title(); ?></a></h1>
    <p class="post-date text-center"><?php _e("Posted on", 'organicthemes'); ?> <?php the_time(__("F j, Y", 'organicthemes')); ?></p>
    
    <?php if(of_get_option('display_feature_blog') == '1') { ?>
        <?php if ( $video ) : ?>
        	<div class="featurevid"><?php echo $video; ?></div>
        <?php else: ?>
            <?php if ( has_post_thumbnail()) { ?>
            	<div class="featureimg"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail( 'portfolio' ); ?></a></div>
            <?php } ?>
        <?php endif; ?>
    <?php } ?>
    
    <!-- BEGIN .article -->
    <div class="article">
    
    	<?php the_content(__("Read More", 'organicthemes')); ?>
    	
    	<!-- BEGIN .postmeta -->
    	<div class="postmeta">
    	
    		<p class="meta-text"><i class="icon-comment"></i> <a href="<?php the_permalink(); ?>#comments"><?php comments_number(__("Leave a Comment", 'organicthemes'), __("1 Comment", 'organicthemes'), '% Comments'); ?></a></p>
    		
    		<?php if(of_get_option('display_social_blog') == '1') { ?>
    		<div class="social">
    			<div class="pin-btn">
    				<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($post->ID)); ?>&media=<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo $feat_image; ?>&description=<?php the_title(); ?>" class="pin-it-button" always-show-count="true" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
    			</div>
    	    	<div class="like-btn">
    	    	  	<div class="fb-like" href="<?php the_permalink(); ?>" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div>
    	    	</div>
    	    	<div class="tweet-btn">
    	    		<a href="http://twitter.com/share" class="twitter-share-button"
    	    		data-url="<?php the_permalink(); ?>"
    	    		data-via="<?php echo of_get_option('twitter_user'); ?>"
    	    		data-text="<?php the_title(); ?>"
    	    		data-related=""
    	    		data-count="horizontal"><?php _e("Tweet", 'organicthemes'); ?></a>
    	    	</div>
    	    	<div class="plus-btn">
    	    		<g:plusone size="medium" annotation="bubble" href="<?php the_permalink(); ?>"></g:plusone>
    	    	</div>
    	    </div>
    	    <?php } ?>
    	    
    	<!-- END .postmeta -->
    	</div>
    	
    <!-- END .article -->
    </div>

<!-- END .blog-holder -->
</div>

<?php endwhile; ?>

<div class="pagination">
	<?php echo get_pagination_links(); ?>
</div>

<?php else : // do not delete ?>
        
<div class="error-404">
    <h1 class="headline"><?php _e("Page not Found", 'organicthemes'); ?></h1>
    <p><?php _e("We're sorry, but the page you're looking for isn't here.", 'organicthemes'); ?></p>
    <p><?php _e("Try searching for the page you are looking for or using the navigation in the header or sidebar", 'organicthemes'); ?></p>
</div>

<?php endif; // do not delete ?>