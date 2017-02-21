/**
 * Created by mariop on 2/02/17.
 */
(function() {
    tinymce.create('tinymce.plugins.Listshine', {

        init : function(ed, url) {
            ed.addButton('addlistshineform', {
                type: 'menubutton',
                title : 'Add a ListShine form',
                cmd : 'listshine',
                image : url+"/../img/listshine-icon.png",
                menu :[]
            });
        },


        createControl : function(n, cm) {
            return null;
        },

        
        getInfo : function() {

        }
    });

    // Register plugin
    tinymce.PluginManager.add( 'listshine', tinymce.plugins.Listshine );
})();