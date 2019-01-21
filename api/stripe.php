<?php

$current_user = wp_get_current_user();
$id           = $current_user->ID;
$stripe_id    = get_user_meta($id, 'stripecust_id', true );
$subscription_id     = get_user_meta( $id, 'subscription_id', true);

// check if paying user
if ( !empty($subscription_id) ) {

    // stripe API calls
    $customer       = \Stripe\Customer::retrieve( $stripe_id );
    $subscription   = $customer->subscriptions->retrieve( $subscription_id );

    //  cancel this customer's subscription

    $subscription->cancel( array("at_period_end" => true ) );


    // update Linkcrunch DB internally so they aren't a paid user

    update_user_meta( $id, 'subscription_id', '' );

}

?>


<div class="well">

  <? if (empty($subscription_id)) : ?>

    <div>We&#39;re sad to see you go!</div>
    <div>You&#39;ll have access to all the regular Linkcrunch features. You can return to your dashboard <a href="/dashboard">here</a>.</div>

  <? else : ?>

    <div>Whoops! Something went wrong when cancelling your subscription. Shoot us an email and we&#39;ll get your subscription cancelled manually ASAP.</div>

  <? endif; ?>

</div>
