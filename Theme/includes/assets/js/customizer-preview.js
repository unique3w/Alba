/**
 * Customizer Preview Control
 */

(function ($) {

	// blogname
	wp.customize('blogname', function (value) {
		value.bind(function (newval) {
			$('.site-title a').html(newval);
		});
	});

	// blogdescription
	wp.customize('blogdescription', function (value) {
		value.bind(function (newval) {
			$('.site-description').html(newval);
		});
	});

	// alba_author_title
	wp.customize('alba_author_title', function (value) {
		value.bind(function (newval) {
			$('.author-name').html(newval);
		});
	});

	// alba_author_desc
	wp.customize('alba_author_desc', function (value) {
		value.bind(function (newval) {
			$('.author-desc').html(newval);
		});
	});

	// Body BG color
	wp.customize('background_color', function (value) {
		value.bind(function (newval) {
			$('body').css('background-color', newval);
		});
	});

})(jQuery);
