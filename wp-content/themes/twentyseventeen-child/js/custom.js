var ourLocation = window.location.href;
var controllerUrl = ( ourLocation.indexOf("benjamin400800.com") == -1 ) ? "/wp-content/themes/twentyseventeen-child/controllers/registration-controller.php" : "/doctors//wp-content/themes/twentyseventeen-child/controllers/registration-controller.php";

jQuery( document ).ready(function() {
	jQuery(".wpcf7").on('wpcf7:mailsent', function(event){
		jQuery.ajax({
		    url: controllerUrl,
		    type: "POST",
		    data: jQuery(this).find(".wpcf7-form").serialize(), 
		    beforeSend: function(){
		    	console.log("before sending request")
		    },
		    success: function(data) {
		        console.log(data)
		    } 
		});
		console.log("form sent")
		//location = 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=GLEFQQ8ZKQKT8';
	});
});
