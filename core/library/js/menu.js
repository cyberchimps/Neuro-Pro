jQuery(document).ready(function($){
		jQuery('.response-tabbed-wrap').tabs();
});

jQuery(document).ready(function($){
	$("ul").parent("li").addClass("parent"); 
});

jQuery(document).ready(function($) {
	$('#halfnav_menu .sub-menu').hide();
	$('#halfnav_menu > li > .sub-menu').append('<span class="nav_arrow"/>');
	$("#halfnav_menu ul").find(".sub-menu").prev().addClass("parent-menu");
	
	$("#halfnav_menu > li").hover( function() {
		$(this).children(".sub-menu").fadeIn("slow");
	}, function () {
		$(this).find(".sub-menu").hide();
	});
	
	$("#halfnav_menu > li > .sub-menu li").hover( function() {
		$(this).children(".sub-menu").slideDown("slow");
	}, function () {
	});
});

jQuery(document).ready(function($) {
	$('#nav_menu .children').hide();
	$('#nav_menu > li > .children').append('<span class="nav_arrow"/>');
	$("#nav_menu ul").find(".children").prev().addClass("parent-menu");
	
	$("#nav_menu > li").hover( function() {
		$(this).children(".children").fadeIn("slow");
	}, function () {
		$(this).find(".children").hide();
	});
	
	$("#nav_menu > li > .children li").hover( function() {
		$(this).children(".children").slideDown("slow");
	}, function () {
	});
});
