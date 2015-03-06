function initGrid() {
	$(".maincontent").gridalicious({
		selector: '.moviebox',
		width: 225,
		gutter: 5,
		animate: true,
		animationOptions: {
			queue: true,
			speed: 200,
			duration: 300,
			effect: 'fadeInOnAppear'
		}
	});
}