tinyMCEPopup.requireLangPack();

var ShortCodesDialog = {
	init : function() {
		var f = document.forms[0];

		// Get the selected contents as text and place it in the input
		// f.someval.value = tinyMCEPopup.editor.selection.getContent({format : 'text'});
		// f.btnClass.value = tinyMCEPopup.getWindowArg('btnClass');
	},

	insert : function() {
		// Get values from form
		var t 	= document.getElementById('type-list');
		var f 	= document.forms[0];
		var c  	= '';
		
		// Get the type
		var type = t.options[t.selectedIndex].value;
		
		switch (type) {
			case 'button':
				var btnText = f.Button_text.value;
				
				if (btnText)
				{
					c += '[button,';
					
					var pairs = {
						link: f.Button_link.value,
						classes: f.Button_classes.value,
						wrapperClass: f.Button_wrapper_class.value,
						iconClass: f.Button_icon_class.value,
						newWindow: f.Button_new_window.checked,
						noFollow: f.Button_nofollow.checked
					};
					
					for (var k in pairs) {
						if ( pairs[k] ) {
							c += k + '="'+ pairs[k] +'",';
						}
					}
					
					c += 'location="left"]'+ btnText +'[/button]';
				}
				
				break;
			
			case 'video':
				var videoURL = f.Video_url.value;
				
				if (Video_url)
				{
					var video = videoParser.parse(videoURL);
					
					if ( $.isEmptyObject(video) ) {
						alert('Video URL is incorrect or the video service is not supported.');
					}
					else{
						if (video.mediaType == 'video') {
                            // properties
							var pairs = {
								id: video.id,
								service: video.provider,
								width: parseInt(f.Video_width.value),
								height: parseInt(f.Video_height.value)
							};
                            
                            // video thumbnail
                            var thumb = f.Thumbnail_url.value;
                            
                            if (thumb) {
                                pairs['thumbnail'] = thumb;
                            }
							
                            // build short code
							c += '[video,';
							
							for (var k in pairs) {
								if ( pairs[k] ) {
									c += k + '="'+ pairs[k] +'",';
								}
							}
							
							c += 'location="left"]';
						}
					}
					
				}
				
				break;
			
			case 'fluid-table':
				var ft_rows = parseInt(f.Fluid_table_rows.value);
				var ft_cols = parseInt( f.Fluid_table_columns.options[f.Fluid_table_columns.selectedIndex].value );
				var ft_col_class = 'col-md-' + (12/ft_cols);
				
				if (ft_rows && ft_cols) {
					c += '<table class="fluid-table row"><tbody>';
					
					for (var i = 1; i <= ft_rows; i++) {
						c += '<tr>';
						
						for (var x = 1; x <= ft_cols; x++) {
							c += '<td class="'+ ft_col_class +'">Content goes here.</td>'
						}
						
						c += '</tr>';
					}
					
					c += '</tbody></table>';
				}
				
				break;
            
            case 'quote':
				var message = f.Quote_message.value;
				var author  = f.Quote_author.value || '';
				
				if (message)
				{
					c += '[quote,';
					
					var pairs = {
						author: author
					};
					
					for (var k in pairs) {
						if ( pairs[k] ) {
							c += k + '="'+ pairs[k] +'",';
						}
					}
					
					c += 'location="left"]'+ message +'[/quote]';
				}
				
				break;
		}
		
		
		// Insert the contents from the input into the document
		c = (type == 'fluid-table') ? '<div class="fluid-table-wrapper">'+ c +'</div>' : '<p class="shortcode-wrapper shortcode-wrapper-'+ type +'">' + c + '</p>';
		
		tinyMCEPopup.editor.execCommand('mceInsertContent', false, c + '<p class="shortcode-divider">&nbsp;</p>');
		tinyMCEPopup.close();
	}
};

tinyMCEPopup.onInit.add(ShortCodesDialog.init, ShortCodesDialog);

/**
 * On document ready
 */
$(document).ready(function(){
	// move popup to top
	tinyMCEPopup.execCommand('ShortCodesPlugin_Move', {top: '30px'});
	
	// resize popup
	resizeDialog();
})

/**
 * Function
 */
var resizeDialog = function(){
	tinyMCEPopup.execCommand('ShortCodesPlugin_Resize', false, { height : $('body').height() });
	tinyMCEPopup.resizeToInnerSize();
}

var changeType = function(e){
	var typeFields = $('#type-fields'),
		actions    = $('.mceActionPanel');
	
	var v = $(e).val();
		
	if(v) {
		typeFields.html( $('#type-'+v).html() );
		actions.show();
	}
	else{
		typeFields.empty();
		actions.hide();
	}
	
	resizeDialog();
}