-- CREATE TABLE PART
-- 
-- 
CREATE TABLE Criminals (
  Criminal_ID INT,
  Last_name varchar(15),
  First_name varchar(10),
  Street varchar(30),
  City varchar(20),
  State_US CHAR(2),
  Zip CHAR(5),
  phone_number CHAR(10),
  V_status CHAR(1) DEFAULT 'N',
  P_status CHAR(1) DEFAULT 'N',

  PRIMARY KEY (Criminal_ID)
);

CREATE TABLE Aliases (
  Alias_ID INT,
  Criminal_ID INT REFERENCES Criminals(Criminal_ID),
  Alias varchar(20),

  PRIMARY KEY (Criminal_ID, Alias_ID)
); 

CREATE TABLE Crimes (
  Crimes_ID INT,
  Criminal_ID INT REFERENCES Criminals(Criminal_ID),
  Classification CHAR(1) DEFAULT 'U',
  Date_charged DATE,
  Status_ CHAR(2) NOT NULL,
  Hearing_date DATE,
  Appeal_cut_date DATE,

  CONSTRAINT check_hearing_date CHECK (Hearing_date > Date_charged),
  PRIMARY KEY(Crimes_ID, Criminal_ID)  
);

CREATE TABLE Prob_officer(
  Prob_ID INT, 
  Last_name varchar(15), 
  First_name varchar(10), 
  Street varchar(30),
  City varchar(20),
  State_US CHAR(2),
  Zip CHAR(5),
  Phone_number CHAR(10),
  Email varchar(30),
  Status_ CHAR(1) NOT NULL, 

  PRIMARY KEY (Prob_ID)
);

CREATE TABLE Sentencing(
    Sentencing_ID INT, 
    Crimes_ID INT REFERENCES Crimes(Crimes_ID),
    Sentence_type CHAR(1),
    Prob_ID INT REFERENCES Prob_officer(Prob_ID),
    Start_date DATE,
    End_date DATE,
    Number_of_violations INT NOT NULL,
    CONSTRAINT check_end_date CHECK (End_date > Start_date),
    
    PRIMARY KEY (Sentencing_ID, Crimes_ID, Prob_ID)
); 



CREATE TABLE Crime_codes (
    Crime_code INT NOT NULL,
    Code_description VARCHAR(150) NOT NULL UNIQUE,
    PRIMARY KEY (Crime_code)
);

CREATE TABLE Crime_charges (
    Charge_ID INT,
    Crimes_ID INT REFERENCES Crimes(Crimes_ID),
    Crime_code INT REFERENCES Crime_codes(Crime_code),
    Charge_status CHAR(2),
    Fine_amount DECIMAL(10, 2),
    Court_fee DECIMAL(10, 2),
    Amount_paid DECIMAL(10, 2),
    Pay_due_date DATE,
    CONSTRAINT check_overpaid CHECK (Amount_paid <= Fine_amount + Court_fee),

    PRIMARY KEY (Charge_ID, Crimes_ID, Crime_code));

CREATE TABLE Officers (
    Officer_ID INT,
    Last_name VARCHAR(15),
    First_name VARCHAR(10),
    Precinct CHAR(4) NOT NULL,
    Badge VARCHAR(14) UNIQUE,
    Phone CHAR(10),
    Status_ CHAR(1) DEFAULT 'A',
    PRIMARY KEY (Officer_ID));

CREATE TABLE Crime_officers (
    Crimes_ID INT REFERENCES Crimes(Crimes_ID),
    Officer_ID INT REFERENCES Officers(Officer_ID),
    PRIMARY KEY(Crimes_ID, Officer_ID));

CREATE TABLE Appeals (
    Appeal_ID INT,
    Crimes_ID INT REFERENCES Crimes(Crimes_ID),
    Filling_date DATE,
    Hearing_date DATE,
    Status_ CHAR(1) DEFAULT 'P',
    PRIMARY KEY (Appeal_ID, Crimes_ID));

