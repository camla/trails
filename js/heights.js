jQuery(document).ready(function($) {



	function setHeights() {
		var mapheight = $(window).height();
		
		var headertop = 0;

		if ($('#wpadminbar').length != 0) {
			headertop =+ $('#wpadminbar').height();
		} 

		$('.header').css({
	 		'position': 'fixed',
			'top' : headertop + 'px'		
		}); 

		var headerheight = $('.header').outerHeight();


		mapheight = mapheight - headertop;		
		mapheight = mapheight - headerheight;

		modalpadding = headertop + headerheight;

		
		$('#map').css({
	 		'height': mapheight +'px'
		});	
				
		$('.page').css({
	 		'margin-top': headerheight +'px',
		});


		if ($('.footer').length != 0) {
			var footerbottom =+ $('.footer').height();

			// Detect iOS
			// http://stackoverflow.com/questions/8348139/detect-ios-version-less-than-5-with-javascript

			if ( /(iPhone|iPod|iPad)/i.test(navigator.userAgent) ) { 
				// console.log('is iOS');

			    if (/CPU like Mac OS X/i.test(navigator.userAgent)) {  
					// console.log('ios 1');

			    } else if (/OS [2-4]_\d(_\d)? like Mac OS X/i.test(navigator.userAgent)) {
					// console.log('ios 2-4');

			    } else {
					// console.log('ios 5+');

					$('.page').css({
				 		'margin-bottom': footerbottom +'px',
					});

					$('.footer').css({
				 		'position': 'fixed',
				 		'bottom': '0',
				 		'left': '0',
					});

				}



			} else {
				// console.log('not iOS');	

				$('.page').css({
			 		'margin-bottom': footerbottom +'px',
				});

				$('.footer').css({
			 		'position': 'fixed',
			 		'bottom': '0',
			 		'left': '0',
				});

			}



		} 



	}

	$(window).resize(function() {
	  setHeights();
	});

	$(window).load(function() {
	  	setHeights();
	});


  	setHeights();


});

