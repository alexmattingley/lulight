<div class="featured-page">

	<?php $recent = new WP_Query('page_id='.of_get_option('select_page')); while($recent->have_posts()) : $recent->the_post(); ?>
	
	<?php if ( has_post_thumbnail()) { ?>
		<a class="featureimg" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr(the_title_attribute()); ?>"><?php the_post_thumbnail( 'featured-img' ); ?></a>
	<?php } ?>
	
	<h2 class="headline"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr(the_title_attribute()); ?>"><?php the_title(); ?></a></h2>
	<?php the_content(__("Read More", 'organicthemes')); ?>
	
	<?php endwhile; ?>
	
</div>