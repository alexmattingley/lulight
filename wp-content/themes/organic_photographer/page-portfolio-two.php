<?php
/*
Template Name: Portfolio Two Column
*/
?>

<?php get_header(); ?>

<!-- .container portfolio -->
<div class="container portfolio">
								
	<!-- BEGIN .row -->
	<div class="row holder-half">
	      
		<?php $wp_query = new WP_Query(array('cat'=>of_get_option('category_portfolio_two'),'posts_per_page'=>of_get_option('postnumber_portfolio_two'),'paged'=>$paged)); ?>
		<?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
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
	                	<a class="featureimg" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', '_s' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail( 'portfolio' ); ?></a>
	                <?php } else { ?>
	                	<a class="featureimg" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', '_s' ), the_title_attribute( 'echo=0' ) ) ); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/default-image.png" alt="<?php the_title(); ?>" /></a>
	                <?php } ?>
	            <?php endif; ?>
	            
	            <?php if(of_get_option('display_portfolio_info_page') == '1') { ?>
	            <div class="information">              
	                <h2 class="headline-small text-center"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr(the_title_attribute()); ?>"><?php the_title(); ?></a></h2>
	                <?php the_excerpt(); ?>
	            </div><!-- END .information -->
	            <?php } ?>
	        
	        <!-- END .postarea portfolio -->
	        </div>
        
        <!-- END .one-half -->
        </div>
						
		<?php endwhile; ?>
        
    </div><!-- END .row -->
    <div class="row"><!-- BEGIN .row -->
     			
 		<div class="pagination">
 			<?php echo get_pagination_links(); ?>
 		</div><!-- END .pagination -->
 			
 		<?php else: ?>
     		
 	</div><!-- END .row -->
 	<div class="row"><!-- BEGIN .row -->
     	
 		<!-- BEGIN .twelve columns -->  
 	    <div class="twelve columns">
 	
 			<!-- BEGIN .postarea portfolio -->
 	        <div class="postarea portfolio">
 	
 	        	<h1 class="headline"><?php _e("No Posts Found", 'organicthemes'); ?></h1>
 	        	<p><?php _e("We're sorry, but no posts have been found. Create a post to be added to this section, and configure your theme options.", 'organicthemes'); ?></p>
 	        
 	        <!-- END .postarea portfolio -->
 	        </div>
 	        
 		<!-- END .twelve columns -->
 	    </div>
     	        
     	<?php endif; ?>
     		
	</div><!-- END .row -->

<!-- END .container portfolio -->		
</div>

<?php get_footer(); ?>