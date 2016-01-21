<div class="clear"></div>

<!-- BEGIN .row -->
<div class="row">
	
	<!-- BEGIN .twelve columns -->
	<div class="twelve columns">
	
		<p class="social-icons">
			<?php if (of_get_option('display_facebook') == '1') { ?>
				<a class="link-facebook" href="<?php echo of_get_option('facebook_link'); ?>" target="_blank"><i class="icon-facebook-sign"></i></a>
			<?php } if (of_get_option('display_twitter') == '1') { ?>
				<a class="link-twitter" href="<?php echo of_get_option('twitter_link'); ?>" target="_blank"><i class="icon-twitter-sign"></i></a>
			<?php } if (of_get_option('display_plus') == '1') { ?>
				<a class="link-google" href="<?php echo of_get_option('plus_link'); ?>" target="_blank"><i class="icon-google-plus-sign"></i></a>
			<?php } if (of_get_option('display_pinterest') == '1') { ?>
				<a class="link-pinterest" href="<?php echo of_get_option('pinterest_link'); ?>" target="_blank"><i class="icon-pinterest"></i></a>
			<?php } if (of_get_option('display_rss') == '1') { ?>
				<a class="link-rss" href="<?php bloginfo('rss2_url'); ?>" target="_blank"><i class="icon-rss"></i></a>
			<?php } ?>
		</p>

	    <div class="footer">
	        <p><?php _e("Copyright", 'organicthemes'); ?> &copy; <?php echo date(__("Y", 'organicthemes')); ?> &middot; <?php _e("All Rights Reserved", 'organicthemes'); ?> &middot; <?php bloginfo('name'); ?></p>
	        
	        <p><a href="http://www.organicthemes.com/themes/photographer-theme/" target="_blank"><?php _e("Photographer Theme", 'organicthemes'); ?></a> <?php _e("by", 'organicthemes'); ?> <a href="http://www.organicthemes.com" target="_blank"><?php _e("Organic Themes", 'organicthemes'); ?></a> &middot; <a href="<?php bloginfo('rss2_url'); ?>" target="_blank"><?php _e("RSS Feed", 'organicthemes'); ?></a> &middot; <?php wp_loginout(); ?></p>
	    </div>
    
    <!-- END .twelve columns -->
	</div>

<!-- END .row -->
</div>

<!-- END #wrap -->
</div>

<?php do_action('wp_footer'); ?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=246727095428680";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

</body>
</html>