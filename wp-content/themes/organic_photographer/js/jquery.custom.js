jQuery(document).ready(function() {
    
    /* Superfish the menu drops ---------------------*/
    jQuery('.menu').superfish({
    	delay: 200,
    	animation: {opacity:'show', height:'show'},
    	speed: 'fast',
    	autoArrows: true,
    	dropShadows: false
    });
        
    /* Flexslider ---------------------*/
    jQuery(window).load(function() { 
	    if( jQuery().flexslider) {
	    	var slider = jQuery('.flexslider');
	    	slider.fitVids().flexslider({
		    	slideshowSpeed		: slider.attr('data-speed'),
		    	animationDuration	: 600,
		    	animation			: 'slide',
		    	video				: false,
		    	useCSS				: false,
		    	touch				: false,
		    	animationLoop		: true,
		    	smoothHeight		: true,
		    	
		    	start: function(slider) {
		    	    slider.removeClass('loading');
		    	}
	    	});	
	    }
    });
    
    // /* Masonry ---------------------*/

    // COMMENTED OUT BECAUSE IT WAS CAUSING PORTFOLIO PAGES TO BREAK!!!

    // jQuery(document).ready(function() { 
    // 	jQuery('.holder-third').masonry({
    // 		itemSelector : '.one-third',
    // 		columnWidth : 312,
    // 		gutterWidth : 22,
    // 		isAnimated: true
    // 	}).imagesLoaded(function() {
    // 	   jQuery('.holder-third').masonry('reload');
    // 	});
    // 	jQuery('.holder-half').masonry({
    // 		itemSelector : '.one-half',
    // 		columnWidth : 480,
    // 		gutterWidth : 20,
    // 		isAnimated: true
    // 	}).imagesLoaded(function() {
    // 	   jQuery('.holder-half').masonry('reload');
    // 	});
    // });

    /*doc ready*/
    
    function slideToggleNewsletter(){
        var view_width = document.documentElement.clientWidth;
        if(view_width > 768){
            jQuery('#mc_embed_signup').slideToggle('slow');
        }
    }


    /* Image Hover Effect ---------------------*/
    jQuery(window).load(function() {                          
        jQuery('.featureimg').hover(function() {
            jQuery(this).find('.share-holder').fadeIn(200);        
        }, function() {
            jQuery(this).find('.share-holder').fadeOut(200);         
        });

        setTimeout(slideToggleNewsletter, 2000);
    }); 
    
    /* Fit Vids ---------------------*/
    jQuery('.featurevid').fitVids();
    
    /* jQuery UI Tabs ---------------------*/
    jQuery(function() {
       jQuery( ".organic-tabs" ).tabs();
    });
    
    /* jQuery UI Accordion ---------------------*/
    jQuery(function() {
        jQuery( ".organic-accordion" ).accordion({
        	collapsible: true, 
            autoHeight: false
        });
    });

    jQuery('.close a').click(function(){
        jQuery('#mc_embed_signup').slideToggle('slow');
    });
    
    /* Close Message Box ---------------------*/
    jQuery('.organic-box a.close').click(function() {
    	jQuery(this).parent().stop().fadeOut('slow', function() {
    	});
    });
    
    /* Toggle Box ---------------------*/
    jQuery('.toggle-trigger').click(function() {
    	jQuery(this).toggleClass("active").next().fadeToggle("slow");
    });
    
    /* Pretty Photo Lightbox ---------------------*/
    jQuery("a[rel^='prettyPhoto']").prettyPhoto();
    
});