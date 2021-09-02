<?php include('config.php');

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="index.css">
	<title></title>
</head>
<body>

	<div class="manager">
		<div class="img">
			<img src="about.jpg" width="150" height="150">
		</div>
		<?php 

		if(isset($_SESSION["Delete"]))
		{
			echo $_SESSION["Delete"];
			unset($_SESSION["Delete"]);
		}

		?>
<!-- Start Form ******************************************-->
		<form action="" method="post">
				<?php 
				if(isset($_SESSION['null']))
				{
					echo $_SESSION['null'];
					unset($_SESSION['null']);
				}

				?>			
			<div>

			<label>student numper:</label><br>
			<input type="number" name="numper" >
			</div>

			<div>
			<label>student name:</label><br>
			<input type="txt" name="name"  >
			</div>

			<div>
			<label>student address:</label><br>
			<input type="txt" name="address" >
			</div>

			<div class="btn">
				<input style="width: 110px" type="submit" name="add" value="Add Student"><br>
				<input type="submit" name="remove" value="Remove Student"><br>
				<p style="color: #fff">"to remove student write the nupmer of student and click <span style="color: red">'Remove Student'</span></p>

			</div>			
		</form>
<!-- End Form ************************************************-->

	</div>
		<div class="student">
		<table>
			<tr>
				<th>student numper</th>
				<th>student name</th>
				<th>student address</th>
			</tr>
			
<!-- Insert Data Into Data Base *************************-->
	<?php
   if(isset($_POST['add']))
   { 

   	$studnet_num  = $_POST['numper'];
   	$student_name = $_POST['name'];
   	$student_adrr = $_POST['address'];

   	// Check if user enter data or not
   	if($studnet_num && $student_name && $student_adrr !="")
   	{

   	 mysqli_query($con,"INSERT INTO student VALUES('','$studnet_num','$student_name','$student_adrr')");
    }
   else
   {
   	$_SESSION['null'] = "<div class='null'>the filed can not be null :)</div>";
   }
   }
   ?>
<!-- Display the result ************************************ -->
<?php
   
   $res = mysqli_query($con, "SELECT * FROM student ");

   $count = mysqli_num_rows($res);

  
   if($count > 0)
   {
   	while($row = mysqli_fetch_assoc($res))
   	{
   		$numper = $row['numper'];
   		$name    = $row['name'];
   		$address = $row['address'];
        ?>
		<tr>
			<td><?php echo $numper?></td>
			<td><?php echo $name?></td>
			<td><?php echo $address?></td>

		</tr>   		
        <?php
   	}

   }
?>
 <!--///////////////////////// Delete the item using name/////////////////////// --->

   <?php 

   if(isset($_POST['remove']))
   {
   	$numper = $_POST['numper'];

   	$sql = mysqli_query($con,"SELECT * FROM student WHERE numper = '$numper'");

   	$res = mysqli_num_rows($sql);

   	if($res > 0)
   	{   
   		$numper = $_POST['numper'];
   		$sql2 = mysqli_query($con,"DELETE FROM student WHERE numper = '$numper'");
   		$_SESSION["Delete"] = "<div class='sucess' > Name delet sucessfully</div>";

   	}
   	else{$_SESSION["Delete"] = "<div class='error' > No student with this numper!!</div>";}

   }

   ?>



		</table>
	</div>
</body>
</html>


