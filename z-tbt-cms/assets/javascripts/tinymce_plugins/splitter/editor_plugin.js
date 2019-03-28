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
	tinymce.PluginManager.requireLangPack('splitter');
	
	// Create plugin
	tinymce.create('tinymce.plugins.SplitterPlugin', {
		/**
		 * Returns information about the plugin as a name/value array.
		 * The current keys are longname, author, authorurl, infourl and version.
		 *
		 * @return {Object} Name/value array containing information about the plugin.
		 */
		getInfo : function() {
			return {
				longname : 'Splitter plugin',
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
			ed.addCommand('mceSplitter', function() {
                ed.execCommand('mceInsertContent', 0, '<p class="content-splitter"></p><p class="shortcode-divider">&nbsp;</p>');
			});
            
			// Register button
			ed.addButton('splitter', {
				title : 'splitter.desc',
				cmd : 'mceSplitter',
				image : url + '/img/button.png'
			});
            
            // Add a node change handler, selects the button in the UI when a shortcode is selected
			ed.onNodeChange.add(function(ed, cm, n) {
                if ( jQuery(n).hasClass('content-splitter') ) {
                    cm.setActive('splitter', true);
                }
                else{
                    cm.setActive('splitter', false);
                }
			});
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
	tinymce.PluginManager.add('splitter', tinymce.plugins.SplitterPlugin);
})();