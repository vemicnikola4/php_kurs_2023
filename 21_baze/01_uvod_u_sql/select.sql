--Jedna od najvaznijih komandi.
--Sluzi za citanje podataka iz baze

SELECT * FROM tasks;

SELECT `title`, `start_date`, `due_date` FROM `tasks`;

SELECT `name`,`age`,`address` FROM `custumers`;
--od sad kucamo backtikove jer namboji predhodno kao neke komande

--Citanje razlicitih podataka
--Dohvati sva razlicita imena koja imaju nasi potrosaci
SELECT DISTINCT `name` FROM `custumers`;--DISTINCT hvata sve vrednosti iz name ali samo razlicita imena

--moraju sva polja da budu razlicita
--vraca razlicite redove
SELECT DISTINCT `name`,`age`,`address` FROM `custumers`;
SELECT DISTINCT `id`,`name` FROM `custumers`;

SELECT DISTINCT `salary` FROM `custumers`;
-- Iz tabele customers, pročitati:
-- Sve kolone,
-- Samo imena i godine,
-- Samo plate klijenata.

SELECT * FROM `custumers` WHERE `state` = 'Srbija';--case insensitive
SELECT * FROM `custumers` WHERE `salary` = 500;--case insensitive

SELECT * FROM `custumers` WHERE `salary` >= 500;

SELECT * FROM `custumers` WHERE `salary` > 500;

-- Iz tabele tasks, pročitati:
-- Sve kolone,
-- Samo naziv, status i prioritet.

SELECT `task_id`, `title`,`description` FROM `tasks` WHERE `status`= 1;

SELECT `task_id`, `title`,`description` FROM `tasks` WHERE `priority`= 1;

--iz tabele tasks , procitati sve zadatke koji su prioritetni a nisu zavrseni
SELECT `task_id`, `title`,`description` FROM `tasks` WHERE `priority`= 1 AND `due_date` IS NOT NULL;

SELECT `task_id`, `title`,`description` FROM `tasks` WHERE `priority` != 0 AND `due_date` IS NOT NULL;
-- Iz tabele customers, pročitati sve klijente:
-- Čija je plata između 300 i 800,
-- Koji su iz Srbije, Rumunije ili Bugarske,
-- Koju potiču iz zemlje koja počinje na slovo “S”.
-- Iz tabele tasks, pročitati sve zadatke:
-- Čiji id pripada skupu {1, 4, 8, 12},
-- Čiji je početak veći od 2019-01-01,
-- Čiji je status različit od neaktivan.

-- Iz tabele customers, pročitati sve klijente:
SELECT `name`, `address`,`state`,`salary`
FROM `custumers`
WHERE `salary` BETWEEN 300 AND 800;--BETWEEN obuhvata i granicne vrednostu

SELECT `name`, `address`,`state`,`salary`
FROM `custumers`
WHERE `salary` = 500 OR `salary` = 600 OR `salary` = 700;
--treba da izbgavamo da istu kolonu ponavljamo u upitu. POstoje komande u SQL koje to bolje rade.
--mnogo bolje jer jedan uslov odgovara jednoj koloni.

--custumers cija je plata = 500 600 ili 900;

SELECT `name`, `address`,`state`,`salary`
FROM `custumers`
WHERE `salary` IN (500,700,900);
--custumers cije je ime Ana Bojana ili Vuk
SELECT `name`, `address`,`state`,`salary`
FROM `custumers`
WHERE `name` IN ('Ana','Bojana','Vuk');

--custumers cije ime pocinje na B;

SELECT `name`, `address`,`state`,`salary`
FROM `custumers`
WHERE `name` LIKE 'B%';--posle b % znaci da posle B ide nesto

--custumers cije ime sadrzi J;

SELECT `name`, `address`,`state`,`salary`
FROM `custumers`
WHERE `name` LIKE '%j%';

--custumers iz Srbije Rumunije ili Bugarske
SELECT `name`, `address`,`state`,`salary`
FROM `custumers`
WHERE `state` IN ('Srbija','Rumunija','Bugarska');

--custumers iz state koje pocinju sa S

SELECT `name`, `address`,`state`,`salary`
FROM `custumers`
WHERE `state` LIKE 's%';

-- Iz tabele tasks, pročitati sve zadatke:
-- Čiji id pripada skupu {1, 4, 8, 12},
-- Čiji je početak veći od 2019-01-01,
-- Čiji je status različit od neaktivan.

SELECT * FROM `tasks`;

SELECT * FROM `tasks`
WHERE `task_id` IN  ( 1,4,8,12 );

SELECT * FROM `tasks`
WHERE `start_date` > '2019-01-01';--ovako se pamti jer je jednostavno za poreedjenje

SELECT * FROM `tasks`
WHERE `status` != 0;
--
SELECT * FROM `tasks`
WHERE `title` LIKE '%e' OR 
`title` LIKE '%p';

--Limitiranje broja rezultata
-- Ukoliko je rezultat čitanja veliki, može se ograničiti upotrebom LIMIT klauzule:
-- SELECT column_name(s)
-- FROM table_name
-- WHERE condition
-- LIMIT number; broj redova koji zelimo da vidimo,
-- Sve prethodne zadatke uraditi i sa limit varijantom!

SELECT * FROM `custumers`
LIMIT 2;

--prvi custumer u bazi cije ime pocinje na slovo B
SELECT * FROM `custumers`
WHERE `name` LIKE 'b%'
LIMIT 1;

--prikazi sve korisnike koji imaju 2cifren broj poseta
SELECT * FROM `custumers`
WHERE `number_of_visits` BETWEEN 10 AND 99;

