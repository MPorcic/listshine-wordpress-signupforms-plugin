<?php
/**
 * Created by PhpStorm.
 * User: mariop
 * Date: 1/02/17
 * Time: 2:11 PM
 */

include dirname(__FILE__). "/lib/php-listshine-api/ListShine_Api.php";

function signup_test( $atts ){
    $connection = new ListShine_Api(get_option("api_key"));
    $contactlists = $connection->getContactlistsWithForms();
    $forms = array();
    foreach($contactlists as $contactlist){
        if($contactlist->uuid == $atts['id']){
            return $contactlist->signup_form_content;
        }
    }
    return "";
}
function contactlists(){
    $connection = new ListShine_Api(get_option("api_key"));
    $contactlists = $connection->getContactlistsWithForms();
    return $contactlists;
}
?>