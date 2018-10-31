<script>
		function sendData() {
			console.log("function call");
			
			var XHR = new XMLHttpRequest();
			var canvas = document.getElementById('canvas');
			var img_data = canvas.toDataURL("image/png");

			XHR.addEventListener('load', function(event) {
				if (this.response)
					alert(this.response);
				else
					alert("Uploaded");
			});
			XHR.addEventListener('error', function(event) {
			alert('Oops! Something went wrong.');
			});
			XHR.open('POST', 'save_pic.php');
			XHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			XHR.send("img=" + img_data);
		}
		</script>

<div class="container">

	<h1>Video is here</h1>

	<video autoplay=true id='video_player' height='300' width='400'></video>

	<h2> No more vids</h2>
	<a href='#' id="capture" class="pic_btn">Take picture </a>
	<input type="button" onclick="sendData()" value="Save pic">
	<canvas id='canvas' height="300" width="400"></canvas>
</div>
<script src='javascript/photo.js'></script>
