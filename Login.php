<?php
echo "Logging in...\n\n";
$Username = $_POST["username"];
$Password = $_POST["password"];

$Pass = '1382.Booda.1101'; //enter password 
$DB = 'VEXLeaderboards'; //Enter database name
$mysqli = new mysqli('127.0.0.1', 'root',$Pass,$DB);


// Check for connection error 
// If there is an error we will use $mysqli->connect_error 
// to print the cause of the error 
if ($mysqli->connect_errno) {
	echo "Could not connect to database \n";
	echo "Error: ". $mysqli->connect_error . "\n";
	exit;
$Use_DB_Query = "USE VEXLeaderboards;";
}
else{
$query = "SELECT Name
	FROM Participant
	WHERE Password LIKE '$Password'
	AND Username LIKE '$Username'";

if ( !$q_result = $mysqli->query($query) ) {
		echo "Query failed: ". $mysqli->error. "\n";
		exit;
	}
	else if($q_result->num_rows === 0){
		echo "Login Failed";
	}
	else{
		echo "HELLO";
		echo "Welcome". $q_result->fetch_assoc();
	}
}

?>
