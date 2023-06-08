CREATE TABLE `facebook` CHARACTER SET utf_16 COLLATE utf16_slovenian_ci;

CREATE TABLE `objave`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `naslov_objave` VARCHAR (255) NOT NULL,
    `tekst_objave` TEXT NOT NULL
)
CREATE TABLE `kategorije`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `naziv_kategorije` VARCHAR (255) NOT NULL
)
CREATE TABLE `kategorije_objava`(
    `objava_id` INT, 
    `kategorija_id` INT,
    FOREIGN KEY (`objava_id`)
    REFERENCES `objave`(`id`),
    FOREIGN KEY (`kategorija_id`)
    REFERENCES `kategorije`(`id`)
);
ALTER TABLE `objave` ENGINE = InnoDB;
ALTER TABLE `kategorije` ENGINE = InnoDB;
ALTER TABLE `kategorije_objava` ENGINE = InnoDB;

-- ***Zadatak knjizara***
CREATE DATABASE `knjizara` CHARACTER SET utf16 COLLATE utf16_slovenian_ci;
CREATE TABLE `clanovi`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `ime` VARCHAR (255) NOT NULL,
    `prezime` VARCHAR (255)NOT NULL,
    `adresa` VARCHAR (255),
    `telefon` VARCHAR (255)NOT NULL
)ENGINE=InnoDB;
CREATE TABLE `knjige`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `naziv` VARCHAR (255) NOT NULL,
    `pisac` VARCHAR (255)NOT NULL
)ENGINE=InnoDB;
ALTER TABLE `knjige`
DROP COLUMN `pisac`;
CREATE TABLE `zanr`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `naziv` VARCHAR (255) NOT NULL,
)ENGINE=InnoDB;

CREATE TABLE `pisac`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `ime` VARCHAR (255) NOT NULL,
    `prezime` VARCHAR (255)NOT NULL,
    `bio` TEXT,
    `god_rodjenja` YEAR NOT NULL
)ENGINE=InnoDB;

CREATE TABLE `zaduzenje`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `datum` DATE,
    `vratio` BOOLEAN DEFAULT 0,
    `knjiga_id` INT NOT NULL,
    `clan_id` INT NOT NULL,
    FOREIGN KEY (`knjiga_id`)
    REFERENCES `knjige`(`id`)
    ON DELETE NO ACTION ON UPDATE CASCADE,
    FOREIGN KEY (`clan_id`)
    REFERENCES `clanovi`(`id`)
    ON DELETE NO ACTION ON UPDATE CASCADE
)ENGINE=InnoDB;
ALTER TABLE `zaduzenje` CHANGE COLUMN `knjiga_id` `knjige_id` INT NOT NULL;--za menjanje imena kolone

CREATE TABLE `zanrovi_knjiga`(
    `zanr_id` INT,
    `knjiga_id` INT,
    FOREIGN KEY (`zanr_id`)REFERENCES `zanr`(`id`)
    ON DELETE NO ACTION ON UPDATE CASCADE,
    FOREIGN KEY (`knjiga_id`)REFERENCES `knjiga`(`id`)
    ON DELETE NO ACTION ON UPDATE CASCADE
)ENGINE=InnoDB;
INSERT INTO `knjige` (`naziv`)
VALUES
('Beli Ocnjak'),
('Hiljadu Cudesnih Sunaca'),
('Lovac Na Zmajeve'),
('Prokleta Avlija'),
('Dervis i smrt');
--za promenu imena tabele
ALTER TABLE  `pisac` RENAME TO `pisci`;
INSERT INTO `pisci` (`ime`,`prezime`,`bio`,`god_rodjenja`)
VALUES
('Haled', 'Hoseini','Am pisac Avgan porekla.',1960),
('Ivo', 'Andric','Dobitnik Nobelove nagrade',1915),
('Mesa', 'Selimovic','Dobar pisac',1912),
('Mark', 'Tven','Am pisac Avgan porekla.',1890),
('Tomas', 'MAn','Nemacki pisac pisao o AM prostranstvima. I ako nikada nije posetio Ameriku.',1890),
('Dzek', 'London','Eng pisac',1886);

INSERT INTO `clanovi` (`ime`,`prezime`,`adresa`,`telefon`)
VALUES
('Mika', 'Mikic','Industrijska zona 4','0600555555'),
('Pera ', 'Peric','Bez adrese','0645556699'),
('NIka', 'Nikic','Nepoznati put 11','064888777'),
('Laza', 'Lazic','Beimena 33','0699598896');

