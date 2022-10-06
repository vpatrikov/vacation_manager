--
-- File generated with SQLiteStudio v3.3.3 on Thu Oct 6 22:59:35 2022
--
-- Text encoding used: windows-949
--
PRAGMA foreign_keys = off;
BEGIN TRANSACTION;

-- Table: Projects
CREATE TABLE Projects (id INTEGER PRIMARY KEY, name STRING (15), description TEXT, teams STRING (45));

-- Table: Teams
CREATE TABLE Teams (id INTEGER PRIMARY KEY, name STRING (15), project STRING (20), devs STRING (130), lead STRING (12));

-- Table: Users
CREATE TABLE Users (id INTEGER PRIMARY KEY, username STRING (12), pass STRING (10), fname STRING (10), lname STRING (15), role STRING (10), team INTEGER (1));

-- Table: Vacations
CREATE TABLE Vacations (id INTEGER PRIMARY KEY, "from" DATE, until DATE, dor DATE, halfday BOOLEAN, approved BOOLEAN, declarator STRING (12));

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
