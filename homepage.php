<html>
<head><link rel="stylesheet" type="text/css" href="mystyle.css"></head>
<body>
<Title>VEX Leaderboards Homepage</Title>

<b>VEX Leaderboards: Home</b>
<br><br>
Please select an action:

<br><br>

<input type="button" name="Create" value="Create Your Account" onclick="window.location.href='http://128.163.232.243/registration.php'">

<input type="button" name="Sign In" value="Sign In to Your Account" onclick="window.location.href='http://128.163.232.243/loginPage.php'">

<input type="button" name="Sign Out" value="Sign Out" onclick="window.location.href='http://128.163.232.242/signout.php'">

<input type="button" name="Report" value="Report Match Results" onclick="window.location.href='http://128.163.232.243/report.php'">
<br><br>
See Teams sorted by:

<input type="button" name="Team" value="Team Name" onclick="window.location.href='http://128.163.232.243/team.php'">
<input type="button" name="Win" value="Win Points" onclick="window.location.href='http://128.163.232.243/win.php'">
<input type="button" name="Strength" value="Strength Points" onclick="window.location.href='http://128.163.232.243/strength.php'">

<br><br>
<?php
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
        		  ORDER by Rank";

        if ( !$q_result = $mysqli->query($query) ) {
                        echo "Query failed: ". $mysqli->error. "\n";
                        exit;
        }
        else{
        	echo "<table style='width:100%'>";
        	echo "<tr><th>Rank</th><th>Team Name</th><th>Win Points</th><th>Strength Points</th></tr>";

                
             

                while($row = $q_result->fetch_assoc()){

        		echo "<tr>";
        		echo "<td>".$row["Rank"]."</td><td>".$row["Team_Name"]."</td><td>".$row["Win_Points"]."</td><td>".$row["Strength_Points"]."</td>";
        		echo "</tr>";

                }
                

        	echo "</table>";
        }
}



?>




</body>
</html>
