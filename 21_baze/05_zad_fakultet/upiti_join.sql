CREATE DATABASE `fakultet` CHARACTER SET utf16 COLLATE utf16_slovenian_ci;

CREATE TABLE `predmeti`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `naziv` VARCHAR (255) NOT NULL,
    `smer` VARCHAR(255) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE `studenti`(
    `index` VARCHAR (20) PRIMARY KEY,
    `ime` VARCHAR (255) NOT NULL,
    `prezime` VARCHAR(255) NOT NULL
)ENGINE=InnoDB;

-- student_indeks
-- predmet_id
-- nastavnik_id 
-- Za menjanje kolone u tabeli koristi se:
-- ALTER TABLE table_name 
-- MODIFY COLUMN column_name datatype;

CREATE TABLE `nastavnici`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `ime` VARCHAR (255) NOT NULL,
    `prezime` VARCHAR(255) NOT NULL
)ENGINE=InnoDB;
ALTER TABLE `nastavnici` CHANGE COLUMN `prezimeime` `prezime` VARCHAR(255);

CREATE TABLE `ispiti`(
    `ispiti` INT AUTO_INCREMENT PRIMARY KEY,
    `datum` DATE NOT NULL,
    `ocena` INT NOT NULL
    `student_indeks` VARCHAR (20),
    `predmet_id` INT,
    `nastavnik_id` INT
   
)ENGINE=InnoDB;

-- Za menjanje kolone u tabeli koristi se:
-- ALTER TABLE table_name 
-- MODIFY COLUMN column_name datatype;

ALTER TABLE `ispiti`
 ADD FOREIGN KEY (`student_indeks`)
    REFERENCES `studenti`(`index`)
    ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE `ispiti`
    ADD FOREIGN KEY (`predmeti_id`)
    REFERENCES `predmet`(`id`)
    ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE `ispiti`
    ADD FOREIGN KEY (`nastavnici_id`)
    REFERENCES `nastavnik`(`id`)
    ON DELETE NO ACTION ON UPDATE CASCADE;

    INSERT INTO `nastavnici` (`id`, `ime`, `prezime`) VALUES
(1, 'Stefan ', 'Stanimirović'),
(2, 'Elizabeta', 'Markuš Mitrinović'),
(3, 'Milena', 'Đoređević');

INSERT INTO `predmeti` (`id`, `naziv`) VALUES
(1, 'Css'),
(2, 'Html'),
(3, 'PHP'),
(4, 'MySql'),
(5, 'HR');

