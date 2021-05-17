-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2021 at 01:28 AM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nbamanager21`
--

-- --------------------------------------------------------

--
-- Table structure for table `coach`
--

CREATE TABLE `coach` (
  `id_coach` int(11) NOT NULL,
  `position` varchar(255) NOT NULL,
  `coach_atk` int(11) NOT NULL,
  `coach_def` int(11) NOT NULL,
  `id_person` int(11) NOT NULL,
  `id_game` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `conference`
--

CREATE TABLE `conference` (
  `id_conference` int(11) NOT NULL,
  `nom_conference` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conference`
--

INSERT INTO `conference` (`id_conference`, `nom_conference`) VALUES
(1, 'Eastern'),
(2, 'Western');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `id_division` int(11) NOT NULL,
  `nom_division` varchar(255) NOT NULL,
  `id_conference` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id_division`, `nom_division`, `id_conference`) VALUES
(1, 'Atlantic', 1),
(2, 'Central', 1),
(3, 'Southeast', 1),
(4, 'Northwest', 2),
(5, 'Pacific', 2),
(6, 'Southwest', 2);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id_game` int(11) NOT NULL,
  `date_game` date DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id_game`, `date_game`, `id_user`) VALUES
(1, '2021-01-19', 1),
(2, '2021-01-19', 1),
(3, '2021-01-19', 1),
(4, '2021-01-19', 1),
(5, '2021-01-19', 1),
(6, '2021-01-19', 1),
(7, '2021-01-19', 1),
(8, '2021-01-19', 1),
(9, '2021-01-19', 1),
(10, '2021-01-19', 1),
(11, '2021-01-19', 1),
(12, '2021-01-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `match`
--

CREATE TABLE `match` (
  `id_match` int(11) NOT NULL,
  `date_match` date NOT NULL,
  `score` varchar(255) NOT NULL,
  `id_game` int(11) NOT NULL,
  `id_team_dom` int(11) NOT NULL,
  `id_team_ext` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medic`
--

CREATE TABLE `medic` (
  `id_medic` int(11) NOT NULL,
  `skill` int(11) NOT NULL,
  `id_person` int(11) NOT NULL,
  `id_game` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id_person` int(11) NOT NULL,
  `nom_person` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `wage` int(11) NOT NULL,
  `contract_year` int(11) DEFAULT NULL,
  `id_team` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `id_player` int(11) NOT NULL,
  `num_jersey` int(11) NOT NULL,
  `position` varchar(255) NOT NULL,
  `player_atk` int(11) NOT NULL,
  `player_def` int(11) NOT NULL,
  `hurt` int(11) NOT NULL,
  `id_person` int(11) NOT NULL,
  `id_game` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id_team` int(11) NOT NULL,
  `abreviation` varchar(255) NOT NULL,
  `name_team` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `gym` varchar(255) NOT NULL,
  `staffsalary` float DEFAULT '15',
  `salarycap` float DEFAULT '109.1',
  `id_game` int(11) DEFAULT NULL,
  `id_game_fav` int(11) DEFAULT NULL,
  `id_division` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `pseudo`, `mail`, `password`, `nom`, `prenom`) VALUES
(1, 'jaeparc', 'tgarnon45@gmail.com', 'Theo2001', 'Garnon', 'Théo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`id_coach`),
  ADD KEY `fk_coachperson` (`id_person`),
  ADD KEY `fk_coachgame` (`id_game`);

--
-- Indexes for table `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`id_conference`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id_division`),
  ADD KEY `fk_divconf` (`id_conference`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id_game`),
  ADD KEY `fk_gameuser` (`id_user`);

--
-- Indexes for table `match`
--
ALTER TABLE `match`
  ADD PRIMARY KEY (`id_match`),
  ADD KEY `fk_matchgame` (`id_game`),
  ADD KEY `fk_matchteamdom` (`id_team_dom`),
  ADD KEY `fk_matchteamext` (`id_team_ext`);

--
-- Indexes for table `medic`
--
ALTER TABLE `medic`
  ADD PRIMARY KEY (`id_medic`),
  ADD KEY `fk_medicperson` (`id_person`),
  ADD KEY `fk_medicgame` (`id_game`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id_person`),
  ADD KEY `fk_personteam` (`id_team`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id_player`),
  ADD KEY `fk_playerperson` (`id_person`),
  ADD KEY `fk_playergame` (`id_game`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id_team`),
  ADD KEY `fk_teamgame` (`id_game`),
  ADD KEY `fk_teamgamefav` (`id_game_fav`),
  ADD KEY `fk_teamdiv` (`id_division`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coach`
--
ALTER TABLE `coach`
  MODIFY `id_coach` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `conference`
--
ALTER TABLE `conference`
  MODIFY `id_conference` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `id_division` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `match`
--
ALTER TABLE `match`
  MODIFY `id_match` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medic`
--
ALTER TABLE `medic`
  MODIFY `id_medic` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id_person` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `id_player` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id_team` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
