<?php
/*
Template Name: Shop Page
*/
?>

<?php get_header(); ?>

<!-- BEGIN .container shop -->
<div class="container shop">

	<?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); ?>
	<?php if (is_plugin_active('woocommerce/woocommerce.php')) { ?>
	        
	<?php do_action('woocommerce_before_single_product', $post, $_product); ?>
	
	<!-- BEGIN .row -->
	<div class="row holder-third">
		
		<?php $wp_query = new WP_Query(array('post_type'=>array('product'), 'product_cat'=>of_get_option('category_products'), 'posts_per_page'=>of_get_option('postnumber_products'), 'paged'=>$paged)); ?>
		
		<?php if($wp_query->have_posts()) : while (have_posts()) : the_post(); $_product = new woocommerce_product( $post->ID ); $loop++; ?>
        <?php global $more; $more = 0; ?>
        
        <!-- BEGIN .one-third -->
        <div class="one-third">
        
        	<!-- BEGIN .postarea shop -->
            <div class="postarea shop">
        		
        		<h2 class="headline-small text-center"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                <a class="featureimg" href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail( 'product-thumb-large' ); ?></a>
                <div class="information">
                    <a class="add-btn" href="<?php echo $_product->add_to_cart_url(); ?>"><?php _e("Add To Cart", 'organicthemes'); ?></a>
            	</div>
            
            <!-- END .postarea shop -->
            </div>
            
        </div>
            
        <?php endwhile; ?>       
        <?php else : ?>
		<?php endif; ?>
        
    </div> <!-- /row -->
    
    <div class="pagination">
    	<?php if (function_exists("number_paginate")) { number_paginate(); } ?>
    </div>
    
    <?php } ?>

</div> <!-- /container -->
		

<?php get_footer(); ?>