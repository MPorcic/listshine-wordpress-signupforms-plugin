
------------------------------------------------------------------------

.:: INTRODUCTION ::.

This is an app that deals with subscribe/unsubscribe in ListShine mailing list system.


.:: DEPENDENCIES ::.

- PHP 5 or higher


.:: QUICK INSTALL ::.

1. Add the folder php-listshine-api to your main php project directory.
2. Acquire your API KEY from the Integration page on ListShine App.
3. Include with 'require_once("path_to/php-listshine-api/ListShine_Api.php");' in the .php file where you want to use the API

.:: FEATURES ::.
Adding subscribers also supports merge vars, the supported merge vars are:
- firstname
- lastname
- company
- website
- phone
- city
- country
- custom
- custom2
- custom3
- custom4

.:: EXAMPLES & DOCUMENTATION ::.
Note: In the following examples a $list_id is required. That is the UUID of the contactlist you want to add the users to.
You can get the UUID's of those contactlists from your account in the ListShine App.

1. Subscribing users
   <?php
        require_once("/php-listshine-api/ListShine_Api.php");
        $connection = new ListShine_Api($API_KEY);
        $connection-> subscribeUser($list_id, $email, array("firstname"=>"test"));
   ?>

1.1. Subscribing users with particular merge vars (in this example: -firstname, -company, -custom2, -phone)
    <?php
            require_once("/php-listshine-api/ListShine_Api.php");
            $connection = new ListShine_Api($API_KEY);
            $connection-> subscribeUser($list_id, $email, array("firstname"=>"test","company"=>"examlecompany","custom2"=>"custom2text","phone"=>"12314125"));
    ?>

2. Unsubscribing users
   <?php
        require_once("/php-listshine-api/ListShine_Api.php");
        $connection = new ListShine_Api($API_KEY);
        $connection-> unsubscribeUser($list_id, $email);
   ?>

3. Getting only contactlists that have a signupform associated with them
   <?php
        require_once("/php-listshine-api/ListShine_Api.php");
        $connection = new ListShine_Api($API_KEY);
        $contactlists = $connection-> getContactlistsWithForms();
        print_r($contactlists); //this will print out the array containing all of the contactlists that have signupforms
   ?>


.:: SUPPORT ::.
If you have any further questions on this integration you can contact us at hello@listshine.com
