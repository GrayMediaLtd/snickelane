/**
 * editor_plugin_src.js
 *
 * Copyright 2009, Moxiecode Systems AB
 * Released under LGPL License.
 *
 * License: http://tinymce.moxiecode.com/license
 * Contributing: http://tinymce.moxiecode.com/contributing
 */

(function() {
	// Load plugin specific language pack
	tinymce.PluginManager.requireLangPack('dataobjectshortcode');
	
	// Create plugin
	tinymce.create('tinymce.plugins.DataobjectShortcodePlugin', {
		/**
		 * Returns information about the plugin as a name/value array.
		 * The current keys are longname, author, authorurl, infourl and version.
		 *
		 * @return {Object} Name/value array containing information about the plugin.
		 */
		getInfo : function() {
			return {
				longname : 'Dataobject Shortcode plugin',
				author : 'Anh Le',
				authorurl : 'http://thatbythem.com',
				infourl : 'http://thatbythem.com',
				version : "1.0"
			};
		},
        
		/**
		 * Initializes the plugin, this will be executed after the plugin has been created.
		 * This call is done before the editor instance has finished it's initialization so use the onInit event
		 * of the editor instance to intercept that event.
		 *
		 * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
		 * @param {string} url Absolute URL to where the plugin is located.
		 */
		init : function(ed, url) {
			// Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('mceShortCodes');
			ed.addCommand('mceDataobjectShortcode', function() {
                // open dialog
				jQuery('#' + this.id).entwine('ss').openDataobjectShortcodeDialog();
			});
            
			// Register button
			ed.addButton('dataobjectshortcode', {
				title : 'dataobjectshortcode.desc',
				cmd : 'mceDataobjectShortcode',
				image : url + '/img/button.png'
			});
            
            //
            var dialog = jQuery('#cms-editor-dialogs');
            
            dialog.attr('data-url-dataobjectshortcodeform', dialog.attr('data-url-mediaform').replace("/MediaForm/", "/DataobjectShortcodeForm/"));
		},

		/**
		 * Creates control instances based in the incoming name. This method is normally not
		 * needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
		 * but you sometimes need to create more complex controls like listboxes, split buttons etc then this
		 * method can be used to create those.
		 *
		 * @param {String} n Name of the control to create.
		 * @param {tinymce.ControlManager} cm Control manager to use inorder to create new control.
		 * @return {tinymce.ui.Control} New control instance or null if no control was created.
		 */
		createControl : function(n, cm) {
			return null;
		}
	});

	// Register plugin
	tinymce.PluginManager.add('dataobjectshortcode', tinymce.plugins.DataobjectShortcodePlugin);
})();

/**
 *
 */
(function($) {
	$.entwine('ss', function($){
        /**
		 * Class: textarea.htmleditor
		 * 
		 * Add tinymce to HtmlEditorFields within the CMS. Works in combination
		 * with a TinyMCE.init() call which is prepopulated with the used HTMLEditorConfig settings,
		 * and included in the page as an inline <script> tag.
		 */
		$('textarea.htmleditor').entwine({
            openDataobjectShortcodeDialog: function() {
				this.openDialog('dataobjectshortcode');
			},
		});
        
        /**
         *
         */
        $('form.htmleditorfield-dataobjectshortcode-form').entwine({
            /**
             * On submit the form
             */
            onsubmit: function(e) {
				/*
				// get selected ids
				var ids = this.find("[name^=SelectCheckbox]").serializeArray();
				
				if ( !$.isEmptyObject(ids) ) {
					ids = $.map(ids, function(item){
					    var id = parseInt(item.value) || 0;
						
						if (id > 0) {
							return id;
						}
					});
					
					if (ids) {
						// get class name
						var className = this.find("select[name=ClassName]").val() || '';
						
						// get template
						var template = this.find("select[name=Template]").val() || '';
						
						// inject to HTML Editor
						this.modifySelection(function(ed){
							//
							var content =   ('<p class="shortcode-wrapper shortcode-wrapper-dataobject">[dataobject'
											+',ids="'+ ids.join(',') +'"'
											+( className ? ',name="'+ className +'"' : '' )
											+( template ? ',template="'+ template +'"' : '' )
											+',location="left"'
											+' /]</p><p>&nbsp;</p>');
								 
							//
							ed.replaceContent(content);
							
							//
							ed.repaint();
						});
					}
				}
				*/
				
				//
				var data = this.find('#DataFromIframe').val();
				
				if (data) {
					data = $.parseJSON(data);
					
					if (
						typeof data.IDs !== 'undefined'
						&& $.type(data.ClassName) == 'string'
						&& data.ClassName
						&& !$.isEmptyObject(data.IDs)
					) {
						//
						var ids       = data.IDs;
						var className = data.ClassName;
						
						// get template
						var template = ($.type(data.Template) === 'string' && data.Template) ? data.Template : '';
						
						// inject to HTML Editor
						this.modifySelection(function(ed){
							//
							var content =   ('<p class="shortcode-wrapper shortcode-wrapper-dataobject">[dataobject'
											+',ids="'+ ids.join(',') +'"'
											+( className ? ',name="'+ className +'"' : '' )
											+( template ? ',template="'+ template +'"' : '' )
											+',location="left"'
											+' /]</p><p class="shortcode-divider">&nbsp;</p>');
								 
							// Insert to WYSIWYG editor
							ed.replaceContent(content);
							
							// Reload WYSIWYG editor
							ed.repaint();
						});
					}
				}
				
				// close dialog
				this.getDialog().close();
                
                //
				return false;
			},
            
            /**
             * Reset fields
             */
            resetDataobjectShortcodeFormFields: function() {
				// reload gridfield
				// this.find('.ss-gridfield').reload();
				
				// reload iframe
				this.find('iframe').attr( 'src', function ( i, val ) { return val; });
				
				//
				this._super();
			},
			
			/**
			 * Dialog events
			 */
			fromDialog: {
				onssdialogopen: function(){
				    //
					var dialog        = this.getDialog();
					var dialogWrapper = dialog.closest('.ui-dialog');
					
					dialog.css({height: 'auto'});
					dialogWrapper.css({top: '30px', left: '3%', width: '94%'});
				},
				onssdialogclose: function(){
					// reset form fields
                    this.resetDataobjectShortcodeFormFields();
				}
			}
        });
		
		/**
		 * Update gridfield on changing class name
		 */ 
		$('form.htmleditorfield-dataobjectshortcode-form .field[id$="ClassName_Holder"] .dropdown').entwine({
			onadd: function() {
				this._super();
				
				var self = this;
				
				this.bind('change', function() {
					var gridField = self.closest('form').find('.ss-gridfield');
					gridField.setState('ClassName', self.getValue());
					gridField.reload();
				});
			}
		});
		
		/**
		 * Make gridfield rows to be sortable
		 */ 
		$("form.htmleditorfield-dataobjectshortcode-form .ss-gridfield tbody").entwine({
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

    });
}(jQuery));