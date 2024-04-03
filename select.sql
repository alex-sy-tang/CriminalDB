SELECT * FROM Crime_codes;

SELECT * FROM Appeals;

SELECT * FROM Officers;

SELECT * FROM Crime_charges cch, Crime_officers o, Crime_codes cc
WHERE cch.Crime_ID == o.Crime_ID AND cch.Crime_code == cc.Crime_code;

SELECT *
FROM Alias;

SELECT *
FROM Criminals;

SELECT *
FROM Crimes;

SELECT *
FROM Sentences;

SELECT *
FROM Prob_officer;
