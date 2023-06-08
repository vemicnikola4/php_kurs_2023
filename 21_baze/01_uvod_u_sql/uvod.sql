--Komanda za kreiranje baze podataka
--Naredbe su velikim slovima
--tabele se nazivaju malim
-- CREATE DATABASE test_druga;

CREATE DATABASE test_druga CHARACTER SET utf16 COLLATE utf16_slovenian_ci;
--komande svuda rade PHP mysql se retkokoristi. SQL jezik je univerzalan .
--komanda za brisanje baze podataka

DROP DATABASE test_druga;

--Biranje baze podataka
--u PHP my admin kada kliknemo na bazu on u pozadini pokrene tu komandu.
--neophodno da se zada ova komanda da bi znao 
USE  test_druga;

CREATE DATABASE skola;
CHARACTER SET utf16 COLLATE utf16_slovenian_ci;

USE skola;
-- //Kreiranje tabele studenti
--razlika izmedju CHAR i VARCHAR . CHAR (50) rezervise memoriju za 50 karaktera i nije ga briga koliko mi karaktera unesemo dok je VARCHAR prilagoddljiv. Koristimo CHAR 
--koristimo npr TYNIINT umesto BIGINT ako smo sigurni da ce opseg TYNIINT obuhvatiti vrednost jer stedimo memoriju.
--kad navedemo tip podataka on zauzme memoriju rezervisanu za podatak kojem je taj red namenjen.
 CREATE TABLE studenti(
    ime VARCHAR ( 50 ),
    prezime VARCHAR ( 50 )
);
--Baze tabele kolone i redovi
--SQL ogranicenja 
--NOT NULL kad su nam neka polja obavezna
--UNIQUE sve vrednosti u koloni moradu da budu razliciti npr
--email ne sme da se ponovi za dva reda. Za dve osobe.
-- PRIMARY KEY (NOT NULL i UNIQUE u kombinaciji )-> na koji nacin se jedan red razlikuje od drugog.
-- CHECK – Proverava da sve vrednosti u koloni zadovoljavaju određeni uslov.
-- DEFAULT – Postavlja podrazumevanu vrednost za kolonu kada vrednost nije navedena.
-- INDEX – Koristi se za brzo dobijanje informacija iz tabele
-- FOREIGN KEY

--kreiranje tabele custumers
CREATE TABLE custumers(
    id INT NOT NULL,
    name VARCHAR ( 20 ) NOT NULL,
    age TYNIINT NOT NULL,
    address CHAR ( 25 ),
    salary DECIMAL ( 18, 2 ) DEFAULT 500 --koliko najvise cifara moze da sadrzi i koliko iza zareza.
);
--Kreiranje tabele tasks 
CREATE TABLE IF NOT EXISTS tasks(
    task_id INT UNIQUE,
    title VARCHAR ( 255 ) NOT NULL,
    start_date DATE,
    due_date DATE,
    status TINYINT NOT NULL,
    description TEXT
);
--kreiranje tabele custumers sa primary key ovo ne bi radilo jer vec imamo ovu tabelu.
CREATE TABLE custumers(
    id INT NOT NULL,
    name VARCHAR ( 20 ) NOT NULL,
    age TYNIINT NOT NULL,
    address CHAR ( 25 ),
    salary DECIMAL ( 18, 2 ) DEFAULT 500, --koliko najvise cifara moze da sadrzi i koliko iza zareza.
    PRIMARY KEY ( id )--kriramo koloni i imenujemo primary key
);
-- Kako bi dodali primarni kljuc back tikovi ne apostrofi jer teorijski tabela moze da ima razmak ali nikada ih ne nazivamo sa razmakom vec samo 
ALTER TABLE `custumers` ADD PRIMARY KEY(`id`);

-- INDEX kod sql proveri staje??
--**promena imena tabele**
ALTER TABLE  `pisac` RENAME TO `pisci`;

--**za promenu kolone
ALTER TABLE `zaduzenje` CHANGE COLUMN `knjiga_id` `knjige_id` INT NOT NULL;--za menjanje imena kolone


ALTER TABLE `tasks` ADD PRIMARY KEY(`task_id`);

-- Za dodavanje kolona koristi se:
-- ALTER TABLE table_name
-- ADD column_name datatype;
--Zadatak
-- U tabeli CUSTOMERS dodati kolonu active tipa BOOLEAN.
-- U tabeli CUSTOMERS dodati kolonu state tipa VARCHAR(90).
-- U tabeli CUSTOMERS dodati kolonu number_of_visits tipa TINYINT.
-- U tabeli TASKS dodati kolonu priority TINYINT NOT NULL.

-- U tabeli CUSTOMERS dodati kolonu active tipa BOOLEAN.

ALTER TABLE custumers 
ADD active BOOLEAN;

-- U tabeli CUSTOMERS dodati kolonu state tipa VARCHAR(90).
ALTER TABLE 
ADD state VARCHAR ( 90 );

-- U tabeli CUSTOMERS dodati kolonu number_of_visits tipa TINYINT.
ALTER TABLE custumers
ADD number_of_visits TINYINT;

-- U tabeli TASKS dodati kolonu priority TINYINT NOT NULL.
ALTER TABLE tasks
ADD priority TINYINT NOT NULL;


-- Za brisanje kolone u tabeli koristi se:
-- ALTER TABLE table_name 
-- DROP COLUMN column_name;


-- Za menjanje kolone u tabeli koristi se:
-- ALTER TABLE table_name 
-- MODIFY COLUMN column_name datatype;

--brisanje tabele 
DROP TABLE studenti;

-- Dodavanje redova u tabeli
--moze i bez kolona vec direktno values ali onda redom popunjava podatke za sve kolone.
INSERT INTO custumers
VALUES ( 1,"Ana", 25,"Kralja Milana 45",600, 1,"Srbija",37);

INSERT INTO custumers(name,id,age,active, state, number_of_visits)
VALUES 
( "Bojana",2,30,0,"Crna Gora", 16),
( "Dejana",3,41,0,"Crna Gora", 3);

INSERT INTO tasks
(task_id, title,start_date,due_date,status,description,priority)
VALUES
(1,"Čas iy IT BOOT CAMP", "2023-06-02","2023-06-02",1, "Čas iy baze podataka",1),
(2,"Čas iz Biologije", "2023-06-02","2023-06-02",1,"Čas celija ",0),
(3,"Čas iz HEMIJE", "2023-06-02",NULL,1,"Čas vodonik ",0);