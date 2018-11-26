<html>
<body>
<Title>Report a Match</Title>

<b>VEX Leaderboards: Report Match Results</b>
<br><br>
Please provide the following information:

<form action="Submit.php" method="post">
<div class='container'>
        <label for='name' > Team 1 Name: </label><br/>
        <input type='text' name='Team1' id='Team1' maxlength = "8" /><br/>
<div class='container'>
        <label for='name' > Team 1 Score:  </label><br/>
        <input type='text' name='Score1' id='Score1' maxlength = "50" /><br/>
<div class='container'>
        <label for='name' > Team 2 Name:  </label><br/>
        <input type='text' name='Team2' id='Team2' maxlength = "50" /><br/>
<div class='container'>
        <label for='name' > Team 2 Score:  </label><br/>
        <input type='text' name='Score2' id='Score2' maxlength = "2" /><br/>
<div class='container'>
        <label for='name' > Tournament ID:  </label><br/>
        <input type='int' name='Tournament' id='Tournament' maxlength = "2" /><br/>


<br><br>
<input type="submit" name="Report" value="Report Match">
<br><br>

