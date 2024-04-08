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

SET @balance = balance(210735);
SELECT @balance;