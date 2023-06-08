-- Kreirati fajl upiti.sql koji sadrži upite u MySQL-u koji izvršavaju sledeće
-- zadatke:
-- ➢ Kreirati bazu store.
-- ➢ Kreirati sledeće tabele u bazi (skraćenica PK znači Primary Key, dok
-- skraćenica FK znači Foreign Key):

-- ○ Tabela categories (id int PK, category_name
-- varchar(170) not null, description CHAR(200)),
-- ○ Tabela products (id int PK, product_name
-- varchar(200) not null, price decimal(10,2)
-- default 0),
-- ○ Tabela product_categories (id int PK, id_product
-- int FK, id_category int FK),
-- ➢ Uneti po nekoliko redova u svaku tabelu.
-- ➢ Odrediti sve različite kategorije proizvoda sortirane po nazivu kategorije.
-- ➢ Odrediti sve proizvode čija je cena veća od prosečne cene svih
-- proizvoda.
-- ➢ Odrediti najskuplji proizvod iz kategorije 'Garden'.

CREATE DATABASE `store` CHARACTER SET utf16 COLLATE utf16_slovenian_ci;
CREATE TABLE `categories`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `category_name` VARCHAR(170) NOT NULL,
    `description` CHAR(200),
)ENGINE=InnoDB;
-- ○ Tabela products (id int PK, product_name
-- varchar(200) not null, price decimal(10,2)
-- default 0),
CREATE TABLE `products`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `product_name` VARCHAR(200) NOT NULL,
    `price` DECIMAL (10,2) DEFAULT 0

)ENGINE=InnoDB;
-- ○ Tabela product_categories (id int PK, id_product
-- int FK, id_category int FK),

CREATE TABLE `product_categories`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `id_product` INT,
    `id_category` INT,
    FOREIGN KEY (`id_product`)REFERENCES `products`(`id`)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`id_category`)REFERENCES `categories`(`id`)
    ON DELETE CASCADE ON UPDATE CASCADE

)ENGINE=InnoDB;

INSERT INTO `products` (`product_name`,`price`)
VALUES
('Naocare',150),
('Pantalone',120),
('Dzemper',80),
('Patike',180),
('Majca',30);
INSERT INTO `products` (`product_name`,`price`)
VALUES
('Bastenska stolica',70),
('Makaze za zivicu',50);

INSERT INTO `categories` (`category_name`,`description`)
VALUES
('odeca','Zimska i letnja garderoba'),
('obuca','Zimska i letnja obuca'),
('garden','Sve za vasu bastu'),
('dodatci','Nakit i ostalo');

INSERT INTO `product_categories` (`id_product`,`id_category`)
VALUES
(1,4),
(2,1),
(3,1),
(4,2),
(5,1),
(6,3),
(7,3);
-- ➢ Odrediti sve različite kategorije proizvoda sortirane po nazivu kategorije.

SELECT DISTINCT `categories`. `category_name`
FROM `product_categories`
LEFT JOIN `categories` ON `product_categories`.`id_category`=`categories`.`id`
ORDER BY `categories`. `category_name`;

-- ➢ Odrediti sve proizvode čija je cena veća od prosečne cene svih

SELECT `product_name` 
FROM `products`
WHERE `price` > ( SELECT AVG(`price`) FROM `products`);


-- ➢ Odrediti najskuplji proizvod iz kategorije 'Garden'.


SELECT `products`.`product_name`
FROM `product_categories`
LEFT JOIN `products` ON `product_categories`.`id_product`=`products`.`id`
LEFT JOIN `categories` ON `product_categories`.`id_category`=`categories`.`id`
WHERE  `products`.`price` = (SELECT MAX(`products`.`price`)
FROM `product_categories`
LEFT JOIN `products` ON `product_categories`.`id_product`=`products`.`id`
LEFT JOIN `categories` ON `product_categories`.`id_category`=`categories`.`id`
WHERE `categories`.`category_name`= 'garden');


-- SELECT `knjige`.`naziv` AS `knjiga`,
-- CONCAT ( `clanovi`.`ime`, " ",`clanovi`.`prezime` ) AS `clan`,
-- `datum`,`vratio`
-- FROM `zaduzenja`
-- LEFT JOIN `knjige` ON `zaduzenja`.`knjiga_id`=`knjige`.`id`
-- LEFT JOIN `clanovi` ON `zaduzenja`.`clan_id`=`clanovi`.`id`
-- WHERE `vratio` = 0;