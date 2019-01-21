jQuery(document).ready( function() {

   jQuery("#wave").click( function(e) {
      e.preventDefault();
      user_id = jQuery(this).attr("data-user-id")
      nonce = jQuery(this).attr("data-nonce")
      ip    = jQuery(this).attr("data-ip")

      // change the bg color upon click
      jQuery("#wave").css("background-color","#67cf9a")



      jQuery.ajax({
         type : "post",
         dataType : "json",
         url : myAjax.ajaxurl,
         data : {action: "wave", user_id : user_id, nonce: nonce, ip : ip},
         success: function(response) {
            if(response.type == "success") {
               jQuery("#wavecount").html(response.count)
               jQuery("#wave").css("background-color","#67cf9a")
            }
            else {
               alert("Something failed on our end")
            }
         }
      })

   });
   jQuery("#love").click( function(e) {
      e.preventDefault();
      user_id = jQuery(this).attr("data-user-id")
      nonce = jQuery(this).attr("data-nonce")
      ip    = jQuery(this).attr("data-ip")

      // change the bg color upon click
      jQuery("#love").css("background-color","#67cf9a")



      jQuery.ajax({
         type : "post",
         dataType : "json",
         url : myAjax.ajaxurl,
         data : {action: "love", user_id : user_id, nonce: nonce, ip : ip},
         success: function(response) {
            if(response.type == "success") {
               jQuery("#lovecount").html(response.count)
               jQuery("#love").css("background-color","#67cf9a")
            }
            else {
               alert("Something failed on our end")
            }
         }
      })

   });
});