CREATE TABLE num_sentences(
      sentences_num NUMERIC (4)
);

-- 
-- 
-- 

-- Insert Data Part
-- 
-- 
INSERT INTO Aliases (Alias_ID, Criminal_ID, Alias)
VALUES (298492, 382764, 'Big Jake'),
       (003631, 052523, 'Sprite'),
       (725517, 538982, 'Gunner'),
       (127383, 210735, 'Lil K'),
       (435769, 261552, 'Jesus'),
       (127486, 527184, 'KJ'),
       (048731, 637237, 'Dawg'),
       (255274, 578629, 'Spice'),
       (269385, 811248, 'JD'),
       (513894, 342378, 'Monster');

INSERT INTO Criminals (Criminal_ID, Last_name, First_name, Street, City, State_US, Zip, phone_number, V_status, P_status)
VALUES (382764, 'Burke', 'Jake', '872 Stetson Ave', 'Palo Alto', 'CA', '28746', '5109873772', 'N', 'N'),
       (052523, 'Mckinney', 'Michael', '1028 Matte St', 'Taccoa', 'GA', '56280', '8167239091', 'N', 'N'),
       (538982, 'Stone', 'Trevon', '97 Fulton Ave', 'Jackson', 'MS', '90626', '9532458983', 'N', 'N'),
       (210735, 'Yates', 'Kyle', '261 Yoder Ave', 'Concord', 'CA', '14382', '3052642852', 'N', 'N'),
       (261552, 'Taylor', 'Preston', '783 Chung St', 'Queens', 'NY', '38861', '9168728043', 'N', 'N'),
       (527184, 'Berry', 'Kendrick', '20 James St', 'San Francisco', 'CA', '93428', '4159283825', 'N', 'N'),
       (637237, 'Brennan', 'Simon', '2489 Red Blvd', 'Deerfield Beach', 'FL', '86473', '8022348658', 'N', 'N'),
       (578629, 'Moss', 'Wilson', '267 Brick Ave', 'Jackson', 'MS', '41871', '2873641407', 'N', 'N'),
       (811248, 'Palmer', 'Jarvis', '90126 Lowe Rd', 'Denver', 'CO', '53008', '4529854801', 'N', 'N'),
       (342378, 'Whitaker', 'Derrick', '1408 Decker', 'New York', 'NY', '10036', '9172895230', 'N', 'N');

INSERT INTO Crimes (Crimes_ID, Criminal_ID, Classification, Date_charged, Status_, Hearing_date, Appeal_cut_date)
VALUES (465946624, 382764, 'U', '2022-08-23', 'CL', '2023-07-19', '2023-08-19'),
       (465946625, 052523, 'U', '2021-12-19', 'CA', '2022-05-20', '2022-06-20'),
       (465946626, 538982, 'U', '2022-10-04', 'IA', '2023-10-24', '2023-11-24'),
       (465946627, 210735, 'U', '2022-02-20', 'CA', '2022-08-02', '2022-09-02'),
       (465946628, 261552, 'U', '2022-11-20', 'CA', '2023-04-11', '2023-05-11'),
       (465946629, 527184, 'U', '2022-07-30', 'CL', '2022-12-15', '2023-01-15'),
       (465946630, 637237, 'U', '2021-01-01', 'CA', '2021-09-29', '2021-10-29'),
       (465946631, 578629, 'U', '2021-02-05', 'IA', '2021-10-07', '2021-11-07'),
       (465946632, 811248, 'U', '2022-06-12', 'CL', '2023-05-21', '2023-06-21'),
       (465946633, 342378, 'U', '2022-05-15', 'CA', '2022-12-18', '2023-01-18');


