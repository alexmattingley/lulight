<?php get_header(); ?>

<!-- BEGIN .container -->
<div class="container">
	
	<!-- BEGIN .post class -->
	<div <?php post_class(); ?> id="page-<?php the_ID(); ?>">

		<?php if(of_get_option('display_feature_page') == '1') { ?>
			<div class="featureimg page"><?php the_post_thumbnail( 'page-feature' ); ?></div>
		<?php } ?>
		
		<!-- BEGIN .row -->
		<div class="row">
			
			<!-- BEGIN .eight columns -->
			<div class="eight columns">
				
				<!-- BEGIN .postarea -->
			    <div class="postarea">
			
			        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			        
			        <h1 class="headline"><?php the_title(); ?></h1>
			        <?php the_content(__("Read More", 'organicthemes')); ?>
			        
			        <?php wp_link_pages(array(
			            'before' => '<p class="page-links"><span class="link-label">' . __('Pages:') . '</span>',
			            'after' => '</p>',
			            'link_before' => '<span>',
			            'link_after' => '</span>',
			            'next_or_number' => 'next_and_number',
			            'nextpagelink' => __('Next'),
			            'previouspagelink' => __('Previous'),
			            'pagelink' => '%',
			            'echo' => 1 )
			        ); ?>
			        
			        <div class="clear"></div>
			        <?php edit_post_link(__("(Edit)", 'organicthemes'), '', ''); ?>
			        
			        <?php endwhile; else: ?>
			        
			        <p><?php _e("Sorry, no posts matched your criteria.", 'organicthemes'); ?></p>
			        
			        <?php endif; ?>
			    
			    <!-- END .postarea -->
			    </div>
			
			<!-- END .eight columns -->
			</div>
			
			<div class="four columns">
				<?php get_sidebar( 'right-sidebar' ); ?>
			</div>
		
		<!-- END .row -->
		</div>
	
	<!-- END .post class -->
	</div>

<!-- END .container -->
</div>

<?php get_footer(); ?>



