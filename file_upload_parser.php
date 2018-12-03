// Code By PuneetK
<?php
const DB_HOST = '';
const DB_USER = '';
const DB_PASS = '';
const DB_NAME = '';
	
$fileName = $_FILES["fileToUpload"]["name"]; // The file name
$fileUName = $_POST["name"];
$fileTmpLoc = $_FILES["fileToUpload"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["fileToUpload"]["type"]; // The type of file it is
$fileSize = $_FILES["fileToUpload"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["fileToUpload"]["error"]; // 0 for false... and 1 for true
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}
if(move_uploaded_file($fileTmpLoc, "uploads/".$fileUName)){
	$url = "uploads/".$fileUName;
	addrecord("eng","eng","eng",$fileUName,$url);
    //echo $fileName." upload is complete";
} else {
    echo "move_uploaded_file function failed";
}


function addrecord($lang,$mtype,$date,$name,$url)
{
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "INSERT INTO `media`(`name`, `dateadded`, `language`, `type`, `url`) VALUES ('".$name."','".$date."','".$lang."','".$mtype."','".$url."')";
	if ($conn->query($sql) === TRUE) {
		echo "File upload successful";
	} else {
		echo "Record Enter ERROR";
	}

    $conn->close();
}

?>