INSERT INTO Crime_charges (Charge_ID, Crimes_ID, Crime_code, Charge_status, Fine_amount, Court_fee, Amount_paid, Pay_due_date)
VALUES (2100239352, 465946624, 215, 'PD', 00000.00, 00000.00, 00000.00, '2023-01-01'), 
       (2100239353, 465946625, 502, 'NG', 00000.00, 00000.00, 00000.00, '2022-08-22'),
       (2100239354, 465946626, 731, 'PD', 00000.00, 00000.00, 00000.00, '2023-09-01'),
       (2100239355, 465946627, 148, 'GL', 50000.00, 20000.00, 10000.00, '2023-09-10'),
       (2100239356, 465946628, 609, 'NG', 00000.00, 00000.00, 00000.00, '2022-09-20'),
       (2100239357, 465946629, 837, 'GL', 50000.00, 20000.00, 15000.00, '2021-09-30'),
       (2100239358, 465946630, 364, 'NG', 00000.00, 00000.00, 00000.00, '2023-10-10'),
       (2100239359, 465946631, 521, 'GL', 50000.00, 20000.00, 20000.00, '2024-10-20'),
       (2100239360, 465946632, 978, 'GL', 50000.00, 20000.00, 22005.00, '2024-10-30'),
       (2100239361, 465946633, 243, 'PD', 00000.00, 00000.00, 00000.00, '2024-11-10');	


INSERT INTO Crime_officers (Crimes_ID, Officer_ID)
VALUES (465946624, 32662492),
       (465946625, 32662493),
       (465946626, 32662494),
       (465946627, 32662495),
       (465946628, 32662496),
       (465946629, 32662497),
       (465946630, 32662498),
       (465946631, 32662499),
       (465946632, 32662500),
       (465946633, 32662501); 


INSERT INTO Officers (Officer_ID, Last_name, First_name, Precinct, Badge, Phone, Status_)
VALUES (32662492, 'Wang', 'Toby', 'ILMH', 'GRWJHCITDRGDQA', '555-9876','A'), 
       (32662493, 'Smith', 'Emily', 'ILMH', 'GRWJHCITDRGDQB', '555-1234', 'A'),
       (32662494, 'Johnson', 'David', 'ILMH', 'GRWJHCITDRGDQC', '555-5678', 'A'),
       (32662495, 'Brown', 'Sarah', 'ESTE', 'GRWJHCITDRGDQD', '555-9012', 'I'),
       (32662496, 'Miller', 'Michael', 'ILMH', 'GRWJHCITDRGDQE', '555-3456', 'A'),
       (32662497, 'Davis', 'Jennifer', 'WSTN', 'GRWJHCITDRGDQF', '555-7890', 'A'),
       (32662498, 'Wilson', 'Daniel', 'ILMH', 'GRWJHCITDRGDQG', '555-2345', 'I'),
       (32662499, 'Martinez', 'Maria', 'WSTN', 'GRWJHCITDRGDQH', '555-6789', 'A'),
       (32662500, 'Anderson', 'James', 'ILMH', 'GRWJHCITDRGDQI', '555-0123', 'A'),
       (32662501, 'Taylor', 'Jessica', 'WSTN', 'GRWJHCITDRGDQJ', '555-4567', 'I');


INSERT INTO Appeals (Appeal_ID, Crimes_ID, Filling_date, Hearing_date, Status_)
VALUES (34872, 465946624, "2022-08-17", "2022-10-17", "P"), 
       (34873, 465946625, "2022-08-22", "2022-11-17", "A"),
       (34874, 465946626, "2023-09-01", "2023-11-28", "P"),
       (34875, 465946627, "2022-09-10", "2022-12-07", "A"),
       (34876, 465946628, "2023-09-20", "2023-12-17", "P"),
       (34877, 465946629, "2022-09-30", "2022-01-02", "A"),
       (34878, 465946630, "2023-10-10", "2023-01-12", "P"),
       (34879, 465946631, "2023-10-20", "2023-01-22", "P"),
       (34880, 465946632, "2022-10-30", "2022-02-01", "D"),
       (34881, 465946633, "2023-11-10", "2023-02-12", "P");


