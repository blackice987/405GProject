
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
		echo "\r\n";
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
	//$cmd = "mysql -u 'root' '-proot' -e 'source performUpdates.sql'";
	//$output = $mysqli->exec($query);
	//echo $output;
//	foreach($out['data'] as $result){
//		echo $result['type'], '<br>';
//	}
//	echo "$out $returned";
}
//	echo "attempting to update db";
	$query = file_get_contents("performUpdates.sql");
	$stmt = "mysql -u 'root' '-proot' -e 'source performUpdates.sql";
//	if ($stmt->execute())
//		echo "Leaderboard Updated";
//	else
//		echo "Leaderboard failed to update";
	$UpdateWin = "Update Teams Set Win_Points = (Select Count(*) From Matches Where Winning_Team = '$Winning_Team') Where Team_Name = '$Winning_Team'";
	if ( !$q_result = $mysqli->query($UpdateWin) ) {
                echo "Query failed: ". $mysqli->error. "\n";
                exit;
        }
        else{
//                echo "Win Points Updated for $Wining_Team\n";
		echo "\r\n";
        }
	
	$UpdateStrength = "Update Teams Set Strength_Points = (SELECT SUM(Losing_Score) FROM Matches WHERE Winning_Team = '$Winning_Team') WHERE Team_Name = '$Winning_Team'";
        if ( !$q_result = $mysqli->query($UpdateStrength) ) {
                echo "Query failed: ". $mysqli->error. "\n";
                exit;
        }
        else{
//                echo "Strength Points Updated for $Wining_Team\n";
		echo "\r\n";
	}
	$Recalculate = "CALL UPDATERANKS()";
	if ( !$q_result = $mysqli->query($Recalculate) ) {
                echo "Query failed: ". $mysqli->error. "\n";
                exit;
        }
        else{
//                echo "Leaderboard recalculated\n";
		echo "\r\n";
	}

//	exec("mysql -u 'root' '-proot' --database VEXLeaderboards -e 'Update Teams Set Win_Points = (Select Count(*) From Matches Where Winning_Team = \"$Winning_Team\") Where Team_Name = \"Winning_Team\"");
//	exec("mysql -u 'root' '-proot' --database VEXLeaderboards -e 'Update Teams Set Strength_Points = (SELECT SUM(Losing_Score) FROM Matches WHERE Winning_Team = \"$Winning_Team\") WHERE Team_Name = \"$Winning_Team\"");g_Team = \"$Winning_Team\") WHERE Team_Name = \"$Winning_Team\"");
//	exec("mysql -u 'root' '-proot' --database VEXLeaderboards -e 'CALL UPDATERANKS()'");





?>

