jQuery(function () {

    // TinyNav.js 1
	jQuery('#menu-main-menu').tinyNav({});	  
	jQuery('#menu-testing-menu').tinyNav({});
	  
	jQuery('#myTab a:last').tab('show'); 
	jQuery('#myTab a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	})

});

if (jQuery(window).width() > 800) tinyscrollH();

function tinyscrollH(){
    jQuery('#scrollbar1 .viewport').height(jQuery(window).height()-100);
    jQuery('#scrollbar1 .scrollbar').height(jQuery(window).height()-100);
    jQuery('#scrollbar1').tinyscrollbar();
}