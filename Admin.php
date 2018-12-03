// Code By PuneetK
<?php 
include ("config.php");
function getNewUserCount()
{
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "SELECT COUNT(*) as count FROM `login` WHERE `admin` = '1'";
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
    $conn->close();
	//return $row['count'];
	echo $row['count'];
}
function getSNewUserCount()
{
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "SELECT COUNT(*) as count FROM `login` WHERE `admin` != '1'";
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
    $conn->close();
	//return $row['count'];
	echo $row['count'];
}
function getMediatype()
{
	$con=mysqli_connect("localhost","root","","regue");
					// Check connection
	if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$result = mysqli_query($con,"SELECT * FROM mediatypes");
	while($row = mysqli_fetch_array($result))
	{
     echo "<option value=".$row['media'].">".$row['media']."</option>";
	}
	mysqli_close($con);
}

?>
<html class="gr__w3schools_com"><head><title>Admin Panel</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>
</head><body class="w3-theme-l5" data-gr-c-s-loaded="true">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Logo</a>
  <a href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account">
    logout</a>
 </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
  <a href="logout.php" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">My Profile</h4>
         <p class="w3-center"><img src="https://www.w3schools.com/w3images/avatar3.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Admin</p>
<!--
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> London, UK</p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> April 1, 1988</p>
-->
        </div>
      </div>
      
      
      <!-- Accordion -->
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
                <div class="w3-container w3-blue">
                  <h2>Add Teacher</h2>
                </div>

                <form class="w3-container" method="post" action="addpeople.php">
                  <p>
                  <label>Name</label>
                  <input class="w3-input" type="text" name="name"></p>
                  <p>
                  <label>Password</label>
                  <input class="w3-input" type="text" name="pass"></p>
                  <p>
                  <label>Class</label>
                  <input class="w3-input" type="text" name="class"></p>
                  <input class="w3-input" type="hidden" name="teach" value="1">

                <input class="w3-btn w3-blue" type="submit" value="Register">

                </form> 
            </div>
          </div>
            <br>
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
                <div class="w3-container w3-blue">
                  <h2>Add Student</h2>
                </div>
                  <form class="w3-container" method="post" action="addpeople.php">
                  <p>
                  <label>Name</label>
                  <input class="w3-input" type="text" name="name"></p>
                  <p>
                  <label>Password</label>
                  <input class="w3-input" type="text" name="pass"></p>
                  <p>
                  <label>Class</label>
                  <input class="w3-input" type="text" name="class"></p>
                  <input class="w3-input" type="hidden" name="teach" value="0">

                <input class="w3-btn w3-blue" type="submit" value="Register">

                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Right Column -->
      
      <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Status:</p>
          <p><strong>Teachers:</strong><?php echo getNewUserCount() ?></p>
          <p><strong>Students:</strong><?php echo getSNewUserCount() ?></p>
        </div>
      </div>
      
    <!-- End Right Column -->
    </div>
      
      
      
  </div>
  
<!-- End Page Container -->
</div>

 
<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>


 
</body></html>