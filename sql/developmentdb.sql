-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Nov 30, 2021 at 02:48 PM
-- Server version: 10.6.4-MariaDB-1:10.6.4+maria~focal
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `developmentdb`
CREATE TABLE clubniews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kop VARCHAR(100),
    date DATE,
    text VARCHAR(1400)
);
INSERT INTO clubniews (kop, date, text)
VALUES ('Leden administratie', '2024-03-08', 'Wie zou voor Flashing de ledenadministratie willen gaan doen? Het is een behapbare klus. Het geheel is volledig digitaal. Het betreft vooral het tijdig in- en uitschrijven van leden en invoeren van teams. Daarnaast zou het fijn zijn als je wilt meepraten in het bestuur maar dat hoeft niet. Voor verdere informatie stuur een mail naar voorzitter@flashingheiloo.nl'),
       ('Lidmaatschap opzeggen', '2024-03-09', 'Een verenigingsjaar loopt van 1 juli tot en met 1 juli. Opzegging door of namens het lid voor het nieuwe verenigingsjaar dient te geschieden vóór 1 juni van het lopende verenigingsjaar door schriftelijke opzegging per brief of per e-mail. Indien het lidmaatschap tussen 1 juni en 1 september van een lopend verenigingsjaar wordt opgezet is 50 % van het contributiebedrag verschuldigd met daarbij € 25,= aan administratieve heffing. Indien het lidmaatschap na 1 september van het lopende verenigingsjaar wordt opgezet is 100 % van het contributiebedrag verschuldigd. Leden dienen zich via mail af te melden bij: Ledenadministratie Flashing Heiloo e-mail: ledenadministratie@flashing-heiloo.nl In verband met contributieafdracht aan de NBB is het noodzakelijk af te melden voor 1 juni. Doe je het later, dan ben je aanvullende contributie verplicht omdat wij dan al kosten hebben moeten maken. Opzeggen kan pas als je de contributie volledig betaald hebt. Je kan pas lid worden van een andere sportvereniging als dat het geval is. Mocht je de verschuldigde contributie niet betaald hebben voor 1 juni ben je eveneens aanvullende contributie verschuldigd in verband met de contributieafdracht bij de NBB voor het komende seizoen. Verder komen eventuele incassokosten ook voor je eigen rekening.'),
       ('De eerste facturatieronde voor de contributie is verstuurd', '2024-03-10', 'Onderstaand zie je de contributie voor dit seizoen zoals de recente Ledenvergadering deze heeft vastgesteld. Zoals gebruikelijk versturen we de facturen in twee ronden om het bedrag ineens niet te groot te maken. Wel zijn we op zoek naar een betere methode. Vergeet svp niet op tijd te betalen! We willen echt de betalingstermijnen gaan handhaven. Bij problemen: stuur een mail naar onze penningmeester Karin: penningmeester@flashing-heiloo.nl.');

CREATE TABLE wedstrijd (
    id INT AUTO_INCREMENT PRIMARY KEY,
    team1 VARCHAR(255),
    team2 VARCHAR(255),
    schijdsrechter1 INT,
    schijdsrechter2 INT,
    tafel1 INT,
    tafel2 INT,
    datum DATETIME
);
INSERT INTO wedstrijd (team1, team2, schijdsrechter1, schijdsrechter2, tafel1, tafel2, datum)
VALUES
('Flashing Heiloo u14', 'MBCA u14', 3, 4, 1, 2, '2024-04-01 10:00:00'),
('Flashing Heiloo u18', 'MBCA u18', 2, 1, 3, 4, '2024-04-02 14:00:00'),
('Flashing Heiloo u16', 'MBCA u16', 7, 8, 5, 6, '2024-04-03 18:00:00'),
('Flashing Heiloo u14', 'HBC u14', 5, 6, 1, 2, '2024-04-04 22:00:00'),
('Flashing Heiloo u18', 'HBC u18', 1, 2, 3, 4, '2024-04-05 02:00:00');



CREATE TABLE speler (
    id INT AUTO_INCREMENT PRIMARY KEY,
    voornaam VARCHAR(255),
    achternaam VARCHAR(255),
    geboortedatum DATE,
    team VARCHAR(255)
);

INSERT INTO speler (voornaam, achternaam, geboortedatum, team)
VALUES 
    ('John', 'Doe', '1990-01-01', 'u14'),
    ('Jane', 'Smith', '1991-02-02', 'u14'),
    ('Michael', 'Johnson', '1992-03-03', 'u16'),
    ('Emily', 'Williams', '1993-04-04', 'u18'),
    ('Robert', 'Brown', '1994-05-05', 'u18'),
    ('Piet', 'Groen', '1990-01-01', 'u14'),
    ('Kees', 'Vissers', '1991-02-02', 'u14'),
    ('Henk', 'Jansen', '1992-03-03', 'u16'),
    ('Joost', 'Tolsma', '1993-04-04', 'u18'),
    ('Peter', 'Gakpo', '1994-05-05', 'u18');


CREATE TABLE programma (
    id INT NOT NULL AUTO_INCREMENT,
    beginTijd TIME,
    eindTijd TIME,
    dag VARCHAR(10),
    team VARCHAR(10),
    locatie VARCHAR(255),
    PRIMARY KEY (id)
);
INSERT INTO programma (beginTijd, eindTijd, dag, team, locatie)
VALUES ('08:00:00', '10:00:00', 'Maandag', 'U14', 'burenweg');

INSERT INTO programma (beginTijd, eindTijd, dag, team, locatie)
VALUES ('10:00:00', '12:00:00', 'Maandag', 'U16', 'burenweg');

INSERT INTO programma (beginTijd, eindTijd, dag, team, locatie)
VALUES ('12:00:00', '14:00:00', 'Woensdag', 'U14', 'burenweg');

INSERT INTO programma (beginTijd, eindTijd, dag, team, locatie)
VALUES ('14:00:00', '16:00:00', 'Vrijdag', 'U16', 'burenweg');

INSERT INTO programma (beginTijd, eindTijd, dag, team, locatie)
VALUES ('16:00:00', '18:00:00', 'Vrijdag', 'U18', 'burenweg');



CREATE TABLE wachtwoord (
    id INT NOT NULL AUTO_INCREMENT,
    wachtwoord VARCHAR(64),
    PRIMARY KEY (id)
);

INSERT INTO wachtwoord (wachtwoord)
VALUES ('a53b7f3779e7e2d327b3c403fad33e1c1ac7d3c67340cb549a084796842301c1');
