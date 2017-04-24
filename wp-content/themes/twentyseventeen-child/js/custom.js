var ourLocation = window.location.href;
var controllerUrl = ( ourLocation.indexOf("benjamin400800.com") == -1 ) ? "/wp-content/themes/twentyseventeen-child/controllers/registration-controller.php" : "/doctors//wp-content/themes/twentyseventeen-child/controllers/registration-controller.php";

function sendFormData (formSubmitted) {
	jQuery.ajax({
	    url: controllerUrl,
	    type: "POST",
	    data: formSubmitted.serialize(), 
	    beforeSend: function(){
	    	console.log("before sending request")
	    },
	    success: function(data) {
	    	console.log(data)
	    	jQuery(".paypal-container").slideDown(800)
			//renderPayPalBtn ()
	    }
	});
}

function renderPayPalBtn () {
	paypal.Button.render({
	    
	    env: 'production', // Optional: specify 'production' environment

	    client: {
	        sandbox:    'AZnETT6Z2J_PVghn5W69O4MGJdVOv96XPGA0JzhBGDtGL9anUzq2jPvIj5W27_5jC60hMla64scMAJVf',
	        production: 'ARWrLg9684h8JseHdBWNbONelbzpGkGRbY6vNHUL-Ifa6CZWXChUUzc8Y-pnHvIoUB3k1OuPWcYpPz83'
	    },

	     style: {
            label: 'checkout',	// checkout || credit
            size:  'medium',    // tiny | small | medium
            shape: 'rect',      // pill | rect
            color: 'gold'       // gold | blue | silver
        },

	    payment: function() {
	    
	        var env    = this.props.env;
	        var client = this.props.client;
	    
	        return paypal.rest.payment.create(env, client, {
	            transactions: [
	                {
	                    amount: { total: '0.50', currency: 'ILS' }
	                }
	            ]
	        });
	    },

	    commit: true, // Optional: show a 'Pay Now' button in the checkout flow

	    onAuthorize: function(data, actions) {
	    
	        // Optional: display a confirmation page here
	    
	        return actions.payment.execute().then(function() {
	            location = "http://benjamin400800.com/doctors/wp-admin";
	        });
	    }

	}, '#paypal-button');
}

jQuery( document ).ready(function() {
	jQuery(".wpcf7").on('wpcf7:mailsent', function(event) {
		jQuery(".wpcf7").slideUp(800);
		sendFormData(jQuery(".wpcf7-form"));
		// jQuery(".paypal-container").slideDown(800)
		// renderPayPalBtn ()
		//location = 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=GLEFQQ8ZKQKT8';
	});

	console.log("nanana");
	var clock = jQuery('#flipclock').FlipClock(3600 * 24 * 3, {
		clockFace: 'DailyCounter',
		countdown: true,
		showSeconds: false
	});

});

