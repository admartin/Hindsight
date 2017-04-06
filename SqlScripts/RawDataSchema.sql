-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema RawData
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema RawData
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `RawData` DEFAULT CHARACTER SET utf8 ;
USE `RawData` ;

-- -----------------------------------------------------
-- Table `RawData`.`Category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `RawData`.`Category`;

CREATE TABLE IF NOT EXISTS `RawData`.`Category` (
  `idCategory` INT NOT NULL,
  `type` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCategory`),
  UNIQUE INDEX `idCategory_UNIQUE` (`idCategory` ASC),
  UNIQUE INDEX `type_UNIQUE` (`type` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RawData`.`User`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `RawData`.`User`;

CREATE TABLE IF NOT EXISTS `RawData`.`User` (
  `username` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`username`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `RawData`.`Tweet`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `RawData`.`Tweet`;

CREATE TABLE IF NOT EXISTS `RawData`.`Tweet` (
  `tweet` VARCHAR(150) NOT NULL,
  `posted` DATETIME NOT NULL,
  `Category_idCategory` INT NULL,
  `User_username` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`tweet`),
  CONSTRAINT `fk_Tweet_Category`
    FOREIGN KEY (`Category_idCategory`)
    REFERENCES `RawData`.`Category` (`idCategory`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tweet_User1`
    FOREIGN KEY (`User_username`)
    REFERENCES `RawData`.`User` (`username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
