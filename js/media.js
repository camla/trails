jQuery(document).ready(function($) {

	$(window).load(function() {

	// Masonry
	var $container = $('.masonry');

	$container.imagesLoaded( function(){
	  $container.masonry({
	    itemSelector : 'img'
	  });
	});





	$('audio').mediaelementplayer({
		audioWidth: 280
		});

	});
	
	


});