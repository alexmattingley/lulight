<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>
<div class="searchblog">
<?php get_search_form(); ?>
</div>
<?php if(of_get_option('display_blog_sidebar') == '1') { ?>
	
	<!-- BEGIN .container -->
	<div class="container">
	
		<div class="featureimg"><?php the_post_thumbnail( 'page-feature' ); ?></div>
		
		<!-- BEGIN .row -->
		<div class="row">
		
			<!-- BEGIN .eight columns -->
			<div class="eight columns">
			
				<div class="postarea blog-small">
			        <?php get_template_part( 'loop', 'blog' ); ?>
		        </div> <!-- end .postarea -->
			
			<!-- END .columns -->
			</div>
			
			<div class="four columns">
				<?php get_sidebar( 'right-sidebar' ); ?>
			</div>
		
		<!-- END .row -->
		</div>
		
	<!-- END .container -->	
	</div>
	
<?php } else { ?>
	
	<!-- BEGIN .container blog-full -->
	<div class="container blog-full">

		<div class="featureimg"><?php the_post_thumbnail( 'page-feature' ); ?></div>
		
		<!-- BEGIN .row -->
		<div class="row">
		
			<div class="twelve columns">
		        
		        <div class="postarea blog-full">
			        <?php get_template_part( 'loop', 'blog' ); ?>
			    </div>
			
			<!-- END .twelve columns -->
			</div>
			
		<!-- END .row -->	
		</div>
		
	<!-- END .container blog-full -->
	</div>
	
<?php } ?>

<?php get_footer(); ?>


<div class="share-buttons share-buttons-tab" data-buttons="twitter,facebook,pinterest" data-style="medium" data-counter="false" data-hover="false" data-promo-callout="false" data-float="left"></div>


