-- MySQL Script generated by MySQL Workbench
-- 04/22/14 12:33:22
-- Model: New Model    Version: 1.0
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema securelogin_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `securelogin_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `securelogin_db` ;

-- -----------------------------------------------------
-- Table `securelogin_db`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `securelogin_db`.`usuario` ;

CREATE TABLE IF NOT EXISTS `securelogin_db`.`usuario` (
  `id` VARCHAR(45) NOT NULL,
  `contrasena` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `securelogin_db`.`persona`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `securelogin_db`.`persona` ;

CREATE TABLE IF NOT EXISTS `securelogin_db`.`persona` (
  `id` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(80) NOT NULL,
  `apellido_p` VARCHAR(80) NOT NULL,
  `apellido_m` VARCHAR(80) NOT NULL,
  `correo` VARCHAR(128) NOT NULL,
  `edad` INT NULL,
  `sexo` VARCHAR(1) NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `usuario_asociado_persona`
    FOREIGN KEY (`id`)
    REFERENCES `securelogin_db`.`usuario` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `securelogin_db`.`ultima_url`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `securelogin_db`.`ultima_url` ;

CREATE TABLE IF NOT EXISTS `securelogin_db`.`ultima_url` (
  `id` VARCHAR(45) NOT NULL,
  `url` TEXT NOT NULL,
  `hora` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `usuario_asociado_url`
    FOREIGN KEY (`id`)
    REFERENCES `securelogin_db`.`usuario` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;