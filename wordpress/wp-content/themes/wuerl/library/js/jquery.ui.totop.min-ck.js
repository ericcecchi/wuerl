/*
Simple Back-to-top jQuery Plugin 1.0.0
Copyright (C) 2012 Eric Cecchi

Derived from:

UItoTop jQuery Plugin 1.2 by Matt Varone
http://www.mattvarone.com/web-design/uitotop-jquery-plugin/
Copyright (C) 2012 Matt Varone

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/(function(e){e.fn.UItoTop=function(t){var n={text:"Back to top",min:200,inDelay:600,outDelay:400,containerID:"toTop",containerHoverID:"toTopHover",scrollSpeed:600,easingType:"linear"},r=e.extend(n,t),i="#"+r.containerID;e("body").append('<a id="'+r.containerID+'" class="fade" href="#">'+r.text+"</a>");e(i).click(function(t){e("html, body").animate({scrollTop:0},r.scrollSpeed,r.easingType);t.preventDefault()});e(window).scroll(function(){var t=e(window).scrollTop();typeof document.body.style.maxHeight=="undefined"&&e(i).css({position:"absolute",top:t+e(window).height()-50});t>r.min?e(i).addClass("in"):e(i).removeClass("in")})}})(jQuery);