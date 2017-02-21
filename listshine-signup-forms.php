<?php

/*
Plugin Name: Listhine Signup Forms
Plugin URI: https://listshine.com
Description: A responsive and intuitive plugin for using your ListShine signup forms on your wordpress website!
Version: 1.0
Author: mariop
Author URI: https://github.com/MPorcic
License: GPLv2
*/
include "functions.php";

//Exit if accessed directly
if(! defined ("ABSPATH")){
    exit;
}

add_action('admin_menu', 'my_plugin_menu');

function my_plugin_menu() {
    add_menu_page('My ListShine SignupForm Plugin', 'Listshine Signup Forms', 'administrator', 'my-listshine-settings', 'my_plugin_settings_page', 'dashicons-admin-generic');
}

function my_plugin_settings_page() {
    require_once dirname(__FILE__) . '/lib/php-listshine-api/ListShine_Api.php';

    ?>
    <br>
    <div style=" border-radius:0;text-align: center; width: 100%; border-bottom: 3px solid black;" class="navbar"><a href="https://listshine.com" style="text-decoration: none; color: black;"><img class="img-rounded" src=<?php echo plugin_dir_url(__FILE__)."/assets/img/listshine-icon.png"; ?>><span style="font-size: 1.5em; position: relative; top: 3px;"> ListShine</span></a></div>

    <div class="wrap">
        <h2>Signup forms</h2>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <form method="post" action="options.php">
                        <?php settings_fields( 'listshine-api-group' ); ?>
                        <?php do_settings_sections( 'listshine-api-group' ); ?>
                        <table class="form-table">
                            <tr valign="top">
                                <th scope="row">Api key</th>
                                <td><input class="form-control" type="text" name="api_key" value="<?php echo esc_attr( get_option('api_key') ); ?>" /></td>
                            </tr>
                            
                        </table>

                        <?php submit_button(); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div>
        <?php
        echo get_option('signup_style');
        if(get_option('api_key')) {
            include dirname(__FILE__) . '/includes/signup_template.php';
        } else{
            echo "No api key yet! Please insert the api key we've provided you with to gain access to the signupforms!";
        } ?>
    </div>


    <?php

}
add_action( 'admin_init', 'my_plugin_settings' );
function my_plugin_settings() {
    register_setting( 'listshine-api-group', 'api_key' );
    if(get_option('api_key')) {
        include dirname(__FILE__) . '/includes/populate_button.php';
    }
}

add_action('init', 'listshine_button');
function listshine_button(){
    add_filter( "mce_external_plugins","listshine_add_button");
    add_filter("mce_buttons","listshine_register_button");
}

function listshine_add_button($button_array){
    $button_array['listshine'] = plugin_dir_url(__FILE__).'/assets/js/editor_btn.js';
    return $button_array;
}

function listshine_register_button($buttons){
    array_push( $buttons, 'addlistshineform');
    return $buttons;
}


add_shortcode('listshine_form', 'signup_test');
wp_enqueue_style('bootstrap', "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css");
wp_enqueue_script('jquery_scirpt', "https://code.jquery.com/jquery-1.12.4.min.js");
wp_enqueue_script('bootstrap_js', "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js");
wp_enqueue_script('script', plugin_dir_url(__FILE__).'/assets/js/shortcode_generator.js',array('jquery'));

?>