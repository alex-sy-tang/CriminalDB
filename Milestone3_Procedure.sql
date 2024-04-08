
-- Procedure

-- 1) Find the all information of the criminal by Check the Crime_ID
DELIMITER //
DROP PROCEDURE IF EXISTS track_student//

CREATE PROCEDURE track_criminals_by_crime (IN Crimes_ID INT)
BEGIN
    SELECT *
    FROM Criminals cr
    WHERE cr.Criminal_ID IN (SELECT c.Criminal_ID
                             From Crimes c
                             WHERE c.Crimes_ID = Crimes_ID);
END //

DELIMITER ;


-- 2) Find the all information of the criminal by Sentencing
DELIMITER //
DROP PROCEDURE IF EXISTS track_student//

CREATE PROCEDURE track_criminals_by_sentence (IN Sentencing_ID INT)
BEGIN
    SELECT *
    FROM Criminals cr
    WHERE cr.Criminal_ID IN (SELECT c.Criminal_ID
                             From Crimes c
                             WHERE c.Crimes_ID IN  (SELECT s.Crimes_ID
                             						From Sentencing s
                             						WHERE s.Sentencing_ID = Sentencing_ID)                            
                            );
END //

DELIMITER ;


-- 3) Find the all information of the criminal by Officier
DELIMITER //
DROP PROCEDURE IF EXISTS track_student//

CREATE PROCEDURE track_criminals_by_officers (IN Officer_ID INT)
BEGIN
    SELECT *
    FROM Criminals cr
    WHERE cr.Criminal_ID IN (SELECT c.Criminal_ID
                             From Crimes c
                             WHERE c.Crimes_ID IN  (SELECT co.Crimes_ID
                             						From Crime_officers co
                             						WHERE co.Officer_ID IN (SELECT o.Officer_ID
                             												From Officers o
                             												WHERE o.Officer_ID = Officer_ID)
                                                    )                            
                            );
END //

DELIMITER ;

-- 4) Find the all information of the criminal by searching crinimal bar
DELIMITER //
DROP PROCEDURE IF EXISTS track_student//

CREATE PROCEDURE track_criminals (IN Criminal_ID INT)
BEGIN
    SELECT *
    FROM Criminals cr
    WHERE cr.Criminal_ID = Criminal_ID;
END //

DELIMITER ;
