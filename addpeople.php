// Code By PuneetK


<?php
const DB_HOST = '';
const DB_USER = '';
const DB_PASS = '';
const DB_NAME = '';
// $data = $_POST['photo'];
//$name = $_POST['name'];
//    list($type, $data) = explode(';', $data);
//    list(, $data)      = explode(',', $data);
//    $data = base64_decode($data);
//    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/photos/".$name.'.jpg', $data);
//    echo "data";


$name = $_POST['name'];
$pass = $_POST['pass'];
$class = $_POST['class'];
$teach = $_POST['teach'];
$user_session = hash('ripemd160', $pass);
$approved = "1";
addrecord($name,$pass,$approved,$teach,$user_session,$class);

function addrecord($name,$pass,$approved,$teach,$user_session,$class)
{
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} 
    
    
	$sql = "INSERT INTO `login`(`username`, `password`, `approved`, `admin`, `usersession`, `class`)VALUES ('".$name."','".$pass."','".$approved."','".$teach."','".$user_session."','".$class."')";
	if ($conn->query($sql) === TRUE) {
		echo "Added Successfully";
	} else {
		echo "Record Enter ERROR";
	}
    
    $conn->close();
    // header("location: Login.php");
}
?>