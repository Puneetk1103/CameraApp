// Code By PuneetK
<!doctype html>
<?php
session_start();
if (isset($_SESSION['User_Session']) && !empty($_SESSION['User_Session']))
{
  if($_SESSION['AccountType'] == "Teacher")
   { header("location: home.php");}
  else
  {  header("location: dashboard.php"); }

}
else
{
     header("location: Login.php");
}


if (isset($_GET['logout'])) {
    logout();
  }
function logout()
{
    $_SESSION['User_Session'] = '';
    header("location: Login.php");
}
?>			