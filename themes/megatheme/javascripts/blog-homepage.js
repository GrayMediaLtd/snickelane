$('.blog-infinitelist').jscroll({
	autoTrigger: false,
	nextSelector: '.next-page:last',
	callback: function(){
		// remove .jscroll-added wrapper
		$('.jscroll-added').children().unwrap();
	}
});