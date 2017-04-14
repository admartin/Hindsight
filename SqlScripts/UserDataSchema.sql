SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema UserData
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema UserData
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `UserData` DEFAULT CHARACTER SET utf8 ;
USE `UserData` ;

-- -----------------------------------------------------
-- Table `UserData`.`Category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `UserData`.`Category` (
  `idCategory` INT NOT NULL,
  `type` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCategory`),
  UNIQUE INDEX `idCategory_UNIQUE` (`idCategory` ASC),
  UNIQUE INDEX `type_UNIQUE` (`type` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `UserData`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `UserData`.`User` (
  `idUser` INT NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`username`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `UserData`.`cat_stats`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `UserData`.`cat_stats` (
  `tweet_total` INT NULL,
  `category_idCategory` INT(11) NOT NULL,
  `user_idUser` INT(11) NOT NULL,
  PRIMARY KEY (`category_idCategory`),
  INDEX `fk_cat_stats_category_idx` (`category_idCategory` ASC),
  INDEX `fk_cat_stats_user1_idx` (`user_idUser` ASC),
  CONSTRAINT `fk_cat_stats_category`
    FOREIGN KEY (`category_idCategory`)
    REFERENCES `userdata`.`category` (`idCategory`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
  )ENGINE = InnoDB;




USE `userdata` ;

-- -----------------------------------------------------
-- Table `UserData`.`Tweet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `UserData`.`Tweet` (
  `tweet` VARCHAR(150) NOT NULL,
  `posted` DATETIME NOT NULL,
  `Category_idCategory` INT NULL,
  `User_idUser` INT NOT NULL,
  PRIMARY KEY (`tweet`),
  INDEX `fk_Tweet_Category_idx` (`Category_idCategory` ASC),
  INDEX `fk_Tweet_User1_idx` (`User_idUser` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;