// custom javascript

// force embed to open in new window
jQuery(document).ready(function() {
  jQuery('.wp-embed-featured-image a').attr('target', '_blank');

  // navbar

  jQuery('.navbar-toggler').on('click', function(){
		jQuery(this).find('.navbar-icon').toggleClass('open');
	});

  // linktree

  var duration = 0.6,
    stagger = 0.08,
    textDelay = '-=1',
    link = jQuery('.link-list li');

  var tl = new TimelineMax({
    delay: 0.5,
  });

  tl.staggerTo(link, duration, { y: 0, opacity: 0, ease: Power4.easeOut }, stagger).staggerTo(
    link,
    duration,
    { y: 20, opacity: 1, ease: Power4.easeOut },
    stagger,
    '-=0.5'
  );

});