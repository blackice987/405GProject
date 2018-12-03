
<?php

$Team1Name = $_POST["Team1"];
$Team2Name = $_POST["Team2"];
$Team1Score = $_POST["Score1"];
$Team2Score = $_POST["Score2"];
$TournamentID = $_POST["Tournament"];

$Pass = 'root'; //enter password
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
        $Insert_Query = "INSERT INTO Participant VALUES ('$Name', '$State', $Grade, '$Username', '$Password')";
        if ( !$q_result = $mysqli->query($Insert_Query) ) {
                echo "Query failed: ". $mysqli->error. "\n";
                exit;
        }
        else{
                echo "User account successfully created";
        }
}



?>

