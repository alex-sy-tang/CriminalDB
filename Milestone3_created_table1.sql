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
  Status CHAR(2) NOT NULL DEFAULT '',
  Hearing_date DATE,
  Appeal_cut_date DATE,

  CONSTRAINT check_hearing_date
    CHECK (Hearing_date > Date_charged),

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
  Status CHAR(1) NOT NULL, 

  PRIMARY KEY (Prob_ID)
);

CREATE TABLE Sentencing(
    Sentencing_ID INT, 
    Crimes_ID INT REFERENCES Crimes(Crimes_ID),
    Setence_type CHAR(1),
    Prob_ID INT REFERENCES Prob_officer(Prob_ID),
    Start_date DATE,
    End_date DATE,
    Number_of_violations INT NOT NULL,
    
    PRIMARY KEY (Sentencing_ID, Crimes_ID, Prob_ID)
); 


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
    Last_name VARCHAR(15),
    First_name VARCHAR(10),
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

