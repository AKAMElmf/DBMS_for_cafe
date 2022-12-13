// Responsive anchor functions
$(document).ready(function() {
	$('a[rel="anchor-select"]').click(function() {
		$('html, body').animate({
			scrollTop: $($.attr(this, 'href')).offset().top
		}, 500); //Scroll within 500ms
		return false;
	});
});
// Scroll back to top
$(document).ready(function () {
		$(window).scroll(function () {
				if ($(this).scrollTop() > 250) {
						$('.menu-btn-backtotop').show();
				} else {
						$('.menu-btn-backtotop').hide();
				}
		});
		$('.menu-btn-backtotop').click(function () {
				$("html, body").animate({
						scrollTop: 0
				}, 400);
				return false;
		});
});

// Scroll to myCarousel
$(document).ready(function () {
	$('.build-btn-button').click(function () {
			$("html, body").animate({
				scrollTop: $("#myCarousel").offset().top - ( $(window).height() - $(this).outerHeight(true) ) / 4
			}, 400);
			return false;
	});
});