INSERT INTO `studenti` (`indeks`, `ime`, `prezime`) VALUES
('WEB 1/2023', 'Adam', 'Dervisevic'),
('WEB 10/2023', 'Kosta', 'Blagojevic'),
('WEB 11/2023', 'Luka', 'Milinovic'),
('WEB 12/2023', 'Maja', 'Mladenovic'),
('WEB 13/2023', 'Marija', 'Jancić'),
('WEB 14/2023', 'Marija', 'Vlašković'),
('WEB 15/2023', 'Marijana', 'Tomić'),
('WEB 16/2023', 'Mihajlo', 'Stefanovic'),
('WEB 17/2023', 'Milijana', 'Stojanović'),
('WEB 18/2023', 'Nemanja', 'Toskic'),
('WEB 19/2023', 'Nikola', 'Devic'),
('WEB 2/2023', 'Aleksandar', 'Jovanović'),
('WEB 20/2023', 'Nikola', 'Mitrović'),
('WEB 21/2023', 'Nikola', 'Vemić'),
('WEB 22/2023', 'Saša', 'Vujić'),
('WEB 23/2023', 'Srđan', 'Ćulibrk'),
('WEB 24/2023', 'Stefani', 'Lakićević'),
('WEB 25/2023', 'Uroš', 'Žikić'),
('WEB 26/2023', 'Veljko', 'Marjanovic'),
('WEB 3/2023', 'Anđela', 'Nikolić'),
('WEB 4/2023', 'Andreja', 'Raičević'),
('WEB 5/2023', 'Borivoje', 'Krstic'),
('WEB 6/2023', 'Dragana', 'Antonijević'),
('WEB 7/2023', 'Dunja', 'Kolarski'),
('WEB 8/2023', 'Dusan', 'Nesic'),
('WEB 9/2023', 'Filip', 'Nikolić');
ALTER 
INSERT INTO `ispiti` (`id`, `datum`, `ocena`, `student_indeks`, `predmet_id`, `nastavnik_id`) VALUES
(1, '2023-04-17', 5, 'WEB 17/2023', 1, 2),
(2, '2023-04-17', 8, 'WEB 22/2023', 1, 2),
(3, '2023-04-17', 6, 'WEB 24/2023', 1, 2),
(4, '2023-04-17', 9, 'WEB 20/2023', 1, 2),
(5, '2023-04-17', 7, 'WEB 26/2023', 1, 2),
(6, '2023-04-17', 9, 'WEB 13/2023', 1, 2),
(7, '2023-04-17', 5, 'WEB 9/2023', 1, 2),
(8, '2023-04-17', 8, 'WEB 1/2023', 1, 1),
(9, '2023-04-17', 6, 'WEB 5/2023', 1, 2),
(10, '2023-04-17', 9, 'WEB 10/2023', 1, 2),
(11, '2023-04-17', 9, 'WEB 4/2023', 1, 2),
(12, '2023-04-17', 6, 'WEB 15/2023', 1, 2),
(13, '2023-04-17', 8, 'WEB 3/2023', 1, 2),
(14, '2023-04-17', 7, 'WEB 2/2023', 1, 1),
(15, '2023-04-17', 8, 'WEB 7/2023', 1, 1),
(16, '2023-04-17', 5, 'WEB 21/2023', 1, 2),
(17, '2023-04-17', 8, 'WEB 25/2023', 1, 2),
(18, '2023-04-17', 8, 'WEB 23/2023', 1, 1),
(19, '2023-04-17', 5, 'WEB 6/2023', 1, 1),
(20, '2023-04-17', 5, 'WEB 19/2023', 1, 1),
(21, '2023-04-17', 8, 'WEB 16/2023', 1, 2),
(22, '2023-04-17', 5, 'WEB 12/2023', 1, 2),
(23, '2023-04-17', 10, 'WEB 11/2023', 1, 2),
(24, '2023-04-17', 9, 'WEB 18/2023', 1, 1),
(25, '2023-04-17', 6, 'WEB 8/2023', 1, 2),
(26, '2023-04-17', 5, 'WEB 14/2023', 1, 1),
(27, '2023-05-01', 7, 'WEB 11/2023', 2, 1),
(28, '2023-05-01', 8, 'WEB 20/2023', 2, 2),
(29, '2023-05-01', 9, 'WEB 22/2023', 2, 1),
(30, '2023-05-01', 6, 'WEB 13/2023', 2, 1),
(31, '2023-05-01', 5, 'WEB 15/2023', 2, 2),
(32, '2023-05-01', 5, 'WEB 4/2023', 2, 2),
(33, '2023-05-01', 7, 'WEB 3/2023', 2, 2),
(34, '2023-05-01', 8, 'WEB 8/2023', 2, 1),
(35, '2023-05-01', 7, 'WEB 21/2023', 1, 1),
(36, '2023-05-01', 8, 'WEB 9/2023', 2, 2),
(37, '2023-05-01', 10, 'WEB 7/2023', 2, 2),
(38, '2023-05-01', 7, 'WEB 18/2023', 2, 1),
(39, '2023-05-01', 5, 'WEB 19/2023', 2, 2),
(40, '2023-05-01', 8, 'WEB 17/2023', 2, 2),
(41, '2023-05-01', 8, 'WEB 25/2023', 2, 2),
(42, '2023-05-01', 10, 'WEB 23/2023', 2, 2),
(43, '2023-05-01', 9, 'WEB 14/2023', 2, 2),
(44, '2023-05-01', 5, 'WEB 1/2023', 2, 2),
(45, '2023-05-01', 5, 'WEB 16/2023', 2, 1),
(47, '2023-05-01', 7, 'WEB 26/2023', 2, 1),
(48, '2023-05-01', 5, 'WEB 6/2023', 2, 2),
(49, '2023-05-01', 7, 'WEB 5/2023', 2, 2),
(50, '2023-05-01', 5, 'WEB 10/2023', 2, 2),
(51, '2023-05-01', 7, 'WEB 2/2023', 2, 2),
(52, '2023-05-01', 9, 'WEB 24/2023', 2, 1),
(53, '2023-05-15', 8, 'WEB 3/2023', 3, 1),
(54, '2023-05-15', 9, 'WEB 20/2023', 3, 1),
(55, '2023-05-15', 5, 'WEB 2/2023', 3, 2),
(57, '2023-05-15', 5, 'WEB 1/2023', 3, 2),
(58, '2023-05-15', 7, 'WEB 24/2023', 3, 1),
(59, '2023-05-15', 5, 'WEB 11/2023', 3, 2),
(61, '2023-05-15', 7, 'WEB 13/2023', 3, 1),
(62, '2023-05-15', 6, 'WEB 19/2023', 3, 1),
(63, '2023-05-15', 7, 'WEB 23/2023', 3, 2),
(64, '2023-05-15', 5, 'WEB 25/2023', 3, 1),
(65, '2023-05-15', 6, 'WEB 4/2023', 3, 1),
(67, '2023-05-15', 7, 'WEB 21/2023', 2, 2),
(68, '2023-05-15', 7, 'WEB 14/2023', 3, 1),
(69, '2023-05-15', 5, 'WEB 6/2023', 2, 1),
(70, '2023-05-15', 8, 'WEB 7/2023', 3, 1),
(71, '2023-05-15', 5, 'WEB 10/2023', 3, 1),
(72, '2023-05-15', 6, 'WEB 17/2023', 3, 1),
(73, '2023-05-15', 6, 'WEB 8/2023', 3, 2),
(74, '2023-05-15', 6, 'WEB 26/2023', 3, 2),
(75, '2023-05-15', 5, 'WEB 18/2023', 3, 2),
(76, '2023-05-15', 10, 'WEB 5/2023', 3, 1),
(77, '2023-05-15', 10, 'WEB 22/2023', 3, 1),
(78, '2023-05-15', 7, 'WEB 9/2023', 3, 1),
(79, '2023-06-05', 6, 'WEB 22/2023', 4, 1),
(81, '2023-06-05', 6, 'WEB 2/2023', 4, 2),
(82, '2023-06-05', 9, 'WEB 11/2023', 4, 1),
(84, '2023-06-05', 9, 'WEB 26/2023', 4, 2),
(85, '2023-06-05', 7, 'WEB 7/2023', 4, 2),
(86, '2023-06-05', 9, 'WEB 8/2023', 4, 2),
(87, '2023-06-05', 8, 'WEB 3/2023', 4, 2),
(89, '2023-06-05', 5, 'WEB 19/2023', 4, 2),
(90, '2023-06-05', 5, 'WEB 13/2023', 4, 1),
(91, '2023-06-05', 9, 'WEB 17/2023', 4, 1),
(93, '2023-06-05', 8, 'WEB 4/2023', 4, 1),
(95, '2023-06-05', 5, 'WEB 21/2023', 4, 2),
(96, '2023-06-05', 5, 'WEB 23/2023', 4, 2),
(97, '2023-06-05', 8, 'WEB 1/2023', 4, 2),
(98, '2023-05-18', 5, 'WEB 10/2023', 3, 2),
(100, '2023-06-05', 8, 'WEB 14/2023', 4, 1),
(101, '2023-06-05', 8, 'WEB 24/2023', 4, 2),
(102, '2023-06-05', 7, 'WEB 9/2023', 4, 1),
(103, '2023-06-05', 10, 'WEB 5/2023', 4, 1),
(104, '2023-06-05', 8, 'WEB 20/2023', 4, 2),
(105, '2023-05-31', 9, 'WEB 24/2023', 5, 3),
(106, '2023-05-31', 8, 'WEB 11/2023', 5, 3),
(107, '2023-05-31', 6, 'WEB 4/2023', 5, 3),
(109, '2023-05-31', 10, 'WEB 26/2023', 5, 3),
(111, '2023-05-31', 8, 'WEB 2/2023', 5, 3),
(112, '2023-05-31', 6, 'WEB 8/2023', 5, 3),
(113, '2023-05-31', 10, 'WEB 13/2023', 5, 3),
(114, '2023-05-31', 9, 'WEB 7/2023', 5, 3),
(115, '2023-05-31', 6, 'WEB 1/2023', 5, 3),
(116, '2023-05-31', 5, 'WEB 18/2023', 5, 3),
(117, '2023-05-31', 6, 'WEB 5/2023', 5, 3),
(118, '2023-05-31', 8, 'WEB 3/2023', 5, 3),
(119, '2023-05-31', 10, 'WEB 14/2023', 5, 3),
(120, '2023-05-31', 8, 'WEB 23/2023', 5, 3),
(121, '2023-05-31', 7, 'WEB 22/2023', 5, 3),
(123, '2023-05-31', 8, 'WEB 17/2023', 5, 3),
(124, '2023-05-31', 6, 'WEB 19/2023', 5, 3),
(127, '2023-05-31', 7, 'WEB 21/2023', 5, 3),
(128, '2023-05-31', 9, 'WEB 20/2023', 5, 3),
(130, '2023-05-31', 10, 'WEB 9/2023', 5, 3),
(131, '2023-04-20', 8, 'WEB 17/2023', 1, 1),
(132, '2023-04-20', 10, 'WEB 9/2023', 1, 1),
(133, '2023-04-20', 8, 'WEB 6/2023', 1, 2),
(134, '2023-04-20', 8, 'WEB 19/2023', 1, 1),
(135, '2023-04-20', 5, 'WEB 12/2023', 1, 1),
(136, '2023-04-20', 6, 'WEB 14/2023', 1, 2),
(137, '2023-05-04', 5, 'WEB 15/2023', 2, 1),
(138, '2023-05-04', 10, 'WEB 4/2023', 2, 2),
(139, '2023-05-04', 5, 'WEB 21/2023', 2, 2),
(140, '2023-05-04', 10, 'WEB 19/2023', 2, 1),
(141, '2023-05-04', 6, 'WEB 1/2023', 2, 1),
(142, '2023-05-04', 5, 'WEB 16/2023', 2, 2),
(143, '2023-05-04', 10, 'WEB 10/2023', 2, 1),
(144, '2023-05-18', 6, 'WEB 2/2023', 3, 2),
(146, '2023-05-18', 9, 'WEB 1/2023', 3, 2),
(147, '2023-05-18', 10, 'WEB 11/2023', 3, 1),
(148, '2023-05-18', 5, 'WEB 25/2023', 3, 2),
(149, '2023-05-18', 9, 'WEB 18/2023', 3, 1);

