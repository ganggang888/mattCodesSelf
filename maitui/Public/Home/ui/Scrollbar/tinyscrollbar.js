/*! tinyscrollbar - v2.4.2 - 2015-08-12
 * http://www.baijs.com/tinyscrollbar
 *
 * Copyright (c) 2015 Maarten Baijs <wieringen@gmail.com>;
 * Licensed under the MIT license */

!function(a,b){"use strict";function c(){for(var a=1;a<arguments.length;a++)for(var b in arguments[a])arguments[a].hasOwnProperty(b)&&(arguments[0][b]=arguments[a][b]);return arguments[0]}function d(d,g){function h(){return q.update(),j(),q}function i(){w.style[C]=q.thumbPosition+"px",t.style[C]=-q.contentPosition+"px",u.style[B]=q.trackSize+"px",v.style[B]=q.trackSize+"px",w.style[B]=q.thumbSize+"px"}function j(){z?s.ontouchstart=function(a){1===a.touches.length&&(m(a.touches[0]),a.stopPropagation())}:(w.onmousedown=function(a){a.stopPropagation(),m(a)},v.onmousedown=function(a){m(a,!0)}),a.addEventListener("resize",function(){q.update("relative")},!0),q.options.wheel&&a.addEventListener?d.addEventListener(A,n,!1):q.options.wheel&&(d.onmousewheel=n)}function k(){return q.contentPosition>0}function l(){return q.contentPosition<=q.contentSize-q.viewportSize-5}function m(a,b){if(q.hasContentToSroll){{C.charAt(0).toUpperCase()+C.slice(1).toLowerCase()}x=b?w.getBoundingClientRect()[C]:y?a.clientX:a.clientY,r.className+=" noSelect",z?(document.ontouchmove=function(a){(q.options.touchLock||k()&&l())&&a.preventDefault(),o(a.touches[0])},document.ontouchend=p):(document.onmousemove=o,document.onmouseup=w.onmouseup=p),o(a)}}function n(b){if(q.hasContentToSroll){{var c=b||a.event,e=-(c.deltaY||c.detail||-1/3*c.wheelDelta)/40;1===c.deltaMode?q.options.wheelSpeed:1}q.contentPosition-=e*q.options.wheelSpeed,q.contentPosition=Math.min(q.contentSize-q.viewportSize,Math.max(0,q.contentPosition)),q.thumbPosition=q.contentPosition/q.trackRatio,d.dispatchEvent(D),w.style[C]=q.thumbPosition+"px",t.style[C]=-q.contentPosition+"px",(q.options.wheelLock||k()&&l())&&c.preventDefault()}}function o(a){if(q.hasContentToSroll){var b=y?a.clientX:a.clientY,c=z?x-b:b-x,e=Math.min(q.trackSize-q.thumbSize,Math.max(0,q.thumbPosition+c));q.contentPosition=e*q.trackRatio,d.dispatchEvent(D),w.style[C]=e+"px",t.style[C]=-q.contentPosition+"px"}}function p(){q.thumbPosition=parseInt(w.style[C],10)||0,r.className=r.className.replace(" noSelect",""),document.onmousemove=document.onmouseup=null,w.onmouseup=null,v.onmouseup=null,document.ontouchmove=document.ontouchend=null}this.options=c({},f,g),this._defaults=f,this._name=e;var q=this,r=document.querySelectorAll("body")[0],s=d.querySelectorAll(".viewport")[0],t=d.querySelectorAll(".overview")[0],u=d.querySelectorAll(".scrollbar")[0],v=u.querySelectorAll(".track")[0],w=u.querySelectorAll(".thumb")[0],x=0,y="x"===this.options.axis,z="ontouchstart"in document.documentElement,A="onwheel"in document.createElement("div")?"wheel":document.onmousewheel!==b?"mousewheel":"DOMMouseScroll",B=y?"width":"height",C=y?"left":"top",D=document.createEvent("HTMLEvents");return D.initEvent("move",!0,!0),this.contentPosition=0,this.viewportSize=0,this.contentSize=0,this.contentRatio=0,this.trackSize=0,this.trackRatio=0,this.thumbSize=0,this.thumbPosition=0,this.hasContentToSroll=!1,this.update=function(a){var b=B.charAt(0).toUpperCase()+B.slice(1).toLowerCase(),c=u.className;switch(this.viewportSize=s["offset"+b],this.contentSize=t["scroll"+b],this.contentRatio=this.viewportSize/this.contentSize,this.trackSize=this.options.trackSize||this.viewportSize,this.thumbSize=Math.min(this.trackSize,Math.max(this.options.thumbSizeMin,this.options.thumbSize||this.trackSize*this.contentRatio)),this.trackRatio=(this.contentSize-this.viewportSize)/(this.trackSize-this.thumbSize),this.hasContentToSroll=this.contentRatio<1,u.className=this.hasContentToSroll?c.replace(/disable/g,""):c.replace(/ disable/g,"")+" disable",a){case"bottom":this.contentPosition=Math.max(this.contentSize-this.viewportSize,0);break;case"relative":this.contentPosition=Math.min(Math.max(this.contentSize-this.viewportSize,0),Math.max(0,this.contentPosition));break;default:this.contentPosition=parseInt(a,10)||0}return this.thumbPosition=q.contentPosition/q.trackRatio,i(),q},h()}var e="tinyscrollbar",f={axis:"y",wheel:!0,wheelSpeed:40,wheelLock:!0,touchLock:!0,trackSize:!1,thumbSize:!1,thumbSizeMin:20},g=function(a,b){return new d(a,b)};"function"==typeof define&&define.amd?define(function(){return g}):"object"==typeof module&&module.exports?module.exports=g:a.tinyscrollbar=g}(window);