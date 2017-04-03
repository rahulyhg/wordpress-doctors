console.log("this is custom js")

jQuery( document ).ready(function() {
	jQuery(".wpcf7").on('wpcf7:mailsent', function(event){
		console.log("form sent")
		console.log( jQuery(this).find(".wpcf7-form").serialize() )
		//location = 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=GLEFQQ8ZKQKT8';
	});
});

// $.ajax({
//     url: "/templates/modules/mail.controller.php",        // Url to which the request is send
//     type: "POST",             // Type of request to be send, called as method
//     data: { ajax:'sendMail', name:name, email:email, phone:phone, firm:firm, note:note, lang:lang }, 
//     beforeSend: function(){
//     	if (msie > -1 || trident > -1) {
//     		$('.gi-loader.ie').addClass('show');
//     	} else {
//         	$('.gi-loader.not-ie').addClass('show');
//     	}
//     },
//     success: function(data)   // A function to be called if request succeeds
//     {
//         $('.gi-loader').removeClass('show');
//         if (data.trim() == '1') {
// 				//form submitted
// 			for (i = 0; i < fields.length; i++) {
// 				if (fields[i].type != 'submit'){
// 			    fields[i].value = '';
// 				}
// 			}
// 			$('#message').value = '';
// 			$('.msg-sent').addClass('reveal');
// 			setTimeout(function(){
// 			  $('.msg-sent').removeClass('reveal');
// 			}, 5000);
// 			} else {
// 				//form not submitted
// 				console.log(data);
// 			}
// 		}   
// });