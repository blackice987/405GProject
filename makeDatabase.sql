-- Makes the Database

-- Create and select database
CREATE DATABASE VEXLeaderboards;

USE VEXLeaderboards;

-- Create 'Teams' table and upload data
CREATE TABLE Teams
        (
        Team_Name VARCHAR(8) NOT NULL PRIMARY KEY,
        Total_Score INT
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



-- Create 'enrolled' table and upload data
--
-- References student id and course id together as primary
-- key
-- CREATE TABLE enrolled
--        (
--        sid INT NOT NULL,
--        cid INT NOT NULL,
--        grade VARCHAR(1) NOT NULL,
--        PRIMARY KEY (sid, cid),
--        FOREIGN KEY (sid) REFERENCES student(sid),
--        FOREIGN KEY (cid) REFERENCES courses(cid)
--        );
-- LOAD DATA LOCAL INFILE '/home/tlmi233/forLab3/enrolled.txt'
-- INTO TABLE enrolled
-- FIELDS TERMINATED BY '\t';

