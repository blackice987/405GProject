USE VEXLeaderboards;
-- Calculate All Team's Win Points
Update Teams Set Win_Points = (Select Count(*) From Matches Where Winning_Team = "5454W") Where Team_Name = "5454W";
Update Teams Set Win_Points = (Select Count(*) From Matches Where Winning_Team = "98063A") Where Team_Name = "98063A";
Update Teams Set Win_Points = (Select Count(*) From Matches Where Winning_Team = "5454A") Where Team_Name = "5454A";
Update Teams Set Win_Points = (Select Count(*) From Matches Where Winning_Team = "51444D") Where Team_Name = "51444D";
Update Teams Set Win_Points = (Select Count(*) From Matches Where Winning_Team = "1853B") Where Team_Name = "1853B";
-- Calculate All Team's Strength Points
Update Teams Set Strength_Points = (SELECT SUM(Losing_Score) FROM Matches WHERE Winning_Team = "5454W") WHERE Team_Name = "5454W";
Update Teams Set Strength_Points = (SELECT SUM(Losing_Score) FROM Matches WHERE Winning_Team = "98063A") WHERE Team_Name = "98063A";
Update Teams Set Strength_Points = (SELECT SUM(Losing_Score) FROM Matches WHERE Winning_Team = "5454A") WHERE Team_Name = "5454A";
Update Teams Set Strength_Points = (SELECT SUM(Losing_Score) FROM Matches WHERE Winning_Team = "51444D") WHERE Team_Name = "51444D";
Update Teams Set Strength_Points = (SELECT SUM(Losing_Score) FROM Matches WHERE Winning_Team = "1853B") WHERE Team_Name = "1853B";
-- Calculate All Team's Ranks
DROP PROCEDURE IF EXISTS UPDATERANKS;
DELIMITER ;;

CREATE PROCEDURE UPDATERANKS()
BEGIN
DECLARE X INT DEFAULT 0;
DECLARE Max INT DEFAULT 0;
SELECT COUNT(*) FROM Teams INTO Max;
SET X = 0;

while X < Max DO
UPDATE Teams SET Rank = (X+1) WHERE Team_Name = (Select Team_Name From (Select * From Teams) as top ORDER BY Win_Points DESC, Strength_Points DESC LIMIT 1 OFFSET X);
SET X = X + 1;
END WHILE;
END;
;;
DELIMITER ;
CALL UPDATERANKS();
