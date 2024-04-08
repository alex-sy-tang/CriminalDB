-- Update the number of violation for a criminal, 
-- when a new sentencing is initiated

DELIMITER @@
CREATE OR REPLACE TRIGGER updateViolations
AFTER INSERT ON Sentencing 
FOR EACH ROW
    BEGIN 
        IF NEW.Sentencing_ID IS NOT NULL THEN
            UPDATE Sentencing
            SET Number_of_violations = Number_of_violations + 1
            WHERE Crimes_ID = NEW.Crimes_ID;
        END IF;
    END @@
DELIMITER ; 




-- Change the fine amount and court fee when the Charge_Status changed
DELIMITER @@
CREATE OR REPLACE TRIGGER updateFine
AFTER UPDATE ON Crime_charges
FOR EACH ROW 
    BEGIN
        UPDATE Crime_charges
        SET Fine_amount = 50000
        WHERE Charge_Status = 'GL'; 

        UPDATE Crime_charges
        SET Court_fee = 20000
        WHERE Charge_status = 'GL'; 
    END @@
DELIMITER ; 
