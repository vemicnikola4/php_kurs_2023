CREATE DATABASE `biblioteka` CHARACTER SET utf16 COLLATE utf16_slovenian_ci; 
--clanovi (id, ime, prezime, adresa, telefon)

CREATE TABLE `clanovi`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `ime` VARCHAR(255) NOT NULL,
    `prezime` VARCHAR(255) NOT NULL,
    `adresa` VARCHAR(255),
    `telefon` VARCHAR(255)
)ENGINE=InnoDB;

ALTER TABLE `clanovi` 
MODIFY 
`adresa` VARCHAR(255) NOT NULL;
ALTER TABLE `clanovi` 
MODIFY 
`telefon` VARCHAR(255) NOT NULL;
--knjige(id, naziv, pisac)
CREATE TABLE `knjige`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `naziv` VARCHAR(255) NOT NULL,
    `pisac` VARCHAR(255) NOT NULL
)ENGINE=InnoDB;
ALTER TABLE `knjige`
DROP `pisac`;

--zanr (id, naziv)
CREATE TABLE `zanr`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `naziv` VARCHAR(255)
)ENGINE=InnoDB;
--zaduzenje (id, datum, vratio)
CREATE TABLE `zaduzenje`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `datum` DATE NOT NULL,
    `vratio` BOOLEAN NOT NULL DEFAULT 0
)
ALTER TABLE `zaduzenje` ENGINE=INNODB;


-- pisac (id, ime, prezime, bio, god_rodj)
CREATE TABLE `pisac`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `ime` VARCHAR(255) NOT NULL,
    `prezime` VARCHAR(255) NOT NULL,
    `bio` TEXT,
    `god_rodj` YEAR NOT NULL,
)ENGINE=InnoDB;

-- Povezati prethodno napravljene tabele i dodati im potrebna polja prema sledećim uputstvima:
-- Jedan žanr može biti odrednica za više knjiga i jedna knjiga može pripadati u više žanrova.
-- Jedna osoba može više puta zaduživati knjige i jedna knjiga može biti zadužena od strane više osoba.

-- Jedan žanr može biti odrednica za više knjiga i jedna knjiga može pripadati u više žanrova.
CREATE TABLE `knjige_zanr`(
    `knjiga_id` INT ,
    `zanr_id` INT
)
ALTER TABLE `knjige_zanr` ENGINE=INNODB;

ALTER TABLE `knjige_zanr`
ADD
FOREIGN KEY (`knjiga_id`)
REFERENCES `knjige`(`id`)
ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE `knjige_zanr`
ADD
FOREIGN KEY (`zanr_id`)
REFERENCES `zanr`(`id`)
ON UPDATE CASCADE ON DELETE CASCADE;

INSERT INTO `knjige` (`naziv`,`pisac`)
VALUES 
('Beli Ocnjak','Dzek London'),
('Oliver Tvist','Mark Tven'),
('Hiljdu Cudesnh Sunaca','Haled Hoseini'),
('Lovac Na Zmajeve','Haled Hoseini');


-- Jedna osoba može više puta zaduživati knjige i jedna knjiga može biti zadužena od strane više osoba.
CREATE TABLE `zaduzene_knjige`(
    `clan_id` INT
    `knjiga_id` INT,
)
ALTER TABLE `zaduzene_knjige` ENGINE=INNODB;

ALTER TABLE `zaduzene_knjige`
ADD
FOREIGN KEY (`clan_id`)
REFERENCES `clanovi`(`id`)
ON UPDATE CASCADE ON DELETE NO ACTION;
ALTER TABLE `zaduzene_knjige`
ADD
FOREIGN KEY (`knjiga_id`)
REFERENCES `knjige`(`id`)
ON UPDATE CASCADE ON DELETE NO ACTION;

-- Jedan pisac može napisati više knjiga, a takođe jedna knjiga može biti napisana od strane jednog ili više pisaca.
CREATE TABLE `knjige_pisac`(
    `knjiga_id` INT ,
    ADD FOREIGN KEY(`knjiga_id`)
    REFERENCES `knjige`(`id`);
)
ALTER TABLE `knjige_pisac` 
    ADD FOREIGN KEY(`pisac_id`)
    REFERENCES `pisac`(`id`)
    ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `knjige_pisac` ENGINE=INNODB;

INSERT INTO `pisac` 
VALUES 
(null,'Haled','Hoseini','Dobar pisac',1966),
(null,'Dzek','London','Dobar pisac',1899),
(null,'Skot',' Fcdzerald','Dobar pisac',1920),
(null,'Ivo',' ANdric','Dobar pisac',1905);

INSERT INTO `clanovi`
(null,'Nikola','SImic','Narodnh heroja','0600458989'),
(null,'Nikola','Mimic','Narodnh heroja','0600458989'),
(null,'Laza','Kostic','Narodnh heroja','0600458989'),
(null,'Balsa','Popovic','Narodnh heroja','0600458989');

ALTER TABLE `zaduzenje`
ADD `knjiga_id` INT,
ADD FOREIGN KEY (`knjiga_id`)
REFERENCES `knjige`(`id`)
ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE `zaduzenje`
ADD `clan_id` INT,
ADD FOREIGN KEY (`clan_id`)
REFERENCES `clanovi`(`id`)
ON UPDATE CASCADE ON DELETE NO ACTION;

ALTER TABLE `zaduzenje`
ADD FOREIGN KEY (`knjiga_id`)
REFERENCES `knjige`(`id`)
ON UPDATE CASCADE ON DELETE NO ACTION;

INSERT INTO `zaduzenje` 
VALUES
(NULL,'2023-05-05',0,1,2),
(NULL,'2023-05-05',0,2,3),
(NULL,'2023-05-05',0,3,1);


INSERT INTO `knjige_pisac` 
VALUES
(1,2),
(3,1),
(4,1);