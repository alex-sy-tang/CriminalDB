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
