/* imgsizer (flexible images for fluid sites) */var imgSizer={Config:{imgCache:[],spacer:"/path/to/your/spacer.gif"},collate:function(e){var t=document.all&&!window.opera&&!window.XDomainRequest?1:0;if(t&&document.getElementsByTagName){var n=imgSizer,r=n.Config.imgCache,i=e&&e.length?e:document.getElementsByTagName("img");for(var s=0;s<i.length;s++){i[s].origWidth=i[s].offsetWidth;i[s].origHeight=i[s].offsetHeight;r.push(i[s]);n.ieAlpha(i[s]);i[s].style.width="100%"}r.length&&n.resize(function(){for(var e=0;e<r.length;e++){var t=r[e].offsetWidth/r[e].origWidth;r[e].style.height=r[e].origHeight*t+"px"}})}},ieAlpha:function(e){var t=imgSizer;e.oldSrc&&(e.src=e.oldSrc);var n=e.src;e.style.width=e.offsetWidth+"px";e.style.height=e.offsetHeight+"px";e.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+n+"', sizingMethod='scale')";e.oldSrc=n;e.src=t.Config.spacer},resize:function(e){var t=window.onresize;typeof window.onresize!="function"?window.onresize=e:window.onresize=function(){t&&t();e()}}};$(document).ready(function(){$("[placeholder]").focus(function(){var e=$(this);if(e.val()===e.attr("placeholder")){e.val("");e.removeClass("placeholder")}}).blur(function(){var e=$(this);if(e.val()===""||e.val()===e.attr("placeholder")){e.addClass("placeholder");e.val(e.attr("placeholder"))}}).blur();$("[placeholder]").parents("form").submit(function(){$(this).find("[placeholder]").each(function(){var e=$(this);e.val()===e.attr("placeholder")&&e.val("")})});window.addEventListener("load",function(){setTimeout(function(){window.scrollTo(0,1)},0)});$(".alert-message").alert();$(".dropdown-toggle").dropdown();$("nav a").click(function(e){var t=$(this),n;document.documentElement.clientWidth<=480?n=$(t.attr("title")).offset().top-25:n=$(t.attr("title")).offset().top-75;$("html, body").stop().animate({scrollTop:n},600,"easeInOutExpo");e.preventDefault()});$().UItoTop({easingType:"easeInOutExpo"});$(".fancybox").fancybox();$("#menu-button").unbind("click").click(function(){$("body").toggleClass("bg-reposition")})});