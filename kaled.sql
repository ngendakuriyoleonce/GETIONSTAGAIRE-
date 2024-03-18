-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 04 sep. 2023 à 09:15
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `kaled`
--

-- --------------------------------------------------------

--
-- Structure de la table `stagaires`
--

CREATE TABLE `stagaires` (
  `IdStagaire` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `EmailId` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL,
  `Etablissement` varchar(50) DEFAULT NULL,
  `Encadreur` varchar(50) NOT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Phonenumber` char(11) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `Role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stagaires`
--

INSERT INTO `stagaires` (`IdStagaire`, `FirstName`, `LastName`, `EmailId`, `Password`, `Gender`, `Etablissement`, `Encadreur`, `Address`, `Phonenumber`, `Status`, `RegDate`, `Role`) VALUES
(1, 'Anuj', 'kumar', 'anuj@gmail.com', 'f925916e2754e5e03f75dd58a5733251', 'Male', 'UGL', 'NDUWAYO', 'New Delhi', '9857555555', 1, '2021-04-01 11:29:59', 1),
(2, 'Amit', 'kumar', 'test@gmail.com', 'f925916e2754e5e03f75dd58a5733251', 'Other', 'SAgesse', 'NDAYIZIGIYE', 'Gitwa', '858794425', 1, '2021-03-10 13:40:02', 0),
(14, 'ngendakuriyo', 'leonce', 'leonce@gmail.com', '202cb962ac59075b964b07152d234b70', 'Female', 'Lumiel', 'NIYONKURU', 'bwiza', '6756543329', 1, '2023-06-25 16:01:16', 1),
(15, 'kind', 'pro', 'kind@gmail.com', '202cb962ac59075b964b07152d234b70', 'Female', 'Lac', 'CIZA', 'gitwa', '6941436 3', 1, '2023-06-27 10:53:05', 0),
(16, 'keza', 'Jeanne', 'keza@gmail.com', '202cb962ac59075b964b07152d234b70', 'Female', 'Hope', 'CIZA', 'buha', ' 67889', 1, '2023-06-30 06:07:43', 0),
(17, 'Nahigombeye', 'jeammarie', 'nahigombeye@gmail.com', '202cb962ac59075b964b07152d234b70', 'Male', 'Lac', 'NDUWAYO', 'Kayogoro', '7865432', 1, '2023-06-30 16:52:30', 0),
(18, 'gaciyubwengee', 'jovise', 'gaci@gmail.com', '202cb962ac59075b964b07152d234b70', 'Other', 'Hope', 'CIZA', 'mabandae', '56789054', 1, '2023-06-30 16:59:24', 0),
(21, 'Niyubuntu', 'david', 'david@gmail.com', '202cb962ac59075b964b07152d234b70', 'Male', 'UGL', 'Ndayizigiye Olive', 'Kinama', '89765', 1, '2023-09-04 06:56:51', 1);

-- --------------------------------------------------------

--
-- Structure de la table `stages`
--

CREATE TABLE `stages` (
  `IdStage` int(11) NOT NULL,
  `ToDate` date DEFAULT NULL,
  `FromDate` date DEFAULT NULL,
  `Service` int(11) NOT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `AdminRemarkDate` varchar(50) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `IsRead` int(1) DEFAULT NULL,
  `IdStagaire` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stages`
--

INSERT INTO `stages` (`IdStage`, `ToDate`, `FromDate`, `Service`, `Description`, `PostingDate`, `AdminRemark`, `AdminRemarkDate`, `Status`, `IsRead`, `IdStagaire`) VALUES
(23, '2023-12-05', '2023-09-05', 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-09-04 06:14:42', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-09-04 8:15:11 ', 1, 1, 16),
(24, '2023-12-01', '2023-09-01', 2, 'ddddd', '2023-09-04 06:26:42', 'kk', '2023-09-04 8:27:27 ', 1, 1, 16),
(25, '2023-12-06', '2023-09-06', 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-09-04 06:57:42', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-09-04 8:58:18 ', 1, 1, 21);

-- --------------------------------------------------------

--
-- Structure de la table `tbldepartments`
--

CREATE TABLE `tbldepartments` (
  `IdDep` int(11) NOT NULL,
  `DepartmentName` varchar(50) DEFAULT NULL,
  `DepartmentShortName` varchar(50) DEFAULT NULL,
  `DepartmentCode` varchar(50) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tbldepartments`
--

INSERT INTO `tbldepartments` (`IdDep`, `DepartmentName`, `DepartmentShortName`, `DepartmentCode`, `CreationDate`) VALUES
(1, 'La Direction Administrative et Financière ', 'DAF', 'DAF123', '2023-06-30 19:28:44'),
(2, 'Direction Technique de l’hydraulique', 'DTH', 'DTH1234', '2023-06-30 19:29:12');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `stagaires`
--
ALTER TABLE `stagaires`
  ADD PRIMARY KEY (`IdStagaire`);

--
-- Index pour la table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`IdStage`),
  ADD KEY `UserEmail` (`IdStagaire`);

--
-- Index pour la table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  ADD PRIMARY KEY (`IdDep`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `stagaires`
--
ALTER TABLE `stagaires`
  MODIFY `IdStagaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `stages`
--
ALTER TABLE `stages`
  MODIFY `IdStage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  MODIFY `IdDep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
