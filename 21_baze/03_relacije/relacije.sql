CREATE DATABASE drustvena_mreza CHARACTER SET utf16 COLLATE utf16_slovenian_ci;
CREATE TABLE `korisnici`(
    `id` INT,
    `korisnicko_ime` VARCHAR(45),
    `lozinka` VARCHAR(45),
    PRIMARY KEY (`id`);
)

CREATE TABLE `profili`(
    `id` INT,
    `adresa` VARCHAR(45),
    `telefon` VARCHAR(45),
    `korisnik_id` INT --ovde samo smo trebali UNIQUE da dodamo
);
--ako ne naedemo ENGINE on stavlja default u mom slucaju innoDB
--nekom stavi MyISAM
--ENGIN cemo uvek navoditi u upitima da se osiguramo
--ako se ne navede NOT NULL po difoltu stavlja da je dozvoljeno da bude NULL.
--INDEX je nacin da se do nekog podatka brze dodje.
--Primarni kljuc automatski indeksira.
--Indeksiramo neki podatak koji ne mora nuzno da bude jedinstven ali je bitan.

--dodajemo strani kljuc
ALTER TABLE `profili`
-- ADD CONSTRAINT `profil_korisnik_fk`
ADD
FOREIGN KEY (`korisnik_id`)--na koga u pod tabeli stavljamo da bude foreign key
REFERENCES `korisnici`(`id`)--na koga se odnsosi u parent tabeli
ON UPDATE CASCADE ON DELETE CASCADE;

--u enginu MySAM nemoguce je napraviti vezu.
--obe tabeli moraju da imaju engine inoDB
--Promena ENGINE
ALTER TABLE `profili` ENGINE=INNODB;
ALTER TABLE `korisnici` ENGINE=INNODB;

--kako da se obezbedi da bude 1:1 veza.

ALTER TABLE `profili` ADD UNIQUE(`korisnik_id`);

INSERT INTO `korisnici` (`id`,`korisnicko_ime`,`lozinka`)
VALUES
(1,'pera_peric','1234'),
(2,'mika_mikic','12345'),
(3,'nikola_nikolic','1212');

INSERT INTO `profili` (`id`,`korisnik_id`,`adresa`)
VALUES
(1,3,'adresa korisnika id 5'),
(10,2,'adresa korisnika id 2');
INSERT INTO `profili` (`id`,`korisnik_id`,`adresa`)
VALUES
(2,50,'adresa korisnika id 50');--nemoguce jer nemamo korisnika sa id 50

INSERT INTO `profili` (`id`,`korisnik_id`,`adresa`)
VALUES
(1,3,'adresa korisnika id 3');--nemoguce da napravimo jer je 1:1 konekcija.

--****1:N veza***
--Ovde se ne stavlja UNIQUE za FOREIGN KEY.
--Jedan podatak iz jedne tabele treba da ima vise redova u drugoj tabeli.
--Npr korisnik koji ima vise profila.
--Isto kao i predhodna samo bez UNIQUE.
--objava ima visekomentara ali svaki komentar pripada tacno jednoj objavi.

CREATE TABLE `objave`(
    `id` INT PRIMARY KEY,
    `naslov_objave` VARCHAR(45)
)ENGINE=InnoDB;

CREATE TABLE `komentari`(
    `id` INT PRIMARY,
    `tekst_komentara` VARCHAR(45) NOT NULL,
    `objava_id` INT NOT NULL 
)ENGINE=InnoDB;

ALTER TABLE `komentari`
ADD CONSTRAINT `komentari_objava_fk`
FOREIGN KEY (`objava_id`)
REFERENCES `objave` (`id`)
ON DELETE CASCADE ON UPDATE CASCADE;

INSERT INTO `objave` (`id`,`naslov_objave`)
VALUES
(1,`Moja prva objava`),
(2,`Moja druga objava`),
(3,`Moja treca objava`);

INSERT INTO `komentari` (`id`,`objava_id`,`tekst_komentara`)
VALUES
(1,1,'Kometar 1 za objavu 1'),
(2,1,'Kometar 2 za objavu 1'),
(3,2,'Kometar 1 za objavu 2');

--****N:M ili N-M veza***
--Zapisi iz jedne tabele ne pripada jednom redu iz druge vec vise redova.
--Jedan film ima vise zanrvo ali takodje pod npr komedijama imamo vise filmova.
--Jedan  film vise zanrvo jedan anr vise filmova

--Ovo se postiže tako što napravimo treću tabelu i u njoj se nalaze dva strana ključa koji NISU UNIQUE. Prva i druga tabela su relacijom jedan prema više povezane sa ovom tabelom.

--treca tabela se pravi sa dva foreign kljuca. Prve dve tabele su povezane sa tom trecom relacijom 1:N.

CREATE TABLE `kategorije`(
    `id` INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `naziv` VARCHAR(50) NOT NULL
)ENGINE=InnoDB;

INSERT `kategorije` (`id`,`naziv`)
VALUES
(1,'ekonomija'),
(NULL,'ekonomija');

INSERT `kategorije` (`naziv`)
VALUES
('Ekonomija'),
('Drustvo'),
('Ljubav'),
('Crna Hronika');

CREATE TABLE `kategorije_has_objave`(
   --`kategorije_id` INT ovo je greska mora da bude isti tip kao i u parent koloni tj kolona skojom je povezujemo. Ne navodi se auto_increment jer se on stavlja samo od polja koji ce nam biti primary key.
    `kategorije_id` INT(10) UNSIGNED,
    `objava_id` INT NOT NULL,
)ENGINE=InnoDB;

--menjamo tip polja.
ALTER TABLE  `kategorije_has_objave`
CHANGE `kategorija_id`
`kategorija_id` INT(10) UNSIGNED NOT NULL;

ALTER TABLE `kategorije_has_objave`
    ADD CONSTRAINT `kat_obj_kategorije_fk`
    FOREIGN KEY (`kategorija_id`)
    REFERENCES `kategorije`(`id`)
    ON DELETE NO ACTION ON UPDATE CASCADE,
    ADD CONSTRAINT `kat_obj_objava_fk`
    FOREIGN KEY (`objava_id`)
    REFERENCES `objave`(`id`)
    ON DELETE CASCADE ON UPDATE CASCADE;

INSERT INTO `kategorije_has_objave`(`kategorija_id`,`objava_id`)
VALUES
(1,1),
(4,1),
(2,2),
(2,2),
(3,3);