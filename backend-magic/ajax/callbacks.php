<?php

// handles backend functions

// Ajax callback for reactions
function wave() {

  // be sure request is legitimate via nonce

  if ( !wp_verify_nonce( $_REQUEST['nonce'], "wave_nonce")) {
        exit("Whoops. There was a security issue with that request.");
     }

     // get vars ready for DB
            global $wpdb;

              $userid  = $_REQUEST['user_id'];
              $table_name     = 'wp_waves';
              $timestamp = current_time('mysql');
              $ip        = $_REQUEST['ip'];


              // check if record exists
          $row = $wpdb->get_row("SELECT * FROM $table_name WHERE wave_ip = '$ip' AND user_id = $userid");



              // if it doesnt, add the row
          if (!$row){
          $query = $wpdb->insert( 'wp_waves',
                array(
                    'user_id'      => $userid,
                    'wave_ip'         => $ip,
                    'wave_time'  => $timestamp


                ),
                array(
                    '%s',
                    '%s',
                    '%s'


                )
            );

            // check DB for existing # of reactions

            $rowcount = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE user_id = $userid");

          } else {

          $rowcount = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE user_id = $userid");
          }

      // failure

     if($query === false) {
        $result['type'] = "error";
        // $result['user_id'] = $userid;

     }

     // success
     else {
        $result['type'] = "success";
        // $result['user_id'] = $userid;
        $result['count'] = $rowcount;
     }
     if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $result = json_encode($result);
        echo $result;
     }
     else {
        header("Location: ".$_SERVER["HTTP_REFERER"]);
     }


     die();


  }

// heart emoji AJAX
function love() {

  // be sure request is legitimate via nonce

  if ( !wp_verify_nonce( $_REQUEST['nonce'], "wave_nonce")) {
        exit("Whoops. There was a security issue with that request.");
     }


     // get vars ready for DB

            global $wpdb;

              $userid  = $_REQUEST['user_id'];
              $table_name     = 'wp_loves';
              $timestamp = current_time('mysql');
              $ip        = $_REQUEST['ip'];


              // check if record exists
          $row = $wpdb->get_row("SELECT * FROM $table_name WHERE love_ip = '$ip' AND user_id = $userid");



              // if it doesnt, add the row
          if (!$row){
          $query = $wpdb->insert( 'wp_loves',
                array(
                    'user_id'      => $userid,
                    'love_ip'         => $ip,
                    'love_time'  => $timestamp


                ),
                array(
                    '%s',
                    '%s',
                    '%s'


                )
            );

            // return count from DB
            $lovecount = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE user_id = $userid");


      // failure
     if($query === false) {
        $result['type'] = "error";
        // $result['user_id'] = $userid;

     }

     // success
     else {
        $result['type'] = "success";
      //   $result['user_id'] = $userid;
        $result['count'] = $lovecount;
     }
     if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $result = json_encode($result);
        echo $result;
     }
     else {
        header("Location: ".$_SERVER["HTTP_REFERER"]);
     }


     die();


  }

  function emailcatch(){


  $email = $_REQUEST['email'];
  $userid = $_REQUEST['user_id'];
  $nonce  = $_REQUEST['nonce'];
  $timestamp = current_time('mysql');
  $country = $_REQUEST['country'];
  // bail if nonce not verified
  	
  

  if (!is_email($email)) {
  $result['type'] = "error";
  $result['message'] = "This email is not correct.";
 
  

  } else {
  
  $email = sanitize_email($_REQUEST['email']);
  
  global $wpdb;
        // check if record exists
          $row = $wpdb->get_row("SELECT * FROM wp_emaillog WHERE email = '$email' AND userid = $userid");
  
  if (!$row) {
  // Insert the post into the database
  
  $addquery = $wpdb->insert( 'wp_emaillog',

  array(
          'email'    => $email,
          'userid'   => $userid,
          'email_time'  => $timestamp,
          'email_country' => $country



      ),
      array(
          '%s',
          '%s',
          '%s',
          '%s'

      )
  );
  
  } 
  




if(!$addquery)  {
   $result['type'] = "error";
   $result['message'] = "Whoops, something went wrong.";
   $result['email'] = "$email";
   // $result['userid'] = "$userid";
   $result['email_country'] = "$country";
	
}
else {
   $result['type'] = "success";

}
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
   $result = json_encode($result);
   echo $result;
}
else {
   header("Location: ".$_SERVER["HTTP_REFERER"]);
}


die();




}
