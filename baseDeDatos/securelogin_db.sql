SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `securelogin_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `securelogin_db` ;

-- -----------------------------------------------------
-- Table `securelogin_db`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `securelogin_db`.`usuarios` ;

CREATE TABLE IF NOT EXISTS `securelogin_db`.`usuarios` (
  `username` VARCHAR(12) NOT NULL,
  `apellido1` VARCHAR(45) NULL,
  `apellido2` VARCHAR(45) NULL,
  `nombres` VARCHAR(45) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `edad` VARCHAR(2) NOT NULL,
  `genero` VARCHAR(1) NOT NULL,
  `password` VARCHAR(256) NOT NULL,
  `privilegio` INT NOT NULL,
  PRIMARY KEY (`username`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `securelogin_db`.`url`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `securelogin_db`.`url` ;

CREATE TABLE IF NOT EXISTS `securelogin_db`.`url` (
  `username` VARCHAR(12) NOT NULL,
  `url` VARCHAR(256) NOT NULL,
  `acceso` DATETIME NOT NULL,
  PRIMARY KEY (`username`),
  CONSTRAINT `fk_username_url`
    FOREIGN KEY (`username`)
    REFERENCES `securelogin_db`.`usuarios` (`username`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
