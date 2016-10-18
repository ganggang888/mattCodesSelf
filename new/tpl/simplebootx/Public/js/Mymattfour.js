$(document).ready(function(){
				//To switch directions up/down and left/right just place a "-" in front of the top/left attribute
				//Vertical Sliding
				//Full Caption Sliding (Hidden to Visible)

				$('.boxgrid.captionfull').hover(function(){
					$(".cover", this).stop().animate({top:'400px'},{queue:false,duration:160});
				}, function() {
					$(".cover", this).stop().animate({top:'-0px'},{queue:false,duration:160});
				});
				//Caption Sliding (Partially Hidden to Visible)

			});


