
<?php

$Team1Name = $_POST["Team1"];
$Team2Name = $_POST["Team2"];
$Team1Score = $_POST["Score1"];
$Team2Score = $_POST["Score2"];
$TournamentID = $_POST["Tournament"];

$Pass = 'root'; //enter password
$DB = 'VEXLeaderboards'; //Enter database name
$mysqli = new mysqli('127.0.0.1', 'root',$Pass,$DB);
$Winning_Score = 0;
$Losing_Score = 0;
$Winning_Team = "";

// Check for connection error
// If there is an error we will use $mysqli->connect_error
// to print the cause of the error
if ($mysqli->connect_errno) {
        echo "Could not connect to database \n";
        echo "Error: ". $mysqli->connect_error . "\n";
        exit;

}
else{
	if ( $Team1Score > $Team2Score ) {
		$Winning_Score = $Team1Score;
		$Losing_Score = $Team2Score;
		$Winning_Team = $Team1Name;
	}
	else{
		$Winning_Score = $Team2Score;
		$Losing_Score = $Team1Score;
		$Winning_Team = $Team2Name;
	}
        $Insert_Query = "INSERT INTO Matches VALUES (0, $Winning_Score, $Losing_Score, '$Winning_Team');";
        if ( !$q_result = $mysqli->query($Insert_Query) ) {
                echo "Query failed: ". $mysqli->error. "\n";
                exit;
        }
        else{
                echo "Match Reported";
        }
//	$UpdateQuery = "Source ~/405GProject/performUpdates.sql;";
//	$UpdateQuery = file_get_contents('~/405GProject/performUpdates.sql')
//	 if ( !$q_result = $mysqli_multi_query($UpdateQuery) ) {
//                echo "Query failed: ". $mysqli->error. "\n";
//                exit;
//        }
//        else{
//                echo "Leaderboard Updated";
//        }

	exec('mysql -u "root" "-proot" < "performUpdates.sql"', $out, $returned);
	echo "$out $returned";
}



?>