INSERT INTO Crime_codes (Crime_code, Code_description)
VALUES (215, "Petty theft of personal property."),
       (502, "Driving under the influence of alcohol or drugs."),
       (731, "Fraudulent use of a credit card."),
       (148, "Resisting, delaying, or obstructing a peace officer."),
       (609, "Burglary of a vehicle."),
       (837, "Vandalism causing less than $400 in damage."),
       (364, "Grand theft of personal property."),
       (521, "Assault with a deadly weapon other than a firearm."),
       (978, "Possession of a controlled substance for sale."),
       (243, "Battery resulting in serious bodily injury.");


-- Sentencing
INSERT INTO Sentencing(Sentencing_ID, Crimes_ID, Sentence_type, Prob_ID, Start_date, 
       End_date, Number_of_violations)
VALUES (100001, 465946624, 'J', 11111, '2024-03-01', '2024-04-01', 2);

INSERT INTO Sentencing(Sentencing_ID, Crimes_ID, Sentence_type, Prob_ID, Start_date, 
       End_date, Number_of_violations)
VALUES (100002, 465946624, 'J', 11111, '2024-03-15', '2024-04-028', 2);

INSERT INTO Sentencing(Sentencing_ID, Crimes_ID, Sentence_type, Prob_ID, Start_date, 
       End_date, Number_of_violations)
VALUES (100003, 465946625, 'H', 22222, '2024-03-21', '2024-04-01', 1);

INSERT INTO Sentencing(Sentencing_ID, Crimes_ID, Sentence_type, Prob_ID, Start_date, 
       End_date, Number_of_violations)
VALUES (100004, 465946626, 'H', 99999, '2023-03-01', '2023-05-01', 1);

INSERT INTO Sentencing(Sentencing_ID, Crimes_ID, Sentence_type, Prob_ID, Start_date, 
       End_date, Number_of_violations)
VALUES (100005, 465946627, 'P', 44444, '2024-02-01', '2024-03-11', 1);

INSERT INTO Sentencing(Sentencing_ID, Crimes_ID, Sentence_type, Prob_ID, Start_date, 
       End_date, Number_of_violations)
VALUES (100006, 465946629, 'J', 55555, '2023-02-01', '2024-03-18', 2);

INSERT INTO Sentencing(Sentencing_ID, Crimes_ID, Sentence_type, Prob_ID, Start_date, 
       End_date, Number_of_violations)
VALUES (100007, 465946629, 'J', 55555, '2024-03-18', '2024-09-18', 2);

INSERT INTO Sentencing(Sentencing_ID, Crimes_ID, Sentence_type, Prob_ID, Start_date, 
       End_date, Number_of_violations)
VALUES (100008, 465946630, 'H', 66666, '2023-08-01', '2024-01-01', 1);

INSERT INTO Sentencing(Sentencing_ID, Crimes_ID, Sentence_type, Prob_ID, Start_date, 
       End_date, Number_of_violations)
VALUES (100009, 465946631, 'P', 77777, '2024-01-01', '2024-03-31', 1);

INSERT INTO Sentencing(Sentencing_ID, Crimes_ID, Sentence_type, Prob_ID, Start_date, 
       End_date, Number_of_violations)
VALUES (100010, 465946632, 'H', 88888, '2024-04-01', '2024-12-31', 2);

INSERT INTO Sentencing(Sentencing_ID, Crimes_ID, Sentence_type, Prob_ID, Start_date, 
       End_date, Number_of_violations)
VALUES (100011, 465946632, 'J', 88888, '2024-12-31', '2025-10-16', 2);

-- Prob_officer
INSERT INTO Prob_officer(Prob_ID, Last_name, First_name, Street, City, State_US, 
       Zip, Phone_number, Email, Status_)
