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
  PRIMARY KEY (`idUser`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `UserData`.`cat_stats`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `UserData`.`cat_stats` (
  `tweet_total` INT NULL,
  `category_idCategory` INT(11) NOT NULL,
  `user_idUser` INT(11) NOT NULL,
  PRIMARY KEY (`category_idCategory`, `user_idUser`),
  INDEX `fk_cat_stats_category_idx` (`category_idCategory` ASC),
  INDEX `fk_cat_stats_user1_idx` (`user_idUser` ASC),
  CONSTRAINT `fk_cat_stats_category`
    FOREIGN KEY (`category_idCategory`)
    REFERENCES `userdata`.`category` (`idCategory`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cat_stats_user1`
    FOREIGN KEY (`user_idUser`)
    REFERENCES `userdata`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `UserData`.`friends`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `UserData`.`friends` (
  `user_id` INT(11) NOT NULL,
  `friend_id` INT(11) NOT NULL,
  `tweet_total` VARCHAR(45) NULL,
  PRIMARY KEY (`user_id`, `friend_id`),
  INDEX `fk_friends_user2_idx` (`friend_id` ASC),
  CONSTRAINT `fk_friends_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `userdata`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_friends_user2`
    FOREIGN KEY (`friend_id`)
    REFERENCES `userdata`.`user` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `userdata` ;

-- -----------------------------------------------------
-- Table `UserData`.`Tweet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `UserData`.`Tweet` (
  `tweet` VARCHAR(150) NOT NULL,
  `posted` DATETIME NOT NULL,
  `Category_idCategory` INT NULL,
  `User_idUser` INT NOT NULL,
  PRIMARY KEY (`posted`, `User_idUser`),
  INDEX `fk_Tweet_Category_idx` (`Category_idCategory` ASC),
  INDEX `fk_Tweet_User1_idx` (`User_idUser` ASC),
  CONSTRAINT `fk_Tweet_Category`
    FOREIGN KEY (`Category_idCategory`)
    REFERENCES `UserData`.`Category` (`idCategory`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tweet_User1`
    FOREIGN KEY (`User_idUser`)
    REFERENCES `UserData`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
