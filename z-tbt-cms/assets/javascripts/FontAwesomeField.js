/**
 * Register TagField functions with fields.
 */
(function ($) {

	/*
	 * The multiple-select plugin (Chosen) applies itself to everything!
	 * We have to remove it before selectively applying select2, or
	 * we'll see an extra field where there should be only one.
	 */
	$.fn.chosenDestroy = function () {
		var $this = $(this);
		if ($this.siblings('.chzn-container').length) {
			$this
				.show() // The field needs to be visible so Select2 evaluates the width correctly.
				.removeClass('chzn-done')
				.removeClass('has-chzn')
				.next()
				.remove();
		}
		return $this;
	};

	$.entwine('ss', function ($) {

		$('.ss-fa-field.has-chzn + .chzn-container, .ss-fa-field:not(.has-chzn)').entwine({
			applySelect2: function () {
				var self = this,
					$select = $(this);

				if ($select.prev().hasClass('ss-fa-field')) {
					$select = $select.prev();
				}

				// There is a race condition where Select2 might not
				// be bound to jQuery yet. So here we make sure Select2
				// is defined before trying to invoke it.
				if ($.fn.select2 === void 0) {
					return setTimeout(function () {
						self.applySelect2();
					}, 0);
				}

				var options = {
					'tags': true,
					'tokenSeparators': [','],
					templateResult: FontAwesomeField.addIcon,
					templateSelection: FontAwesomeField.addIcon
				};

				if ($select.attr('data-can-create') == 0) {
					options.tags = false;
				}

				if ($select.attr('data-ss-fa-field-suggest-url')) {
					options.ajax = {
						'url': $select.attr('data-ss-fa-field-suggest-url'),
						'dataType': 'json',
						'delay': 250,
						'data': function (params) {
							return {
								'term': params.term
							};
						},
						'processResults': function (data) {
							return {
								'results': data.items
							};
						},
						'cache': true
					}
				}

				$select
					.chosenDestroy()
					.select2(options);
			},
			onmatch: function () {
				this.applySelect2();
			}
		});
	});
})(jQuery);

var FontAwesomeField = {
	addIcon: function(opt){
		if (!opt.id) {
			return opt.text;
		}               
		
		return jQuery(
			'<span class="fa-icon"><i class="fa '+ opt.id +'"></i>' + jQuery(opt.element).text() + '</span>'
		);
	}
};