VALUES 
       (11111, 'Smith', 'John', '123 Main St', 'Anytown', 'NY', '12345', '5551234567', 'john.smith@example.com', 'A'),
       (22222, 'Doe', 'Jane', '456 Elm St Apt 3B', 'Smallville', 'CA', '98765', '5559876543', 'jane.doe@example.com', 'A'),
       (33333, 'Johnson', 'Michael', '789 Oak St', 'Riverside', 'TX', '54321', '5555555555', 'michael.johnson@example.com', 'I'),
       (44444, 'Williams', 'Emily', '101 Cedar St', 'Portland', 'OR', '12345', '5552223333', 'emily.williams@example.com', 'A'),
       (55555, 'Brown', 'David', '321 Pine St', 'Springfield', 'IL', '67890', '5554445555', 'david.brown@example.com', 'A'),
       (66666, 'Martinez', 'Maria', '444 Birch St', 'Miami', 'FL', '54321', '5557778888', 'maria.martinez@example.com', 'A'),
       (77777, 'Gonzalez', 'Carlos', '777 Maple St', 'Denver', 'CO', '98765', '5556667777', 'carlos.gonzalez@example.com', 'A'),
       (88888, 'Lopez', 'Ana', '888 Pine St', 'Tucson', 'AZ', '87654', '5558889999', 'ana.lopez@example.com', 'A'),
       (99999, 'Hernandez', 'Jose', '999 Oak St', 'Phoenix', 'AZ', '54321', '5551112222', 'jose.hernandez@example.com', 'A'),
       (13131, 'Garcia', 'Luis', '111 Elm St', 'Albuquerque', 'NM', '98765', '5553334444', 'luis.garcia@example.com', 'A');     


-- 
-- 
-- 

-- Update Data Part
-- 
--  
-- This part is update the amount of payment about charge and court fee
UPDATE Crime_charges SET Fine_amount = Fine_amount * 1.01 WHERE Crimes_ID = 465946627;

UPDATE Crime_charges SET Fine_amount = 3500 WHERE Crimes_ID = 465946624 AND Crime_code = 215;
UPDATE Crime_charges SET Court_fee = 500 WHERE Crimes_ID = 465946624 AND Crime_code = 215;
UPDATE Crime_charges SET Amount_paid = 2000 WHERE Crimes_ID = 465946624 AND Crime_code = 215;
UPDATE Crime_charges SET Charge_status = 'GL' WHERE Crimes_ID = 465946624 AND Crime_code = 215;


UPDATE Crime_charges SET Court_fee = 500 WHERE Crimes_ID = 465946625 AND Crime_code = 502;

UPDATE Crime_charges SET Fine_amount = 500 WHERE Crimes_ID = 465946626 AND Crime_code = 731;
UPDATE Crime_charges SET Court_fee = 1000 WHERE Crimes_ID = 465946626 AND Crime_code = 731;
UPDATE Crime_charges SET Charge_status = 'GL' WHERE Crimes_ID = 465946626 AND Crime_code = 731;

UPDATE Crime_charges SET Charge_status = 'GL' WHERE Crimes_ID = 465946628 AND Crime_code = 609;
UPDATE Crime_charges SET Fine_amount = 4500 WHERE Crimes_ID = 465946628 AND Crime_code = 609;
UPDATE Crime_charges SET Court_fee = 1000 WHERE Crimes_ID = 465946628 AND Crime_code = 609;
UPDATE Crime_charges SET Amount_paid = 3000 WHERE Crimes_ID = 465946628 AND Crime_code = 609;

UPDATE Crime_charges SET Amount_paid = 1000 WHERE Crimes_ID = 465946629 AND Crime_code = 837;

