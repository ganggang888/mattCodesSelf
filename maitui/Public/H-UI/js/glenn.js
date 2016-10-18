/**
 * 本JS基于layer1.9编写，使用前导入layer1.9/layer.js
 */


/**
 * 弹出一个IFRAME层
 * 参数：tp是弹窗类型，w窗口宽度，h窗口高度，t窗口标题，c内容URL地址
 * 
 */
function open_iframe_div(w,h,t,c){
	layer.open({
	    type: 2,
	    title: t,
	    shadeClose: false,
	    shade: 0.3,
	    area: [w,h],
	    content: c
	}); 
}

function open_simple_div(){
	
}