CREATE TABLE Criminals (
  Criminal_ID INT,
  Last_name varchar(15),
  First_name varchar(10),
  Street varchar(30),
  City varchar(20),
  State CHAR(2),
  Zip CHAR(5),
  phone_number CHAR(10),
  violent_offender_status CHAR(1) DEFAULT 'N',
  probation_status CHAR(1) DEFAULT 'N',

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
    CHECK (CHECK Hearing_date > Date_charged),

  PRIMARY KEY(Crimes_ID, Criminal_ID)  
);

CREATE TABLE Prob_officer(
  Prob_ID INT, 
  Last_name varchar(15), 
  First_name varchar(10), 
  Street varchar(30),
  City varchar(20),
  State CHAR(2),
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

