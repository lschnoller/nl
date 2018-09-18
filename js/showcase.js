Cufon.replace('h1', {
	color: '-linear-gradient(#111,#555,#111)',
	textShadow: '1px 1px #fff'

});
Cufon.replace('h2', {
	textShadow: '1px 1px #fff'

});
$(document).ready(function() {
	$("a[rel^='gallery']").prettyPhoto({
		animationSpeed: 'slow', /* fast/slow/normal */
		padding: 30, /* padding for each side of the picture */
		opacity: 0.95, /* Value betwee 0 and 1 */
		showTitle: true, /* true/false */
		allowresize: true, /* true/false */
		counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
		theme: 'light_rounded', /* light_rounded / dark_rounded / light_square / dark_square */
		hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
		modal: false, /* If set to true, only the close button will close the window */
		changepicturecallback: function(){}, /* Called everytime an item is shown/changed */
		callback: function(){} /* Called when prettyPhoto is closed */
	});					   
	$('#right .content').mousemove(function(e) {
		var _top = parseInt($('#right').offset().top) + 80;
		var _contentH = parseInt($('#right .content').height());
		var _H = $('#right').height() - 100;
		var _scH = _contentH - _H;
		var _ypos = e.pageY - _top;
		
		if(_scH > 0) {
			var _contentY = -(_scH / _H)*_ypos + 10;
			$('#right .content').animate({top: _contentY}, { queue:false, duration: 40000 });
		}
	});
	

	$(document).find('.content h3, .content p').fadeOut(0);
	$('.content li').hover(function() {
    		$(this).find('h3, p').stop(true, true).fadeIn(600);
    	}, function() {
    		$(this).find('h3, p').stop(true, true).fadeOut(600);
    	}
    );
	$('.content li').stop().hover(function() {
			$(this).find('img').stop(true, true).fadeTo(600, 0.75);
		}, function() {
			$(this).find('img').stop(true, true).fadeTo(600, 1);	
		}
	);

});