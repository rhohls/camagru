<?php
session_start();

function getSidebarLinks(){
if (isset($_SESSION['uid'])){
	$id = $_SESSION['uid'];
	echo $_SESSION['user_name'];
	echo "<a href=user_images.php?usr_id=$id>My images</a>";
	echo "<a href=#>Edit Previous image</a>";
	// list of user made images
	// delete image
}
else
	echo "Log in to see fancy shit";
}

function getSidebarImages(){

	echo "list of stickes to overlay";
}

?>




<!-- side bar -->
<div id="side_bar">
	<!-- hyperlink categories to a cat page? -->
	<div id="categories_title">Cool links</div>
	<ul id="cat_list">
							
		<?php getSidebarLinks() ?>

	</ul>
	<div class="padding"></div>
	<!-- <div id="categories_title2">Furniture Type</div>
	<ul id="cat_list">
		
		<?php getSidebarImages() ?>
	
	</ul> -->
</div>