<?php

global $current_user;
$current_user_id = $current_user->ID;

// check URL for delete params
$post_author_id = get_post_field( 'post_author', $_GET['delete'] );
      // check that the current user is manipulating only their own links

      if ( $current_user_id == $post_author_id ) {

            // if delete is set and the post type is a button and nonce is checked

            if ( isset( $_GET['delete'] ) && ( get_post_type( $_GET['delete'] ) == 'button' ) && ( wp_verify_nonce($_GET['_wpnonce'] ))  ) {


                       wp_delete_post( $_GET['delete'], true );
                       echo '<div class="alert alert-success" role="alert">Deleted.</div>';

            }
      }
// run DB query for all user's buttons
$query = new WP_Query( array(
	    'post_type' => 'button',
	    'orderby'=>'title',
	    'order'=>'ASC',
	    'author'	=> $current_user->ID,
	    'posts_per_page' => '7',
	    'post_status' => 'publish'

    )
);
?>


<h3>Your links</h3>

    <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

    <?

    // for each button in loop, look up some stuff (& do some HTML markup)
    $button_link = get_post_meta(get_the_ID(), 'button_link', true);
    $button_name = get_post_meta(get_the_ID(), 'button_name',  true);
    $edit_post   = add_query_arg( 'post', get_the_ID(), get_permalink( get_page_by_title( 'Edit Link' ) ) );
    // append a delete parameter to the URL for a delete button
    $delete_post = wp_nonce_url(add_query_arg( 'delete', get_the_ID() ));

    // append http:// if needed
    if (false === strpos($button_link, '://')) {
        $button_link= 'http://' . $button_link;
    }
    ?>
	<div class="well">
    <button onclick="window.location.href='<? echo $button_link; ?>'" class="emailbutton"><? echo $button_name; ?></button>
  	<div class="wellactions">
      <span onclick="window.location.href='/<? echo $edit_post; ?>'" style="padding-right: 20px;" class="glyphicon glyphicon-cog"></span></a> <span onclick="window.location.href='<? echo $delete_post; ?>'" class="glyphicon glyphicon-minus-sign"></span></a>
  	</div>
	</div>



    <?  endwhile; endif; ?>

