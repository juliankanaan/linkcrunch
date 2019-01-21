
<?php

// add a button that user created to DB

$haserror = false;

// if <form> was submitted, passed a nonce & we verified the nonce
if ( isset( $_POST['submitted'] ) && isset( $_POST['post_nonce_field'] ) && wp_verify_nonce( $_POST['post_nonce_field'], 'post_nonce' ) ) {

    // if the button_link field was empty, error
    if ( empty( $_POST['button_link'] )) {

        $haserror = true;

    }

    // if the button_name field was empty, error
		if ( empty( $_POST['button_name'] )) {

        $haserror = true;

    }

    // sanitize inputs

    $button_name = sanitize_text_field( $_POST['button_name'] );
    $button_link  = esc_url( $_POST['button_link'] );
    $phone  = $_POST['phone'];
    $address  = $_POST['address'];

    // prepare post array for DB
      $my_post = array(
        'post_title'    => 'button',
        'post_status'   => 'Publish',
        'post_content'  => 'content',
        'post_type'     => 'button'


);
if ( $haserror !== true ) {


      // Insert the post into the database
      $post_id = wp_insert_post( $my_post, true );
      // affix custom meta to post from fields
      add_post_meta($post_id, 'button_link', $button_link);
      add_post_meta($post_id, 'button_name',  $button_name);

}
}
// redirect if DB insert was succesful and no errors
if ( ( $post_id ) && ($haserror !== true ) ) {


        wp_redirect( "https://linkcrun.ch/dashboard/views/" );
        exit;
}
?>

<!-- Start Markup -->

<h3 style="text-align: center;">Create Link</h3>

<div id="addwrap" >

<div class="tip" style="font-size: 16px;color: darkgray;">Tap a social icon below or the <strong>plus icon</strong> to add a different site.</div>

<div  class="socialwrap">


  <div id="ig">
    <i style="background: linear-gradient(to right top, rgba(255, 82, 99, 0.9) 10%, rgba(255, 115, 129, 0.9) 65%, rgba(252, 189, 1, 0.9) 125%);" class="fa fa-instagram icon"></i>
  </div>
  <div id="twitter">
    <i style="background: #62caec;" class="fa fa-twitter icon"></i>
  </div>
  <div id="pinterest">
    <i class="fa fa-pinterest-p icon"></i>
  </div>
  <div  id="yelp">
    <i style="background: #d3382e;" class="fa fa-yelp icon"></i>
  </div>



</div>
<div style="margin-bottom: 30px;" class="socialwrap">
  <div id="facebook">
    <i style="background: #4267b2;" class="fa fa-facebook icon"></i>
  </div>
  <div id="youtube">
    <i style="background: #e6574c;" class="fa fa-youtube icon"></i>
  </div>
  <div id="snapchat">
    <i style="" class="fa fa-snapchat-ghost icon"></i>
  </div>
  <div id="other">
    <i style="background: darkgrey;" class="fa fa-plus icon"></i>
  </div>



</div>

<div style="display: none;" id="lowerform">

<input style="display: none; background: #24b47e; color: white;" value="Start typing below..." id="button_mock" class="emailbutton" style="margin-bottom: 30px;">


<form method="post" id="primaryPostForm" action="">

    <h4 style="text-align:left;">Button text</h4>
    <input type="text" id="button_name" placeholder="Tap to add button text" name="button_name" value="" required>
    <h4 style="text-align:left;">Button link</h4>
    <input type="text" id="button_link" placeholder="instagram.com/you" name="button_link" value="" required>



    <input type="hidden" id="submitted" name="submitted" value="true"/>
    <?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>
    <input style="width: initial; background: #4261a2;" class="emailbutton" type="submit" name="submit" value="Save"/>
</form>
</div>
</div>
<a href="/dashboard" style="float: right;">Back to dashboard</a>
</div>
