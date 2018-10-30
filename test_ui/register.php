<?php
// echo "start\n";
// echo $_POST['submit']."\n";
// echo $_POST['register_submit']."\n";


if ($_POST['register_submit'] == 'register')
{
	$result = 0;
	// sleep(1);
	echo "<script>
	alert('There are no fields to generate a report');
	window.location.href='index.php';
	</script>";

}
echo "redirecting\n";
sleep(5);
// header('Location: index.php');
?>