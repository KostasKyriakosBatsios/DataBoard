-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table databoard.final_records
CREATE TABLE IF NOT EXISTS `final_records` (
  `user_id` int(11) unsigned DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `video_id` int(11) unsigned DEFAULT NULL,
  `video_title` varchar(255) DEFAULT NULL,
  `video_duration` int(11) unsigned DEFAULT NULL,
  `total_view_time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping structure for table databoard.view_records
CREATE TABLE IF NOT EXISTS `view_records` (
  `user` int(11) unsigned DEFAULT NULL,
  `video` int(11) unsigned DEFAULT NULL,
  `begin` int(11) unsigned DEFAULT NULL,
  `end` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table databoard.view_records: ~27 rows (approximately)
INSERT INTO `view_records` (`user`, `video`, `begin`, `end`) VALUES
	(1, 10, 10, 25),
	(1, 10, 10, 12),
	(1, 10, 8, 5),
	(1, 10, 1, 14),
	(1, 10, 590, 600),
	(2, 5, 20, 50),
	(2, 5, 5, 30),
	(2, 5, 80, 90),
	(3, 2, 42, 90),
	(3, 2, 70, 200),
	(4, 2, 5, 50),
	(4, 3, 90, 300),
	(4, 3, 45, 100),
	(4, 3, 5, 50),
	(5, 1, 39, 65),
	(5, 1, 40, 55),
	(5, 4, 1, 100),
	(5, 4, 42, 105),
	(6, 1, 72, 90),
	(6, 6, 22, 35),
	(6, 6, 25, 77),
	(7, 7, 24, 34),
	(7, 7, 90, 200),
	(7, 7, 400, 700),
	(8, 6, 44, 338),
	(8, 4, 70, 180),
	(9, 11, 19, 83),
	(9, 11, 37, 132),
	(9, 11, 1, 50);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;