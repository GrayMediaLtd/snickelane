(function($) {
	$.entwine('ss', function($){
		/**
         *
         */
		$('.SortableTreeMultiselectField').entwine({
            /**
             * On match
             */ 
			onmatch: function() {
                //
				this._super();
                
                //
                var t          = $(this),
                    list       = t.find('.stmsf-sortlist'),
                    treeID     = t.attr('data-tree-id'),
                    treeHolder = $('#'+ treeID + '_Holder'),
                    treeInput  = $('#'+ treeID);
                
                list.sortable({
                    axis: 'y',
                    update: function (event, ui) {
                        var data = $(this).sortable('toArray', { attribute: 'data-item-id' });
                        
                        treeInput.val( data.join(',') );
                    }
                });
                
				treeHolder.on('click', '.jstree-checkbox', function() {
                    //
                    var id      = $(this).closest('li').data('id'),
                        title   = $(this).parent().text();
                    
                    // get sortable item
                    var item = list.find('> [data-item-id="'+id+'"]');
                    
                    // remove the item if it is in the list
                    if (item.length) {
                        item.remove();
                    }
                    // add the item to the list
                    else{
                        list.append('<li class="clearfix" data-item-id="'+ id +'">\
                                        <span class="ui-icon ui-icon-arrowthick-2-n-s"></span>\
                                        '+ title +'\
                                    </li>');
                    }
                    
                    // refresh the list
                    list.sortable("refresh");
                    
                    // update sorting position
                    var data = list.sortable('toArray', { attribute: 'data-item-id' });
                    
                    if ( $.isArray(data) ) {
                        treeInput.val( data.join(',') );
                    }
                });
			},
            
            /**
             * On remove
             */
			onremove: function() {
				this._super();
				this.unbind('.SortableTreeMultiselectField');
			}
		});
	});
}(jQuery));
