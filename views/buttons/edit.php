
<?php

// edit a button the user previously made ( ex url params: edit?post=1234 )

// start loop user's buttons
$query = new WP_Query( array( 'post_type' => 'button', 'posts_per_page' => '-1' ) );

if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();

      if ( isset( $_GET['post'] ) ) {

          if ( $_GET['post'] == $post->ID ) {

      	         $oldbutton_link = get_post_meta(get_the_ID(), 'button_link', true);
                 $oldbutton_name = get_post_meta(get_the_ID(), 'button_name',  true);

          }
      }

endwhile; endif; // end loop
wp_reset_query();



// begin form handling

$haserror = false;

// if <form> was submitted, nonce was passed & verified
if ( isset( $_POST['submitted'] ) && isset( $_POST['post_nonce_field'] ) && wp_verify_nonce( $_POST['post_nonce_field'], 'post_nonce' ) ) {

  // sanitize the inputs

  $button_link = esc_url( $_POST['button_link'] );
  $button_name  = sanitize_text_field( $_POST['button_name'] );

  if ( empty( $_POST['button_name'] )) {

          $haserror = true;

      }
  if ( empty( $_POST['button_link'] )) {

  		        $haserror = true;

  		    }

  // build array for DB
  $post_information = array(
      'ID' 	    => $currentbtn,
  		'post_title'    => 'button',
  	  'post_status'   => 'Publish',
  	  'post_content'  => 'content',
  	  'post_type'     => 'button'

  );

  // if no errors
  if ( $haserror !== true ) {

    $post_id = wp_update_post( $post_information );
    update_post_meta($post_id, 'button_name', $button_name);
    update_post_meta($post_id, 'button_link',  $button_link);

    wp_redirect( "https://linkcrun.ch/dashboard/views/" );
  }
}

// end form handling 
?>

<h3>Edit Link</h3>

  <div class="well" style="text-align:center;">

  <input placeholder="<? echo $oldbutton_name; ?>" id="button_mock" class="emailbutton">

    <form method="post" id="primaryPostForm" action="">
        <input type="text" id="button_name" placeholder="Button Text" name="button_name" value="<? echo $oldbutton_name; ?>" required>
        <input type="text" id="button_link" placeholder="instagram.com/you" name="button_link" value="<? echo $oldbutton_link; ?>" required>


        <input type="hidden" id="submitted" name="submitted" value="true"/>
        <?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>
        <input class="emailbutton" type="submit" name="submit" value="Save"/>
    </form>
  </div>
</div>
