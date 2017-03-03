-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for problemaphp
CREATE DATABASE IF NOT EXISTS `problemaphp` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `problemaphp`;

-- Dumping structure for table problemaphp.employment
CREATE TABLE IF NOT EXISTS `employment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `team` varchar(45) DEFAULT NULL,
  `rank` enum('','MANAGER','TLEAD','ROOKIE') DEFAULT NULL,
  `id_manager` int(11) unsigned DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `leave_date` date DEFAULT NULL,
  `hashed_password` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `u_nume_angajat` (`username`),
  KEY `fk_Angajati_Echipe_idx` (`team`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- Dumping data for table problemaphp.employment: ~7 rows (approximately)
/*!40000 ALTER TABLE `employment` DISABLE KEYS */;
INSERT IGNORE INTO `employment` (`id`, `username`, `team`, `rank`, `id_manager`, `hire_date`, `leave_date`, `hashed_password`) VALUES
	(1, 'ANDREW', ' HR', 'MANAGER', NULL, '2017-03-02', NULL, '$2y$10$ZTI3ZjgyMjc4ZjRmYmM3NO8sm9utWWxa1JjcWmM.USYYhw44ZiWXq'),
	(2, 'ion', ' OM', 'TLEAD', NULL, '2017-03-02', NULL, '$2y$10$OGFiOTliY2E3Y2RhNTUxO.OC4r0Cg.2I6gBII4pdb7VOjLE/xEdTK'),
	(3, 'dana', ' MKT', 'ROOKIE', NULL, '2017-03-02', NULL, '$2y$10$MWRhOTVjY2M0NWQ0ZDkzYuvd4dQvYTbPubUyAvPJySFsKzHgGhxsi'),
	(4, 'marius', ' OM', 'TLEAD', NULL, '2017-03-02', NULL, '$2y$10$M2FiYTI0NjlmY2I5MTQ2NuQMVJeEKcgZekQLTjmVUTutT3LaGeAk2'),
	(5, 'alex', ' OM', 'MANAGER', NULL, '2017-03-02', NULL, '$2y$10$YTdmYTY2YTI0YWMzMWYyMuWEo8DFX4/vkjmHuSQl7wUWunfqV83E2'),
	(6, 'cristi', ' HR', 'TLEAD', NULL, '2017-03-02', NULL, '$2y$10$ZjJlZTY1M2RiZjYyYjcwNurKhGOOx78QM.4Emad8LpDUg87YzOZaG'),
	(7, 'cosmin', ' HR', 'ROOKIE', NULL, '2017-03-02', NULL, '$2y$10$OTE5ODc1NDhhNWU5NGY4NOob9Eev7pp1XhJu4AtJnQQpgaqCXnyde'),
	(33, 'ceva', ' OM', 'ROOKIE', NULL, '2017-03-03', '2017-03-03', '$2y$10$ZDVhNzRhY2NmNTYyZjYzNe2bp82HrayWXH6KtrclaI41KhZ0R1WwK'),
	(34, 'fafaf', ' OM', 'ROOKIE', NULL, '2017-03-03', '2017-03-03', '$2y$10$N2EzYTg4MzI0ZTgwNDEyOOqFihmLnQ4oOOXlG2oGse93b.wJwqnY6');
/*!40000 ALTER TABLE `employment` ENABLE KEYS */;

-- Dumping structure for table problemaphp.teams
CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `team_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table problemaphp.teams: ~3 rows (approximately)
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT IGNORE INTO `teams` (`id`, `team_name`) VALUES
	(1, 'OM'),
	(3, 'MKT'),
	(5, 'HR');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
