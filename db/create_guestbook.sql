-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
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
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `ROLE_NAME` VARCHAR(45) NOT NULL,
  `CREATE_DATE` DATETIME NOT NULL DEFAULT NOW(),
  `UPDATE_DATE` DATETIME NOT NULL DEFAULT NOW() ON UPDATE NOW(),
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `NAMA_UNIQUE` (`ROLE_NAME` ASC))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `guestbook`.`USER`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `guestbook`.`USER` ;

CREATE TABLE IF NOT EXISTS `guestbook`.`USER` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` VARCHAR(255) NOT NULL,
  `PASSWORD` VARCHAR(255) NOT NULL,
  `USER_ALIAS` VARCHAR(255) NOT NULL,
  `USER_STATUS` VARCHAR(1) NOT NULL DEFAULT '1',
  `ROLE_ID` INT(11) NOT NULL,
  `CREATE_DATE` DATETIME NOT NULL DEFAULT NOW(),
  `UPDATE_DATE` DATETIME NOT NULL DEFAULT NOW() ON UPDATE NOW(),
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `USERNAME_UNIQUE` (`USERNAME` ASC),
  INDEX `fk_USER_ROLE_idx` (`ROLE_ID` ASC))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `guestbook`.`REF_TYPE`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `guestbook`.`REF_TYPE` ;

CREATE TABLE IF NOT EXISTS `guestbook`.`REF_TYPE` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `REF_TYPE_NAME` TEXT NOT NULL,
  `REF_TYPE_STATUS` VARCHAR(1) NOT NULL DEFAULT '1',
  `CREATE_DATE` DATETIME NOT NULL DEFAULT NOW(),
  `UPDATE_DATA` DATETIME NOT NULL DEFAULT NOW() ON UPDATE NOW(),
  PRIMARY KEY (`ID`))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `guestbook`.`REF_GENERAL`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `guestbook`.`REF_GENERAL` ;

CREATE TABLE IF NOT EXISTS `guestbook`.`REF_GENERAL` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `REF_NAME` TEXT NOT NULL,
  `REF_STATUS` VARCHAR(1) NOT NULL DEFAULT '1',
  `CREATE_DATE` DATETIME NOT NULL DEFAULT NOW(),
  `UPDATE_DATE` DATETIME NOT NULL DEFAULT NOW() ON UPDATE NOW(),
  `REF_TYPE_ID` INT NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_REF_GENERAL_REF_TYPE1_idx` (`REF_TYPE_ID` ASC))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `guestbook`.`COMPANY`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `guestbook`.`COMPANY` ;

CREATE TABLE IF NOT EXISTS `guestbook`.`COMPANY` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `COMPANY_NAME` VARCHAR(255) NOT NULL,
  `COMPANY_STATUS` VARCHAR(1) NOT NULL DEFAULT '1',
  `CREATE_DATE` DATETIME NOT NULL DEFAULT NOW(),
  `UPDATE_DATE` DATETIME NOT NULL DEFAULT NOW() ON UPDATE NOW(),
  `USER_ID` INT(11) NOT NULL DEFAULT 1,
  `REF_GENERAL_ID` INT NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_COMPANY_USER1_idx` (`USER_ID` ASC),
  UNIQUE INDEX `COMPANY_NAME_UNIQUE` (`COMPANY_NAME` ASC),
  INDEX `fk_COMPANY_REF_GENERAL1_idx` (`REF_GENERAL_ID` ASC))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `guestbook`.`DIVISION`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `guestbook`.`DIVISION` ;

CREATE TABLE IF NOT EXISTS `guestbook`.`DIVISION` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `DIVISION_NAME` TEXT NOT NULL,
  `DIVISION_STATUS` VARCHAR(1) NOT NULL DEFAULT '1',
  `CREATE_DATE` DATETIME NOT NULL DEFAULT NOW(),
  `UPDATE_DATE` DATETIME NOT NULL DEFAULT NOW(),
  `DIVISION_TOP_ID` INT(11) NULL,
  `USER_ID` INT(11) NOT NULL DEFAULT 4,
  PRIMARY KEY (`ID`),
  INDEX `fk_DIVISION_DIVISION1_idx` (`DIVISION_TOP_ID` ASC),
  INDEX `fk_DIVISION_USER1_idx` (`USER_ID` ASC))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `guestbook`.`EMPLOYEES`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `guestbook`.`EMPLOYEES` ;

CREATE TABLE IF NOT EXISTS `guestbook`.`EMPLOYEES` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `EMPLOYEE_NAME` TEXT NOT NULL,
  `EMPLOYEE_EMAIL` TEXT NOT NULL,
  `EMPLOYEE_PHONE` VARCHAR(255) NULL,
  `EMPLOYEE_STATUS` VARCHAR(1) NOT NULL DEFAULT '1',
  `CREATE_DATE` DATETIME NOT NULL DEFAULT NOW(),
  `UPDATE_DATE` DATETIME NOT NULL DEFAULT NOW() ON UPDATE NOW(),
  `USER_ID` INT(11) NOT NULL DEFAULT 1,
  `EMPLOYEES_TOP_ID` INT(11) NULL,
  `DIVISION_ID` INT(11) NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_EMPLOYEES_USER1_idx` (`USER_ID` ASC),
  INDEX `fk_EMPLOYEES_EMPLOYEES1_idx` (`EMPLOYEES_TOP_ID` ASC),
  INDEX `fk_EMPLOYEES_DIVISION1_idx` (`DIVISION_ID` ASC))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `guestbook`.`PACKAGES`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `guestbook`.`PACKAGES` ;

