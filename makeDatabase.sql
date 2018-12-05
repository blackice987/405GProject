-- Makes the Database

-- Create and select database
CREATE DATABASE VEXLeaderboards;

USE VEXLeaderboards;

-- Create 'Teams' table and upload data
CREATE TABLE Teams
        (
        Team_Name VARCHAR(8) NOT NULL PRIMARY KEY,
        Win_Points INT,
	Strength_Points INT, 
	Rank INT
        );
LOAD DATA LOCAL INFILE '/home/tlmi233/405GProject/teams.txt'
INTO TABLE Teams
FIELDS TERMINATED BY '\t';

-- Create 'Event' table and upload data
CREATE TABLE Event
        (
        Name VARCHAR(30) PRIMARY KEY NOT NULL,
        Location VARCHAR(20),
        Winning_Team VARCHAR(20) NOT NULL
        );
LOAD DATA LOCAL INFILE '/home/tlmi233/405GProject/event.txt'
INTO TABLE Event
FIELDS TERMINATED BY '\t';

-- Create 'Participant' table and upload data
CREATE TABLE Participant
        (
        Name VARCHAR(30) NOT NULL,
        Home_State VARCHAR(2),
        Grade INT,
	Username VARCHAR(50) PRIMARY KEY NOT NULL,
	Password VARCHAR(50) NOT NULL
        );
LOAD DATA LOCAL INFILE '/home/tlmi233/405GProject/participant.txt'
INTO TABLE Participant
FIELDS TERMINATED BY '\t';

-- Create 'Match' table and upload data
CREATE TABLE Matches
        (
        Match_ID INT PRIMARY KEY NOT NULL,
        Winning_Score INT NOT NULL,
        Losing_Score INT NOT NULL,
        Winning_Team VARCHAR(8)
        );
LOAD DATA LOCAL INFILE '/home/tlmi233/405GProject/match.txt'
INTO TABLE Matches
FIELDS TERMINATED BY '\t';

source ~/405GProject/performUpdates.sql


Update Teams Set Win_Points = (Select Count(*) From Matches Where Winning_Team = "5454W") Where Team_Name = "5454W";
Update Teams Set Win_Points = (Select Count(*) From Matches Where Winning_Team = "98063A") Where Team_Name = "98063A";
Update Teams Set Win_Points = (Select Count(*) From Matches Where Winning_Team = "5454A") Where Team_Name = "5454A";
Update Teams Set Win_Points = (Select Count(*) From Matches Where Winning_Team = "51444D") Where Team_Name = "51444D";
Update Teams Set Win_Points = (Select Count(*) From Matches Where Winning_Team = "1853B") Where Team_Name = "1853B";

Update Teams Set Strength_Points = (SELECT SUM(Losing_Score) FROM Matches WHERE Winning_Team = "5454W") WHERE Team_Name = "5454W";
Update Teams Set Strength_Points = (SELECT SUM(Losing_Score) FROM Matches WHERE Winning_Team = "98063A") WHERE Team_Name = "98063A";
Update Teams Set Strength_Points = (SELECT SUM(Losing_Score) FROM Matches WHERE Winning_Team = "5454A") WHERE Team_Name = "5454A";
Update Teams Set Strength_Points = (SELECT SUM(Losing_Score) FROM Matches WHERE Winning_Team = "51444D") WHERE Team_Name = "51444D";
Update Teams Set Strength_Points = (SELECT SUM(Losing_Score) FROM Matches WHERE Winning_Team = "1853B") WHERE Team_Name = "1853B";
