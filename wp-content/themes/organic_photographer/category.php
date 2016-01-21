<?php get_header(); ?>

<!-- .container portfolio -->
<div class="container portfolio">
								
	<!-- BEGIN .row -->
	<div class="row <?php if (of_get_option('portfolio_columns') == 'two') { ?>holder-half<?php } if (of_get_option('portfolio_columns') == 'three') { ?>holder-third<?php } ?>">
				
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	    <?php $meta_box = get_post_custom($post->ID); $video = $meta_box['custom_meta_video'][0]; ?>
	    
		<!-- BEGIN .twelve columns | .one-half | .one-third -->
	    <div class="<?php if (of_get_option('portfolio_columns') == 'one') { ?>twelve columns<?php } if (of_get_option('portfolio_columns') == 'two') { ?>one-half<?php } if (of_get_option('portfolio_columns') == 'three') { ?>one-third<?php } ?>">
	            
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
	            
	            <?php if(of_get_option('display_portfolio_info_cat') == '1') { ?>
	            <div class="information">              
	                <h2 class="headline-small text-center"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', '_s' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a></h2>
	                <?php the_excerpt(); ?>
	            </div><!-- END .information -->
	            <?php } ?>
		     
		     <!-- END .postarea portfolio -->
		     </div>
		     
		<!-- END .twelve columns | .one-half | .one-third -->     
		</div>
									
		<?php endwhile;  ?>
		
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