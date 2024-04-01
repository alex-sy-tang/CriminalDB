INSERT INTO Aliases (Alias_ID, Criminal_ID, Alias)
VALUES (298492, 382764, 'Big Jake'),
       (003631, 052523, 'Sprite'),
       (725517, 538982, 'Gunner'),
       (127383, 210735, 'Lil K'),
       (435769, 261552, 'Jesus'),
       (127486, 527184, 'KJ'),
       (048731, 637237, 'Dawg')
       (255274, 578629, 'Spice')
       (269385, 811248, 'JD'),
       (513894, 342378, 'Monster');

INSERT INTO Criminals (Criminal_ID, Last_name, First_name, Street, City, State_US, Zip, Phone, V_status, P_status)
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

INSERT INTO Crimes (Crimes_ID, Criminal_ID, Classification, Date_charged, Status, Hearing_date, Appeal_cut_date)
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

INSERT INTO Crime_charges (Charge_ID, Crime_ID, Crime_code, Charge_status, Fine_amount, Court_fee, Amount_paid, Pay_due_date)
VALUES (2300239352, 465946624, 215, 'PD', 00000.00, 00000.00, 00000.00, '2000-01-01'), --how can we have crime charges if the status is Pending
       (2300239353, 465946625, 502, 'NG', 00000.00, 00000.00, 00000.00, '2007-08-22'),
       (2300239354, 465946626, 731, 'PD', 00000.00, 00000.00, 00000.00, '2008-09-01'),
       (2300239355, 465946627, 148, 'GL', 45600.78, 20000.00, 10000.00, '2009-09-10'),
       (2300239356, 465946628, 609, 'NG', 00000.00, 00000.00, 00000.00, '2010-09-20'),
       (2300239357, 465946629, 837, 'GL', 67800.90, 30000.00, 15000.00, '2011-09-30'),
       (2300239358, 465946630, 364, 'NG', 00000.00, 00000.00, 00000.00, '2012-10-10'),
       (2300239359, 465946631, 521, 'GL', 89000.12, 40000.00, 20000.00, '2013-10-20'),
       (2300239360, 465946632, 978, 'GL', 90100.23, 45000.00, 22005.00, '2014-10-30'),
       (2300239361, 465946633, 243, 'PD', 00000.00, 00000.00, 00000.00, '2015-11-10');	


INSERT INTO Crime_officers (Crime_ID, Officer_ID)
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


INSERT INTO Officers (Officer_ID, Last, First, Precinct, Badge, Phone, Status)
VALUES (32662492, 'Wang', 'Toby', 'ILMH', 'GRWJHCITDRGDQI', '555-9876','A'), 
       (32662493, 'Smith', 'Emily', 'ILMH', 'GRWJHCITDRGDQI', '555-1234', 'A'),
       (32662494, 'Johnson', 'David', 'ILMH', 'GRWJHCITDRGDQI', '555-5678', 'A'),
       (32662495, 'Brown', 'Sarah', 'ESTE', 'GRWJHCITDRGDQI', '555-9012', 'I'),
       (32662496, 'Miller', 'Michael', 'ILMH', 'GRWJHCITDRGDQI', '555-3456', 'A'),
       (32662497, 'Davis', 'Jennifer', 'WSTN', 'GRWJHCITDRGDQI', '555-7890', 'A'),
       (32662498, 'Wilson', 'Daniel', 'ILMH', 'GRWJHCITDRGDQI', '555-2345', 'I'),
       (32662499, 'Martinez', 'Maria', 'WSTN', 'GRWJHCITDRGDQI', '555-6789', 'A'),
       (32662500, 'Anderson', 'James', 'ILMH', 'GRWJHCITDRGDQI', '555-0123', 'A'),
       (32662501, 'Taylor', 'Jessica', 'WSTN', 'GRWJHCITDRGDQI', '555-4567', 'I');


INSERT INTO Appeals (Appeal_ID, Crime_ID, Filling_date, Hearing_date, Status)
VALUES (34872, 465946624, "2005-08-17", "2005-10-17", "P"), 
       (34873, 465946625, "2007-08-22", "2007-11-17", "A"),
       (34874, 465946626, "2008-09-01", "2008-11-28", "P"),
       (34875, 465946627, "2009-09-10", "2009-12-07", "A"),
       (34876, 465946628, "2010-09-20", "2010-12-17", "P"),
       (34877, 465946629, "2011-09-30", "2011-01-02", "A"),
       (34878, 465946630, "2012-10-10", "2012-01-12", "P"),
       (34879, 465946631, "2013-10-20", "2013-01-22", "P"),
       (34880, 465946632, "2014-10-30", "2014-02-01", "D"),
       (34881, 465946633, "2015-11-10", "2015-02-12", "P");


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
INSERT INTO Sentencing(Sentencing_ID, Crimes_ID, Setence_type, Prob_ID, Start_date, 
       End_date, Number_of_violations)
