<?php
/**
 * Created by PhpStorm.
 * User: mariop
 * Date: 01-Dec-16
 * Time: 20:04
 */
require_once(dirname(__FILE__)."../../lib/php-listshine-api/ListShine_Api.php");
$connection = new ListShine_Api(get_option('api_key'));
?>
<div class="inner">
    <h3>Signup forms connected with contact lists</h3>
    <table style="width: 85%">
       <thead align="left">
            <th>
                Contact list
            </th>
            <th>
                Description
            </th>
            <th>
                Number of contacts
            </th>
            <th>
                Number of unsubscribed contacts
            </th>
       </thead>
        <tbody align="left">
        <?php $forms=$connection->getContactlistsWithForms();

         foreach($forms as $form){
             if(is_object($form)) {
                 echo "<tr>";
                 echo "<td>";
                 echo $form->name;
                 echo "</td>";
                 echo "<td>";
                 echo $form->description;
                 echo "</td>";
                 echo "<td>";
                 echo $form->entries_count;
                 echo "</td>";
                 echo "<td>";
                 echo $form->unsubscribed_count;
                 echo "</td>";
                 echo "<td>";
                 echo "<button style='background: mediumpurple; color: white; margin-bottom: 10px;' data-id='$form->uuid' class='btn get-shortcode'>Get Shortcode</button>";
                 echo "</td>";
                 echo "</tr>";
             }
         }
        //         ?>
        </tbody>
    </table>

</div>
