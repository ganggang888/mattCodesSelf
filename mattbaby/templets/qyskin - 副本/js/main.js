
		
$(function() {
	$('.ico_menu').click(function() {
		$('.nav').toggle();
	})
	
	TouchSlide({ 
		slideCell:"#banner",
		titCell:".banner_x",
		mainCell:"ul", 
		effect:"leftLoop", 
		autoPage:"<span></span>",
		autoPlay:true
	});


	var system ={
		win : false,
		mac : false,
		xll : false
	};
	var p = navigator.platform;
	system.win = p.indexOf("Win") == 0;
	system.mac = p.indexOf("Mac") == 0;
	system.x11 = (p == "X11") || (p.indexOf("Linux") == 0);
	if(system.win||system.mac||system.xll){
	}else{
		$(window).bind('resize load', function(){$("body").css("zoom", $(window).width() / 640);}); 
	}
});