INSERT INTO `zaduzenja`(`datum`,`vratio`,`knjiga_id`,`clan_id`)
VALUES
('2023-05-30',0,1,3),
('2023-06-5',1,2,2),
('2023-04-15',1,4,3),
('2023-06-01',0,3,4);

CREATE TABLE `knjige_pisci`(
    `knjiga_id` INT,
    `pisac_id` INT,
    FOREIGN KEY (`knjiga_id`)REFERENCES `knjige`(`id`)
    ON DELETE NO ACTION ON UPDATE CASCADE,
    FOREIGN KEY (`pisac_id`)REFERENCES `pisci`(`id`)
    ON DELETE NO ACTION ON UPDATE CASCADE
)ENGINE=InnoDB;

INSERT INTO `knjige_pisci`
VALUES
(2,1),
(3,1),
(4,2),
(5,3),
(1,6);

INSERT INTO `zanrovi`(`naziv`)
VALUES
('akcija'),
('avantura'),
('ljubavni'),
('istorijski'),
('triler');

INSERT INTO `zanrovi_knjiga`(`zanr_id`,`knjiga_id`)
VALUES
(1,1),
(2,1),
(4,2),
(2,2),
(4,2),
(1,3),
(2,3),
(4,5),
(2,5);

--iz tabele zaduzenja izaberi ime kjige ime clana datum, ali samo one koje jos nisu vracene.
SELECT `knjige`.`naziv` AS `knjiga`,
CONCAT ( `clanovi`.`ime`, " ",`clanovi`.`prezime` ) AS `clan`,
`datum`,`vratio`
FROM `zaduzenja`
LEFT JOIN `knjige` ON `zaduzenja`.`knjiga_id`=`knjige`.`id`
LEFT JOIN `clanovi` ON `zaduzenja`.`clan_id`=`clanovi`.`id`
WHERE `vratio` = 0;

--imane knjiga i imena zanrova iz zanrovi_knjiga
SELECT `knjige`.`naziv`, `zanrovi`.`naziv`
FROM `zanrovi_knjiga`
LEFT JOIN `knjige` ON `zanrovi_knjiga`.`knjiga_id`=`knjige`.`id`
LEFT JOIN `zanrovi` ON `zanrovi_knjiga`.`zanr_id`=`zanrovi`.`id`;

--***univerzitet***--
-- student_indeks
-- predmet_id
-- nastavnik_id 

CREATE DATABASE `univerzitet` CHARACTER SET utf16 COLLATE utf16_slovenian_ci;

-- predmeti (id, naziv, smer)
-- studenti (indeks, ime, prezime)
-- ispiti (id, datum, ocena)
-- nastavnici (id, ime, prezime)

CREATE TABLE `predmeti`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `naziv` VARCHAR (255) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE `stdenti`(
    `indeks` VARCHAR(10) PRIMARY KEY,
    `ime` VARCHAR (255) NOT NULL,
    `prezimeime` VARCHAR (255) NOT NULL
)ENGINE=InnoDB;
ALTER TABLE `stdenti` RENAME TO `studenti`;
ALTER TABLE `studenti` CHANGE COLUMN `prezimeime` `prezime` VARCHAR(255);


CREATE TABLE `nastavnici`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `ime` VARCHAR (255) NOT NULL,
    `prezimeime` VARCHAR (255) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE `ispiti`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `datum` DATE NOT NULL,
    `ocena` INT,
    `student_indeks` VARCHAR(10),
    `predmet_id` INT,
    `nastavnik_id` INT,
    FOREIGN KEY (`student_indeks`)REFERENCES `studenti`(`indeks`)
    ON DELETE NO ACTION ON UPDATE CASCADE,
    FOREIGN KEY (`predmet_id`)REFERENCES `predmeti`(`id`)
    ON DELETE NO ACTION ON UPDATE CASCADE,
    FOREIGN KEY (`nastavnik_id`)REFERENCES `nastavnici`(`id`)
    ON DELETE NO ACTION ON UPDATE CASCADE
)ENGINE=InnoDB;

-- Napisati sve ispite koje su održani na fakultetu (ispisati ime i prezime studenta koji polaze ispit, naziv predmeta, ime i prezime profesora, datum polaganja, kao i ocenu koju je dobio).

