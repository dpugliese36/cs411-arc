/*******************************************************************************
   Drop database if it exists
********************************************************************************/
DROP DATABASE IF EXISTS ARCARC;


/*******************************************************************************
   Create database
********************************************************************************/
CREATE DATABASE ARCARC;


USE ARCARC;

/*******************************************************************************
   Create Tables
      User, Facility and Reservation
********************************************************************************/
CREATE TABLE User 
( 
     NetID VARCHAR(20) NOT NULL, 
     FirstName VARCHAR(40),
     LastName VARCHAR(40),
     Height  VARCHAR(10),
     Weght VARCHAR(10),
     Birthday DATE,
     Sex CHAR(1),
     Password VARCHAR(50),
     PRIMARY KEY(NetID)
);

CREATE TABLE Facility
(
     RoomID CHAR(4) NOT NULL,
     Building VARCHAR(4),
     Name VARCHAR(40),
     IsReservable CHAR(4),
     Capacity INT,
     Description VARCHAR(5000),
     Picture VARCHAR(100),
     PRIMARY KEY(RoomID) 
);

CREATE TABLE Reservation
(
    ID INT NOT NULL,
    StartTime TIMESTAMP,
    EndTime TIMESTAMP,
    NetID VARCHAR(20),
    RoomID CHAR(4),
    PRIMARY KEY(ID)
);

CREATE TABLE ActivityType
(
    Activity VARCHAR(20) NOT NULL,
    PRIMARY KEY(Activity)
);

CREATE TABLE Support
(
    RoomID CHAR(4) NOT NULL,
    Activity VARCHAR(20),
)

/*******************************************************************************
   Equipment and Advanced Function 1
********************************************************************************/

CREATE TABLE Equipment
(
     EquipName VARCHAR(50) NOT NULL,
     Discription VARCHAR(5000),
     Picture VARCHAR(100),
     Quantity INT,
     PRIMARY KEY(Name)
);

CREATE TABLE PurposeSet
(
    Purpose VARCHAR(50),
    PRIMARY KEY(Purpose)
);

CREATE TABLE Function
(
    EquipName VARCHAR(50) NOT NULL,
    Purpose VARCHAR(50),
);

CREATE TABLE Needs
(
    NetID VARCHAR(20),
    Purpose VARCHAR(50),
);

CREATE TABLE Location
(
    EquipID CHAR(8),
    EquipName VARCHAR(50),
    Building VARCHAR(4),
    Floor VARCHAR(20),
    PRIMARY KEY(EquipID)
);

/*******************************************************************************
   Populate Tables
********************************************************************************/

INSERT INTO Facility VALUES ('A101', 'ARC', 'Badminton Court', 'Yes', 4, 'This court is for badminton players.', 'http://campusrec.illinois.edu/facilities/arc/gallery/images/img01.jpg');
INSERT INTO Facility VALUES ('C101', 'CRCE', 'Multiple Function Room', 'No', 30, 'This room is for multi-function activity.', 'http://campusrec.illinois.edu/facilities/arc/gallery/images/img01.jpg');

INSERT INTO ActivityType VALUES ('Badminton');
INSERT INTO ActivityType VALUES ('Cycling');
INSERT INTO ActivityType VALUES ('Boxing');
INSERT INTO ActivityType VALUES ('Yoga');

INSERT INTO Support VALUES ('A101', 'Badminton');
INSERT INTO Support VALUES ('C101', 'Boxing');
INSERT INTO Support VALUES ('C101', 'Yoga');

INSERT INTO Equipment VALUES ('Treadmill', 'Treadmill is running machine.', 'http://campusrec.illinois.edu/facilities/arc/gallery/images/img01.jpg', '30');
INSERT INTO Equipment VALUES ('Rowing Machine', 'Rowing Machine makes you excercising like rowing.', 'http://campusrec.illinois.edu/facilities/arc/gallery/images/img01.jpg', '6');

INSERT INTO PurposeSet VALUES ('Lose Weight');
INSERT INTO PurposeSet VALUES ('Upper Back');
INSERT INTO PurposeSet VALUES ('Tricep');
INSERT INTO PurposeSet VALUES ('Cardio');
INSERT INTO PurposeSet VALUES ('Leg');

INSERT INTO Function VALUES ('Treadmill', 'Losing Weight');
INSERT INTO Function VALUES ('Treadmill', 'Cardio');
INSERT INTO Function VALUES ('Treadmill', 'Thigh');
INSERT INTO Function VALUES ('Rowing Machine', 'Upper Back');
INSERT INTO Function VALUES ('Rowing Machine', 'Cardio');
INSERT INTO Function VALUES ('Rowing Machine', 'Losing Weight');

INSERT INTO Location VALUES ('10000001', 'Treadmill', 'ARC', 'Upper Level');
INSERT INTO Location VALUES ('10000002', 'Treadmill', 'ARC', 'Entrance Level');
INSERT INTO Location VALUES ('10000003', 'Treadmill', 'CRCE', 'Upper Level');
INSERT INTO Location VALUES ('10000004', 'Rowing Machine', 'ARC', 'Lower Level');
INSERT INTO Location VALUES ('10000005', 'Rowing Machine', 'CRCE', 'Lower Level');
INSERT INTO Location VALUES ('10000006', 'Rowing Machine', 'CRCE', 'Lower Level');

INSERT INTO User VALUES ('puglies2', 'Daniel', 'Pugliese', '6\'0', '150', '1994-01-01', 'M', '123456');
INSERT INTO User VALUES ('mcyang4', 'Matthew', 'Yang', '6\'0', '150', '1994-01-01', 'M', '123456');
INSERT INTO User VALUES ('dzhu10', 'Douglas', 'Zhu', '6\'0', '150', '1994-01-01', 'M', '123456');
INSERT INTO User VALUES ('cyuan10', 'Chufeng', 'Yuan', '5\'8', '150', '1994-01-01', 'M', '123456');

INSERT INTO Reservation VALUES (1, '2015-03-14 14:00:00', "2015-03-14 15:00:00", 'cyuan10', 'A101');

INSERT INTO Needs VALUES ('cyuan10', 'Cardio');
INSERT INTO Needs VALUES ('cyuan10', 'Upper Back');
INSERT INTO Needs VALUES ('dzhu10', 'Upper Back');













