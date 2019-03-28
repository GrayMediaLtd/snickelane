/**
 *
 */
(function($) {
	$.entwine('ss', function($){
        /**
         *
         */
        $('form.htmleditorfield-mediaform').entwine({
            onmatch: function(){
                //
                this.find('.insert-media-as-shortcode').on('click', function(event){
                    //
                    event.preventDefault();
                    
                    //
                    var editorField = $('form.htmleditorfield-form');
                    
                    editorField.modifySelection(function(ed){
                        //
                        var content = '';
                        
                        this.find('.ss-htmleditorfield-file').each(function() {
                            //
                            var t           = $(this),
                                Alt         = t.find('input[name="AltText"]').val() || '',
                                Title       = t.find('input[name="Title"]').val() || '',
                                Caption     = t.find('input[name="CaptionText"]').val() || '',
                                Align       = t.find('select[name="CSSClass"]').val() || '',
                                Width       = t.find('input[name="Width"]').val() || '',
                                Height      = t.find('input[name="Height"]').val() || '',
                                ID          = parseInt( t.attr('data-id') ) || '',
                                Url         = t.attr('data-url') || '',
                                Name        = t.find('name').text() || '',
                                ResizeCrop  = t.find('select[name="ResizeCrop"]').val() || 'custom';
                            
                            content +=  ('<p class="shortcode-wrapper shortcode-wrapper-image '+ Align +'">[image'
                                        +( ID ? ',id="'+ ID +'"' : '')
                                        +( Name ? ',name="'+ Name +'"' : '' )
                                        +( Url ? ',url="'+ Url +'"' : '' )
                                        +( ResizeCrop == 'custom' ? '",width="'+ Width +'"' : '' )
                                        +( ResizeCrop == 'custom' ? '",height="'+ Height +'"' : '' )
                                        +( Caption ? ',caption="'+ Caption +'"' : '' )
                                        +( Title ? ',title="'+ Title +'"' : '' )
                                        +',align="'+ Align +'"'
                                        +',resizemode="'+ ResizeCrop +'"'
                                        +',location="left"'
                                        +']'+ Alt +'[/image]</p>');
                        });
                        
                        //
                        ed.replaceContent(content);
                        
                        //
                        ed.repaint();
                    });
                    
                    // close the dialog
                    editorField.getDialog().close();
                    
                    //
                    return false;
                });
            },
        });
    });
}(jQuery));