--prikazi prvog korisnika koji imaju 2cifren broj poseta
--izvrsi upit pa odbaci visak
--prikazuju se po redosledu u bazi

SELECT * FROM `custumers`
WHERE `number_of_visits` BETWEEN 10 AND 99
LIMIT 1;

--***Sortiranje podataka
-- --Za sortiranje rezultata čitanja koristi se 
-- ORDER BY klauzula:
-- SELECT column1, column2, ...
-- FROM table_name
-- ORDER BY column1, column2, ... ASC|DESC;
SELECT * FROM `custumers` ORDER BY `name`;

--svi korisnici po godinama od najstarijih ka najmladjim
SELECT * FROM `custumers` ORDER BY `age` DESC;

--svi korisnici po godinama od najmladjih ka najstarijima i po broju poseta od vise ka manje
--ako imamo vise korisnika iste dobi prvo one sa vise poseta

SELECT * FROM `custumers` ORDER BY `age` ASC,`number_of_visits` DESC;

--prikazi prva dva korisnika sa najvecim brojem poseta,
--a ciji je broj poseta dvocifren
--( odredi korisnike sa dvocifrenim brojem poseta i prikazi prva dva sa najvecimbrojem poseta )

SELECT * FROM `custumers`
WHERE `number_of_visits` BETWEEN 10 AND 99
ORDER BY `number_of_visits` DESC
LIMIT 2;

--prikazi korisnika koji ima najmanju platu koja je u opsegu izmedju 300 i 500, AKo ima vise ovakvih prikazati ime cije je ime prvo u leksigografskom pore--rastuci poredak

SELECT * FROM `custumers`
WHERE `salary` BETWEEN 300 AND 500
ORDER BY `salary` ,`name`
LIMIT 1;

-- WHERE klauzula može se kombinovati 
-- sa AND, OR i NOT operatorima.

-- Iz tabele customers, pročitati sve klijente:
SELECT * FROM `custumers`;

-- Koji su iz Srbije a plata je 600,
SELECT * FROM `custumers`
WHERE `state` = 'Srbija' AND `salary` = 600;


-- Čije ime počinje na S ili imaju manje od 30god.
SELECT * FROM `custumers`
WHERE `name` LIKE 's%' OR `age` < 30;

-- Iz tabele tasks, pročitati sve zadatke:
SELECT * FROM `tasks`;

-- Čiji je status različit od aktivan i prioritet visok,
SELECT * FROM `tasks`
WHERE `status` != 1 AND `priority` > 0;


-- Čiji datum nije veći od 2019-01-01.

SELECT * FROM `tasks`
WHERE NOT `start_date` > "2019-01-01"; --moze i ovako NOT pa neki uslov;

SELECT * FROM `tasks`
WHERE NOT `start_date` <= "2019-01-01"; 

--KOd selecta mozemo i odredjene funkcije da koristimo.

-- Funkcija MIN() vraća najmanju vrednost selektovane kolone 
-- SELECT MIN(ime_kolone)
-- FROM ime_tabele
-- WHERE uslov;

-- Funkcija MAX() vraća najveću vrednost selektovane kolone 

-- SELECT MAX(ime_kolone)
-- FROM ime_tabele
-- WHERE uslov;

--funkcija COUNT


--funkcija AVG

--Prebrojati koliko ima kupaca u custumers izmedju 30 i 40

SELECT COUNT (`age`)
FROM `custumers`
WHERE `age` BETWEEN 30 AND 40;

--isto to , samo sa preimenovanjem polja
--u rezultatu ce ta kolona da se zove broj_kupaca
--ne sme razmak izmedju COUNT(`age`)
SELECT COUNT(`age`) AS "broj_kupaca"
FROM `custumers`
WHERE `age` BETWEEN 30 AND 40;

--odrediti prosecan broj kupaca

SELECT AVG(`number_of_visits`) AS `prosecan_broj_poseta`
FROM `custumers`;

--odrediti prosecnu platu kupaca iz Srbije

SELECT AVG(`salary`) AS `prosecan_plata_srbija`
FROM `custumers`
WHERE `state` = 'Srbija';

--odrediti broj razlicitih imena kupaca
--selektuj razlicitih imena pa ih prebroji a tu kolonu nazovi broj_razlicitih_imena
SELECT  COUNT(DISTINCT `name`) AS 'broj_razlicitih imena'
FROM `custumers`;
--odrediti broj razlicitih broj drzava kupaca
SELECT  COUNT(DISTINCT `state`) AS 'broj_razlicitih_drzava'
FROM `custumers`;

--odrediti ime osobe koja ima najmanju platu, ako ima vise takvih ispisati bilo koju osobu

SELECT MIN(`salary`) AS 'najmanja_plata'
FROM `custumers`;

--Ove upite mozemo i da ugnjezdavamo.
SELECT `name` AS 'min_plata'
FROM `custumers` 
WHERE `salary` = ( SELECT MIN(`salary`) FROM `custumers`)
LIMIT 1;

--moze i ovako
SELECT `name` 
FROM `custumers` 
ORDER BY (`salary`)
LIMIT 1;

--ispisati sve natprosecno stare osobe po leksigografskom poretku

SELECT `name`
FROM `custumers`
WHERE `age` > (SELECT AVG(`age`) FROM `custumers`)
ORDER BY `name`;

--ispisati imena svih osoba iz Srbije sa natprosecno platom
SELECT `name` FROM `custumers`
WHERE `salary` > ( SELECT AVG(`salary`) FROM `custumers`
WHERE `state` = 'Srbija') AND `state` = 'Srbija'
ORDER BY `name`;