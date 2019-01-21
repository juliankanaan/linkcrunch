// js magic that previews how a button will look ** while preparing text for DB insert**


jQuery(function(){
    var $foo = jQuery('#button_name');
    var $bar = jQuery('#button_mock');
    function onChange() {
        $bar.val($foo.val());
    };
    jQuery('#button_name')
        .change(onChange)
        .keyup(onChange);
});
jQuery("#ig").click(function(){

    jQuery("#button_link").val("instagram.com/<? echo $user_name; ?>");
    jQuery("#button_name").val("Instagram");
    jQuery("#button_mock").val("Instagram");
    jQuery("#lowerform").show();

});
jQuery("#twitter").click(function(){

    jQuery("#button_link").val("twitter.com/<? echo $user_name; ?>");
    jQuery("#button_mock").val("Twitter");
      jQuery("#button_name").val("Twitter");
      jQuery("#lowerform").show();
});
jQuery("#pinterest").click(function(){

    jQuery("#button_link").val("pinterest.com/<? echo $user_name; ?>");
    jQuery("#button_mock").val("Pinterest");
      jQuery("#button_name").val("Pinterest");
      jQuery("#lowerform").show();
});
jQuery("#other").click(function(){

    jQuery("#button_link").attr("placeholder", "othersite.com/you");
    jQuery("#button_link").val("");
    jQuery("#button_mock").val("Button text");
      jQuery("#button_name").val("");
      jQuery("#lowerform").show();
});

jQuery("#facebook").click(function(){

    jQuery("#button_link").val("facebook.com/<? echo $user_name; ?>");
    jQuery("#button_mock").val("Facebook");
      jQuery("#button_name").val("Facebook");
      jQuery("#lowerform").show();
});
jQuery("#youtube").click(function(){

    jQuery("#button_link").val("youtube.com/<? echo $user_name; ?>");
    jQuery("#button_mock").val("YouTube");
      jQuery("#button_name").val("YouTube");
      jQuery("#lowerform").show();
});
jQuery("#snapchat").click(function(){

    jQuery("#button_link").val("snapchat.com/add/<? echo $user_name; ?>");
    jQuery("#button_mock").val("Snapchat");
      jQuery("#button_name").val("Snapchat");
      jQuery("#lowerform").show();
});
jQuery("#yelp").click(function(){

    jQuery("#button_link").val("yelp.com/biz/<? echo $user_name; ?>");
    jQuery("#button_mock").val("Yelp");
      jQuery("#button_name").val("Yelp");
      jQuery("#lowerform").show();
});
