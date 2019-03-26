<?php

require_once 'connect.php';

if(isset($_POST['submit']))
{
	
  $sname=$_POST['sname'];
	$sem=$_POST['sem'];
	$tid=$_POST['tid'];

$sql="insert into subject(subname,sem,tid) values('$sname','$sem','$tid')";
	if(mysqli_query($link,$sql))
	{
		echo "New record created successfully!";
	}
	else
	{
		echo "Failed!";
	}
}

?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="trialhome.php">Home</a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="teacherregister.php
      ">Teacher registration</a>
    </li>

    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Login
      </a>
      <div class="dropdown-menu">
        <button type="button" class="btn btn-md dropdown-item" data-toggle="modal" data-target="#myModal">
        Teacher</button>
        <button type="button" class="btn btn-md dropdown-item" data-toggle="modal" data-target="#myLogin">Student</button>
      </div>
    </li>
  </ul>

  <div class="collapse navbar-collapse justify-content-end mr-0">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="adminlogin.php">Admin Login</a>
      </li>
    </ul>
  </div>
</nav>
 <!DOCTYPE html>
<html>
<head>
	<title>Upload assignment</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<?php 
      require_once 'connect.php';
      $query="SELECT * FROM teachers";
      $results= mysqli_query($link,$query);

   ?>

<div class="row">
  <div class="col-md-6 offset-md-3">
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
        <label>Subject Name: </label>
        <input type="text" name="sname" class="form-control" required="required" placeholder="Enter subject name">
      </div>
      <div class="form-group">
      <label>Semester: </label>
      <select class="form-control" name="sem">
      <option>Select Semester</option>
      <option>1st </option>
      <option>2nd</option>
      <option>3rd</option>
      <option>4th</option>
      <option>5th</option>
      <option>6th</option>
      </select>
      </div>
   
   <div class="form-group">
        <label>Teacher Name: </label>
        	
     <select class="form-control" name="tid">
     	<option>Select Teacher</option>
    <?php while($row=mysqli_fetch_assoc($results)): ?>
    	
     	<option value="<?php echo $row['tid'] ?>"> <?php echo $row['name'] ?>
     	</option>
     
	<?php endwhile; ?>
	
	</select>

  </div>

      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      <button type="reset" class="btn btn-primary ">Reset</button>
 	</form>
 </div>
</div>


 <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>