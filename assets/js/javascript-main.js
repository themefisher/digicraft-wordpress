jQuery( document ).ready(function() {
	jQuery(window).scroll(function() {    
	var scroll = jQuery(window).scrollTop();
	 //console.log(scroll);
	if (scroll >= 800) {
	    jQuery(".overly-product-header").addClass("fixed");
	} else {
	    //console.log('a');
	    jQuery(".overly-product-header").removeClass("fixed");
	}
	});

	  smoothScroll.init();

});

