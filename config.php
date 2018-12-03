// Code By PuneetK
<?php
const DB_HOST = '';
const DB_USER = '';
const DB_PASS = '';
const DB_NAME = '';


function connectDB() {
		$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		return $conn;
	}
	
	function runQuery($query) {
        $conn = connectDB();
        $resultset['data_code'] = 0;
		$result = mysqli_query($conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
            $resultset['data_code'] = 1;
			$resultset['data'] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
	
	function updateQuery($query) {
		$result = mysqli_query($this->conn,$query);
		if (!$result) {
			die('Invalid query: ' . mysql_error());
		} else {
			return $result;
		}
	}
	
	function insertQuery($query) {
		$result = mysqli_query($this->conn,$query);
		if (!$result) {
			die('Invalid query: ' . mysql_error());
		} else {
			return $result;
		}
	}
	
	function deleteQuery($query) {
		$result = mysqli_query($this->conn,$query);
		if (!$result) {
			die('Invalid query: ' . mysql_error());
		} else {
			return $result;
		}
	}

?>