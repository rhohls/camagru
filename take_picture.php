<?php
session_start();
if (!isset($_SESSION['uid'])){
	header('Location: login.php');
}
?>

<div>
	<h1>Video is here</h1>
	<video autoplay=true id='video_player' height='300' width='300'></video>
	<h2> No more vids</h2>

	<a href='#' id="capture" class="pic_btn">Take picture </a>
	<input type="button" onclick="sendData();" value="Save pic">
	<canvas id='canvas' height="300" width="300"></canvas>
</div>
<script src='javascript/photo.js'></script>