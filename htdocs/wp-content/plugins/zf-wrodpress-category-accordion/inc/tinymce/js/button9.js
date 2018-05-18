/**
 * @version    $Version$
 * @author     ZuFusion
 * @copyright  Copyright (C) 2014 ZuFusion. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */
(function($) {
    tinymce.PluginManager.add( 'zf_wp_category_accordion', function( editor, url ) {
        editor.addButton( 'zf_wp_category_accordion', {
            type: 'menubutton',
            text: 'Category/Page Accordion',
            icon: false,
            menu: [
                {
                    text: 'Basic',
                    value: '[zfwca title="" category_type="category"]',
                    onclick: function() {
                        editor.insertContent(this.value());
                    }
                },
                {
                    text: 'Several options',
                    value: '[zfwca title="" speed="slow" event_type="click" arrow_alignment="right" color_scheme="dark" category_type="category" order_by="name" order="asc" exclude="" include="" open_default="" limit="" show_count="false" hide_empty="false"  allow_parent_links="false" ripple_effect="true" toggle="false"]',
                    onclick: function() {
                        editor.insertContent(this.value());
                    }
                },
            ]
        });
    });

})(jQuery);