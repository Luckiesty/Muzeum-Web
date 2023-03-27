CREATE TABLE `darkbluemoon`.`termek_tabla` 
( `id` INT(8) NOT NULL AUTO_INCREMENT , `termek_nev` VARCHAR(255) NOT NULL , `termek_kod` VARCHAR(255) NOT NULL , `termek_kep` TEXT NOT NULL , `termek_ar` DOUBLE(10,2) NOT NULL , PRIMARY KEY (`id`))
ENGINE = InnoDB;

INSERT INTO `termek_tabla` (`id`, `termek_nev`, `termek_kod`, `termek_kep`, `termek_ar`) 
VALUES (1, 'El Greco Póló', '761cgh1', 'termek-kepek/El_Greco_polo.jpg', 3500.00), 
(2, 'Hantai Simon Füzet', 'HE176f', 'termek-kep/Hantai_Etudes_fuzet.jpg', 1000.00), 
(3, 'Arany Gyerta Szett (3)', 'AGsz668', 'termek-kepek/Arany_Gyerta_szett.jpg', 2750.00);