<?php
session_start();
?>


<script type="text/javascript">
    var r = confirm("You are about to be logged out");
	if (r == true) {
	<?php
		session_destroy();
	?>
	}
</script>
<?php
header('Location: index.php');
die();
?>