<?php
/**
 * Created by PhpStorm.
 * User: porci
 * Date: 29-Nov-16
 * Time: 12:43
 */


$wp_listshine = new MPWP_Listshine_Signup();

$start_date_val =   strtotime("- 30 days");
$end_date_val   =   strtotime("now");
$start_date     =   date( "Y-m-d", $start_date_val);
$end_date       =   date( "Y-m-d", $end_date_val);

?>
<div class="wrap">
  <span class='opt-title'>
      <?php echo __( 'Listshine Dashboard', 'wp-listshine' ); ?>

      <?php

      $acces_token  = get_option( "access_code" );
      if( $acces_token ) {

          ?>
          <div id="col-container">
    <div class="metabox-holder">
      <div class="postbox" style="width:100%;">
          <div id="main-sortables" class="meta-box-sortables ui-sortable">
            <div class="postbox ">
              <div class="handlediv" title="Click to toggle"><br />
              </div>
              <span class="hndle">


              <div class="inside">
                <?php



                ?>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
          <?php
      }
      else{
          print(_e( 'You must be authenticate to see the Listshine Forms', 'wp-listshine' ));
      }
      ?>
</div>