--  ** iner joy -pravi dekartov proizvod( Ukrsta dajesve podatke iz a tabeli i sve podatke iz b tabele)
-- ** right joy ( sve iz desne a iz leve ako postoji veza)
-- ** left joy ( obrnuto)

-- Napisati sve ispite koje su održani na fakultetu (ispisati ime i prezime studenta koji polaze ispit, naziv predmeta, ime i prezime profesora, datum polaganja, kao i ocenu koju je dobio).


SELECT CONCAT(`studenti`.`ime`, " ", `studenti`.`prezime`) AS `student`,
`predmeti`.`naziv`,
CONCAT(`nastavnici`.`ime`, " ", `nastavnici`.`prezime`) AS `nastavnik`,
`ispiti`.`datum`,
`ispiti`.`ocena`
FROM `ispiti`
LEFT JOIN `studenti` ON `ispiti`.`student_indeks`=`studenti`.`indeks` --AND `student`.`ime` LIKE 'm%',
LEFT JOIN `predmeti` ON `ispiti`.`predmet_id`= `predmeti`.`id`
LEFT JOIN `nastavnici` ON `ispiti`.`nastavnik_id`= `nastavnici`.`id`;

--ovde kazemo an tabelu ispite zalepi mi studente gde je ispiti student_index = studenti index
--pa prosirimo iz tabeli predmeti
--i onda dobijamo sve podatke iz svih tabela



