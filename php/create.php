<?php 
	session_start();
	require_once("connect.php");
	
	$uid = $_SESSION['uid'];
	
	# Extract Form values
	$fname = $_POST['txtfname'];
	$lname = $_POST['txtlname'];
	$mobile = $_POST['txtmobile'];
	$landline = $_POST['txtLandline'];
	$emailcontact = $_POST['txtemail'];
	$public = $_POST['txtpublic'];
	
$query = "insert into contact (fname, lname, mobile, landline, emailcontact, public ,email,contactid) values('$fname','$lname',$mobile,$landline,'$emailcontact','$public','$uid','')";

	$_SESSION['insert_success']=1;
		header("Location: ..\create.php");
		mysqli_query($con,$query);

	mysqli_close($con);
?>