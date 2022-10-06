--
-- File generated with SQLiteStudio v3.3.3 on Thu Oct 6 22:41:39 2022
--
-- Text encoding used: System
--
PRAGMA foreign_keys = off;
BEGIN TRANSACTION;

-- Table: Projects
CREATE TABLE Projects (name STRING (15), description TEXT, teams STRING (45));

-- Table: Teams
CREATE TABLE Teams (name STRING (15), project STRING (20), devs STRING (130), lead STRING (12));

-- Table: Users
CREATE TABLE Users (username STRING (12), pass STRING (10), fname STRING (10), lname STRING (15), role STRING (10), team STRING (15));
INSERT INTO Users (username, pass, fname, lname, role, team) VALUES ('i.i.23', 101010, 'Iliyan', 'Ivanov', 'CEO', 0);

-- Table: Vacations
CREATE TABLE Vacations ("from" DATE, until DATE, dor DATE, halfday BOOLEAN, approved BOOLEAN, declarator STRING (12));
INSERT INTO Vacations ("from", until, dor, halfday, approved, declarator) VALUES ('2020-06-23', '2120-06-23', '2020-06-23', 0, 1, 'i.i.23');

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
