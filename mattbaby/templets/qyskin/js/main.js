
		
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

});