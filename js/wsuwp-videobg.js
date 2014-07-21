(function($){
	$('#' + window.wsu_video_background.id).videoBG({
		mp4: window.wsu_video_background.mp4,
		ogv: window.wsu_video_background.ogv,
		webm: window.wsu_video_background.webm,
		poster: window.wsu_video_background.poster,
		scale: true,
		zIndex: 0
	});
}(jQuery));