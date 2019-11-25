#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

Drop database Parking;
Create database Parking;
Use Parking;

Drop TABLE If EXISTS PLACE;
Drop TABLE If EXISTS UTILISATEUR;
Drop TABLE If EXISTS ADMIN;
Drop TABLE If EXISTS LISTEATTENTE;
Drop TABLE If EXISTS RESERVATION;

#------------------------------------------------------------
# Table: PLACE
#------------------------------------------------------------

CREATE TABLE PLACE(
   NumPlace SMALLINT(3)  NOT NULL,
   Etat BOOLEAN  NOT NULL,
   CONSTRAINT PK_PLACE PRIMARY KEY (NUmPlace)
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: UTILISATEUR
#------------------------------------------------------------

CREATE TABLE UTILISATEUR(
   IDpersonne VARCHAR(30) NOT NULL,
   MotDePasse VARCHAR(250) NOT NULL,
   Nom VARCHAR(50) NOT NULL,
   Prenom VARCHAR(50) NOT NULL,
   Tel VARCHAR(10),
   AdRue VARCHAR(100),
   CP VARCHAR(5),
   Ville VARCHAR(50),
   Mail VARCHAR(50),
   Validation BOOLEAN,
   Etat BOOLEAN  NOT NULL,
   IdLigue VARCHAR(8) NOT NULL,
   CONSTRAINT PK_UTILISATEUR PRIMARY KEY (IDpersonne)
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: ADMIN
#------------------------------------------------------------

CREATE TABLE ADMIN(
   IDAdmin VARCHAR(30) NOT NULL,
   MotDePasse VARCHAR(250) NOT NULL,
   CONSTRAINT PK_ADMIN PRIMARY KEY (IDAdmin)
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: LIGUE
#------------------------------------------------------------


CREATE TABLE LIGUE(
   NumLigue VARCHAR(8),
   AdresseRue VARCHAR(50),
   CP VARCHAR(5),
   Ville VARCHAR(50),
   CONSTRAINT PK_LIGUE PRIMARY KEY (NumLigue)
 )ENGINE=InnoDB;

#------------------------------------------------------------
# Table: LISTEATTENTE
#------------------------------------------------------------


CREATE TABLE LISTEATTENTE(
   Rang int(4) NOT NULL,
   IDpersonne VARCHAR(30) NOT NULL,
   CONSTRAINT PK_LISTEATTENTE PRIMARY KEY (Rang)
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: RESERVATION
#------------------------------------------------------------

CREATE TABLE RESERVATION(
   NumReservation VARCHAR(5),
   DateReservation DATE,
   DateExpiration DATE,
   NumPlace SMALLINT (3) NOT NULL,
   IDpersonne VARCHAR(30)  NOT NULL,
   CONSTRAINT PK_RESERVATION PRIMARY KEY (NumReservation)
)ENGINE=InnoDB;
