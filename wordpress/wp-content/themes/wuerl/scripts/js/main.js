/* imgsizer (flexible images for fluid sites) */
var imgSizer={Config:{imgCache:[],spacer:"/path/to/your/spacer.gif"},collate:function(aScope){var isOldIE=(document.all&&!window.opera&&!window.XDomainRequest)?1:0;if(isOldIE&&document.getElementsByTagName){var c=imgSizer;var imgCache=c.Config.imgCache;var images=(aScope&&aScope.length)?aScope:document.getElementsByTagName("img");for(var i=0;i<images.length;i++){images[i].origWidth=images[i].offsetWidth;images[i].origHeight=images[i].offsetHeight;imgCache.push(images[i]);c.ieAlpha(images[i]);images[i].style.width="100%";}
if(imgCache.length){c.resize(function(){for(var i=0;i<imgCache.length;i++){var ratio=(imgCache[i].offsetWidth/imgCache[i].origWidth);imgCache[i].style.height=(imgCache[i].origHeight*ratio)+"px";}});}}},ieAlpha:function(img){var c=imgSizer;if(img.oldSrc){img.src=img.oldSrc;}
var src=img.src;img.style.width=img.offsetWidth+"px";img.style.height=img.offsetHeight+"px";img.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+src+"', sizingMethod='scale')";
img.oldSrc=src;img.src=c.Config.spacer;},resize:function(func){var oldonresize=window.onresize;if(typeof window.onresize!=='function'){window.onresize=func;}else{window.onresize=function(){if(oldonresize){oldonresize();}
func();};}}};

// as the page loads, call these scripts
$(document).ready(function() {
	// Input placeholder text fix for IE
	$('[placeholder]').focus(function() {
		var input = $(this);
		if (input.val() === input.attr('placeholder')) {
			input.val('');
			input.removeClass('placeholder');
		}
	}).blur(function() {
		var input = $(this);
		if (input.val() === '' || input.val() === input.attr('placeholder')) {
			input.addClass('placeholder');
			input.val(input.attr('placeholder'));
		}
	}).blur();
	
	// Prevent submission of empty form
	$('[placeholder]').parents('form').submit(function() {
		$(this).find('[placeholder]').each(function() {
		var input = $(this);
		if (input.val() === input.attr('placeholder')) {
			input.val('');
		}
		});
	});
	
	// When ready...
	window.addEventListener("load",function() {
		// Set a timeout...
		setTimeout(function(){
			// Hide the address bar!
			window.scrollTo(0, 1);
		}, 0);
	});
	
	$('.alert-message').alert();
	
	$('.dropdown-toggle').dropdown();
	
	/* Smooth scroll */
	$('nav a').click(function(event) {
		var $anchor = $(this);
		var offset;
		if (document.documentElement.clientWidth <= 480) {
			offset = $($anchor.attr('href')).offset().top - 25;
		}
		else {
			offset = $($anchor.attr('href')).offset().top - 75;
		}
		$('html, body').stop().animate({
				scrollTop: offset
		}, 600,'easeInOutExpo');
		event.preventDefault();
	});
	 
	$().UItoTop({ easingType: 'easeInOutExpo' });
	
	$('.fancybox').fancybox();
	
	$('#menu-button').unbind('click').click(function() {
		$('body').toggleClass('bg-reposition');
	});

}); /* end of as page load scripts */