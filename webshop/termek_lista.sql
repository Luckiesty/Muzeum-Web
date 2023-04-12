CREATE TABLE `darkbluemoon`.`tblproduct` 
( `id` INT(8) NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `code` VARCHAR(255) NOT NULL , `image` TEXT NOT NULL , `price` DOUBLE(10,2) NOT NULL , PRIMARY KEY (`id`))
ENGINE = InnoDB;

INSERT INTO `termek_tabla` (`id`, `name`, `code`, `image`, `price`) 
VALUES (1, 'El Greco Póló', '761cgh1', 'termek-kepek/El_Greco_polo.jpg', 3500.00), 
(2, 'Hantai Simon Füzet', 'HE176f', 'termek-kep/Hantai_Etudes_fuzet.jpg', 1000.00), 
(3, 'Arany Gyerta Szett (3)', 'AGsz668', 'termek-kepek/Arany_Gyerta_szett.jpg', 2750.00);