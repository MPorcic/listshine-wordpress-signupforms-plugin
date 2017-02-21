<?php
require_once dirname(__FILE__)."/../functions.php";
?>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        try{
        tinymce.on('SetupEditor', function (editor) {
            editor.on('init',function(){
                var button = this.buttons['addlistshineform'];
                var obj = <?php echo json_encode(contactlists()); ?>;
                var i = 0;
                var eventMap = {};
                $.each(obj, function(index, form){
                    if(form['name']!=null) {
                        eventMap[form['name']] = i;
                        i++;
                        button.menu.push({
                            text: form['name'],
                            onclick: function () {
                                var string = "[listshine_form id= " + form['uuid'] +"]";
                                editor.insertContent(string);
                            }
                        });
                    }
                });
            });
        });
            } catch (e){
        }
    });
</script>