VALUES (100001, , 'J', 11111, '2024-03-01', '2024-04-01', 2);

INSERT INTO Sentencing(Sentencing_ID, Crimes_ID, Setence_type, Prob_ID, Start_date, 
       End_date, Number_of_violations)
VALUES (100002, , 'J', 11111, '2024-03-15', '2024-04-028', 2);

INSERT INTO Sentencing(Sentencing_ID, Crimes_ID, Setence_type, Prob_ID, Start_date, 
       End_date, Number_of_violations)
VALUES (100003, , 'H', 22222, '2024-03-21', '2024-04-01', 1);

INSERT INTO Sentencing(Sentencing_ID, Crimes_ID, Setence_type, Prob_ID, Start_date, 
       End_date, Number_of_violations)
VALUES (100004, , 'H', 99999, '2023-03-01', '2023-05-01', 1);

INSERT INTO Sentencing(Sentencing_ID, Crimes_ID, Setence_type, Prob_ID, Start_date, 
       End_date, Number_of_violations)
VALUES (100005, , 'P', 44444, '2024-02-01', '2024-03-11', 1);

INSERT INTO Sentencing(Sentencing_ID, Crimes_ID, Setence_type, Prob_ID, Start_date, 
       End_date, Number_of_violations)
VALUES (100006, , 'J', 55555, '2023-02-01', '2024-03-18', 2);

INSERT INTO Sentencing(Sentencing_ID, Crimes_ID, Setence_type, Prob_ID, Start_date, 
       End_date, Number_of_violations)
VALUES (100007, , 'J', 55555, '2024-03-18', '2024-09-18', 2);

INSERT INTO Sentencing(Sentencing_ID, Crimes_ID, Setence_type, Prob_ID, Start_date, 
       End_date, Number_of_violations)
VALUES (100008, , 'H', 66666, '2023-08-01', '2024-01-01', 1);

INSERT INTO Sentencing(Sentencing_ID, Crimes_ID, Setence_type, Prob_ID, Start_date, 
       End_date, Number_of_violations)
VALUES (100009, , 'P', 77777, '2024-01-01', '2024-03-31', 1);

INSERT INTO Sentencing(Sentencing_ID, Crimes_ID, Setence_type, Prob_ID, Start_date, 
       End_date, Number_of_violations)
VALUES (100010, , 'H', 88888, '2024-04-01', '2024-12-31', 2);

INSERT INTO Sentencing(Sentencing_ID, Crimes_ID, Setence_type, Prob_ID, Start_date, 
       End_date, Number_of_violations)
VALUES (100011, , 'J', 88888, '2024-12-31', '2025-10-16', 2);

-- Prob_officer
INSERT INTO Prob_officer(Prob_ID, Last_name, First_name, Street, City, State, 
       Zip, Phone_number, Email, Status)
VALUES 
       (11111, 'Smith', 'John', '123 Main St', 'Anytown', 'NY', '12345', '5551234567', 'john.smith@example.com', 'A'),
       (22222, 'Doe', 'Jane', '456 Elm St Apt 3B', 'Smallville', 'CA', '98765', '5559876543', 'jane.doe@example.com', 'A'),
       (33333, 'Johnson', 'Michael', '789 Oak St', 'Riverside', 'TX', '54321', '5555555555', 'michael.johnson@example.com', 'I'),
       (44444, 'Williams', 'Emily', '101 Cedar St', 'Portland', 'OR', '12345', '5552223333', 'emily.williams@example.com', 'A'),
       (55555, 'Brown', 'David', '321 Pine St', 'Springfield', 'IL', '67890', '5554445555', 'david.brown@example.com', 'A'),
       (66666, 'Martinez', 'Maria', '444 Birch St', 'Miami', 'FL', '54321', '5557778888', 'maria.martinez@example.com', 'A'),
       (77777, 'Gonzalez-Martinez', 'Carlos', '777 Maple St', 'Denver', 'CO', '98765', '5556667777', 'carlos.gonzalez@example.com', 'A'),
       (88888, 'Lopez', 'Ana', '888 Pine St', 'Tucson', 'AZ', '87654', '5558889999', 'ana.lopez@example.com', 'A'),
       (99999, 'Hernandez', 'Jose', '999 Oak St', 'Phoenix', 'AZ', '54321', '5551112222', 'jose.hernandez@example.com', 'A'),
       (13131, 'Garcia', 'Luis', '111 Elm St', 'Albuquerque', 'NM', '98765', '5553334444', 'luis.garcia@example.com', 'A');     

