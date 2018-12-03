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

$upload_dir = "uploads/";
$img = $_POST['fileToUpload'];
$name = $_POST['name'];
$class = $_POST['class'];
$addedon = $_POST['addedon'];
$addedby = $_POST['addedby'];
$img = str_replace('data:image/jpeg;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = $upload_dir . $name . ".jpg";
$success = file_put_contents($file, $data);
$prog = "0";
if($success)
{
    $prog = "1";
}
//print $success ? $file : 'Unable to save the file.';

if($prog == "1")
{   
    $url = "uploads/".$name.".jpg";
    addrecord($url,$class,$addedon,$addedby);
}


function addrecord($url,$class,$addedon,$addedby)
{
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} 
    
    
	$sql = "INSERT INTO `uploads`(`filename`, `class`, `addedby`, `addedon`) VALUES ('".$url."','".$class."','".$addedby."','".$addedon."')";
	if ($conn->query($sql) === TRUE) {
		echo "File upload successful";
	} else {
		echo "Record Enter ERROR";
	}

    $conn->close();
}
?>