<?php
    $con = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($con,'telephone');

if (isset($_POST['edit'])) {
    $id = $_POST['update_id'];
	$name  = $_POST['name'];
	$dob = $_POST['dob'];
	$phone  = $_POST['phone'];
	$email  = $_POST['email'];
	
	
	$query = "UPDATE contact SET name='$name',dob='$dob',phone='$phone',email='$email' WHERE id='$id' ";
    $result = mysqli_query($con,$query);
	
    if($result){
        echo '<script> alert("Contact has sucessfully updated");</script>';
        header("Location:index.php");
    }
    else{
        echo '<script> alert("Contact has not updated");</script>';
    }
}

?>