UPDATE Crime_charges SET Charge_status = 'GL' WHERE Crimes_ID = 465946633 AND Crime_code = 243;
UPDATE Crime_charges SET Fine_amount = 14500 WHERE Crimes_ID = 465946633 AND Crime_code = 243;
UPDATE Crime_charges SET Court_fee = 1000 WHERE Crimes_ID = 465946633 AND Crime_code = 243;
UPDATE Crime_charges SET Amount_paid = 8000 WHERE Crimes_ID = 465946633 AND Crime_code = 243;


-- Update the active of an officer

UPDATE Officers SET Status_ = 'I' WHERE Officer_ID = 32662492;
UPDATE Officers SET Status_ = 'A' WHERE Officer_ID = 32662501;

-- 
-- 


-- Select Data Part
-- 
-- 
SELECT * FROM Crime_codes;

SELECT * FROM Appeals;

SELECT * FROM Officers;

SELECT *
FROM Aliases;

SELECT *
FROM Criminals;

SELECT *
FROM Crimes;

SELECT *
FROM Sentencing;

SELECT *
FROM Prob_officer;

-- Find all crimes code description from all criminals
SELECT codes.Code_description
FROM Crime_codes codes
WHERE codes.Crime_code IN (SELECT cc.Crime_code
                           FROM Crime_charges cc, Crimes cr, Criminals cal
                           WHERE cc.Crimes_ID = cr.Crimes_ID AND cal.Criminal_ID = cr.Criminal_ID);

-- 
-- 


--  Procedure 
-- 
-- 

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

-- 
-- 


--  Function 
-- 
-- 
-- This function is used to count the total balances that a criminal need to 
-- pay for all of his crimes

DELIMITER //

CREATE OR REPLACE FUNCTION balance (Criminal_ID INT) RETURNS DECIMAL(10, 2) DETERMINISTIC
BEGIN
    DECLARE total_balance DECIMAL(10, 2);
    DECLARE total_fine DECIMAL(10, 2);
    DECLARE total_court_fee DECIMAL(10, 2);
    DECLARE total_paid DECIMAL(10, 2);

    
    SET total_fine = (SELECT SUM(cc.Fine_amount)
                       FROM Crime_charges cc
                       WHERE cc.Crimes_ID IN (SELECT cr.Crimes_ID
                                              FROM Crimes cr
                                              WHERE cr.Criminal_ID IN (SELECT crim.Criminal_ID
                                                                       FROM Criminals crim
                                                                       WHERE crim.Criminal_ID = Criminal_ID
                                                                       )
                                            )
                        );

    SET total_court_fee = (SELECT SUM(cc.Court_fee)
                       FROM Crime_charges cc
                       WHERE cc.Crimes_ID IN (SELECT cr.Crimes_ID
                                              FROM Crimes cr
                                              WHERE cr.Criminal_ID IN (SELECT crim.Criminal_ID
                                                                       FROM Criminals crim
                                                                       WHERE crim.Criminal_ID = Criminal_ID
                                                                       )
                                            )
                        );

    SET total_paid = (SELECT SUM(cc.Amount_paid)
                       FROM Crime_charges cc
                       WHERE cc.Crimes_ID IN (SELECT cr.Crimes_ID
                                              FROM Crimes cr
                                              WHERE cr.Criminal_ID IN (SELECT crim.Criminal_ID
                                                                       FROM Criminals crim
                                                                       WHERE crim.Criminal_ID = Criminal_ID
                                                                       )
                                            )
                        );                    
                            
    SET total_balance = total_fine + total_court_fee - total_paid;
    RETURN total_balance;
END //

DELIMITER ;

-- 
-- 


--  Trigger 
-- 
-- 
-- Update the number of Sentence, 
-- when a new sentencing is initiated

DELIMITER //
CREATE OR REPLACE TRIGGER updateSentence
AFTER INSERT ON Sentencing 
FOR EACH ROW
BEGIN 
	IF NEW.Sentencing_ID IS NOT NULL THEN
            UPDATE num_sentences
            SET sentences_num = sentences_num + 1;
    END IF;
END // 
DELIMITER ;

