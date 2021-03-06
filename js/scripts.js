$(document).ready(function() {
	$('#comment_form').on('submit', function(event) {
		event.preventDefault();
		var form_data = $(this).serialize();
		$.ajax({
			url: "add_comment.php",
			method: "POST",
			data: form_data,
			dataType: "JSON",
			success: function(data) {
				if (data.error != '') {
					$('#comment_form')[0].reset();
					$('#comment_message').html(data.error);
				}
			}
		})
	});
	load_comment();

	function load_comment() {
		$.ajax({
			url: "fetch_comment.php",
			method: "POST",
			success: function(data) {
				$('#display_comment').html(data);
			}
		})
	}

		load_number();

	function load_number() {
		$.ajax({
			url: "number_comments.php",
			method: "POST",
			success: function(data) {
				$('#display-number').html(data);
			}
		})
	}

});

/*!
 * Start Bootstrap - Creative v6.0.0 (https://startbootstrap.com/themes/creative)
 * Copyright 2013-2020 Start Bootstrap
 * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-creative/blob/master/LICENSE)
 */
(function($) {
	"use strict"; // Start of use strict
	// Smooth scrolling using jQuery easing
	$('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				$('html, body').animate({
					scrollTop: (target.offset().top - 72)
				}, 1000, "easeInOutExpo");
				return false;
			}
		}
	});
	// Closes responsive menu when a scroll trigger link is clicked
	$('.js-scroll-trigger').click(function() {
		$('.navbar-collapse').collapse('hide');
	});
	// Activate scrollspy to add active class to navbar items on scroll
	$('body').scrollspy({
		target: '#mainNav',
		offset: 75
	});
	// Collapse Navbar
	var navbarCollapse = function() {
		if ($("#mainNav").offset().top > 100) {
			$("#mainNav").addClass("navbar-scrolled");
		} else {
			$("#mainNav").removeClass("navbar-scrolled");
		}
	};
	// Collapse now if page is not at top
	navbarCollapse();
	// Collapse the navbar when page is scrolled
	$(window).scroll(navbarCollapse);
})(jQuery); // End of use strict
