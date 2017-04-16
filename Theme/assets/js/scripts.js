jQuery(document).ready(function(jQuery) {
	jQuery('.alba-btt').click(function () {
		jQuery('html, body').animate({scrollTop: 0}, 1500);
		return false;
	});

  jQuery('.nav-toggle').on("click", function (event) {
  		jQuery('.alba-search').slideUp();
	    jQuery('.alba-menu').slideToggle({
	      direction: "up"
	    }, 300);
  }); // end click

    jQuery('.search-btn').on("click", function (event) {
      	jQuery('.alba-menu').slideUp();
  	    jQuery('.alba-search').slideToggle({
	      direction: "up"
	    }, 300);
  }); // end click
});

