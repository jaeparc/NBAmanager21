-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2021 at 08:21 PM
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
-- Table structure for table `assoc_user-game`
--

CREATE TABLE `assoc_user-game` (
  `id_user` int(50) NOT NULL,
  `id_game` int(50) NOT NULL,
  `id_team` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assoc_user-game`
--

INSERT INTO `assoc_user-game` (`id_user`, `id_game`, `id_team`) VALUES
(1, 1, 1),
(1, 2, 24),
(1, 3, 30);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id_game` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id_game`, `date`) VALUES
(1, '2021-01-16'),
(2, '2021-01-14'),
(3, '2021-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id_team` int(11) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id_team`, `ville`, `nom`) VALUES
(1, 'Atlanta', 'Hawks'),
(2, 'Boston', 'Celtics'),
(3, 'Brooklyn', 'Nets'),
(4, 'Charlotte', 'Hornets'),
(5, 'Chicago', 'Bulls'),
(6, 'Cleveland', 'Cavaliers'),
(7, 'Dallas', 'Mavericks'),
(8, 'Detroit', 'Pistons'),
(9, 'Golden State', 'Warriors'),
(10, 'Houston', 'Rockets'),
(11, 'Indiana', 'Pacers'),
(12, 'Los Angeles', 'Clippers'),
(13, 'Los Angeles', 'Lakers'),
(14, 'Memphis', 'Grizzlies'),
(15, 'Miami', 'Heat'),
(16, 'Milwaukee', 'Bucks'),
(17, 'Minnesota', 'Timberwolves'),
(18, 'New Orleans', 'Pelicans'),
(19, 'New York', 'Knicks'),
(20, 'Denver', 'Nuggets'),
(21, 'Oklahoma City', 'Thunder'),
(22, 'Orlando', 'Magic'),
(23, 'Philadelphia', '76ers'),
(24, 'Phoenix', 'Suns'),
(25, 'Portland', 'Trail Blazers'),
(26, 'Sacramento', 'Kings'),
(27, 'San Antonio', 'Spurs'),
(28, 'Toronto', 'Raptors'),
(29, 'Utah', 'Jazz'),
(30, 'Washington', 'Wizards');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `mail`, `password`, `prenom`, `nom`) VALUES
(1, 'tgarnon45@gmail.com', 'Theo2001', 'Theo', 'Garnon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id_game`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id_team`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id_game` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id_team` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
