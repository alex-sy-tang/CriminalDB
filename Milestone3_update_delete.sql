-- Update data
-- This part is update the amount of payment about charge and court fee
UPDATE Crime_charges SET Fine_amount = Fine_amount * 1.01 WHERE Crimes_ID = 465946627;
UPDATE Crime_charges SET Fine_amount = 3500 WHERE Crimes_ID = 465946624 AND Crime_code = 215;
UPDATE Crime_charges SET Court_fee = 500 WHERE Crimes_ID = 465946624 AND Crime_code = 215;
UPDATE Crime_charges SET Amount_paid = 2000 WHERE Crimes_ID = 465946624 AND Crime_code = 215;

UPDATE Crime_charges SET Fine_amount = 500 WHERE Crimes_ID = 465946625 AND Crime_code = 502;
UPDATE Crime_charges SET Court_fee = 500 WHERE Crimes_ID = 465946625 AND Crime_code = 502;

UPDATE Crime_charges SET Fine_amount = 500 WHERE Crimes_ID = 465946626 AND Crime_code = 731;
UPDATE Crime_charges SET Court_fee = 1000 WHERE Crimes_ID = 465946626 AND Crime_code = 731;

UPDATE Crime_charges SET Fine_amount = 4500 WHERE Crimes_ID = 465946628 AND Crime_code = 609;
UPDATE Crime_charges SET Court_fee = 1000 WHERE Crimes_ID = 465946628 AND Crime_code = 609;
UPDATE Crime_charges SET Amount_paid = 3000 WHERE Crimes_ID = 465946628 AND Crime_code = 609;

UPDATE Crime_charges SET Amount_paid = 1000 WHERE Crimes_ID = 465946629 AND Crime_code = 837;

UPDATE Crime_charges SET Fine_amount = 14500 WHERE Crimes_ID = 465946633 AND Crime_code = 243;
UPDATE Crime_charges SET Court_fee = 1000 WHERE Crimes_ID = 465946633 AND Crime_code = 243;
UPDATE Crime_charges SET Amount_paid = 8000 WHERE Crimes_ID = 465946633 AND Crime_code = 243;


-- Update the active of an officer

UPDATE Officers SET Status_ = 'I' WHERE Officer_ID = 32662492;
UPDATE Officers SET Status_ = 'A' WHERE Officer_ID = 32662501;


