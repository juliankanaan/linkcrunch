

<?php /* Records outbound click data, then redirects to proper location */ ?>

<?

// ex URL ending: ?out=https://twitter.com&post=1234

$current_user = wp_get_current_user();
$post_author_id = get_post_field( 'post_author', $_GET['post'] );

if(!is_numeric($_GET['post'])) {

// if post parameter isnt a number, this is bad, -> bail

  wp_redirect( "https://linkcrun.ch/" );
  exit;

}

// check that URL post parameter exists, that post doesn't belong to the current user, and a redirect parameter exists in order to insert into DB
if ( ( $_GET['post'] ) && ( $current_user->ID != $post_author_id ) && ( $_GET['out'] )  )  {

// insert timestamped click into database

  global $wpdb;
  $timestamp = current_time('mysql');
  $ip        = $_SERVER['REMOTE_ADDR'];
  $post_id   = $_GET['post'];
  $wpdb->insert( 'wp_clicklog',
    array(
        'click_postid'     => $post_id,
        'click_ip'         => $ip,
        'click_time'  => $timestamp,
        'authorid'   => $post_author_id

    ),
    array(
        '%s',
        '%s',
        '%s',
        '%s'

    )
);


$outbound = $_GET['out'];


wp_redirect( "$outbound" );
exit;

} // end pre-DB insert check


// if any of the above conditions aren't met, just redirect w/o tabling

if ( $_GET['out'] ) {

    $outbound = $_GET['out'];

    wp_redirect( "$outbound" );
    exit;
} else {

// if no redirect parameter, send back to home

    wp_redirect( "https://linkcrun.ch/" );
    exit;
}
?>
