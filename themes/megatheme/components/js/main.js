// On window scroll
$(window).scroll(function() {
	var screenPosition = $(document).scrollTop();

	if (screenPosition > 5) {
		$(".navbar").addClass("scrolled");
	} else {
		$(".navbar").removeClass("scrolled");
	}
});

// On document ready
$(document).ready(function () {
	// General tweaks
	$('.shortcode-wrapper').remove();
	labelAsPlaceholder();
	
	// Show & hide map content
	$('.mc-hide-address').on('click', function(){
		// get target element
		var ele     = $(this),
		    target  = $( ele.data('target') ),
			btnText = {show: ele.data('show-text'), hide: ele.data('hide-text')};
		
		if (target.length) {
			if ( target.is(':hidden') ) {
				target.slideDown(function(){
					ele.text(btnText.hide);
				});
			}
			else{
				target.slideUp(function(){
					ele.text(btnText.show);
				});
			}
		}
	});
	
	// Banner heights
	var bat = $('#main > .banner-carousel').is(':first-child');
	
	$('.banner-carousel').each(function(i){
		var self    = $(this),
		    heights = self.data('heights'),
			id      = this.id;
		
		if( !$.isEmptyObject(heights) ){
			var media  = '',
			    css    = '',
			    sorted = Object.keys(heights).sort(function(a, b){ return a - b; });
				
			sorted.forEach(function(v, i) {
				height = parseFloat(heights[v]);
				
				if(i > 0){
					media = '(min-width: '+ (parseInt(sorted[i-1]) + 1) +'px) and (max-width: '+ v +'px)';
					css   = '#'+ id +', #'+ id +' .display-table { '+ (height === 0 ? 'display: none' : 'height: '+ height +'px' ) + '; }';
				}
				else{
					media = '(max-width: '+ v +'px)';
					css   = '#'+ id +', #'+ id +' .display-table { height: '+ height +'px; }';
				}
				
				$('<style id="banner-carousel-style-'+ id +'" media="screen and '+ media +'">'+ css +'</style>').appendTo('head');
			});
		}
		
		// set main menu to bright color if banner image is dark
		if(i === 0 && bat){
			$('body').removeClass('no-banner').addClass('has-banner');
			
			var ci  = self.find('> .carousel-inner'),
				cia = ci.find('> .active');
			
			if(cia.length && cia.data('dark-image')){
				$('body').addClass('bright-banner-text');
			}
			
			$(this).on('slid.bs.carousel', function (){
				$('body').removeClass('bright-banner-text');
				
				var cia2 = ci.find('> .active');
				
				if(cia2.length && cia2.data('dark-image')){
					$('body').addClass('bright-banner-text');
				}
			});
		}
	});
	
	// User Form Popup
	initUFP();
	
	// Scroll to top
	$().UItoTop({
		easingType: 'easeOutQuart'
	});
	
	// Typography tweaks
	$('.bsc-content > p').each(function(){
		if( $(this).find('strong').length ){
			$(this).addClass('has-strong-child');
		}
		
		if( $(this).html() == "&nbsp;" ){
			$(this).addClass('divider').empty();
		}
	});
});

// On window loaded
$(window).on("load", function() {
	// Isotope Portfolio
	var isotope_container = $('.isotope-container');
	var isotope_filter    = $('.portfolio-filter');
	
	if( isotope_container.length && $.fn.isotope ){
		// Initialize Isotope
		isotope_container.isotope({
			itemSelector: '.portfolio-item-wrapper'
		});
		
		$('.portfolio-filter a').click(function() {
			var selector = $(this).attr('data-filter');
			isotope_container.isotope({
				filter: selector
			});
			return false;
		});
		
		isotope_filter.find('a').click(function() {
			isotope_filter.find('a').parent().removeClass('active');
			$(this).parent().addClass('active');
		});
	}
	
	// owlCarousel
	if( $.fn.owlCarousel )
	{
		$(".staff-carousel").owlCarousel({
			items: 3, //10 items above 1000px browser width
			itemsDesktop: [1000, 3], //5 items between 1000px and 901px
			itemsDesktopSmall: [900, 2], // betweem 900px and 601px
			itemsTablet: [600, 2], //2 items between 600 and 0
			itemsMobile: false // itemsMobile disabled - inherit from itemsTablet option
		});
		
		$(".owl-single").owlCarousel({
			singleItem: true,
		});
	}
	
	// Match height
	if( $.fn.matchHeight ) $('.equalizer-wrapper > div').matchHeight();
});


// Simple accordion
$('.simple-accordion-heading').click(function(e){
	// prevent default action
	e.preventDefault();
	
	// vars
	var c = $(this).next(), 
	    p = $(this).parents('.panel'),
	    g = p.parents('.panel-group');
	
	// Expand or collapse this panel
	c.slideToggle('fast', function(){
		if( $(this).is(':visible') )
			p.addClass('active');
		else
			p.removeClass('active');
	});
	
	// Hide the other panels
	var op = g.find('.panel').not(p);
	
	op.find('.panel-collapse').slideUp('fast', function(){
		op.removeClass('active');
	});
});

// User Form Popup
var initUFP = function(){
	var ufp = $('.user-form-popup'),
		id  = ufp.attr('id'),
		key = 'popup_' + id;
	
	if(ufp.length && !Cookies.get(key) ){
		//
		ufp.find('[name="action_process"]').addClass('btn-lg btn-primary');
		
		//
		var delay    = parseInt( ufp.data('delay') ) || 0,
			atBottom = parseInt( ufp.data('at-bottom') ) || 0;
			
		var inst     = ufp.remodal();
		
		if(atBottom){
			$(window).on("scroll", function() {
				if( !Cookies.get(key) ){
					var scrollHeight   = $(document).height();
					var scrollPosition = $(window).height() + $(window).scrollTop();
					
					if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
						if(delay > 0){
							setTimeout(function(){
								inst.open(); Cookies.set(key, 1);
							}, delay);
						}
						else{
							inst.open(); Cookies.set(key, 1);
						}
					}
				}
			});
		}
		else if(delay > 0){
			setTimeout(function(){
				inst.open(); Cookies.set(key, 1);
			}, delay);
		}
		else{
			inst.open(); Cookies.set(key, 1);
		}
	}
};

// Label as palceholder
var labelAsPlaceholder = function(){
	$(".label-as-placeholder :input").each(function(index, elem) {
		var eId   = $(elem).attr("id");
		var label = null;
		
		if (eId && (label = $(elem).parents("form").find("label[for="+eId+"]")).length == 1) {
			$(elem).attr("placeholder", $(label).html());
			$(label).remove();
		}
	});
};
