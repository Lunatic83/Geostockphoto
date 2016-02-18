/*
 * http://www.GeoStockPhoto.com
 * GRAPHIC BY SUAPA.com
 */

(function(a){a.fn.extend({flexslider:function(t){var m={animation:"fade",slideshow:true,slideshowSpeed:7000,animationDuration:500,directionNav:true,controlNav:true,keyboardNav:true,touchSwipe:true,prevText:"Previous",nextText:"Next",randomize:false,slideToStart:0,pauseOnAction:true,pauseOnHover:false,controlsContainer:"",manualControls:""};var t=a.extend(m,t),e=this,c=a(".slides",e),b=a(".slides li",e),g=b.length,l=false,p=t.slideToStart,d=("ontouchstart" in document.documentElement)?"touchstart":"click";if(t.randomize&&g>1){b.sort(function(){return(Math.round(Math.random())-0.5)});c.empty().append(b)}if(t.animation.toLowerCase()=="slide"&&g>1){e.css({overflow:"hidden"});c.append(b.filter(":first").clone().addClass("clone")).prepend(b.filter(":last").clone().addClass("clone"));c.width(((g+2)*e.width())+2000);var h=a(".slides li",e);setTimeout(function(){h.width(e.width()).css({"float":"left"}).show()},100);c.css({marginLeft:(-1*(p+1))*e.width()+"px"})}else{b.hide().eq(p).fadeIn(400)}function r(i){if(!l){l=true;if(t.animation.toLowerCase()=="slide"){if(p==0&&i==g-1){c.animate({marginLeft:"0px"},t.animationDuration,function(){c.css({marginLeft:(-1*g)*b.filter(":first").width()+"px"});l=false;p=i})}else{if(p==g-1&&i==0){c.animate({marginLeft:(-1*(g+1))*b.filter(":first").width()+"px"},t.animationDuration,function(){c.css({marginLeft:-1*b.filter(":first").width()+"px"});l=false;p=i})}else{c.animate({marginLeft:(-1*(i+1))*b.filter(":first").width()+"px"},t.animationDuration,function(){l=false;p=i})}}}else{if(t.animation.toLowerCase()=="show"){b.eq(p).hide();b.eq(i).show();l=false;p=i}else{e.css({minHeight:b.eq(p).height()});b.eq(p).fadeOut(t.animationDuration,function(){b.eq(i).fadeIn(t.animationDuration,function(){l=false;p=i});e.css({minHeight:"inherit"})})}}}}if(t.controlNav&&g>1){if(t.manualControls!=""&&a(t.manualControls).length>0){var f=a(t.manualControls)}else{var f=a('<ol class="flex-control-nav"></ol>');var n=1;for(var o=0;o<g;o++){f.append("<li><a>"+n+"</a></li>");n++}if(t.controlsContainer!=""&&a(t.controlsContainer).length>0){a(t.controlsContainer).append(f)}else{e.append(f)}f=a(".flex-control-nav li a")}f.eq(p).addClass("active");f.bind(d,function(j){j.preventDefault();if(a(this).hasClass("active")||l){return}else{f.removeClass("active");a(this).addClass("active");var i=f.index(a(this));r(i);if(t.pauseOnAction){clearInterval(q)}}})}if(t.directionNav&&g>1){if(t.controlsContainer!=""&&a(t.controlsContainer).length>0){a(t.controlsContainer).append(a('<ul class="flex-direction-nav"><li><a class="prev" href="#">'+t.prevText+'</a></li><li><a class="next" href="#">'+t.nextText+"</a></li></ul>"))}else{e.append(a('<ul class="flex-direction-nav"><li><a class="prev" href="#">'+t.prevText+'</a></li><li><a class="next" href="#">'+t.nextText+"</a></li></ul>"))}a(".flex-direction-nav li a").bind(d,function(i){i.preventDefault();if(l){return}else{if(a(this).hasClass("next")){var j=(p==g-1)?0:p+1}else{var j=(p==0)?g-1:p-1}if(t.controlNav){f.removeClass("active");f.eq(j).addClass("active")}r(j);if(t.pauseOnAction){clearInterval(q)}}})}if(t.keyboardNav&&g>1){a(document).keyup(function(i){if(l){return}else{if(i.keyCode!=39&&i.keyCode!=37){return}else{if(i.keyCode==39){var j=(p==g-1)?0:p+1}else{if(i.keyCode==37){var j=(p==0)?g-1:p-1}}if(t.controlNav){f.removeClass("active");f.eq(j).addClass("active")}r(j);if(t.pauseOnAction){clearInterval(q)}}}})}if(t.slideshow&&g>1){var q;function s(){if(l){return}else{var i=(p==g-1)?0:p+1;if(t.controlNav){f.removeClass("active");f.eq(i).addClass("active")}r(i)}}if(t.pauseOnHover){e.hover(function(){clearInterval(q)},function(){q=setInterval(s,t.slideshowSpeed)})}if(g>1){q=setInterval(s,t.slideshowSpeed)}}if(t.touchSwipe&&"ontouchstart" in document.documentElement&&g>1){e.each(function(){var i,j=20;isMoving=false;function w(){this.removeEventListener("touchmove",u);i=null;isMoving=false}function u(B){if(isMoving){var y=B.touches[0].pageX,z=i-y;if(Math.abs(z)>=j){w();if(z>0){var A=(p==g-1)?0:p+1}else{var A=(p==0)?g-1:p-1}if(t.controlNav){f.removeClass("active");f.eq(A).addClass("active")}r(A);if(t.pauseOnAction){clearInterval(q)}}}}function v(x){if(x.touches.length==1){i=x.touches[0].pageX;isMoving=true;this.addEventListener("touchmove",u,false)}}if("ontouchstart" in document.documentElement){this.addEventListener("touchstart",v,false)}})}if(t.animation.toLowerCase()=="slide"&&g>1){var k;a(window).resize(function(){h.width(e.width());c.width(((g+2)*e.width())+2000);clearTimeout(k);k=setTimeout(function(){r(p)},300)})}}})})(jQuery);