// Code By PuneetK
<?php
session_start();
$_SESSION['User_Session'] = "";
$_SESSION['Username'] = "";
$_SESSION['AccountType'] = "";
$_SESSION['Class']="";
include ("config.php");
if(isset($_POST['username']) && isset($_POST['password']))
{
    $email = $_POST["username"];
	$pass = $_POST["password"];
    
    if(($email == "Admin") && ($pass == "admin@1234"))
    {
        $_SESSION['User_Session'] = "Admin";
        $_SESSION['Username'] = "Admin";
        $_SESSION['Class'] = "0";
        $_SESSION['AccountType'] = "Admin";
            header("location: Admin.php");
    }
    else
    {
    $query = "SELECT usersession,admin,class FROM login WHERE username='".$email."'AND password='".$pass."'";
    $response=runQuery($query);
    //print_r($response);
    //echo $response['usersession'];
    if($response['data_code']==0)
    {
        echo "<script language='javascript'>alert('Incorrect Username or Password')</script>";
    }
    else
    {
        $_SESSION['User_Session'] = $response['data']['usersession'];
        $_SESSION['Username'] = $email;
        $_SESSION['Class'] = $response['data']['class'];
        $act = $response['data']['admin'];
        if($act == "1")
        {
            $_SESSION['AccountType'] = "Teacher";
            header("location: home.php");
        }
        else
        {
            $_SESSION['AccountType'] = "Student";
            header("location: dashboard.php");
        }
    }
    
    }
}

?>
<html class="gr__w3schools_com"><head><title>Camera App</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>
</head>
<body class="w3-theme-l5" data-gr-c-s-loaded="true">

<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
   <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
  
      <div class="w3-center"><br>
        
        <img src="https://www.w3schools.com/w3images/avatar3.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
      </div>

      <form class="w3-container" method="Post">
        <div class="w3-section">
          <label><b>Username</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="username" required="">
          <label><b>Password</b></label>
          <input class="w3-input w3-border" type="text" placeholder="Enter Password" name="password" required="">
          <br>
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Login</button>
        </div>
      </form>

      

    </div>
  </div>
  
<!-- End Page Container -->
</div>
</body>
</html>