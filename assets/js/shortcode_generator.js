/**
 * Created by mariop on 1/02/17.
 */
$(document).ready(function () {

    $(".get-shortcode").on("click",function(e){
        $(e.target).popover({
            "content": "Shortcode is: [listshine_form id="+$(e.target).data("id")+"], copy paste this to the page you want!",
            "placement" : "top",
        });
        $(e.target).popover("show");
    });

});