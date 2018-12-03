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


$id = $_POST['id'];
//$pass = $_POST['pass'];
//$class = $_POST['class'];
//$teach = $_POST['teach'];
//$user_session = hash('ripemd160', $pass);
//$approved = "1";
deleterecord($id);

function addrecord($id)
{
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} 
    
    $query = "SELECT `filename` FROM `uploads` WHERE  id='".$id."'";
    $response=runQuery($query);
    $file = $response['data']['filename'];
    unlink($file);
    
	$sql = "DELETE FROM `uploads` WHERE `id`='".$id."'";
	if ($conn->query($sql) === TRUE) {
		echo "Deleted Successfully";
	} else {
		echo "Something Went Wrong";
	}
    
    $conn->close();
    // header("location: Login.php");
}
?>