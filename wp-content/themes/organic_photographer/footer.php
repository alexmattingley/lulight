<div class="clear"></div>
<!-- Begin MailChimp Signup Form -->
<div id="mc_embed_signup">
	<form action="//lulight.us13.list-manage.com/subscribe/post?u=58bf1b1569e2d1b16f21780aa&amp;id=9c44d19fc8" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
	    <div id="mc_embed_signup_scroll">
		<h2>Join My Newsletter</h2>
		<div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
		<div class="mc-field-group">
			<label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
		</label>
			<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
		</div>
		<div class="mc-field-group">
			<label for="mce-FNAME">First Name </label>
			<input type="text" value="" name="FNAME" class="" id="mce-FNAME">
		</div>
		<div class="mc-field-group">
			<label for="mce-LNAME">Last Name </label>
			<input type="text" value="" name="LNAME" class="" id="mce-LNAME">
		</div>
		<div id="mce-responses" class="clear">
			<div class="response" id="mce-error-response" style="display:none"></div>
			<div class="response" id="mce-success-response" style="display:none"></div>
		</div>    
		<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
	    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_58bf1b1569e2d1b16f21780aa_9c44d19fc8" tabindex="-1" value=""></div>
	    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
	    </div>
	</form>
</div>

<!--End mc_embed_signup-->

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
			<?php } if (of_get_option('display_instagram') == '1') { ?>
				<a class="link-instagram" href="<?php echo of_get_option('instagram_link'); ?>" target="_blank"><i class="fa fa-instagram"></i></a>
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