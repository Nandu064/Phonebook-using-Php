<?php
    $con = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($con,'telephone');

if (isset($_POST['add'])) {
	$name  = $_POST['name'];
	$dob = $_POST['dob'];
	$phone  = $_POST['phone'];
	$email  = $_POST['email'];
	
	
	$add_contact_query = "INSERT INTO contact (name,dob,phone,email) VALUES ('$name','$dob','$phone','$email')";

	

	if (!empty($name) || !empty($phone)) {
		if (mysqli_query($con,$add_contact_query)) {
			header('Location: index.php');
		} else {
			echo "<p class='text-center bg-danger'>Error</p>";
		}
	}
			
}

?>