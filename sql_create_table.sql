CREATE TABLE Crime_charges (
    Charge_ID INT,
    Crime_ID INT,
    Crime_code INT,
    Charge_status CHAR(1),
    Fine_amount DECIMAL(10, 2),
    Court_fee DECIMAL(10, 2),
    Amount_paid DECIMAL(10, 2),
    Pay_due_date DATE,
    PRIMARY KEY (Charge_ID),
    FOREIGN KEY Crime_ID REFERENCES Crimes(Crime_ID),
    FOREIGN KEY Crime_code REFERENCES Crime_codes(Crime_code));

CREATE TABLE Crime_officers (
    Crime_ID INT(9, 0),
    Officer_ID INT(8, 0),
    PRIMARY KEY(Crime_ID, Officer_ID),
    FOREIGN KEY Crime_ID REFERENCES Crimes(Crime_ID),
    FOREIGN KEY Officer_ID REFERENCES Officers(Officer_ID));

CREATE TABLE Officers (
    Officer_ID INT(8, 0),
    Last VARCHAR(15),
    First VARCHAR(10),
    Precinct CHAR(4) NOT NULL,
    Badge VARCHAR(14) UNIQUE,
    Phone CHAR(10),
    Status CHAR(1) DEFAULT(A),
    PRIMARY KEY Officer_ID);

CREATE TABLE Appeals (
    Appeal_ID INT(5),
    Crime_ID INT(9, 0),
    Filing_date DATE,
    Hearing_date DATE,
    Status CHAR(1) DEFAULT(P),
    PRIMARY KEY Appeal_ID,
    FOREIGN KEY Crime_ID REFERENCES Crimes(Crime_ID));

CREATE TABLE Crime_codes (
    Crime_code INT(3, 0) NOT NULL,
    Code_description VARCHAR(30) NOT NULL UNIQUE,
    PRIMARY KEY (Crime_code)
);
