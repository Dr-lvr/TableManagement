-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Creato il: Mar 06, 2022 alle 13:01
-- Versione del server: 5.7.31
-- Versione PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prodotti`
--

DELIMITER $$
--
-- Procedure
--
DROP PROCEDURE IF EXISTS `CREATE_NEW`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `CREATE_NEW` (IN `tblName` VARCHAR(25))  BEGIN
SET @tableName = tblName;
SET @q = CONCAT('
  CREATE TABLE IF NOT EXISTS `' , @tableName, '` (
    `ID` INT(100) NOT NULL AUTO_INCREMENT,
    `T_stamp` TIMESTAMP(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
    `descrizione` varchar(10) NOT NULL,
    `reparto` varchar(10) NOT NULL,
    `prezzo` float(4,2) NOT NULL,
    `quantita` int(10) NOT NULL,
    PRIMARY KEY (`ID`,`T_stamp`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8
  ');
  PREPARE stmt FROM @q;
  EXECUTE stmt;
  DEALLOCATE PREPARE stmt;
  END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struttura della tabella `frutteria`
--

DROP TABLE IF EXISTS `frutteria`;
CREATE TABLE IF NOT EXISTS `frutteria` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `T_stamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `descrizione` varchar(50) NOT NULL,
  `reparto` varchar(50) NOT NULL,
  `prezzo` float(4,2) NOT NULL,
  `quantita` int(10) NOT NULL,
  PRIMARY KEY (`ID`,`T_stamp`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `frutteria`
--

INSERT INTO `frutteria` (`ID`, `T_stamp`, `descrizione`, `reparto`, `prezzo`, `quantita`) VALUES
(15, '2022-03-06 12:01:45.292990', 'banana', 'bananeria', 5.00, 26),
(5, '2022-03-05 14:11:45.605628', 'pera', 'pereria', 8.00, 64),
(14, '2022-03-06 10:50:55.624222', 'mela', 'meleria', 21.00, 36),
(7, '2022-03-05 14:12:12.865438', 'pera', 'pereria', 12.00, 64),
(8, '2022-03-05 15:11:25.113973', 'mela', 'meleria', 15.00, 54),
(9, '2022-03-06 09:11:36.395165', 'mela', 'meleria', 35.00, 36),
(10, '2022-03-06 09:18:03.776994', 'mela', 'meleria', 35.00, 36),
(11, '2022-03-06 09:18:15.142954', 'pera', 'pereria', 35.00, 54),
(12, '2022-03-06 09:18:35.777536', 'pera', 'pereria', 8.00, 54),
(16, '2022-03-06 12:56:56.786108', 'ananas', 'ananasseria', 35.20, 156),
(17, '2022-03-06 12:58:16.378497', 'mango', 'mangheria', 56.15, 26);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
