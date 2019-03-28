(function ($) {
	// fix Silverstripe hash link issue for the carousel nav
	$('[data-ride="carousel"]').each( function(){
		var self = $(this);
		
		self.on('click', '.carousel-control, [data-control="carousel"]', function(e){
			e.preventDefault();
			
			if( $(this).data('slide') == 'prev' )
				self.carousel('prev');
			else
				self.carousel('next');
		});
	} );
	
	// custom slider
    $.fn.tsCarousel = function () {
		var $slider = $(this);
		
        this.on("mousemove", function( event ) {
			var $btnImages = {
				'next': $slider.data('btn-img-next') || null,
				'prev': $slider.data('btn-img-prev') || null
			};
			
            var $item = $slider.find('.carousel-item').length;
			
            if ($item > 1 && $btnImages.next && $btnImages.prev) {
                if (event.pageX > $(window).width() / 2) {
                    $slider.css('cursor', 'url('+ $btnImages.next +'), auto');
                } else {
                    $slider.css('cursor', 'url('+ $btnImages.prev +'), auto');
                }
            }
        });
		
        this.on("click", function(event) {
			if (event.pageX > $(window).width() / 2) {
				$slider.carousel('next');
			} else {
				$slider.carousel('prev');
			}
        });
		
        return this;
    };
	
	$(".tscarousel:not(.class-only)").each(function(){
		$(this).tsCarousel();	
	});
} (jQuery));

(function ($) {
    $.fn.tsCarou = function () {
        this.on( "mousemove", function( event ) {
            var $slider    = $(this);
			var $btnImages = {
				'next': $slider.data('btn-img-next'),
				'prev': $slider.data('btn-img-prev')
			};
			
            if (event.pageX > $(window).width() / 2) {
                $slider.css('cursor', 'url('+ $btnImages.next +'), auto');
            } else {
                $slider.css('cursor', 'url('+ $btnImages.prev +'), auto');
            }
        });
		
        this.on( "click", function(event) {
            var $slider = $(this);
            if (event.pageX > $(window).width() / 2) {
                $slider.trigger("next", 1);
            } else {
                $slider.trigger("prev", 1);
            }
        });
		
        return this;
    };
} (jQuery));

$(".carou-portfolio").tsCarou();
