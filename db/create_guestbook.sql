-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema guestbook
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema guestbook
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `guestbook` DEFAULT CHARACTER SET utf8 ;
USE `guestbook` ;

-- -----------------------------------------------------
-- Table `guestbook`.`ROLE`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `guestbook`.`ROLE` ;

CREATE TABLE IF NOT EXISTS `guestbook`.`ROLE` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `NAMA_ROLE` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `NAMA_UNIQUE` (`NAMA_ROLE` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `guestbook`.`TUJUAN`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `guestbook`.`TUJUAN` ;

CREATE TABLE IF NOT EXISTS `guestbook`.`TUJUAN` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `NAMA_TUJUAN` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `NAMA_UNIQUE` (`NAMA_TUJUAN` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `guestbook`.`INSTANSI`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `guestbook`.`INSTANSI` ;

CREATE TABLE IF NOT EXISTS `guestbook`.`INSTANSI` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `NAMA_INSTANSI` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `NAMA_UNIQUE` (`NAMA_INSTANSI` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `guestbook`.`USER`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `guestbook`.`USER` ;

CREATE TABLE IF NOT EXISTS `guestbook`.`USER` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `USERNAME` VARCHAR(45) NOT NULL,
  `PASSWORD` VARCHAR(45) NOT NULL,
  `NAMA_USER` VARCHAR(255) NOT NULL,
  `FOTO` TEXT NULL,
  `ROLE_ID` INT NOT NULL,
  `STATUS_USER` VARCHAR(1) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_USER_ROLE_idx` (`ROLE_ID` ASC),
  UNIQUE INDEX `USERNAME_UNIQUE` (`USERNAME` ASC),
  CONSTRAINT `fk_USER_ROLE`
    FOREIGN KEY (`ROLE_ID`)
    REFERENCES `guestbook`.`ROLE` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `guestbook`.`BUKU_TAMU`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `guestbook`.`BUKU_TAMU` ;

CREATE TABLE IF NOT EXISTS `guestbook`.`BUKU_TAMU` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `NAMA_TAMU` VARCHAR(255) NOT NULL,
  `KTP` VARCHAR(16) NOT NULL,
  `TELP` VARCHAR(45) NOT NULL,
  `KEPERLUAN` TEXT NOT NULL,
  `WAKTU` DATETIME NOT NULL,
  `INSTANSI_ID` INT NOT NULL,
  `TUJUAN_ID` INT NOT NULL,
  `USER_ID` INT NOT NULL,
  `STATUS_TAMU` VARCHAR(1) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_BUKU_TAMU_INSTANSI1_idx` (`INSTANSI_ID` ASC),
  INDEX `fk_BUKU_TAMU_TUJUAN1_idx` (`TUJUAN_ID` ASC),
  INDEX `fk_BUKU_TAMU_USER1_idx` (`USER_ID` ASC),
  CONSTRAINT `fk_BUKU_TAMU_INSTANSI1`
    FOREIGN KEY (`INSTANSI_ID`)
    REFERENCES `guestbook`.`INSTANSI` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_BUKU_TAMU_TUJUAN1`
    FOREIGN KEY (`TUJUAN_ID`)
    REFERENCES `guestbook`.`TUJUAN` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_BUKU_TAMU_USER1`
    FOREIGN KEY (`USER_ID`)
    REFERENCES `guestbook`.`USER` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `guestbook`.`RUANG_RAPAT`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `guestbook`.`RUANG_RAPAT` ;

CREATE TABLE IF NOT EXISTS `guestbook`.`RUANG_RAPAT` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `NAMA_RUANG` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `guestbook`.`RAPAT`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `guestbook`.`RAPAT` ;

CREATE TABLE IF NOT EXISTS `guestbook`.`RAPAT` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `WAKTU_RAPAT` DATETIME NOT NULL,
  `DURASI` INT NOT NULL,
  `AGENDA` TEXT NOT NULL,
  `RUANG_RAPAT_ID` INT NOT NULL,
  `USER_ID` INT NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_RAPAT_RUANG_RAPAT1_idx` (`RUANG_RAPAT_ID` ASC),
  INDEX `fk_RAPAT_USER1_idx` (`USER_ID` ASC),
  CONSTRAINT `fk_RAPAT_RUANG_RAPAT1`
    FOREIGN KEY (`RUANG_RAPAT_ID`)
    REFERENCES `guestbook`.`RUANG_RAPAT` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_RAPAT_USER1`
    FOREIGN KEY (`USER_ID`)
    REFERENCES `guestbook`.`USER` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `guestbook`.`PEGAWAI`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `guestbook`.`PEGAWAI` ;

CREATE TABLE IF NOT EXISTS `guestbook`.`PEGAWAI` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `NIP` VARCHAR(18) NOT NULL,
  `NAMA_PEGAWAI` VARCHAR(255) NOT NULL,
  `JABATAN` VARCHAR(255) NOT NULL,
  `STATUS_PEGAWAI` VARCHAR(1) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `NIP_UNIQUE` (`NIP` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `guestbook`.`BARANG`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `guestbook`.`BARANG` ;

CREATE TABLE IF NOT EXISTS `guestbook`.`BARANG` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `NAMA_BARANG` VARCHAR(255) NOT NULL,
  `PEGAWAI_ID` INT NOT NULL,
  `INSTANSI_ID` INT NOT NULL,
  `USER_ID` INT NOT NULL,
  `WAKTU_TERIMA` DATETIME NOT NULL,
  `STATUS_BARANG` VARCHAR(1) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_BARANG_PEGAWAI1_idx` (`PEGAWAI_ID` ASC),
  INDEX `fk_BARANG_USER1_idx` (`USER_ID` ASC),
  INDEX `fk_BARANG_INSTANSI1_idx` (`INSTANSI_ID` ASC),
  CONSTRAINT `fk_BARANG_PEGAWAI1`
    FOREIGN KEY (`PEGAWAI_ID`)
    REFERENCES `guestbook`.`PEGAWAI` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_BARANG_USER1`
    FOREIGN KEY (`USER_ID`)
    REFERENCES `guestbook`.`USER` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_BARANG_INSTANSI1`
    FOREIGN KEY (`INSTANSI_ID`)
    REFERENCES `guestbook`.`INSTANSI` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
