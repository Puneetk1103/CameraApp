// Code By PuneetK
<?php
session_start();

const DB_HOST = '';
const DB_USER = '';
const DB_PASS = '';
const DB_NAME = '';
$dir = "localhost/Cam_App";
?>
<html class="gr__w3schools_com"><head><title>Camera App</title>
<meta charset="UTF-8">
 <meta http-equiv="refresh" content="10" />
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
    Logout
  </a>
 </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large"> 
  <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
  <a href="logout.php" class="w3-bar-item w3-button w3-padding-large">Logout</a>
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
        <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i>Name: <?php echo $_SESSION['Username'] ?> </p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> Class: <?php echo $_SESSION['Class'] ?> </p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> Student</p>
        </div>
      </div>
    </div>
    <div class="w3-col m6">
      <?php
        
            $class = $_SESSION['Class'];
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            } 
    
        $sql = "SELECT `id`,`filename`,`class`,`addedby` FROM `uploads` WHERE class=".$class;
        $result = mysqli_query($conn, $sql);
            
        if (mysqli_num_rows($result) > 0) {
    // output data of each row
                while($row = mysqli_fetch_assoc($result)) 
                {
                    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                    echo '<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="https://www.w3schools.com/w3images/avatar3.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:50px">
        <span class="w3-right w3-opacity"></span>
        <h4>'.$row['addedby'].'</h4>
        <hr class="w3-clear">
        <img src="'.$row['filename'].'" style="width:100%" class="w3-margin-bottom">
        <form action="Paint_App.php" method="post">
        <button type="submit" class="w3-button w3-theme-d1 w3-margin-bottom" name="id" value="'.$row['id'].'"><i class="fa fa-thumbs-up"></i> &nbsp;Edit</button></form><button type="button" class="w3-button w3-theme-d1 w3-margin-bottom" name="id" onclick=delimage("'.$row['id'].'")><i class="fa fa fa-trash"></i> &nbsp;Delete</button>
      </div>';
                }
                    } 
            else {
                       // echo "0 results";
                        echo '<div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              <h6 class="w3-opacity">No results</h6>
            </div>
          </div>';
                }    

            mysqli_close($conn);
        ?>
  
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m3">
      
      <br>
      
      
      <br>
      
      
      <br>
      
      
      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->



 
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

<script>
    
    function editpage(img)
    {
        var data = img;
        console.log(data);
        window.loaction.href="Paint_App.html?data="+data
    }

    function delimage(id)
    {
        var datastring = 'id='+id;
        $.ajax({
            type:"POST",
            url:"Deleteimage.php",
            data:datastring,
            cache:false,
            success:function(result){
                console.log("image deleted");
            }            
        });
    }
</script>
    
    

 
</body></html>