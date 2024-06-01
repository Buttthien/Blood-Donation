-- 1
CREATE TABLE Account (
  ID INT AUTO_INCREMENT PRIMARY KEY,
  Private_Name VARCHAR(255) NOT NULL,
  UserName VARCHAR(255) NOT NULL,
  Password VARCHAR(255) NOT NULL,  
  Address VARCHAR(255) NOT NULL,
  Function_Account VARCHAR(255) NOT NULL
);

-- 2
CREATE TABLE Admin_Account (
ID INT AUTO_INCREMENT PRIMARY KEY ,
ID_Account INT NOT NULL,
FOREIGN KEY (ID_Account) REFERENCES Account(ID)
);
-- 3
CREATE TABLE Hospital_Account (
ID INT AUTO_INCREMENT PRIMARY KEY ,
ID_Account INT NOT NULL,
FOREIGN KEY (ID_Account) REFERENCES Account(ID)
);
-- 3.5
CREATE TABLE Examiner (
ID INT AUTO_INCREMENT PRIMARY KEY ,
ID_Account INT NOT NULL,
FOREIGN KEY (ID_Account) REFERENCES Account(ID),
ID_Hospital_Account INT NOT NULL,
FOREIGN KEY (ID_Hospital_Account) REFERENCES Hospital_Account(ID)
);

-- 4
CREATE TABLE Donator (
ID INT AUTO_INCREMENT PRIMARY KEY,
Citizen_identification INT NOT NULL,
Age INT NOT NULL,
Phone VARCHAR(255) NOT NULL,
Blood_Type VARCHAR(255) NOT NULL,
Name VARCHAR(255) NOT NULL,
Amount INT NOT NULL,
Date timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
);
-- 5
CREATE TABLE Blood_Bank (
ID INT AUTO_INCREMENT PRIMARY KEY,
ID_Hospital INT NOT NULL,
FOREIGN KEY (ID_Hospital) REFERENCES Hospital_Account(ID) ,
Blood_Type VARCHAR(255) NOT NULL,
Amount INT NOT NULL,
Date timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
);
-- 6
CREATE TABLE Queue (
  ID INT AUTO_INCREMENT PRIMARY KEY,
  ID_Hospital INT NOT NULL,
  FOREIGN KEY (ID_Hospital) REFERENCES Hospital_Account(ID),
  Blood_Type VARCHAR(255) NOT NULL,
  Amount INT NOT NULL ,
  Date timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6), 
  Status VARCHAR(255) NOT NULL
);
CREATE TABLE History_Of_Transfer (
  ID INT AUTO_INCREMENT PRIMARY KEY,
  ID_Queue INT NOT NULL,
  FOREIGN KEY (ID_Queue) REFERENCES Queue(ID),
  ID_Adapted_Hospital INT NOT NULL,
  FOREIGN KEY (ID_Adapted_Hospital) REFERENCES Hospital_Account(ID),
  Date timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
);


