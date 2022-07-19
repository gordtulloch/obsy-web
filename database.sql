-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema obsy
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema obsy
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `obsy` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema obsy
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema obsy
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `obsy` ;
USE `obsy` ;

-- -----------------------------------------------------
-- Table `obsy`.`target`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `obsy`.`target` (
  `idTarget` INT NOT NULL,
  `primaryName` VARCHAR(255) NOT NULL,
  `ra2000` FLOAT NOT NULL,
  `dec2000` FLOAT NOT NULL,
  `targetType` INT NOT NULL,
  `cadence` INT NOT NULL DEFAULT 0 COMMENT 'How often should this object be observed?',
  `lastObserved` DATETIME NOT NULL,
  `instrumentId` INT NOT NULL,
  `priority` INT NOT NULL DEFAULT 10,
  `trackFlag` INT NOT NULL DEFAULT 1,
  `focusFlag` INT NOT NULL DEFAULT 1,
  `alignFlag` INT NOT NULL DEFAULT 1,
  `guideFlag` INT NOT NULL DEFAULT 1,
  `indiProfile` VARCHAR(45) NOT NULL DEFAULT 'Default',
  `fitsFile` VARCHAR(255) NULL,
  `rotation` FLOAT NOT NULL DEFAULT 0,
  `sequenceFile` VARCHAR(255) NULL,
  `jobStartupConditions` VARCHAR(255) NOT NULL,
  `jobConstraints` VARCHAR(255) NOT NULL,
  `jobCompletionConditions` VARCHAR(45) NOT NULL,
  `abortedJobManagement` INT NOT NULL,
  PRIMARY KEY (`idTarget`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `obsy`.`targetType`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `obsy`.`targetType` (
  `targetTypeId` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`idtargetType`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `obsy`.`targetQueue`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `obsy`.`targetQueue` (
  `targetQueueId` INT NOT NULL,
  `targetId` INT NULL,
  `queueDate` DATETIME NOT NULL,
  `targetDate` DATETIME NOT NULL,
  `statusId` INT NOT NULL,
  `totalCapturesReqd` INT NOT NULL DEFAULT 0,
  `totalCapturesMade` VARCHAR(45) NOT NULL DEFAULT 0,
  `altitudeStart` FLOAT NOT NULL DEFAULT 0.00,
  `altitudeEnd` FLOAT NOT NULL DEFAULT 0.00,
  `startTime` DATETIME NOT NULL,
  `endTime` DATETIME NOT NULL,
  `duration` FLOAT NOT NULL DEFAULT 0.00,
  `leadTime` FLOAT NULL DEFAULT 0.00,
  PRIMARY KEY (`targetQueueId`))
ENGINE = InnoDB;

USE `obsy` ;

-- -----------------------------------------------------
-- Table `obsy`.`instrument`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `obsy`.`instrument` (
  `instrumentId` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `observatoryId` VARCHAR(255) NOT NULL,
  `type` VARCHAR(255) NOT NULL,
  `description` VARCHAR(255) NULL DEFAULT NULL,
  `mission` VARCHAR(255) NULL DEFAULT NULL,
  `defaultPerson` INT NOT NULL,
  PRIMARY KEY (`instrumentId`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `obsy`.`observatory`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `obsy`.`observatory` (
  `observatoryId` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `location` VARCHAR(255) NOT NULL,
  `country` VARCHAR(255) NOT NULL,
  `tz` VARCHAR(255) NOT NULL,
  `contact` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `latitude` FLOAT NOT NULL,
  `longitude` FLOAT NOT NULL,
  `defaultObs` VARCHAR(3) NOT NULL,
  PRIMARY KEY (`observatoryId`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `obsy`.`person`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `obsy`.`person` (
  `personId` INT NOT NULL AUTO_INCREMENT,
  `fname` VARCHAR(255) NOT NULL,
  `lname` VARCHAR(255) NOT NULL,
  `country` VARCHAR(255) NOT NULL,
  `tz` VARCHAR(255) NOT NULL,
  `defaultPerson` INT NOT NULL,
  PRIMARY KEY (`personId`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `obsy`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `obsy`.`users` (
  `userId` BIGINT NOT NULL,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `signup_date` INT NOT NULL,
  `security_level` INT NOT NULL,
  `tzone` VARCHAR(255) NOT NULL)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb3;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

