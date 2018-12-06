<?php
/*
 * Student 1 : Ayman Fattar
 * Student# 1 : 218327676
 * Title: Task 1
 * Declaration: This is my own work and
 *  any code obtained from other sources
 *  will be referenced
 * Source #1: Bootsnipp.com
 */

include_once("DBConn.php");

$sqlDropT = "DROP TABLE IF EXISTS `Assessment`,`Is_alerted`, `Student`, `Date`,`Venue`,`Subject`,`Lecturer`,`User`,`LabRoom`,`TheoryRoom`,`Appointed`,`Lecturer`;";

$sqlCreateT = "
CREATE TABLE Student(
        idStud int (11) Auto_increment  NOT NULL ,
        Image  Varchar (25) ,
        idUser Int NOT NULL ,
        PRIMARY KEY (idStud ,idUser )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Assessment
#------------------------------------------------------------

CREATE TABLE Assessment(
        idAssess int (11) Auto_increment  NOT NULL ,
        type     Varchar (25) NOT NULL ,
        idDate   Int ,
        idSubj   Int ,
        PRIMARY KEY (idAssess )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Date
#------------------------------------------------------------

CREATE TABLE Date(
        idDate int (11) Auto_increment  NOT NULL ,
        Day    Varchar (25) NOT NULL ,
        Month  Varchar (25) NOT NULL ,
        Year   Varchar (25) NOT NULL ,
        PRIMARY KEY (idDate )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Venue
#------------------------------------------------------------

CREATE TABLE Venue(
        idVenue     int (11) Auto_increment  NOT NULL ,
        Campus      Varchar (25) NOT NULL ,
        Departement Varchar (25) NOT NULL ,
        Floor       Varchar (25) NOT NULL ,
        NbSeats     Int NOT NULL ,
        PRIMARY KEY (idVenue )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Subject
#------------------------------------------------------------

CREATE TABLE Subject(
        idSubj int (11) Auto_increment  NOT NULL ,
        name   Varchar (25) NOT NULL ,
        PRIMARY KEY (idSubj )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Lecturer
#------------------------------------------------------------

CREATE TABLE Lecturer(
        idLect int (11) Auto_increment  NOT NULL ,
        idUser Int NOT NULL ,
        PRIMARY KEY (idLect ,idUser )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        idUser  int (11) Auto_increment  NOT NULL ,
        Fname   Varchar (25) NOT NULL ,
        Lname   Varchar (25) NOT NULL ,
        CellNum Varchar (10) NOT NULL ,
        Email   Varchar (25) NOT NULL ,
        PRIMARY KEY (idUser )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: LabRoom
#------------------------------------------------------------

CREATE TABLE LabRoom(
        idLab   int (11) Auto_increment  NOT NULL ,
        idVenue Int NOT NULL ,
        PRIMARY KEY (idLab ,idVenue )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: TheoryRoom
#------------------------------------------------------------

CREATE TABLE TheoryRoom(
        idTheory int (11) Auto_increment  NOT NULL ,
        idVenue  Int NOT NULL ,
        PRIMARY KEY (idTheory ,idVenue )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Is alerted
#------------------------------------------------------------

CREATE TABLE Is_alerted(
        idStud   Int NOT NULL ,
        idUser   Int NOT NULL ,
        idAssess Int NOT NULL ,
        PRIMARY KEY (idStud ,idUser ,idAssess )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: appointed
#------------------------------------------------------------

CREATE TABLE appointed(
        idAssess Int NOT NULL ,
        idVenue  Int NOT NULL ,
        PRIMARY KEY (idAssess ,idVenue )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Lecture
#------------------------------------------------------------

CREATE TABLE Lecture(
        idLect Int NOT NULL ,
        idUser Int NOT NULL ,
        idSubj Int NOT NULL ,
        PRIMARY KEY (idLect ,idUser ,idSubj )
)ENGINE=InnoDB;

ALTER TABLE Student ADD CONSTRAINT FK_Student_idUser FOREIGN KEY (idUser) REFERENCES User(idUser);
ALTER TABLE Assessment ADD CONSTRAINT FK_Assessment_idDate FOREIGN KEY (idDate) REFERENCES Date(idDate);
ALTER TABLE Assessment ADD CONSTRAINT FK_Assessment_idSubj FOREIGN KEY (idSubj) REFERENCES Subject(idSubj);
ALTER TABLE Lecturer ADD CONSTRAINT FK_Lecturer_idUser FOREIGN KEY (idUser) REFERENCES User(idUser);
ALTER TABLE LabRoom ADD CONSTRAINT FK_LabRoom_idVenue FOREIGN KEY (idVenue) REFERENCES Venue(idVenue);
ALTER TABLE TheoryRoom ADD CONSTRAINT FK_TheoryRoom_idVenue FOREIGN KEY (idVenue) REFERENCES Venue(idVenue);
ALTER TABLE Is_alerted ADD CONSTRAINT FK_Is_alerted_idStud FOREIGN KEY (idStud) REFERENCES Student(idStud);
ALTER TABLE Is_alerted ADD CONSTRAINT FK_Is_alerted_idUser FOREIGN KEY (idUser) REFERENCES User(idUser);
ALTER TABLE Is_alerted ADD CONSTRAINT FK_Is_alerted_idAssess FOREIGN KEY (idAssess) REFERENCES Assessment(idAssess);
ALTER TABLE appointed ADD CONSTRAINT FK_appointed_idAssess FOREIGN KEY (idAssess) REFERENCES Assessment(idAssess);
ALTER TABLE appointed ADD CONSTRAINT FK_appointed_idVenue FOREIGN KEY (idVenue) REFERENCES Venue(idVenue);
ALTER TABLE Lecture ADD CONSTRAINT FK_Lecture_idLect FOREIGN KEY (idLect) REFERENCES Lecturer(idLect);
ALTER TABLE Lecture ADD CONSTRAINT FK_Lecture_idUser FOREIGN KEY (idUser) REFERENCES User(idUser);
ALTER TABLE Lecture ADD CONSTRAINT FK_Lecture_idSubj FOREIGN KEY (idSubj) REFERENCES Subject(idSubj);
";

$QResultDT = $DBConnect->query($sqlDropT);
$QResultCT = $DBConnect->query($sqlCreateT);


$users = file("userData.txt");

foreach ($users as $ind=> $userLine) {
    $userData = explode(" ", $userLine);

    $sqlInsertT = "INSERT INTO `tbl_user` (`FName`, `LName`, `Email`, `Password`, `CellNumber`, `UserImage`) VALUES
    ('$userData[0]', '$userData[1]', '$userData[2]', '$userData[3]', '$userData[4]', '$userData[5]');";

    $QResultIT = $DBConnect->query($sqlInsertT);
};
