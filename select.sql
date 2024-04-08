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

SELECT codes.Code_description
FROM Crime_codes codes
WHERE codes.Crime_code IN (SELECT cc.Crime_code
                           FROM Crime_charges cc, Crimes cr, Criminals cal
                           WHERE cc.Crimes_ID = cr.Crimes_ID AND cal.Criminal_ID = cr.Criminal_ID);


