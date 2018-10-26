(function(){
	var video = document.getElementById("video_player");
	var vendorURL = window.URL || window.webkitURL;
	var canvas = document.getElementById('canvas');
	var context = canvas.getContext('2d');

	navigator.getMedia =	navigator.getUserMedia ||
							navigator.webkitGetUserMedia ||
							navigator.mozGetUserMedia ||
							navigator.msGetUserMedia;

	navigator.getMedia(
	{
		video: true,
		audio: false
	}, function (stream){
		video.src = vendorURL.createObjectURL(stream);
		video.play();
	},function (error){
		
	});

	document.getElementById('capture').addEventListener('click', function() {
	context.drawImage(video, 0, 0, 400, 300);
	});

	document.getElementById('save_edit').addEventListener('click', function() {
	context.drawImage(video, 0, 0, 400, 300);
	});
})();