CREATE TABLE IF NOT EXISTS `guestbook`.`PACKAGES` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `PACKAGE_NAME` TEXT NOT NULL,
  `EMPLOYEES_ID` INT(11) NOT NULL,
  `COMPANY_ID` INT(11) NOT NULL,
  `USER_ID` INT(11) NULL,
  `PACKAGE_STATUS` VARCHAR(1) NOT NULL DEFAULT 0,
  `CREATE_DATE` DATETIME NOT NULL DEFAULT NOW(),
  `UPDATE_DATE` DATETIME NULL DEFAULT NOW() ON UPDATE NOW(),
  PRIMARY KEY (`ID`),
  INDEX `fk_BARANG_PEGAWAI1_idx` (`EMPLOYEES_ID` ASC),
  INDEX `fk_BARANG_USER1_idx` (`USER_ID` ASC),
  INDEX `fk_BARANG_INSTANSI1_idx` (`COMPANY_ID` ASC))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `guestbook`.`GUEST`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `guestbook`.`GUEST` ;

CREATE TABLE IF NOT EXISTS `guestbook`.`GUEST` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `GUEST_NAME` TEXT NOT NULL,
  `GUEST_EMAIL` VARCHAR(255) NULL,
  `GUEST_PHONE` VARCHAR(255) NULL,
  `GUEST_STATUS` VARCHAR(1) NOT NULL DEFAULT '1',
  `CREATE_DATE` DATETIME NOT NULL DEFAULT NOW(),
  `UPDATE_DATE` DATETIME NOT NULL DEFAULT NOW() ON UPDATE NOW(),
  `USER_ID` INT(11) NULL,
  `COMPANY_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_GUEST_USER1_idx` (`USER_ID` ASC),
  INDEX `fk_GUEST_COMPANY1_idx` (`COMPANY_ID` ASC))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `guestbook`.`MEETING_ROOM`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `guestbook`.`MEETING_ROOM` ;

CREATE TABLE IF NOT EXISTS `guestbook`.`MEETING_ROOM` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `ROOM_NAME` VARCHAR(255) NOT NULL,
  `ROOM_STATUS` VARCHAR(1) NOT NULL DEFAULT '1',
  `CREATE_DATE` DATETIME NOT NULL DEFAULT NOW(),
  `UPDATE_DATE` DATETIME NOT NULL DEFAULT NOW() ON UPDATE NOW(),
  `USER_ID` INT(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID`),
  INDEX `fk_MEETING_ROOM_USER1_idx` (`USER_ID` ASC),
  UNIQUE INDEX `ROOM_NAME_UNIQUE` (`ROOM_NAME` ASC))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `guestbook`.`MEETING`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `guestbook`.`MEETING` ;

CREATE TABLE IF NOT EXISTS `guestbook`.`MEETING` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `MEETING_TIME` DATETIME NOT NULL,
  `DURATION` INT(11) NOT NULL,
  `AGENDA` TEXT NOT NULL,
  `USER_ID` INT(11) NOT NULL,
  `CREATE_DATE` DATETIME NOT NULL DEFAULT NOW(),
  `UPDATE_DATE` DATETIME NOT NULL DEFAULT NOW() ON UPDATE NOW(),
  `MEETING_ROOM_ID` INT(11) NOT NULL,
  `MEETING_STATUS` VARCHAR(1) NOT NULL DEFAULT '1',
  `PIC_ID` INT(11) NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_RAPAT_USER1_idx` (`USER_ID` ASC),
  INDEX `fk_MEETING_MEETING_ROOM1_idx` (`MEETING_ROOM_ID` ASC),
  INDEX `fk_MEETING_EMPLOYEES1_idx` (`PIC_ID` ASC))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `guestbook`.`GUEST_BOOK`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `guestbook`.`GUEST_BOOK` ;

