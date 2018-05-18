(function() {
    tinymce.create('tinymce.plugins.zf_wp_category_accordion', {
        url : '',

        init : function(ed, url) {

            this.url = url;
        },


        createControl : function(n, cm) {

            if(n=="zf_wp_category_accordion") {

                var btn = cm.createSplitButton('zf_wp_category_accordion', {
                    title: "Category/Page Accordion",
                    icons: false
                });

                var a = this;
                btn.onRenderMenu.add(function ( c, b )
                {
                    a.addShortcode( b, "Basic", "[zfwca title=\"\" category_type=\"category\"]", 'zfwca' );
                    a.addShortcode( b, "Several options", "[zfwca title=\"\" speed=\"slow\" event_type=\"click\" arrow_alignment=\"right\" color_scheme=\"dark\" category_type=\"category\" order_by=\"name\" order=\"asc\" exclude=\"\" include=\"\" open_default=\"\" limit=\"\" show_count=\"false\" hide_empty=\"false\"  allow_parent_links=\"false\" ripple_effect=\"true\" toggle=\"false\"]", 'zfwca' );
                });

                return btn;

            }

            return null;
        },

        addShortcode: function ( ed, title, sc) {
            ed.add({
                title: title,
                onclick: function () {
                    tinyMCE.activeEditor.execCommand( "mceInsertContent", false, sc )
                },
                icon : false
            })
        },

    });

    // Register plugin
    tinymce.PluginManager.add( 'zf_wp_category_accordion', tinymce.plugins.zf_wp_category_accordion );
})();