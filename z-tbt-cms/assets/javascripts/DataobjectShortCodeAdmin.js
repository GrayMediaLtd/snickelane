/**
 *
 */
(function($) {
	$.entwine('ss', function($){
		/**
		 * Make gridfield rows to be sortable
		 */ 
		$("form .dataobjectshortcode-gridfield tbody").entwine({
			onadd: function() {
				var self = this;
				
				var helper = function(e, row) {
					return row.clone()
					          .addClass("ss-gridfield-orderhelper")
					          .width("auto")
					          .find(".col-buttons")
					          .remove()
					          .end();
				};
				
				this.sortable({
					handle: '.gdsec-sort-handle',
					helper: helper,
					opacity: .8
				});
			},
			onremove: function() {
                if(this.data('sortable')) {
				    this.sortable("destroy");
                }
			}
		});
		
		/**
		 * Multiple select
		 */
		$('.ss-gridfield .gdsec-cb-item').entwine({
			onclick: function (e) {
				e.stopPropagation();
			}
		});
		
		$('.ss-gridfield .gdsec-checkall').entwine({
			onclick: function () {
				this.closest('table').find('.gdsec-cb-item').prop('checked', this.prop('checked'));
			}
		});
		
		/**
		 * Form
		 */
		$('form.dataobject-shortcode-list-form').entwine({
            /**
             * On submit the form
             */
            onsubmit: function(e) {
				// get data
				var data = this.serializeJSON();
				var ids  = this.find("[name^=IDs]").serializeArray();
				
				if ( !$.isEmptyObject(ids) ) {
					ids = $.map(ids, function(item){
					    var id = parseInt(item.value) || 0;
						
						if (id > 0) {
							return id;
						}
					});
					
					data['IDs'] = ids;
				}
				
				// passing data to the form in the parent window
				var form  = $(window.parent.document).find('form.htmleditorfield-dataobjectshortcode-form');
				var input = form.find('#DataFromIframe');
				
				if ( input.length ) {
					input.val( JSON.stringify(data) );
				}
				else{
					form.append('<input type="hidden" name="DataFromIframe" id="DataFromIframe" value=\''+ JSON.stringify(data) +'\' />')
				}
				
				// reload iframe
				window.location.reload(false); 
				
				// submit the form in the parent window
				form.find('.SubmitButton').click();
				
				return false;
			}
		});
    });
}(jQuery));