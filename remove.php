<?php
    $con = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($con,'telephone');

if (isset($_POST['remove'])) {
    $id = $_POST['delete_id'];
    
	$query = "DELETE FROM contact WHERE id='$id' ";
    $result = mysqli_query($con,$query);
	
    if($result){
        echo '<script> alert("Contact has sucessfully deleted");</script>';
        header("Location:index.php");
    }
    else{
        echo '<script> alert("Contact has not deleted");</script>';
    }
}




?>