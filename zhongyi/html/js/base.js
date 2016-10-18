$(document).ready(function(){
	
});

//获取上传文件路径
function getFilePath(obj){
	var $oTxt = $(obj).next(".fake_file").find(".file_txt");
	if($oTxt.length){
		$oTxt[0].value = obj.value.replace(/.*\\/i,'');
	}else{
		document.getElementById("file_txt").value=obj.value.replace(/.*\\/i,'');
	} 	
}

//
;(function($){
	$.fn.extend({
		slide:function(options){
			var defaults = {
				prev:".prev",
				next:".next",
				ul:"ul"
			}

			var opt = $.extend({},defaults,options);

			return this.each(function(){
				var $this = $(this);
				var $prev = $this.find(opt.prev);
				var $next = $this.find(opt.next);
				var $ul = $this.find(opt.ul);
				var $li = $ul.find("li");
				$li.width($li.width());
				var liw = $li.outerWidth();
				var width =  liw* $li.length;
				$ul.width(width);

				$prev.click(function(){
					var marLeft = parseInt($ul.css("margin-left"));
					if(width+marLeft <= liw || $ul.is(":animated")){
						return false;
					}
					var newMarLeft = marLeft - liw;
					$ul.animate({"margin-left":newMarLeft+"px"},100);
					return false;
				});

				$next.click(function(){
					var marLeft = parseInt($ul.css("margin-left"));
					if(marLeft == 0 || $ul.is(":animated")){
						return false;
					}
					var newMarLeft = marLeft + liw;
					$ul.animate({"margin-left":newMarLeft+"px"},200);
					return false;
				});
			});
		}

	});
})(jQuery);

