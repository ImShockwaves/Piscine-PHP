<?php
$db = mysqli_connect("localhost:3307", "root", "Alexis tu es très bo", "d08");
if (!$db)
	die('Requête invalide : ' . mysql_error());

$query = "DROP TABLE IF EXISTS `d08`.`peoples_has_ships_has_weapons` ;";
$req = mysqli_query($db, $query);

$query = "DROP TABLE IF EXISTS `d08`.`peoples_has_ships` ;";
$req = mysqli_query($db, $query);
$query = "DROP TABLE IF EXISTS `d08`.`weapons` ;";
$req = mysqli_query($db, $query);
$query = "DROP TABLE IF EXISTS `d08`.`maps` ;";
$req = mysqli_query($db, $query);
$query = "DROP TABLE IF EXISTS `d08`.`ships` ;";
$req = mysqli_query($db, $query);
$query = "DROP TABLE IF EXISTS `d08`.`peoples` ;";
$req = mysqli_query($db,$query);
$$query = "DROP TABLE IF EXISTS `d08`.`users` ;";
$req = mysqli_query($db,$query);

$query = "CREATE TABLE IF NOT EXISTS `d08`.`maps` (
	`x` INT(10) UNSIGNED NOT NULL,
	`y` INT(10) UNSIGNED NOT NULL,
	`object` VARCHAR(20) NOT NULL,
	`object_id` INT(11) NULL DEFAULT NULL,
	PRIMARY KEY (`x`, `y`))
	ENGINE = InnoDB
	DEFAULT CHARACTER SET = latin1;";
$req = mysqli_query($db, $query);



$query = "CREATE TABLE IF NOT EXISTS `d08`.`peoples` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`))
	ENGINE = InnoDB
	AUTO_INCREMENT = 3
	DEFAULT CHARACTER SET = latin1;";
$req = mysqli_query($db, $query);

$query = "CREATE UNIQUE INDEX `player_UNIQUE` ON `d08`.`peoples` (`id` ASC);";
$req = mysqli_query($db, $query);

$query = "CREATE TABLE IF NOT EXISTS `d08`.`users` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(45) NOT NULL,
	passwd VARCHAR(128) NOT NULL,
	`nbgame` INT(10) NOT NULL,
	`win` INT(10) NOT NULL,
	`lose` INT(10) NOT NULL,
	PRIMARY KEY (`id`))
	ENGINE = InnoDB
	DEFAULT CHARACTER SET = latin1;";
$req = mysqli_query($db, $query);

$query = "CREATE TABLE IF NOT EXISTS `d08`.`ships` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(45) NOT NULL,
	`sizeX` INT(10) UNSIGNED NOT NULL,
	`sizeY` INT(11) NOT NULL,
	`sprit` VARCHAR(45) NULL DEFAULT NULL,
	`color` VARCHAR(45) NULL DEFAULT NULL,
	`life` INT(11) NOT NULL,
	`pp` INT(11) NOT NULL,
	`speed` INT(11) NOT NULL,
	`maneuverability` INT(11) NOT NULL,
	`shield` INT(11) NOT NULL,
	PRIMARY KEY (`id`))
	ENGINE = InnoDB
	AUTO_INCREMENT = 5
	DEFAULT CHARACTER SET = latin1;";
$req = mysqli_query($db, $query);

$query = "CREATE UNIQUE INDEX `id_UNIQUE` ON `d08`.`ships` (`id` ASC);";
$req = mysqli_query($db, $query);

$query = "CREATE UNIQUE INDEX `name_UNIQUE` ON `d08`.`ships` (`name` ASC);";
$req = mysqli_query($db, $query);


