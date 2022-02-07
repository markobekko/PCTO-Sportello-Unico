-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.22-MariaDB - Source distribution
-- Server OS:                    Linux
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for Sportello Unico
DROP DATABASE IF EXISTS `Sportello Unico`;
CREATE DATABASE IF NOT EXISTS `Sportello Unico` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `Sportello Unico`;

-- Dumping structure for table Sportello Unico.Candidato
DROP TABLE IF EXISTS `Candidato`;
CREATE TABLE IF NOT EXISTS `Candidato` (
  `Cognome` varchar(80) NOT NULL,
  `Nome` varchar(80) NOT NULL,
  `CF` varchar(16) NOT NULL,
  `Email` varchar(80) NOT NULL,
  PRIMARY KEY (`CF`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table Sportello Unico.Candidato: ~0 rows (approximately)
/*!40000 ALTER TABLE `Candidato` DISABLE KEYS */;
/*!40000 ALTER TABLE `Candidato` ENABLE KEYS */;

-- Dumping structure for table Sportello Unico.Esame
DROP TABLE IF EXISTS `Esame`;
CREATE TABLE IF NOT EXISTS `Esame` (
  `CF` varchar(16) DEFAULT NULL,
  `DataEsame` date DEFAULT NULL,
  `SedeEsame` enum('Belluno','Feltre') DEFAULT NULL,
  `SpeditoUtente` enum('Spedito','Non Spedito') NOT NULL DEFAULT 'Non Spedito',
  `Esito` enum('Superato','Bocciato') DEFAULT NULL,
  KEY `FK_Esame_Candidato` (`CF`),
  CONSTRAINT `FK_Esame_Candidato` FOREIGN KEY (`CF`) REFERENCES `Candidato` (`CF`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table Sportello Unico.Esame: ~0 rows (approximately)
/*!40000 ALTER TABLE `Esame` DISABLE KEYS */;
/*!40000 ALTER TABLE `Esame` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;