CREATE TABLE IF NOT EXISTS `guestbook`.`GUEST_BOOK` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` INT(11) NULL,
  `GUEST_ID` INT NOT NULL,
  `DIVISION_ID` INT(11) NULL,
  `EMPLOYEES_ID` INT(11) NULL,
  `REF_GENERAL_ID` INT NOT NULL,
  `CREATE_DATE` DATETIME NOT NULL DEFAULT NOW(),
  `UPDATE_DATE` DATETIME NOT NULL DEFAULT NOW() ON UPDATE NOW(),
  `GUEST_BOOK_STATUS` VARCHAR(1) NULL DEFAULT '1',
  `MEETING_ID` INT(11) NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_GUEST_BOOK_USER1_idx` (`USER_ID` ASC),
  INDEX `fk_GUEST_BOOK_GUEST1_idx` (`GUEST_ID` ASC),
  INDEX `fk_GUEST_BOOK_DIVISION1_idx` (`DIVISION_ID` ASC),
  INDEX `fk_GUEST_BOOK_EMPLOYEES1_idx` (`EMPLOYEES_ID` ASC),
  INDEX `fk_GUEST_BOOK_REF_GENERAL1_idx` (`REF_GENERAL_ID` ASC),
  INDEX `fk_GUEST_BOOK_MEETING1_idx` (`MEETING_ID` ASC))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `guestbook`.`INIT_DATA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `guestbook`.`INIT_DATA` ;

CREATE TABLE IF NOT EXISTS `guestbook`.`INIT_DATA` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `APP_NAME` TEXT NOT NULL,
  `OFFICE_NAME` TEXT NOT NULL,
  `ICON` VARCHAR(255) NOT NULL DEFAULT 'book',
  `THEME` VARCHAR(255) NOT NULL DEFAULT 'DARK',
  `CREATE_DATE` DATETIME NOT NULL DEFAULT NOW(),
  `UPDATE_DATE` DATETIME NOT NULL DEFAULT NOW() ON UPDATE NOW(),
  `USER_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_INIT_DATA_USER1_idx` (`USER_ID` ASC))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `guestbook`.`MENU`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `guestbook`.`MENU` ;

CREATE TABLE IF NOT EXISTS `guestbook`.`MENU` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `MENU_NAME` VARCHAR(255) NOT NULL,
  `PERMALINK` TEXT NOT NULL,
  `MENU_ICON` VARCHAR(255) NOT NULL DEFAULT 'minus',
  `MENU_ORDER` VARCHAR(45) NOT NULL,
  `MENU_STATUS` VARCHAR(1) NOT NULL DEFAULT '1',
  `ROLE_ACCESS` VARCHAR(45) NOT NULL DEFAULT '1',
  `MENU_ID` INT NULL,
  `CREATE_DATE` DATETIME NOT NULL DEFAULT NOW(),
  `UPDATE_DATE` DATETIME NOT NULL DEFAULT NOW() ON UPDATE NOW(),
  `MENU_ID1` INT NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_MENU_MENU1_idx` (`MENU_ID` ASC),
  INDEX `fk_MENU_MENU2_idx` (`MENU_ID1` ASC))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `guestbook`.`MEETING_PARTICIPANTS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `guestbook`.`MEETING_PARTICIPANTS` ;

CREATE TABLE IF NOT EXISTS `guestbook`.`MEETING_PARTICIPANTS` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `CREATE_DATE` DATETIME NOT NULL DEFAULT NOW(),
  `UPDATE_DATE` DATETIME NOT NULL DEFAULT NOW() ON UPDATE NOW(),
  `PARTICIPANT_STATUS` VARCHAR(1) NOT NULL DEFAULT '1',
  `MEETING_ID` INT(11) NOT NULL,
  `GUEST_ID` INT(11) NULL,
  `EMPLOYEES_ID` INT(11) NULL,
  `USER_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `fk_MEETNG_PARTICIPANTS_MEETING1_idx` (`MEETING_ID` ASC),
  INDEX `fk_MEETNG_PARTICIPANTS_GUEST1_idx` (`GUEST_ID` ASC),
  INDEX `fk_MEETNG_PARTICIPANTS_EMPLOYEES1_idx` (`EMPLOYEES_ID` ASC),
  INDEX `fk_MEETING_PARTICIPANTS_USER1_idx` (`USER_ID` ASC))