SELECT CONCAT(`studenti`.`ime`, " ",`studenti`.`prezime` ) AS `studenti`,
`predmeti`.`naziv`,
CONCAT(`nastavnici`.`ime`, " ",`nastavnici`.`prezime` ) AS `nastavnici`,
`ispiti`.`datum`,
`ispiti`.`ocena`
FROM `ispiti`
LEFT JOIN `studenti` ON `ispiti`.`student_indeks`=`studenti`.`indeks`
LEFT JOIN `nastavnici` ON `ispiti`.`nastavnik_id`=`nastavnici`.`id`
LEFT JOIN `predmeti` ON `ispiti`.`predmet_id`=`predmeti`.`id`;

-- Uraditi prethodni zadatak, samo ispisati one ispite koji su se polagali određenog dana.
SELECT CONCAT(`studenti`.`ime`, " ",`studenti`.`prezime` ) AS `studenti`,
`predmeti`.`naziv`,
CONCAT(`nastavnici`.`ime`, " ",`nastavnici`.`prezime` ) AS `nastavnici`,
`ispiti`.`datum`,
`ispiti`.`ocena`
FROM `ispiti`
LEFT JOIN `studenti` ON `ispiti`.`student_indeks`=`studenti`.`indeks`
LEFT JOIN `nastavnici` ON `ispiti`.`nastavnik_id`=`nastavnici`.`id`
LEFT JOIN `predmeti` ON `ispiti`.`predmet_id`=`predmeti`.`id`
WHERE `ispiti`.`datum` = '2023-04-17';

-- Za dato ime i prezime studenta, ispisati sve ispite koje je polagao dati student.
SELECT CONCAT(`studenti`.`ime`, " ",`studenti`.`prezime` ) AS `studenti`,
`predmeti`.`naziv`,
CONCAT(`nastavnici`.`ime`, " ",`nastavnici`.`prezime` ) AS `nastavnici`,
`ispiti`.`datum`,
`ispiti`.`ocena`
FROM `ispiti`
LEFT JOIN `studenti` ON `ispiti`.`student_indeks`=`studenti`.`indeks`
LEFT JOIN `nastavnici` ON `ispiti`.`nastavnik_id`=`nastavnici`.`id`
LEFT JOIN `predmeti` ON `ispiti`.`predmet_id`=`predmeti`.`id`
WHERE `studenti`.`ime` = 'Nikola' AND `studenti`.`prezime` = 'Vemic';

-- Uraditi zadatak 3) tako da se ispišu samo takvi ispiti na kojima je ocena veća od 8.
SELECT CONCAT(`studenti`.`ime`, " ",`studenti`.`prezime` ) AS `studenti`,
`predmeti`.`naziv`,
CONCAT(`nastavnici`.`ime`, " ",`nastavnici`.`prezime` ) AS `nastavnici`,
`ispiti`.`datum`,
`ispiti`.`ocena`
FROM `ispiti`
LEFT JOIN `studenti` ON `ispiti`.`student_indeks`=`studenti`.`indeks`
LEFT JOIN `nastavnici` ON `ispiti`.`nastavnik_id`=`nastavnici`.`id`
LEFT JOIN `predmeti` ON `ispiti`.`predmet_id`=`predmeti`.`id`
WHERE `studenti`.`ime` = 'Nikola' AND `studenti`.`prezime` = 'Vemic' AND `ispiti`.`ocena` >8 ;

-- Za dato ime i prezime studenta, odrediti njegovu prosečnu ocenu.
SELECT AVG(`ispiti`.`ocena`) AS `nikola_prosecna_ocena`
FROM `ispiti`
LEFT JOIN `studenti` ON `ispiti`.`student_indeks`=`studenti`.`indeks`
WHERE `studenti`.`ime`='Nikola' AND `studenti`.`prezime`='Vemic';

-- Za dat naziv predmeta odrediti maksimalnu ocenu na nekom ispitu iz tog predmeta.
SELECT MAX(`ispiti`.`ocena`) AS `max_ocena_iz_predmeta`
FROM `ispiti`
LEFT JOIN `predmeti` ON `ispiti`.`predmet_id`=`predmeti`.`id`
WHERE `predmeti`.`naziv`= 'Css';

-- Za dat naziv predmeta odrediti izabrati sve ocene
SELECT `ispiti`.`ocena` AS `ocene_css`
FROM `ispiti`
LEFT JOIN `predmeti` ON `ispiti`.`predmet_id`=`predmeti`.`id`
WHERE `predmeti`.`naziv`= 'Css';

-- Za dat datum odrediti prosečnu ocenu svih ispita koji su se polagali u toj godini.

SELECT AVG(`ocena`) AS `prosek_za_datum`
FROM `ispiti`
WHERE `datum` = 
