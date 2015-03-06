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

function showMovie( movieId) {
	$.ajax({
		type: "POST",
		url: "index.php?event=movie&movieid=" + movieId,
		beforeSend: function() {
			$('.maincontent').attr( "style", "opacity: 0.2;");
			$('.loader').fadeIn();
		},
		complete: function(){
			$('.loader').fadeOut();
			$('.maincontent').removeAttr( "style");
		},
		success: function(data) {
		    $(".maincontent").html( data);
		}
	});
}