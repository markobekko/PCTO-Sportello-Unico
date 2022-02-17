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
CREATE DATABASE IF NOT EXISTS `Sportello Unico` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `Sportello Unico`;

-- Dumping structure for table Sportello Unico.Candidato
CREATE TABLE IF NOT EXISTS `Candidato` (
  `id_candidato` int(11) NOT NULL AUTO_INCREMENT,
  `cognome` varchar(80) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `codice_fiscale` varchar(16) NOT NULL,
  `email` varchar(80) NOT NULL,
  PRIMARY KEY (`id_candidato`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- Dumping data for table Sportello Unico.Candidato: ~5 rows (approximately)
/*!40000 ALTER TABLE `Candidato` DISABLE KEYS */;
INSERT INTO `Candidato` (`id_candidato`, `cognome`, `nome`, `codice_fiscale`, `email`) VALUES
	(17, 'Dal Pont', 'Andrea', 'MRKMRK03T09D530A', 'andreadalpont@gmail.com'),
	(18, 'abcv', 'abcv', 'MRKMRK03T09D530W', 'abc@gmail.com'),
	(20, 'Curcuruto', 'Giuseppe', 'MRKMRK03T09D530B', 'g.curcuruto@icloud.com'),
	(30, 'abc', 'abe', 'MRKMRK03T09D530Z', 'abc@gmail.com');
/*!40000 ALTER TABLE `Candidato` ENABLE KEYS */;

-- Dumping structure for table Sportello Unico.Sessione_Esame
CREATE TABLE IF NOT EXISTS `Sessione_Esame` (
  `id_esame` int(11) NOT NULL AUTO_INCREMENT,
  `data_esame` date DEFAULT NULL,
  `sede_esame` enum('Belluno','Feltre') DEFAULT NULL,
  PRIMARY KEY (`id_esame`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table Sportello Unico.Sessione_Esame: ~6 rows (approximately)
/*!40000 ALTER TABLE `Sessione_Esame` DISABLE KEYS */;
INSERT INTO `Sessione_Esame` (`id_esame`, `data_esame`, `sede_esame`) VALUES
	(1, NULL, NULL),
	(2, '2022-02-04', 'Feltre'),
	(3, '2022-03-07', 'Belluno'),
	(4, '2028-02-10', 'Feltre'),
	(5, '2019-02-10', 'Feltre'),
	(6, '2022-02-12', 'Belluno');
/*!40000 ALTER TABLE `Sessione_Esame` ENABLE KEYS */;

-- Dumping structure for table Sportello Unico.Storico_Candidato
CREATE TABLE IF NOT EXISTS `Storico_Candidato` (
  `id_storico_candidato` int(11) DEFAULT NULL,
  `id_storico_esame` int(11) DEFAULT 1,
  `esito_esame` enum('Superato','Non Superato','Assente Giustificato','Assente non Giustificato','Non Ammesso') DEFAULT NULL,
  `spedito_utente` enum('No','Si') DEFAULT 'No',
  `archiviato` enum('Si','No') DEFAULT 'No',
  KEY `FK_Storico_Candidato_Sessione_Esame` (`id_storico_esame`) USING BTREE,
  KEY `FK_Storico_Candidato_Candidato` (`id_storico_candidato`) USING BTREE,
  CONSTRAINT `FK_Storico_Candidato_Candidato` FOREIGN KEY (`id_storico_candidato`) REFERENCES `Candidato` (`id_candidato`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_Storico_Candidato_Sessione_Esame` FOREIGN KEY (`id_storico_esame`) REFERENCES `Sessione_Esame` (`id_esame`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table Sportello Unico.Storico_Candidato: ~5 rows (approximately)
/*!40000 ALTER TABLE `Storico_Candidato` DISABLE KEYS */;
INSERT INTO `Storico_Candidato` (`id_storico_candidato`, `id_storico_esame`, `esito_esame`, `spedito_utente`, `archiviato`) VALUES
	(17, 2, 'Assente Giustificato', 'No', 'Si'),
	(20, 2, 'Superato', 'No', 'Si'),
	(18, 4, 'Assente Giustificato', 'No', 'Si'),
	(20, 4, 'Assente Giustificato', 'Si', 'No'),
	(30, 4, 'Assente Giustificato', 'Si', 'No');
/*!40000 ALTER TABLE `Storico_Candidato` ENABLE KEYS */;

-- Dumping structure for trigger Sportello Unico.Candidato_before_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `Candidato_before_insert` BEFORE INSERT ON `Candidato` FOR EACH ROW BEGIN
	IF NOT NEW.codice_fiscale REGEXP '[A-Z][A-Z][A-Z][A-Z][A-Z][A-Z][0-9][0-9][A-Z][0-9][0-9][A-Z][0-9][0-9][0-9][A-Z]' THEN
		SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "Codice Fiscale non Valido";
	END IF;
	IF NOT NEW.Email REGEXP '^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$' THEN
		SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "Email non Valida";
	END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger Sportello Unico.Candidato_before_update
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `Candidato_before_update` BEFORE UPDATE ON `Candidato` FOR EACH ROW BEGIN
	IF NOT NEW.codice_fiscale REGEXP '[A-Z][A-Z][A-Z][A-Z][A-Z][A-Z][0-9][0-9][A-Z][0-9][0-9][A-Z][0-9][0-9][0-9][A-Z]' THEN
		SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "Codice Fiscale non Valido";
	END IF;
	IF NOT NEW.Email REGEXP '^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$' THEN
		SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "Email non Valida";
	END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