ENGINE = MyISAM;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `guestbook`.`ROLE`
-- -----------------------------------------------------
START TRANSACTION;
USE `guestbook`;
INSERT INTO `guestbook`.`ROLE` (`ID`, `ROLE_NAME`, `CREATE_DATE`, `UPDATE_DATE`) VALUES (DEFAULT, 'Administrator', DEFAULT, DEFAULT);
INSERT INTO `guestbook`.`ROLE` (`ID`, `ROLE_NAME`, `CREATE_DATE`, `UPDATE_DATE`) VALUES (DEFAULT, 'Supervisor', DEFAULT, DEFAULT);
INSERT INTO `guestbook`.`ROLE` (`ID`, `ROLE_NAME`, `CREATE_DATE`, `UPDATE_DATE`) VALUES (DEFAULT, 'Operator', DEFAULT, DEFAULT);

COMMIT;


-- -----------------------------------------------------
-- Data for table `guestbook`.`USER`
-- -----------------------------------------------------
START TRANSACTION;
USE `guestbook`;
INSERT INTO `guestbook`.`USER` (`ID`, `USERNAME`, `PASSWORD`, `USER_ALIAS`, `USER_STATUS`, `ROLE_ID`, `CREATE_DATE`, `UPDATE_DATE`) VALUES (DEFAULT, 'admin', 'e19d5cd5af0378da05f63f891c7467af', 'Administrator', '1', 1, DEFAULT, DEFAULT);
INSERT INTO `guestbook`.`USER` (`ID`, `USERNAME`, `PASSWORD`, `USER_ALIAS`, `USER_STATUS`, `ROLE_ID`, `CREATE_DATE`, `UPDATE_DATE`) VALUES (DEFAULT, 'super', 'e19d5cd5af0378da05f63f891c7467af', 'Supervisor1', '1', 2, DEFAULT, DEFAULT);
INSERT INTO `guestbook`.`USER` (`ID`, `USERNAME`, `PASSWORD`, `USER_ALIAS`, `USER_STATUS`, `ROLE_ID`, `CREATE_DATE`, `UPDATE_DATE`) VALUES (DEFAULT, 'oper', 'e19d5cd5af0378da05f63f891c7467af', 'Operator1', '1', 3, DEFAULT, DEFAULT);

COMMIT;


-- -----------------------------------------------------
-- Data for table `guestbook`.`REF_TYPE`
-- -----------------------------------------------------
START TRANSACTION;
USE `guestbook`;
INSERT INTO `guestbook`.`REF_TYPE` (`ID`, `REF_TYPE_NAME`, `REF_TYPE_STATUS`, `CREATE_DATE`, `UPDATE_DATA`) VALUES (DEFAULT, 'COMPANY_TYPE', DEFAULT, DEFAULT, DEFAULT);
INSERT INTO `guestbook`.`REF_TYPE` (`ID`, `REF_TYPE_NAME`, `REF_TYPE_STATUS`, `CREATE_DATE`, `UPDATE_DATA`) VALUES (DEFAULT, 'NEEDS_TYPE', DEFAULT, DEFAULT, DEFAULT);

COMMIT;


-- -----------------------------------------------------
-- Data for table `guestbook`.`REF_GENERAL`
-- -----------------------------------------------------
START TRANSACTION;
USE `guestbook`;
INSERT INTO `guestbook`.`REF_GENERAL` (`ID`, `REF_NAME`, `REF_STATUS`, `CREATE_DATE`, `UPDATE_DATE`, `REF_TYPE_ID`) VALUES (DEFAULT, 'Expedition', DEFAULT, DEFAULT, DEFAULT, 1);
INSERT INTO `guestbook`.`REF_GENERAL` (`ID`, `REF_NAME`, `REF_STATUS`, `CREATE_DATE`, `UPDATE_DATE`, `REF_TYPE_ID`) VALUES (DEFAULT, 'Non Expedition', DEFAULT, DEFAULT, DEFAULT, 1);
INSERT INTO `guestbook`.`REF_GENERAL` (`ID`, `REF_NAME`, `REF_STATUS`, `CREATE_DATE`, `UPDATE_DATE`, `REF_TYPE_ID`) VALUES (DEFAULT, 'Meeting', DEFAULT, DEFAULT, DEFAULT, 2);
INSERT INTO `guestbook`.`REF_GENERAL` (`ID`, `REF_NAME`, `REF_STATUS`, `CREATE_DATE`, `UPDATE_DATE`, `REF_TYPE_ID`) VALUES (DEFAULT, 'Meet Someone', DEFAULT, DEFAULT, DEFAULT, 2);
INSERT INTO `guestbook`.`REF_GENERAL` (`ID`, `REF_NAME`, `REF_STATUS`, `CREATE_DATE`, `UPDATE_DATE`, `REF_TYPE_ID`) VALUES (DEFAULT, 'Other needs', DEFAULT, DEFAULT, DEFAULT, 2);

COMMIT;