$query = "CREATE TABLE IF NOT EXISTS `d08`.`peoples_has_ships` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`peoples_id` INT(10) UNSIGNED NOT NULL,
	`ships_id` INT(10) UNSIGNED NOT NULL,
	`x` INT(11) NOT NULL,
	`y` INT(11) NOT NULL,
	`current_pp` INT(11) NOT NULL,
	`current_life` INT(11) NOT NULL,
	`current_shield` INT(11) NOT NULL,
	`current_rotation` INT(11) NOT NULL,
	`active` TINYINT(1) NOT NULL DEFAULT '0',
	`current_active` TINYINT(1) NOT NULL DEFAULT '0',
	`firstturn` TINYINT(1) NOT NULL DEFAULT '0',
	`current_speed` INT(11) NULL DEFAULT NULL,
	`current_maneuverability` INT(11) NULL DEFAULT NULL,
	`step` INT NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`),
  CONSTRAINT `fk_peoples_has_ships_peoples`
  FOREIGN KEY (`peoples_id`)
  REFERENCES `d08`.`peoples` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
  CONSTRAINT `fk_peoples_has_ships_ships1`
  FOREIGN KEY (`ships_id`)
  REFERENCES `d08`.`ships` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION)
  ENGINE = InnoDB
  AUTO_INCREMENT = 9
  DEFAULT CHARACTER SET = latin1;";
$req = mysqli_query($db, $query);

$query = "CREATE UNIQUE INDEX `id_UNIQUE` ON `d08`.`peoples_has_ships` (`id` ASC);";
$req = mysqli_query($db, $query);

$query = "CREATE INDEX `fk_peoples_has_ships_ships1_idx` ON `d08`.`peoples_has_ships` (`ships_id` ASC);";
$req = mysqli_query($db, $query);

$query = "CREATE INDEX `fk_peoples_has_ships_peoples_idx` ON `d08`.`peoples_has_ships` (`peoples_id` ASC);";
$req = mysqli_query($db, $query);



$query = "CREATE TABLE IF NOT EXISTS `d08`.`weapons` (
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(45) NOT NULL,
	`charge` INT UNSIGNED NOT NULL DEFAULT 0,
	`scope_small` INT UNSIGNED NOT NULL,
	`scope_medium` INT UNSIGNED NOT NULL,
	`scope_big` INT UNSIGNED NOT NULL,
	`motionless` TINYINT(1) NOT NULL,
	`success_small` INT NOT NULL,
	`success_medium` INT NOT NULL,
	`success_big` INT NOT NULL,
	`width_small` DOUBLE NOT NULL,
	`width_medium` DOUBLE NOT NULL,
	`width_big` DOUBLE NOT NULL,
	PRIMARY KEY (`id`))
	ENGINE = InnoDB;";
$req = mysqli_query($db, $query);

$query = "CREATE UNIQUE INDEX `id_UNIQUE` ON `d08`.`weapons` (`id` ASC);";
$req = mysqli_query($db, $query);



$query = "CREATE TABLE IF NOT EXISTS `d08`.`peoples_has_ships_has_weapons` (
	`id` INT NOT NULL,
	`peoples_has_ships_id` INT(10) UNSIGNED NOT NULL,
	`weapons_id` INT UNSIGNED NOT NULL,
	`active` TINYINT(1) NOT NULL,
	`current_charge` INT NULL,
	PRIMARY KEY (`id`),
  CONSTRAINT `fk_peoples_has_ships_has_weapons_peoples_has_ships1`
  FOREIGN KEY (`peoples_has_ships_id`)
  REFERENCES `d08`.`peoples_has_ships` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
  CONSTRAINT `fk_peoples_has_ships_has_weapons_weapons1`
  FOREIGN KEY (`weapons_id`)
  REFERENCES `d08`.`weapons` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION)
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = latin1;";
$req = mysqli_query($db, $query);

$query = "CREATE INDEX `fk_peoples_has_ships_has_weapons_weapons1_idx` ON `d08`.`peoples_has_ships_has_weapons` (`weapons_id` ASC);";
$req = mysqli_query($db, $query);

$query = "CREATE INDEX `fk_peoples_has_ships_has_weapons_peoples_has_ships1_idx` ON `d08`.`peoples_has_ships_has_weapons` (`peoples_has_ships_id` ASC);";
$req = mysqli_query($db, $query);

$query = "SET SQL_MODE=@OLD_SQL_MODE;";
$req = mysqli_query($db, $query);

$query = "SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;";
$req = mysqli_query($db, $query);

$query = "SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;";
$req = mysqli_query($db, $query);

$query = "START TRANSACTION;";
$req = mysqli_query($db, $query);

$query = "USE `d08`;";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples` (`id`) VALUES (1);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples` (`id`) VALUES (2);";
$req = mysqli_query($db, $query);

$query = "COMMIT;";
$req = mysqli_query($db, $query);

$query = "START TRANSACTION;";
$req = mysqli_query($db, $query);

$query = "USE `D08`;";
$req = mysqli_query($db, $query);
$query = "INSERT INTO `users`(`id`, `name`, `passwd`, `nbgame`, `win`, `lose`) VALUES (1,'xxx_dark_sasuke_du_26_xxx','633f3d63c803e91bf544853b2de0062933228f51a03c3c9e93ef576a0f4649a86e00bed5e534d3a9eb6c7125dafbe89d084e54f8367b1ccb7b78b780e5d6fb53',131,4,127);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `users`(`id`, `name`, `passwd`, `nbgame`, `win`, `lose`) VALUES (2,'Shockwaves le grand','eb214ce3e428bf0254a92258b5104ebaa6d460a2ecfcfab601176be0e613628b58fe26c79d91fd9d8b3a31b443c3be0e1ae6027c325a0c4f954f09b26c50cd9a',2406,2237,169);";
$req = mysqli_query($db, $query);
$query = "INSERT INTO `users`(`id`, `name`, `passwd`, `nbgame`, `win`, `lose`) VALUES (3,'Dorivne le gars sur','633f3d63c803e91bf544853b2de0062933228f51a03c3c9e93ef576a0f4649a86e00bed5e534d3a9eb6c7125dafbe89d084e54f8367b1ccb7b78b780e5d6fb53',730,458,272);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `users`(`id`, `name`, `passwd`, `nbgame`, `win`, `lose`) VALUES (4,'Maxxgame le maigre citronne','633f3d63c803e91bf544853b2de0062933228f51a03c3c9e93ef576a0f4649a86e00bed5e534d3a9eb6c7125dafbe89d084e54f8367b1ccb7b78b780e5d6fb53',3402,2306,1096);";
$req = mysqli_query($db, $query);
$query = "INSERT INTO `users`(`id`, `name`, `passwd`, `nbgame`, `win`, `lose`) VALUES (5,'Radaxx le beauf','633f3d63c803e91bf544853b2de0062933228f51a03c3c9e93ef576a0f4649a86e00bed5e534d3a9eb6c7125dafbe89d084e54f8367b1ccb7b78b780e5d6fb53',5296,4672,624);";
$req = mysqli_query($db, $query);
$query = "INSERT INTO `users`(`id`, `name`, `passwd`, `nbgame`, `win`, `lose`) VALUES (6,'starlord26','633f3d63c803e91bf544853b2de0062933228f51a03c3c9e93ef576a0f4649a86e00bed5e534d3a9eb6c7125dafbe89d084e54f8367b1ccb7b78b780e5d6fb53',496,368,127);";
$req = mysqli_query($db, $query);
$query = "INSERT INTO `users`(`id`, `name`, `passwd`, `nbgame`, `win`, `lose`) VALUES (7,'arrosoir_demoniaque','633f3d63c803e91bf544853b2de0062933228f51a03c3c9e93ef576a0f4649a86e00bed5e534d3a9eb6c7125dafbe89d084e54f8367b1ccb7b78b780e5d6fb53',216,89,127);";
$req = mysqli_query($db, $query);
$query = "INSERT INTO `users`(`id`, `name`, `passwd`, `nbgame`, `win`, `lose`) VALUES (8,'miniponps','633f3d63c803e91bf544853b2de0062933228f51a03c3c9e93ef576a0f4649a86e00bed5e534d3a9eb6c7125dafbe89d084e54f8367b1ccb7b78b780e5d6fb53',167,107,60);";
$req = mysqli_query($db, $query);
$query = "INSERT INTO `users`(`id`, `name`, `passwd`, `nbgame`, `win`, `lose`) VALUES (9,'xxx_dark_sasuke_du_26_xxx','633f3d63c803e91bf544853b2de0062933228f51a03c3c9e93ef576a0f4649a86e00bed5e534d3a9eb6c7125dafbe89d084e54f8367b1ccb7b78b780e5d6fb53',6739,2957,3782);";

$req = mysqli_query($db, $query);



$req = mysqli_query($db, $query);

$query = "INSERT INTO `maps`(`x`, `y`, `object`, `object_id`) VALUES (58,58,'obstacle',1);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `maps`(`x`, `y`, `object`, `object_id`) VALUES (59,58,'obstacle',2);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `maps`(`x`, `y`, `object`, `object_id`) VALUES (58,59,'obstacle',3);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `maps`(`x`, `y`, `object`, `object_id`) VALUES (59,59,'obstacle',4);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `maps`(`x`, `y`, `object`, `object_id`) VALUES (63,37,'obstacle',5);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `maps`(`x`, `y`, `object`, `object_id`) VALUES (119,47,'obstacle',6);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `maps`(`x`, `y`, `object`, `object_id`) VALUES (47,12,'obstacle',7);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `maps`(`x`, `y`, `object`, `object_id`) VALUES (76,90,'obstacle',8);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `maps`(`x`, `y`, `object`, `object_id`) VALUES (57,94,'obstacle',9);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `maps`(`x`, `y`, `object`, `object_id`) VALUES (58,94,'obstacle',10);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `maps`(`x`, `y`, `object`, `object_id`) VALUES (114,94,'obstacle',11);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `maps`(`x`, `y`, `object`, `object_id`) VALUES (116,16,'obstacle',12);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `maps`(`x`, `y`, `object`, `object_id`) VALUES (106,54,'obstacle',13);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `maps`(`x`, `y`, `object`, `object_id`) VALUES (106,55,'obstacle',14);";
$req = mysqli_query($db, $query);

$query = "COMMIT;";
$req = mysqli_query($db, $query);

$query = "START TRANSACTION;";
$req = mysqli_query($db, $query);

$query = "USE `d08`;";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`ships` (`id`, `name`, `sizeX`, `sizeY`, `sprit`, `color`, `life`, `pp`, `speed`, `maneuverability`, `shield`) VALUES (1, 'Scout fighter Corvet', 2, 1, NULL, '00ffff', 2, 3, 10, 1, 1);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`ships` (`id`, `name`, `sizeX`, `sizeY`, `sprit`, `color`, `life`, `pp`, `speed`, `maneuverability`, `shield`) VALUES (2, 'Light fighter Falchion', 3, 2, NULL, '00ff00', 3, 2, 7, 3, 3);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`ships` (`id`, `name`, `sizeX`, `sizeY`, `sprit`, `color`, `life`, `pp`, `speed`, `maneuverability`, `shield`) VALUES (3, 'Heavy fighter Firestorm', 4, 2, NULL, '0000ff', 5, 4, 5, 2, 4);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`ships` (`id`, `name`, `sizeX`, `sizeY`, `sprit`, `color`, `life`, `pp`, `speed`, `maneuverability`, `shield`) VALUES (4, 'Imperial destroyer Spectrum', 8, 3, NULL, 'ffff00', 10, 6, 3, 2, 13);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`ships` (`id`, `name`, `sizeX`, `sizeY`, `sprit`, `color`, `life`, `pp`, `speed`, `maneuverability`, `shield`) VALUES (5, 'Imperial frigate Crusader', 8, 5, NULL, '555555', 5, 8, 4, 2, 9);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`ships` (`id`, `name`, `sizeX`, `sizeY`, `sprit`, `color`, `life`, `pp`, `speed`, `maneuverability`, `shield`) VALUES (6, 'Armored cruiser Last Breath', 10, 7, NULL, '888888', 8, 10, 2, 2, 18);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`ships` (`id`, `name`, `sizeX`, `sizeY`, `sprit`, `color`, `life`, `pp`, `speed`, `maneuverability`, `shield`) VALUES (7, 'Sovereign', 1, 1, NULL, 'aa0000', 1, 0, 10, 1, 1);";
$req = mysqli_query($db, $query);

$query = "COMMIT;";
$req = mysqli_query($db, $query);

$query = "START TRANSACTION;";
$req = mysqli_query($db, $query);

$query = "USE `d08`;";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships` (`id`, `peoples_id`, `ships_id`, `x`, `y`, `current_pp`, `current_life`, `current_shield`, `current_rotation`, `active`, `current_active`, `firstturn`, `current_speed`, `current_maneuverability`, `step`) VALUES (1, 1, 1, 15, 47, 0, 2, 0, 90, 1, 0, 0, 0, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships` (`id`, `peoples_id`, `ships_id`, `x`, `y`, `current_pp`, `current_life`, `current_shield`, `current_rotation`, `active`, `current_active`, `firstturn`, `current_speed`, `current_maneuverability`, `step`) VALUES (2, 1, 1, 15, 53, 0, 2, 0, 90, 1, 0, 0, 0, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships` (`id`, `peoples_id`, `ships_id`, `x`, `y`, `current_pp`, `current_life`, `current_shield`, `current_rotation`, `active`, `current_active`, `firstturn`, `current_speed`, `current_maneuverability`, `step`) VALUES (3, 1, 2, 12, 44, 0, 3, 0, 90, 1, 0, 0, 0, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships` (`id`, `peoples_id`, `ships_id`, `x`, `y`, `current_pp`, `current_life`, `current_shield`, `current_rotation`, `active`, `current_active`, `firstturn`, `current_speed`, `current_maneuverability`, `step`) VALUES (4, 1, 2, 12, 56, 0, 3, 0, 90, 1, 0, 0, 0, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships` (`id`, `peoples_id`, `ships_id`, `x`, `y`, `current_pp`, `current_life`, `current_shield`, `current_rotation`, `active`, `current_active`, `firstturn`, `current_speed`, `current_maneuverability`, `step`) VALUES (5, 1, 3, 2, 20, 0, 5, 0, 90, 1, 0, 0, 0, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships` (`id`, `peoples_id`, `ships_id`, `x`, `y`, `current_pp`, `current_life`, `current_shield`, `current_rotation`, `active`, `current_active`, `firstturn`, `current_speed`, `current_maneuverability`, `step`) VALUES (6, 1, 4, 2, 40, 0, 10, 0, 90, 1, 0, 0, 0, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships` (`id`, `peoples_id`, `ships_id`, `x`, `y`, `current_pp`, `current_life`, `current_shield`, `current_rotation`, `active`, `current_active`, `firstturn`, `current_speed`, `current_maneuverability`, `step`) VALUES (7, 1, 5, 2, 60, 0, 5, 0, 90, 1, 0, 0, 0, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships` (`id`, `peoples_id`, `ships_id`, `x`, `y`, `current_pp`, `current_life`, `current_shield`, `current_rotation`, `active`, `current_active`, `firstturn`, `current_speed`, `current_maneuverability`, `step`) VALUES (8, 1, 6, 2, 80, 0, 8, 0, 90, 1, 0, 0, 0, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships` (`id`, `peoples_id`, `ships_id`, `x`, `y`, `current_pp`, `current_life`, `current_shield`, `current_rotation`, `active`, `current_active`, `firstturn`, `current_speed`, `current_maneuverability`, `step`) VALUES (9, 1, 7, 20, 50, 0, 1, 0, 90, 1, 0, 0, 0, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships` (`id`, `peoples_id`, `ships_id`, `x`, `y`, `current_pp`, `current_life`, `current_shield`, `current_rotation`, `active`, `current_active`, `firstturn`, `current_speed`, `current_maneuverability`, `step`) VALUES (10, 2, 1, 134, 47, 0, 2, 0, 270, 1, 0, 0, 0, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships` (`id`, `peoples_id`, `ships_id`, `x`, `y`, `current_pp`, `current_life`, `current_shield`, `current_rotation`, `active`, `current_active`, `firstturn`, `current_speed`, `current_maneuverability`, `step`) VALUES (11, 2, 1, 134, 53, 0, 2, 0, 270, 1, 0, 0, 0, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships` (`id`, `peoples_id`, `ships_id`, `x`, `y`, `current_pp`, `current_life`, `current_shield`, `current_rotation`, `active`, `current_active`, `firstturn`, `current_speed`, `current_maneuverability`, `step`) VALUES (12, 2, 2, 136, 44, 0, 3, 0, 270, 1, 0, 0, 0, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships` (`id`, `peoples_id`, `ships_id`, `x`, `y`, `current_pp`, `current_life`, `current_shield`, `current_rotation`, `active`, `current_active`, `firstturn`, `current_speed`, `current_maneuverability`, `step`) VALUES (13, 2, 2, 136, 56, 0, 3, 0, 270, 1, 0, 0, 0, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships` (`id`, `peoples_id`, `ships_id`, `x`, `y`, `current_pp`, `current_life`, `current_shield`, `current_rotation`, `active`, `current_active`, `firstturn`, `current_speed`, `current_maneuverability`, `step`) VALUES (14, 2, 3, 147, 20, 0, 5, 0, 270, 1, 0, 0, 0, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships` (`id`, `peoples_id`, `ships_id`, `x`, `y`, `current_pp`, `current_life`, `current_shield`, `current_rotation`, `active`, `current_active`, `firstturn`, `current_speed`, `current_maneuverability`, `step`) VALUES (15, 2, 4, 147, 40, 0, 10, 0, 270, 1, 0, 0, 0, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships` (`id`, `peoples_id`, `ships_id`, `x`, `y`, `current_pp`, `current_life`, `current_shield`, `current_rotation`, `active`, `current_active`, `firstturn`, `current_speed`, `current_maneuverability`, `step`) VALUES (16, 2, 5, 147, 60, 0, 5, 0, 270, 1, 0, 0, 0, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships` (`id`, `peoples_id`, `ships_id`, `x`, `y`, `current_pp`, `current_life`, `current_shield`, `current_rotation`, `active`, `current_active`, `firstturn`, `current_speed`, `current_maneuverability`, `step`) VALUES (17, 2, 6, 147, 80, 0, 8, 0, 270, 1, 0, 0, 0, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships` (`id`, `peoples_id`, `ships_id`, `x`, `y`, `current_pp`, `current_life`, `current_shield`, `current_rotation`, `active`, `current_active`, `firstturn`, `current_speed`, `current_maneuverability`, `step`) VALUES (18, 2, 7, 129, 50, 0, 1, 0, 270, 1, 0, 0, 0, 0, 0);";
$req = mysqli_query($db, $query);

$query = "COMMIT;";
$req = mysqli_query($db, $query);

$query = "START TRANSACTION;";
$req = mysqli_query($db, $query);

$query = "USE `d08`;";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`weapons` (`id`, `name`, `charge`, `scope_small`, `scope_medium`, `scope_big`, `motionless`, `success_small`, `success_medium`, `success_big`, `width_small`, `width_medium`, `width_big`) VALUES (1, 'Canons a ions legers', 0, 5, 10, 15, 0, 4, 5, 6, 0, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`weapons` (`id`, `name`, `charge`, `scope_small`, `scope_medium`, `scope_big`, `motionless`, `success_small`, `success_medium`, `success_big`, `width_small`, `width_medium`, `width_big`) VALUES (2, 'Canons a ions lourds', 3, 10, 20, 50, 0, 4, 5, 6, 0, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`weapons` (`id`, `name`, `charge`, `scope_small`, `scope_medium`, `scope_big`, `motionless`, `success_small`, `success_medium`, `success_big`, `width_small`, `width_medium`, `width_big`) VALUES (3, 'Canon magnetique Gauss', 0, 10, 20, 30, 0, 4, 5, 6, 0.2, 0, -0.2);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`weapons` (`id`, `name`, `charge`, `scope_small`, `scope_medium`, `scope_big`, `motionless`, `success_small`, `success_medium`, `success_big`, `width_small`, `width_medium`, `width_big`) VALUES (4, 'Bagger 288!', 5, 3, 7, 10, 0, 4, 5, 6, 1, 0.1, 0.1);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`weapons` (`id`, `name`, `charge`, `scope_small`, `scope_medium`, `scope_big`, `motionless`, `success_small`, `success_medium`, `success_big`, `width_small`, `width_medium`, `width_big`) VALUES (5, 'Batterie a laser vortex', 1, 10, 20, 30, 0, 4, 5, 6, 0.3, 0.2, 0.1);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`weapons` (`id`, `name`, `charge`, `scope_small`, `scope_medium`, `scope_big`, `motionless`, `success_small`, `success_medium`, `success_big`, `width_small`, `width_medium`, `width_big`) VALUES (6, 'Lance orbital', 10, 3, 5, 10, 0, 4, 5, 6, 2, 3, 4);";
$req = mysqli_query($db, $query);

$query = "COMMIT;";
$req = mysqli_query($db, $query);

$query = "START TRANSACTION;";
$req = mysqli_query($db, $query);

$query = "USE `d08`;";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (1, 1, 1, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (2, 2, 1, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (3, 10, 1, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (4, 11, 1, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (5, 3, 4, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (6, 3, 3, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (7, 4, 4, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (8, 4, 3, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (9, 12, 4, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (10, 12, 3, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (11, 13, 4, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (12, 13, 3, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (13, 8, 1, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (14, 8, 2, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (15, 8, 3, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (16, 8, 4, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (17, 8, 5, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (18, 8, 6, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (19, 17, 1, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (20, 17, 2, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (21, 17, 3, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (22, 17, 4, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (23, 17, 5, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (24, 17, 6, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (37, 8, 6, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (26, 9, 6, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (25, 5, 3, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (38, 5, 4, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (27, 6, 2, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (28, 6, 5, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (29, 7, 5, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (30, 7, 3, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (31, 14, 3, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (32, 14, 4, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (33, 15, 2, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (34, 15, 5, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (35, 16, 5, 0, 0);";
$req = mysqli_query($db, $query);

$query = "INSERT INTO `d08`.`peoples_has_ships_has_weapons` (`id`, `peoples_has_ships_id`, `weapons_id`, `active`, `current_charge`) VALUES (36, 16, 3, 0, 0);";
$req = mysqli_query($db, $query);

$query = "COMMIT;";
$req = mysqli_query($db, $query);

mysqli_close($db);
?>
