-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`izdelek`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`izdelek` (
  `IzdelekID` INT(11) NOT NULL AUTO_INCREMENT,
  `ImeIzdelka` VARCHAR(100) NOT NULL,
  `TipIzdelka` VARCHAR(20) NOT NULL,
  `Opis` VARCHAR(100) NOT NULL,
  `Zaloga` INT(11) NOT NULL,
  `Cena` INT(11) NOT NULL,
  `VirSlike` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`IzdelekID`),
  UNIQUE INDEX `IzdelekID_UNIQUE` (`IzdelekID` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`uporabnik`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`uporabnik` (
  `UporabnikID` INT(11) NOT NULL AUTO_INCREMENT,
  `UporabniskoIme` VARCHAR(100) NOT NULL,
  `Geslo` VARCHAR(100) NOT NULL,
  `Email` VARCHAR(100) NOT NULL,
  `Naslov` VARCHAR(100) NOT NULL,
  `Telefon` VARCHAR(100) NOT NULL,
  `Spol` VARCHAR(8) NOT NULL,
  `DatumRojstva` VARCHAR(12) NOT NULL,
  `Ime` VARCHAR(100) NOT NULL,
  `Priimek` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`UporabnikID`),
  UNIQUE INDEX `UporabnikID_UNIQUE` (`UporabnikID` ASC),
  UNIQUE INDEX `UporabniskoIme_UNIQUE` (`UporabniskoIme` ASC),
  UNIQUE INDEX `Email_UNIQUE` (`Email` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 86
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`komentar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`komentar` (
  `KomentarID` INT(11) NOT NULL AUTO_INCREMENT,
  `Sporocilo` VARCHAR(150) NOT NULL,
  `UporabnikID` INT(11) NOT NULL,
  `IzdelekID` INT(11) NOT NULL,
  PRIMARY KEY (`KomentarID`),
  UNIQUE INDEX `KomentarID_UNIQUE` (`KomentarID` ASC),
  INDEX `fk_KOMENTAR_UPORABNIK1_idx` (`UporabnikID` ASC),
  INDEX `fk_KOMENTAR_IZDELEK1_idx` (`IzdelekID` ASC),
  CONSTRAINT `fk_KOMENTAR_IZDELEK1`
    FOREIGN KEY (`IzdelekID`)
    REFERENCES `mydb`.`izdelek` (`IzdelekID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_KOMENTAR_UPORABNIK1`
    FOREIGN KEY (`UporabnikID`)
    REFERENCES `mydb`.`uporabnik` (`UporabnikID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`kosarica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`kosarica` (
  `KosaricaID` INT(11) NOT NULL AUTO_INCREMENT,
  `IzdelekID` INT(11) NOT NULL,
  `UporabnikID` INT(11) NOT NULL,
  `kolicina` INT(11) NOT NULL,
  PRIMARY KEY (`KosaricaID`),
  UNIQUE INDEX `KosaricaID_UNIQUE` (`KosaricaID` ASC),
  INDEX `fk_KOSARICA_IZDELEK_idx` (`IzdelekID` ASC),
  INDEX `fk_KOSARICA_UPORABNIK1_idx` (`UporabnikID` ASC),
  CONSTRAINT `fk_KOSARICA_IZDELEK`
    FOREIGN KEY (`IzdelekID`)
    REFERENCES `mydb`.`izdelek` (`IzdelekID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_KOSARICA_UPORABNIK1`
    FOREIGN KEY (`UporabnikID`)
    REFERENCES `mydb`.`uporabnik` (`UporabnikID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`rating`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`rating` (
  `RatingID` INT(11) NOT NULL AUTO_INCREMENT,
  `UporabnikID` INT(11) NOT NULL,
  `IzdelekID` INT(11) NOT NULL,
  `Vrednost` INT(11) NOT NULL,
  PRIMARY KEY (`RatingID`),
  UNIQUE INDEX `RatingID_UNIQUE` (`RatingID` ASC),
  INDEX `fk_RATING_UPORABNIK1_idx` (`UporabnikID` ASC),
  INDEX `fk_RATING_IZDELEK1_idx` (`IzdelekID` ASC),
  CONSTRAINT `fk_RATING_IZDELEK1`
    FOREIGN KEY (`IzdelekID`)
    REFERENCES `mydb`.`izdelek` (`IzdelekID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_RATING_UPORABNIK1`
    FOREIGN KEY (`UporabnikID`)
    REFERENCES `mydb`.`uporabnik` (`UporabnikID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`transakcija`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`transakcija` (
  `TransakcijaID` INT(11) NOT NULL,
  `UporabnikID` INT(11) NOT NULL,
  `IzdelekID` INT(11) NOT NULL,
  `Kolicina` INT(11) NOT NULL,
  `Znesek` INT(11) NOT NULL,
  `Obdelan` VARCHAR(45) NOT NULL,
  INDEX `fk_transakcija_uporabnik1_idx` (`UporabnikID` ASC),
  INDEX `fk_transakcija_izdelek1_idx` (`IzdelekID` ASC),
  CONSTRAINT `fk_transakcija_izdelek1`
    FOREIGN KEY (`IzdelekID`)
    REFERENCES `mydb`.`izdelek` (`IzdelekID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_transakcija_uporabnik1`
    FOREIGN KEY (`UporabnikID`)
    REFERENCES `mydb`.`uporabnik` (`UporabnikID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