-- -----------------------------------------------------
-- Data for table `guestbook`.`COMPANY`
-- -----------------------------------------------------
START TRANSACTION;
USE `guestbook`;
INSERT INTO `guestbook`.`COMPANY` (`ID`, `COMPANY_NAME`, `COMPANY_STATUS`, `CREATE_DATE`, `UPDATE_DATE`, `USER_ID`, `REF_GENERAL_ID`) VALUES (DEFAULT, 'JNE', '1', DEFAULT, DEFAULT, DEFAULT, 1);
INSERT INTO `guestbook`.`COMPANY` (`ID`, `COMPANY_NAME`, `COMPANY_STATUS`, `CREATE_DATE`, `UPDATE_DATE`, `USER_ID`, `REF_GENERAL_ID`) VALUES (DEFAULT, 'PT. Pos Indonesia', '1', DEFAULT, DEFAULT, DEFAULT, 1);
INSERT INTO `guestbook`.`COMPANY` (`ID`, `COMPANY_NAME`, `COMPANY_STATUS`, `CREATE_DATE`, `UPDATE_DATE`, `USER_ID`, `REF_GENERAL_ID`) VALUES (DEFAULT, 'Direktorat Sistem Perbendaharaan', '1', DEFAULT, DEFAULT, DEFAULT, 2);
INSERT INTO `guestbook`.`COMPANY` (`ID`, `COMPANY_NAME`, `COMPANY_STATUS`, `CREATE_DATE`, `UPDATE_DATE`, `USER_ID`, `REF_GENERAL_ID`) VALUES (DEFAULT, 'Bank Mandiri', '1', DEFAULT, DEFAULT, DEFAULT, 2);

COMMIT;


-- -----------------------------------------------------
-- Data for table `guestbook`.`DIVISION`
-- -----------------------------------------------------
START TRANSACTION;
USE `guestbook`;
INSERT INTO `guestbook`.`DIVISION` (`ID`, `DIVISION_NAME`, `DIVISION_STATUS`, `CREATE_DATE`, `UPDATE_DATE`, `DIVISION_TOP_ID`, `USER_ID`) VALUES (DEFAULT, 'Head Division', DEFAULT, DEFAULT, DEFAULT, NULL, DEFAULT);
INSERT INTO `guestbook`.`DIVISION` (`ID`, `DIVISION_NAME`, `DIVISION_STATUS`, `CREATE_DATE`, `UPDATE_DATE`, `DIVISION_TOP_ID`, `USER_ID`) VALUES (DEFAULT, 'Second Division', DEFAULT, DEFAULT, DEFAULT, NULL, DEFAULT);

COMMIT;


