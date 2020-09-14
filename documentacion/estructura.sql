CREATE TABLE
IF NOT EXISTS `contactos`.`user`
(
  `id` INT
(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR
(155) NOT NULL,
  `password` VARCHAR
(255) NOT NULL,
  `nombre` VARCHAR
(255) NULL DEFAULT NULL,
  `token` VARCHAR
(45) NOT NULL,
  PRIMARY KEY
(`id`),
  UNIQUE INDEX `email_UNIQUE`
(`email` ASC));

CREATE TABLE
IF NOT EXISTS `contactos`.`Contacto`
(
  `id` INT
(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR
(255) NOT NULL,
  `apellidos` VARCHAR
(255) NOT NULL,
  `anno_nacimiento` DATETIME NOT NULL,
  PRIMARY KEY
(`id`));

CREATE TABLE
IF NOT EXISTS `contactos`.`Telefonos`
(
  `id` INT
(11) NOT NULL AUTO_INCREMENT,
  `prefijo` INT
(5) NOT NULL,
  `numero` VARCHAR
(25) NOT NULL,
  `contacto_id` INT
(11) NOT NULL,
  PRIMARY KEY
(`id`),
  INDEX `fk_Telefonos_Contacto_idx`
(`contacto_id` ASC),
  CONSTRAINT `fk_Telefonos_Contacto`
    FOREIGN KEY
(`contacto_id`)
    REFERENCES `contactos`.`Contacto`
(`id`)
    ON
DELETE NO ACTION
    ON
UPDATE NO ACTION)