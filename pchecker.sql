-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 31, 2021 at 11:48 PM
-- Server version: 8.0.21
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_mattiascotellaro`
--

-- --------------------------------------------------------

--
-- Table structure for table `carrello`
--

CREATE TABLE IF NOT EXISTS `carrello` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ID_Utente` varchar(20) NOT NULL,
  `ID_Prodotto` int NOT NULL,
  `quantità` int NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_Prodotto` (`ID_Prodotto`),
  KEY `ID_Utente` (`ID_Utente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=45 ;

--
-- Dumping data for table `carrello`
--

INSERT INTO `carrello` (`ID`, `ID_Utente`, `ID_Prodotto`, `quantità`) VALUES
(9, 'nisefdnjfdsvsdnu', 1, 1),
(10, 'nisefdnjfdsvsdnu', 2, 1),
(35, 'IT84Z03069056201', 1, 1),
(36, 'IT84Z03069056201', 2, 1),
(37, 'IT84Z03069056201', 3, 1),
(38, 'IT84Z03069056201', 4, 1),
(39, 'IT84Z03069056201', 5, 2),
(40, 'IT84Z03069056201', 6, 1),
(41, 'fedsddsasasasasa', 2, 1),
(43, 'SCTMTT02L31F799F', 2, 5),
(44, 'SCTMTT02L31F799F', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
  `ID` int NOT NULL,
  `ID_Utente` varchar(50) NOT NULL,
  `ID_Componente` int NOT NULL,
  `Data_Acquisto` datetime NOT NULL,
  `Importo` double NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_Utente` (`ID_Utente`),
  KEY `ID_Componente` (`ID_Componente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prodotti`
--

CREATE TABLE IF NOT EXISTS `prodotti` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `modello` varchar(100) NOT NULL,
  `img_dir` varchar(100) NOT NULL,
  `prezzo` double NOT NULL,
  `tipologia` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `prodotti`
--

INSERT INTO `prodotti` (`ID`, `modello`, `img_dir`, `prezzo`, `tipologia`) VALUES
(1, 'i5 - 10400F', '../IMG/10400F.jpg', 160, 'CPU'),
(2, 'Aorus RTX 3090', '../IMG/3090.jpg', 2999.99, 'GPU'),
(3, 'Z490', '../IMG/Z490.jpg', 399.99, 'MB'),
(4, 'Z490-P', '../IMG/Z490-P.jpg', 100, 'MB'),
(5, 'Ryzen 5 3600', '../IMG/R5-3600.jpg', 180, 'CPU'),
(6, 'i5 - 9600K', '../IMG/9600K.jpg', 190.5, 'CPU'),
(7, 'Steelseries- Rival 600', '../IMG/RIVAL600.jpg', 60, 'MOUSE'),
(8, 'i7 - 11700K', '../IMG/11700K.jpg', 380, 'CPU'),
(9, 'Steelseries Apex Pro', '../IMG/APEX.jpg', 170.48, 'KB'),
(10, 'Sharkoon SilentStorm 650W', '../IMG/SILENTSTORM650.jpg', 85.59, 'PSU');

-- --------------------------------------------------------

--
-- Table structure for table `spedizione`
--

CREATE TABLE IF NOT EXISTS `spedizione` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ID_Utente` varchar(16) NOT NULL,
  `indirizzo` varchar(100) NOT NULL,
  `città` varchar(50) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `cap` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ID_Utente` (`ID_Utente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `spedizione`
--

INSERT INTO `spedizione` (`id`, `ID_Utente`, `indirizzo`, `città`, `provincia`, `cap`) VALUES
(10, 'IT84Z03069056201', 'b yesr', 'byest', 'beys', 66666),
(12, 'MSNLNS02P14E932Y', 'Via nicola gaglione 144', 'Marcianise', 'Caserta', 81025);

-- --------------------------------------------------------

--
-- Table structure for table `utente`
--

CREATE TABLE IF NOT EXISTS `utente` (
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `codice_fiscale` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `root` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`codice_fiscale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `utente`
--

INSERT INTO `utente` (`nome`, `cognome`, `codice_fiscale`, `email`, `password`, `root`) VALUES
('Andrea', 'Abbate', '1234567899876543', 'andreaabbate@gmail.com', '$2y$10$lCkfwbveLcPuL2.qEoUNYOAwkZkhPPKbFNK6jEsFvXRj/yjyNnX3C', 0),
('Francesco', 'Cupelli', '3695v00551123456', 'davie.jacksparrow@uwu.kek', '$2y$10$x1oHu0KE.gWaryrZxptLDebiVblkOWim.e3TasB/xxVDtXy0vF59q', 0),
('Anna', 'Caiazza', 'CZZNLN04M49F839X', 'annacaiazza2@gmail.com', '$2y$10$NTHFf3ga9wwweWcEzcTp7OzCjpK7qNKM40ccv8KkYU7TEKedQxoZe', 0),
('Gabriele', 'Di Cicco', 'DCCGRL03A07E791N', 'gabriele753.dicicco@gmail.com', '$2y$10$Fi4V2zGd2SJGxBrn7n2mcO1RsUhPGPNrMhUI6G6SajUe/gpIIDP8u', 0),
('andrea', 'abbate', 'fedsddsasasasasa', 'andymatty36@gmail.com', '$2y$10$Wk2/OYLuxPHaPYqP6gND/O/2es8Ig41.n/t5FS9tpjwJ42FxLhDWu', 0),
('MAAAArco', 'culone', 'IT84Z03069056201', 'marco.dellemonache@hotmail.it', '$2y$10$F5fePiN7/nOuYkK9Dd8TV.aOBKddeXTZ79959GcOooicUY99XAUKy', 0),
('Alfonso', 'Musone', 'MSNLNS02P14E932Y', 'alfonsomusone2@gmail.com', '$2y$10$mWKoNM2UMmFZBSXiVozlMOP9Y2CUZ0LQkmFzZUc5ZJoR.kaprS0X.', 0),
('Raffaele', 'Sulipano', 'nisefdnjfdsvsdnu', 'raffaelesulipano@gmail.com', '$2y$10$9jkSUUa0kksRCRNzxEhHselZjr6BGE5yw6JGM6Wd1KLLmqq.KW6/u', 0),
('Luigi', 'Solaro', 'rgfidejknuha2312', 'luigi.solaro@gmail.com', '$2y$10$.Q37x6gsK0KPsHqDN3AQm.ZtSrFm70FnS55YfLa4N7Z2xdNjSGrby', 0),
('Mattia', 'Scotellaro', 'SCTMTT02L31F799F', 'mariobrosscot@yahoo.it', '$2y$10$JI7cksFttzPm0j65JkNcBeu1q0k7Qpi6LqeTp2dtct913Nh/3dyIC', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carrello`
--
ALTER TABLE `carrello`
  ADD CONSTRAINT `carrello_ibfk_1` FOREIGN KEY (`ID_Prodotto`) REFERENCES `prodotti` (`ID`),
  ADD CONSTRAINT `carrello_ibfk_2` FOREIGN KEY (`ID_Utente`) REFERENCES `utente` (`codice_fiscale`);

--
-- Constraints for table `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`ID_Utente`) REFERENCES `utente` (`codice_fiscale`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`ID_Componente`) REFERENCES `prodotti` (`ID`);

--
-- Constraints for table `spedizione`
--
ALTER TABLE `spedizione`
  ADD CONSTRAINT `spedizione_ibfk_1` FOREIGN KEY (`ID_Utente`) REFERENCES `utente` (`codice_fiscale`) ON DELETE RESTRICT ON UPDATE RESTRICT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
