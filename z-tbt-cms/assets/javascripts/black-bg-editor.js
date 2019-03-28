/**
 *
 */
(function($) {
	$.entwine('ss', function($){
		//
		$("div.black-bg.htmleditor").entwine({
			onmatch: function() {
				var self = this;
				
				setTimeout(function(){
					var iframe = self.find('iframe').contents();
					
					iframe.find('body').addClass('typography-black');
					
				}, 300);
			}
		});
    });
}(jQuery));