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