-- Uraditi prethodni zadatak, samo ispisati one ispite koji su se polagali u tekućoj godini.

SELECT CONCAT(`studenti`.`ime`, " ", `studenti`.`prezime`) AS `student`,
`predmeti`.`naziv`,
CONCAT(`nastavnici`.`ime`, " ", `nastavnici`.`prezime`) AS `nastavnik`,
`ispiti`.`datum`,
`ispiti`.`ocena`
FROM `ispiti`
LEFT JOIN `studenti` ON `ispiti`.`student_indeks`=`studenti`.`indeks`
LEFT JOIN `predmeti` ON `ispiti`.`predmet_id`= `predmeti`.`id`
LEFT JOIN `nastavnici` ON `ispiti`.`nastavnik_id`= `nastavnici`.`id`
WHERE `ispiti`.`datum` = '2023-05-15';




-- Za dato ime i prezime studenta, ispisati sve ispite koje je polagao dati student.
SELECT CONCAT(`studenti`.`ime`, " ", `studenti`.`prezime`) AS `student`,
`predmeti`.`naziv`,
CONCAT(`nastavnici`.`ime`, " ", `nastavnici`.`prezime`) AS `nastavnik`,
`ispiti`.`datum`,
`ispiti`.`ocena`
FROM `ispiti`
LEFT JOIN `studenti` ON `ispiti`.`student_indeks`=`studenti`.`indeks`
LEFT JOIN `predmeti` ON `ispiti`.`predmet_id`= `predmeti`.`id`
LEFT JOIN `nastavnici` ON `ispiti`.`nastavnik_id`= `nastavnici`.`id`
WHERE `studenti`.`ime` = 'Nikola' AND `studenti`.`prezime`='Devic';
-- Uraditi zadatak 3) tako da se ispišu samo takvi ispiti na kojima je ocena veća od 8.
SELECT CONCAT(`studenti`.`ime`, " ", `studenti`.`prezime`) AS `student`,
`predmeti`.`naziv`,
CONCAT(`nastavnici`.`ime`, " ", `nastavnici`.`prezime`) AS `nastavnik`,
`ispiti`.`datum`,
`ispiti`.`ocena`
FROM `ispiti`
LEFT JOIN `studenti` ON `ispiti`.`student_indeks`=`studenti`.`indeks`
LEFT JOIN `predmeti` ON `ispiti`.`predmet_id`= `predmeti`.`id`
LEFT JOIN `nastavnici` ON `ispiti`.`nastavnik_id`= `nastavnici`.`id`
WHERE `studenti`.`ime` = 'Nikola' AND `studenti`.`prezime`='Devic' AND `ispiti`.`ocena`>8;
-- Za dato ime i prezime studenta, odrediti njegovu prosečnu ocenu.
-- Za dat naziv predmeta odrediti maksimalnu ocenu na nekom ispitu iz tog predmeta.
-- Za datu godinu odrediti prosečnu ocenu svih ispita koji su se polagali u toj godini.