-- -----------------------------------------------------
-- Data for table `guestbook`.`EMPLOYEES`
-- -----------------------------------------------------
START TRANSACTION;
USE `guestbook`;
INSERT INTO `guestbook`.`EMPLOYEES` (`ID`, `EMPLOYEE_NAME`, `EMPLOYEE_EMAIL`, `EMPLOYEE_PHONE`, `EMPLOYEE_STATUS`, `CREATE_DATE`, `UPDATE_DATE`, `USER_ID`, `EMPLOYEES_TOP_ID`, `DIVISION_ID`) VALUES (DEFAULT, 'Yudi Prasetyo', 'prasetyaningyudi@gmail.com', '081329680342', '1', DEFAULT, DEFAULT, DEFAULT, NULL, NULL);
INSERT INTO `guestbook`.`EMPLOYEES` (`ID`, `EMPLOYEE_NAME`, `EMPLOYEE_EMAIL`, `EMPLOYEE_PHONE`, `EMPLOYEE_STATUS`, `CREATE_DATE`, `UPDATE_DATE`, `USER_ID`, `EMPLOYEES_TOP_ID`, `DIVISION_ID`) VALUES (DEFAULT, 'Hafiz Adnan', 'hafidz.adnan@gmail.com', '088229922002', '1', DEFAULT, DEFAULT, DEFAULT, NULL, NULL);
INSERT INTO `guestbook`.`EMPLOYEES` (`ID`, `EMPLOYEE_NAME`, `EMPLOYEE_EMAIL`, `EMPLOYEE_PHONE`, `EMPLOYEE_STATUS`, `CREATE_DATE`, `UPDATE_DATE`, `USER_ID`, `EMPLOYEES_TOP_ID`, `DIVISION_ID`) VALUES (DEFAULT, 'John doe', 'john.doe@gmail.com', '080282828288', '1', DEFAULT, DEFAULT, DEFAULT, NULL, NULL);
INSERT INTO `guestbook`.`EMPLOYEES` (`ID`, `EMPLOYEE_NAME`, `EMPLOYEE_EMAIL`, `EMPLOYEE_PHONE`, `EMPLOYEE_STATUS`, `CREATE_DATE`, `UPDATE_DATE`, `USER_ID`, `EMPLOYEES_TOP_ID`, `DIVISION_ID`) VALUES (DEFAULT, 'Marry Jean', 'marry.jane@gmail.com', '039393939399', '0', DEFAULT, DEFAULT, DEFAULT, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `guestbook`.`GUEST`
-- -----------------------------------------------------
START TRANSACTION;
USE `guestbook`;
INSERT INTO `guestbook`.`GUEST` (`ID`, `GUEST_NAME`, `GUEST_EMAIL`, `GUEST_PHONE`, `GUEST_STATUS`, `CREATE_DATE`, `UPDATE_DATE`, `USER_ID`, `COMPANY_ID`) VALUES (DEFAULT, 'Jojo Markojo', 'jojo@gmail.com', NULL, '1', DEFAULT, DEFAULT, NULL, 3);
INSERT INTO `guestbook`.`GUEST` (`ID`, `GUEST_NAME`, `GUEST_EMAIL`, `GUEST_PHONE`, `GUEST_STATUS`, `CREATE_DATE`, `UPDATE_DATE`, `USER_ID`, `COMPANY_ID`) VALUES (DEFAULT, 'Iwan setiawan', 'iwan@gmail.com', '082525628287282', '1', DEFAULT, DEFAULT, NULL, 4);
INSERT INTO `guestbook`.`GUEST` (`ID`, `GUEST_NAME`, `GUEST_EMAIL`, `GUEST_PHONE`, `GUEST_STATUS`, `CREATE_DATE`, `UPDATE_DATE`, `USER_ID`, `COMPANY_ID`) VALUES (DEFAULT, 'Kurnia Sandi', NULL, '083378378383', '1', DEFAULT, DEFAULT, NULL, 3);
INSERT INTO `guestbook`.`GUEST` (`ID`, `GUEST_NAME`, `GUEST_EMAIL`, `GUEST_PHONE`, `GUEST_STATUS`, `CREATE_DATE`, `UPDATE_DATE`, `USER_ID`, `COMPANY_ID`) VALUES (DEFAULT, 'Guest Inaktif', NULL, NULL, '0', DEFAULT, DEFAULT, NULL, 3);

COMMIT;


-- -----------------------------------------------------
-- Data for table `guestbook`.`MEETING_ROOM`
-- -----------------------------------------------------
START TRANSACTION;
USE `guestbook`;
INSERT INTO `guestbook`.`MEETING_ROOM` (`ID`, `ROOM_NAME`, `ROOM_STATUS`, `CREATE_DATE`, `UPDATE_DATE`, `USER_ID`) VALUES (DEFAULT, 'Room 1', DEFAULT, DEFAULT, DEFAULT, DEFAULT);
INSERT INTO `guestbook`.`MEETING_ROOM` (`ID`, `ROOM_NAME`, `ROOM_STATUS`, `CREATE_DATE`, `UPDATE_DATE`, `USER_ID`) VALUES (DEFAULT, 'Room 2', DEFAULT, DEFAULT, DEFAULT, DEFAULT);

COMMIT;


-- -----------------------------------------------------
-- Data for table `guestbook`.`MENU`
-- -----------------------------------------------------
START TRANSACTION;
USE `guestbook`;
INSERT INTO `guestbook`.`MENU` (`ID`, `MENU_NAME`, `PERMALINK`, `MENU_ICON`, `MENU_ORDER`, `MENU_STATUS`, `ROLE_ACCESS`, `MENU_ID`, `CREATE_DATE`, `UPDATE_DATE`, `MENU_ID1`) VALUES (1, 'Guest Book', '#', 'book', '1', '1', '4', NULL, DEFAULT, DEFAULT, DEFAULT);
INSERT INTO `guestbook`.`MENU` (`ID`, `MENU_NAME`, `PERMALINK`, `MENU_ICON`, `MENU_ORDER`, `MENU_STATUS`, `ROLE_ACCESS`, `MENU_ID`, `CREATE_DATE`, `UPDATE_DATE`, `MENU_ID1`) VALUES (2, 'Meeting', '#', 'blackboard', '2', '1', '1,3,4', NULL, DEFAULT, DEFAULT, DEFAULT);
INSERT INTO `guestbook`.`MENU` (`ID`, `MENU_NAME`, `PERMALINK`, `MENU_ICON`, `MENU_ORDER`, `MENU_STATUS`, `ROLE_ACCESS`, `MENU_ID`, `CREATE_DATE`, `UPDATE_DATE`, `MENU_ID1`) VALUES (3, 'Package', '#', 'gift', '3', '1', '1,3,4', NULL, DEFAULT, DEFAULT, DEFAULT);
INSERT INTO `guestbook`.`MENU` (`ID`, `MENU_NAME`, `PERMALINK`, `MENU_ICON`, `MENU_ORDER`, `MENU_STATUS`, `ROLE_ACCESS`, `MENU_ID`, `CREATE_DATE`, `UPDATE_DATE`, `MENU_ID1`) VALUES (4, 'Room', '#', 'object-align-top', '4', '1', '1,3', NULL, DEFAULT, DEFAULT, DEFAULT);
INSERT INTO `guestbook`.`MENU` (`ID`, `MENU_NAME`, `PERMALINK`, `MENU_ICON`, `MENU_ORDER`, `MENU_STATUS`, `ROLE_ACCESS`, `MENU_ID`, `CREATE_DATE`, `UPDATE_DATE`, `MENU_ID1`) VALUES (5, 'Employees', '#', 'list-alt', '5', '1', '1,3', NULL, DEFAULT, DEFAULT, DEFAULT);
INSERT INTO `guestbook`.`MENU` (`ID`, `MENU_NAME`, `PERMALINK`, `MENU_ICON`, `MENU_ORDER`, `MENU_STATUS`, `ROLE_ACCESS`, `MENU_ID`, `CREATE_DATE`, `UPDATE_DATE`, `MENU_ID1`) VALUES (6, 'Company', '#', 'copyright-mark', '6', '1', '1,3', NULL, DEFAULT, DEFAULT, DEFAULT);
INSERT INTO `guestbook`.`MENU` (`ID`, `MENU_NAME`, `PERMALINK`, `MENU_ICON`, `MENU_ORDER`, `MENU_STATUS`, `ROLE_ACCESS`, `MENU_ID`, `CREATE_DATE`, `UPDATE_DATE`, `MENU_ID1`) VALUES (7, 'User', '#', 'user', '7', '1', '1', NULL, DEFAULT, DEFAULT, DEFAULT);
INSERT INTO `guestbook`.`MENU` (`ID`, `MENU_NAME`, `PERMALINK`, `MENU_ICON`, `MENU_ORDER`, `MENU_STATUS`, `ROLE_ACCESS`, `MENU_ID`, `CREATE_DATE`, `UPDATE_DATE`, `MENU_ID1`) VALUES (8, 'Init Data', '#', 'wrench', '8', '1', '1', NULL, DEFAULT, DEFAULT, DEFAULT);
INSERT INTO `guestbook`.`MENU` (`ID`, `MENU_NAME`, `PERMALINK`, `MENU_ICON`, `MENU_ORDER`, `MENU_STATUS`, `ROLE_ACCESS`, `MENU_ID`, `CREATE_DATE`, `UPDATE_DATE`, `MENU_ID1`) VALUES (9, 'Sign in', '#', 'check', '1', '1', '4', 1, DEFAULT, DEFAULT, DEFAULT);
INSERT INTO `guestbook`.`MENU` (`ID`, `MENU_NAME`, `PERMALINK`, `MENU_ICON`, `MENU_ORDER`, `MENU_STATUS`, `ROLE_ACCESS`, `MENU_ID`, `CREATE_DATE`, `UPDATE_DATE`, `MENU_ID1`) VALUES (10, 'Sign Out', '#', 'share', '2', '1', '4', 1, DEFAULT, DEFAULT, DEFAULT);
INSERT INTO `guestbook`.`MENU` (`ID`, `MENU_NAME`, `PERMALINK`, `MENU_ICON`, `MENU_ORDER`, `MENU_STATUS`, `ROLE_ACCESS`, `MENU_ID`, `CREATE_DATE`, `UPDATE_DATE`, `MENU_ID1`) VALUES (11, 'View', 'meeting', 'eye-open', '1', '1', '1,3,4', 2, DEFAULT, DEFAULT, DEFAULT);
INSERT INTO `guestbook`.`MENU` (`ID`, `MENU_NAME`, `PERMALINK`, `MENU_ICON`, `MENU_ORDER`, `MENU_STATUS`, `ROLE_ACCESS`, `MENU_ID`, `CREATE_DATE`, `UPDATE_DATE`, `MENU_ID1`) VALUES (12, 'Add', 'meeting/create', 'plus', '2', '1', '1,3,4', 2, DEFAULT, DEFAULT, DEFAULT);
INSERT INTO `guestbook`.`MENU` (`ID`, `MENU_NAME`, `PERMALINK`, `MENU_ICON`, `MENU_ORDER`, `MENU_STATUS`, `ROLE_ACCESS`, `MENU_ID`, `CREATE_DATE`, `UPDATE_DATE`, `MENU_ID1`) VALUES (13, 'View', 'packages', 'eye-open', '1', '1', '1,3,4', 3, DEFAULT, DEFAULT, DEFAULT);
INSERT INTO `guestbook`.`MENU` (`ID`, `MENU_NAME`, `PERMALINK`, `MENU_ICON`, `MENU_ORDER`, `MENU_STATUS`, `ROLE_ACCESS`, `MENU_ID`, `CREATE_DATE`, `UPDATE_DATE`, `MENU_ID1`) VALUES (14, 'Add', 'packages/create', 'plus', '2', '1', '1,3,4', 3, DEFAULT, DEFAULT, DEFAULT);
INSERT INTO `guestbook`.`MENU` (`ID`, `MENU_NAME`, `PERMALINK`, `MENU_ICON`, `MENU_ORDER`, `MENU_STATUS`, `ROLE_ACCESS`, `MENU_ID`, `CREATE_DATE`, `UPDATE_DATE`, `MENU_ID1`) VALUES (15, 'View', 'meeting_room', 'eye-open', '1', '1', '1,3', 4, DEFAULT, DEFAULT, DEFAULT);
INSERT INTO `guestbook`.`MENU` (`ID`, `MENU_NAME`, `PERMALINK`, `MENU_ICON`, `MENU_ORDER`, `MENU_STATUS`, `ROLE_ACCESS`, `MENU_ID`, `CREATE_DATE`, `UPDATE_DATE`, `MENU_ID1`) VALUES (16, 'Add', 'meeting_room/create', 'plus', '2', '1', '1,3', 4, DEFAULT, DEFAULT, DEFAULT);
INSERT INTO `guestbook`.`MENU` (`ID`, `MENU_NAME`, `PERMALINK`, `MENU_ICON`, `MENU_ORDER`, `MENU_STATUS`, `ROLE_ACCESS`, `MENU_ID`, `CREATE_DATE`, `UPDATE_DATE`, `MENU_ID1`) VALUES (17, 'View', 'employee', 'eye-open', '1', '1', '1,3', 5, DEFAULT, DEFAULT, DEFAULT);
INSERT INTO `guestbook`.`MENU` (`ID`, `MENU_NAME`, `PERMALINK`, `MENU_ICON`, `MENU_ORDER`, `MENU_STATUS`, `ROLE_ACCESS`, `MENU_ID`, `CREATE_DATE`, `UPDATE_DATE`, `MENU_ID1`) VALUES (18, 'Add', 'employee/create', 'plus', '2', '1', '1,3', 5, DEFAULT, DEFAULT, DEFAULT);
INSERT INTO `guestbook`.`MENU` (`ID`, `MENU_NAME`, `PERMALINK`, `MENU_ICON`, `MENU_ORDER`, `MENU_STATUS`, `ROLE_ACCESS`, `MENU_ID`, `CREATE_DATE`, `UPDATE_DATE`, `MENU_ID1`) VALUES (19, 'View', 'company', 'eye-open', '1', '1', '1,3', 6, DEFAULT, DEFAULT, DEFAULT);
INSERT INTO `guestbook`.`MENU` (`ID`, `MENU_NAME`, `PERMALINK`, `MENU_ICON`, `MENU_ORDER`, `MENU_STATUS`, `ROLE_ACCESS`, `MENU_ID`, `CREATE_DATE`, `UPDATE_DATE`, `MENU_ID1`) VALUES (20, 'Add', 'company/create', 'plus', '2', '1', '1,3', 6, DEFAULT, DEFAULT, DEFAULT);
INSERT INTO `guestbook`.`MENU` (`ID`, `MENU_NAME`, `PERMALINK`, `MENU_ICON`, `MENU_ORDER`, `MENU_STATUS`, `ROLE_ACCESS`, `MENU_ID`, `CREATE_DATE`, `UPDATE_DATE`, `MENU_ID1`) VALUES (21, 'View', 'user', 'eye-open', '1', '1', '1', 7, DEFAULT, DEFAULT, DEFAULT);
INSERT INTO `guestbook`.`MENU` (`ID`, `MENU_NAME`, `PERMALINK`, `MENU_ICON`, `MENU_ORDER`, `MENU_STATUS`, `ROLE_ACCESS`, `MENU_ID`, `CREATE_DATE`, `UPDATE_DATE`, `MENU_ID1`) VALUES (22, 'add', 'user/create', 'plus', '2', '1', '1', 7, DEFAULT, DEFAULT, DEFAULT);
INSERT INTO `guestbook`.`MENU` (`ID`, `MENU_NAME`, `PERMALINK`, `MENU_ICON`, `MENU_ORDER`, `MENU_STATUS`, `ROLE_ACCESS`, `MENU_ID`, `CREATE_DATE`, `UPDATE_DATE`, `MENU_ID1`) VALUES (23, 'view', 'home/init_data', 'eye-open', '1', '1', '1', 8, DEFAULT, DEFAULT, DEFAULT);

COMMIT;

