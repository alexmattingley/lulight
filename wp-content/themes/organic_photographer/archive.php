<?php get_header(); ?>

<!-- BEGIN .container portfolio -->
<div class="container portfolio">

	<!-- BEGIN .row -->
	<div class="row holder-half">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php $meta_box = get_post_custom($post->ID); $video = $meta_box['custom_meta_video'][0]; ?>
        <?php global $more; $more = 0; ?>
        
        <!-- BEGIN .one-half -->
        <div class="one-half">
        	
        	<!-- BEGIN .postarea portfolio -->
	        <div class="postarea portfolio">
	
	            <?php if ( $video ) : ?>
	          		<div class="featurevid"><?php echo $video; ?></div>
				<?php else: ?>
	                <?php if ( has_post_thumbnail()) { ?>
	                	<a class="featureimg" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr(the_title_attribute()); ?>"><?php the_post_thumbnail( 'portfolio' ); ?></a>
	                <?php } ?>
	            <?php endif; ?>
	            
	            <?php if (of_get_option('display_portfolio_info_cat') == '1') { ?>
	            <div class="information">              
	                <h2 class="headline-small text-center"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr(the_title_attribute()); ?>"><?php the_title(); ?></a></h2>
	                <?php the_excerpt(); ?>
	            </div>	
	            <?php } ?>
	        
	        </div><!-- END .postarea portfolio -->
	            
	    </div><!-- END .one-half -->
	    
	    <?php endwhile; ?>
						
	</div><!-- .row -->
	<div class="row">
        
	    <div class="pagination">
	    	<?php echo get_pagination_links(); ?>
	    </div><!-- END .pagination -->
    
    	<?php else : // do not delete ?>
    	
    </div><!-- .row -->
    <div class="row">

		<!-- BEGIN .twelve columns -->
	    <div class="twelve columns">
	
			<!-- BEGIN .postarea portfolio -->
	        <div class="postarea portfolio">
	
	           	<h1 class="headline"><?php _e("No Posts Found", 'organicthemes'); ?></h1>
	            <p><?php _e("We're sorry, but no posts have been found. Create a post to be added to this section, and configure your theme options.", 'organicthemes'); ?></p>
	        
	    	</div><!-- END .postarea portfolio -->
	    	
	    </div><!-- END .twelve columns -->
	
		<?php endif; // do not delete ?>
		
	</div><!-- END .row -->

</div><!-- END .container portfolio -->

<?php get_footer(); ?>