<?php
	session_start();
	require_once("php/connect.php");

	 $uid = $_SESSION['uid'];
	 $ur = $_GET['updatecontact'];

	 $updatequery = "select * from contact where contactid = $ur";

	 $updateresult = mysqli_query($con,$updatequery);

	 while($rows = mysqli_fetch_array($updateresult)){?>


<html>
	
<head>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="bootstrap/js/jquery-1.12.2.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
		
		<title> Update Contact </title>
</head>
		
<body>

<nav class="navbar navbar-inverse">

	<div class="container-fluid">

		<!-- Logo -->
		<div class="navbar-header">
			<a hre="#" class="navbar-brand" /> Update Directory </a>
		</div>

		<!-- Menu on Left -->
        <div>
            <ul class="nav navbar-nav">
                <li > <a href="home.php"> Home </a> </li>
                <li  > <a href="create.php"> Create </a> </li>
                <li class="active"> <a href="updatedata.php"> Modify </a> </li>
            </ul>


            <!-- Menu on the right -->
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $uid ; ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="php/logout.php">Log-Out</a></li>

                    </ul>
                </li>

            </ul>


        </div>

	</div>

</nav>
   
   <div class="container-fluid">
         
    <div class="row">
       
		<div class="col-xs-4" >
			
		</div>
         
		<div class="col-xs-4" style="background-color:white ">

			<form method="post" action=""  >

				<table class="table table-hover"  width="100%" >

					<tr>

						<th colspan="3" > <h2 align="center"> Modify Contact Details </h2> </th>
					</tr>

					<tr>
						<td> <input type="text" name="txtfname"  data-toggle="tooltip" title="First Name" value="<?php echo $rows['fname']; ?>" class="form-control" placeholder="First Name" /> </td>
						</tr>
					<tr>
						<td> <input type="text" name="txtlname" data-toggle="tooltip"title="Last Name" value="<?php echo $rows['lname']; ?>"  class="form-control" placeholder="Last Name" /> </td>
						<td></td>
					</tr>

					<tr>
						<td> <input type="text" name="txtmobile" data-toggle="tooltip" title="Mobile Number" value="<?php echo $rows['mobile'];?>" class="form-control" placeholder="Mobile Number"/>  </td>
						<td> </td>
						<td></td>
					</tr>

					<tr>
						<td> <input type="text" name="txtlandline" data-toggle="tooltip" title="Landline Number" value="<?php echo $rows['landline'];?>" class="form-control" placeholder="Landline Number" /> </td>
						<td></td>
						<td></td>
					</tr>

					<tr>
						<td> <input type="text" name="txtemail" data-toggle="tooltip" title="Email Address" value="<?php echo $rows['emailcontact'];?>" class="form-control" placeholder="Email Address" /> </td>
						<td></td>
						<td></td>
					</tr>

					<tr>
						<td></td>
						<td> <br/> <input type="submit" name="update" class="btn btn-primary" value="Update Contact"/></td>
					</tr>
				</table>
			</form>
		</div>
    </div>
    </div>
</body>	
</html>
<?php } ?>
<?php

		if(isset($_POST['update']))
		{ 
	$fname=$_POST['txtfname'];
	$lname=$_POST['txtlname'];
	$mobile=$_POST['txtmobile'];
	$landline=$_POST['txtlandline'];
	$emailcontact=$_POST['txtemail'];
	//$contactid = $_POST['contactid'];


 


		 $query = "update user set fname='$fname', lname='$lname', mobile='$mobile', landline='$landline', emailcontact='$emailcontact where contactid =  ";
		mysqli_query($con,$query);
		 
		$_SESSION['update_success']=1;
		//header("location:home.php");
		mysqli_close($con); 
		
}
?>