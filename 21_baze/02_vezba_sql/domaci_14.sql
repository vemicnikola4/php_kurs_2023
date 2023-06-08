
-- Napraviti bazu podataka videoteka.
-- U bazi videoteka, napraviti tabelu filmovi koja sadrži sledeće kolone:
-- id – Ceo broj i primarni ključ.
-- naslov – Tekstualni podatak dužine do 255 karaktera različit od NULL.
-- reziser – Tekstualni podatak dužine do 255 karaktera različit od NULL.
-- god_izdavanja – YEAR različit od NULL.
-- zanr– Tekstualni podatak dužine do 255 karaktera različit od NULL.
-- ocena –Decimalni broj 

-- Kreirati sledeće upite:
-- Selektovati sve filmove gde je žanr tragedija, komedija ili drama.
-- Selektovati sve filmove kojima je ocena između 5 i 10.
-- Selektovati režisere (bez ponavljanja) koji su režirali filmove izdate 2003. godine i poređati ih abecednim redom. 
-- Selektovati sve filmove tako da im zanr nije komedija.
-- Prikazati sve informacije o najbojle rangiranom filmu
-- Prikazati sve informacije o najbolje rangiranoj drami.
-- Selektovati trojicu rezisera ciji filmovi imaju najbolje ocene.
-- Selektovati sve žanrove filmova, bez ponavljanja.
-- Selektovati sve filmove u obliku naslov (režiser) na primer Plane (Jean-François Richet)
-- Selektovati sve filmove u obliku naslov (režiser) – godina izdanja na primer Plane (Jean-François Richet) - 2023 . Selektovane filmove sortirati rastuće prema godini izdanja.
-- Odrediti prosečnu ocenu fimova koji su izdati nakon 2000 godine

CREATE DATABASE `videostore` CHARACTER SET utf16 COLLATE utf16_slovenian_ci;
USE `videostore`
CREATE TABLE `filmovi`(
    `id` INT,
    `naslov` VARCHAR (255) NOT NULL,
    `reziser` VARCHAR (255) NOT NULL,
    `godina_izdanja` SMALLINT NOT NULL,
    `zanr` VARCHAR (255),
    `ocena` DECIMAL (2,1),
    PRIMARY KEY (`id`)
)

INSERT INTO `filmovi`
VALUES 
( 1, 'Gospodar Prstenova','Piter Dzekson',2001,'Naucna Fantastika',8.7),
( 2, 'Hrabro Srce','Mel Gibson',1995,'Istorijski',8.5),
( 3, 'Robin Hud','Ridli Skot',2006,'Istorijski',8.2),
( 4, 'Inseption','Kristofer Nolan',2014,'Naucna Fantastika',8.9),
( 5, 'Memento','Kristofer Nolan',2002,'Triler',8.1),
( 6, 'Porodican Covek','Sem Mekfarlan',2000,'Komedija',7.8),
( 7, 'Roki 7','Silvester Stalone',2019,'Drama',4.1);

-- Selektovati sve filmove gde je žanr tragedija, komedija ili drama.
SELECT * FROM `filmovi`
WHERE `zanr` IN ( 'tragedija','komedija','drama');
-- Selektovati sve filmove kojima je ocena između 5 i 10 od iztorijskih filmova izdatih nakon 2005.
SELECT * FROM `filmovi` 
WHERE `ocena` BETWEEN 5 AND 9 AND `znar` = 'istorijski' AND `godina_izdanja` > 2005;
-- Selektovati režisere (bez ponavljanja) koji su režirali filmove izdate 2003. godine i poređati ih abecednim redom. 
SELECT DISTINCT `reziser` AS `svi_reziseri`
FROM `filmovi`;
--selektuj najbolje ocenjeni film Kamerona
SELECT * FROM 
`filmovi`
WHERE `reziser` = 'Dzejms Kameron' AND `ocena` = (SELECT MAX(`ocena`) FROM `filmovi` WHERE `reziser` = 'Dzejms Kameron');
--selektuj najlosije ocenjeni film Kamerona
SELECT * FROM 
`filmovi`
WHERE `reziser` = 'Dzejms Kameron' AND `ocena` = (SELECT MIN(`ocena`) FROM `filmovi` WHERE `reziser` = 'Dzejms Kameron');
-- Selektovati sve filmove tako da im zanr nije komedija.
SELECT * FROM `filmovi`
WHERE `zanr` != 'komedija';
-- Selektovati sve filmove ocenjeni sa vise od 8.5.
SELECT CONCAT(`naslov`,' ',`reziser`,' ',`ocena`) AS `najbolje_ocenjeni_filmovi`
FROM `filmovi`
WHERE `ocena` > 8.5;
-- Selektovati sve natprosecne filmove
SELECT CONCAT(`naslov`,' ',`reziser`,' ',`ocena`) AS `natprosecno_ocenjeni`
FROM `filmovi` 
WHERE `ocena` > ( SELECT AVG(`ocena`) FROM `filmovi`);
-- Selektovati režisere (bez ponavljanja) koji su režirali filmove izdate 1995. godine i poređati ih abecednim redom. 

SELECT DISTINCT `reziser`
FROM `filmovi`
WHERE `godina_izdanja` = 1995
ORDER BY `reziser` ASC;
-- Prikazati sve informacije o najbolje rangiranoj drami.
SELECT * FROM `filmovi`
WHERE `zanr` = 'drama' AND `ocena` = (SELECT MAX(`ocena`) FROM `filmovi` WHERE `zanr` = 'drama')
LIMIT 1;

-- Selektovati trojicu rezisera ciji filmovi imaju najbolje ocene.
SELECT DISTINCT `reziser`,`ocena` AS `najbolji_reziseri`
FROM `filmovi`
ORDER BY `ocena` DESC 
LIMIT 3;
-- Odrediti prosečnu ocenu fimova koji su izdati nakon 2000 godine
SELECT AVG(`ocena`) AS `prosecna_ocena`
FROM `filmovi`
WHERE `godina_izdanja` > 2000;