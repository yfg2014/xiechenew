requirejs.config({
	baseUrl: 'js/libs',
    paths: {
    	apps : "../apps",
    	conf : "../conf"
    }
});

require(["js/libs/jquery"), function($){
	$( document ).on( "mobileinit",
		// Set up the "mobileinit" handler before requiring jQuery Mobile's module
		function() {
			// Prevents all anchor click handling including the addition of active button state and alternate link bluring.
			$.mobile.linkBindingEnabled = false;

			// Disabling this will prevent jQuery Mobile from handling hash changes
			$.mobile.hashListeningEnabled = false;
		}
	)

	require( [ "js/libs/jquery.mobile-1.4.2.min" ], function() {
		 $( document ).on("pageshow", "#ic-list", function( event ) {
		  // alert( "This page was just enhanced by jQuery Mobile!" );
		  $("#ic-list .banner-con").empty()
		});
	});
   
}