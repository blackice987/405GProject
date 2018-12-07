<?php

echo "<head><link rel=\"stylesheet\" type=\"text/css\" href=\"mystyle.css\"></head>";

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
// $Use_DB_Query = "USE VEXLeaderboards;";
}
else{ 

        $query = "SELECT * FROM Teams
                  ORDER by Win_Points DESC";

        if ( !$q_result = $mysqli->query($query) ) {
                        echo "Query failed: ". $mysqli->error. "\n";
                        exit;
        }
        else{
        	echo "<table style='width:100%'>";
        	echo "<tr><th>Rank</th><th>Team Name</th><th>Win Points</th><th>Strength Points</th></tr>";

                
             

                while($row = $q_result->fetch_assoc()){

        		echo "<tr>";
        		echo "<td>".$row["Rank"]."</td><td>".$row["Team_Name"]."tn</td><td>".$row["Win_Points"]."</td><td>".$row["Strength_Points"]."</td>";
        		echo "</tr>";

                }
                

        	echo "</table>";
        }
}



?>



