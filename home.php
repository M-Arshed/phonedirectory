<?php
    session_start();
    require_once('php/connect.php');
    $update_msg="";
    if(!isset($_SESSION['uid']))
            {
                    header("location: index.php");
            }
    if(isset($_SESSION['update_success']))
    {
        $update_msg="Contact Successfully Updated !";
        unset($_SESSION['update_success']);
    }
    

    $uid = $_SESSION["uid"];
?>

<html>

<head>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/jquery-1.12.2.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <style type="text/css">
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
    </style>
    <title> Dashboard </title>
</head>

<body>

<nav class="navbar navbar-inverse">

    <div class="container-fluid">

        <!-- Logo -->
        <div class="navbar-header">
            <a hre="#" class="navbar-brand" /> Phone Directory </a>
        </div>

        <!-- Menu on Left -->
        <div>
            <ul class="nav navbar-nav">
                <li class="active"  > <a href="home.php"> Home </a> </li>
                <li  > <a href="create.php"> Add Contact </a> </li>
               

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

        <div class="col-xs-2" >

        </div>

        <div class="col-xs-8" style="background-color:white ">
            
            

            <div class="jumbotron">
                <h1>Phone Directory</h1>
                <p>Phone Directory offers users an easy way to create new contacts , manage existing and search for contacts based on criteria </p>
            </div>

            <br/><br/>
            <h3 align="center" class="text-success"><?php echo $update_msg ; ?></h3>

<?php
//$query ="select * from contact where email='$uid'";
$query ="select * from contact";
$result=mysqli_query($con,$query);

  echo "<table border='1'>
<tr>
<th>First Name</th>
<th>Last name</th>
<th>Email</th>
<th>Mobile No</th>
<th>LandLine No</th>
<th>Contact ID </th>
<th>Update </th>

</tr>";
while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['fname'] . "</td>";
  echo "<td>" . $row['lname'] . "</td>";
  echo "<td>" . $row['emailcontact'] . "</td>";
  echo "<td>" . $row['mobile'] . "</td>";
  echo "<td>" . $row['landline'] . "</td>";
  echo "<td>" . $row['contactid'] . "</td>";
  ?>
  <td><a href="updatedata.php?updatecontact=<?php echo $row['contactid']; ?>">Update</a></td>   
                
    <?php    

  echo "</tr>";
  }
echo "</table>";

?>








            <!-- Buttons on main page
            <div align="center">


                <br/><br/><br/></a> <br/><br/><br/>
                <a class="btn btn-default" href="create.html" > Create New Contact </a> <br/><br/><br/>
                <a class="btn btn-default" href="update.html" > Modify Existing Contact </a><br/><br/><br/>
                <a class="btn btn-default" href="search.html" > Search Contact </a> <br/><br/><br/>
                <a class="btn btn-default" href="delete.html" > Delete Contact </a> <br/><br/><br/>


            </div> -->

        </div>

        <div class="col-xs-2" >

        </div>

    </div>

</div>


</body>

</html>