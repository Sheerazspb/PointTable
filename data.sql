-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 13, 2021 at 06:44 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.9
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET
  time_zone = "+00:00";
--
  -- Database: `PointTable`
  --
  -- --------------------------------------------------------
  --
  -- Table structure for table `matchDescription`
  --
  CREATE TABLE `matchDescription` (
    `id` int(11) NOT NULL,
    `teamA` varchar(255) NOT NULL,
    `teamB` varchar(255) NOT NULL,
    `teamAGoal` tinyint(11) NOT NULL,
    `teamBGoal` tinyint(11) NOT NULL,
    `matchDate` date NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
  -- Dumping data for table `matchDescription`
  --
INSERT INTO
  `matchDescription` (
    `id`,
    `teamA`,
    `teamB`,
    `teamAGoal`,
    `teamBGoal`,
    `matchDate`
  )
VALUES
  (1, 'Pakistan', 'Russia', 3, 1, '2021-09-01'),
  (2, 'Germany', 'U.K', 2, 1, '2021-09-02'),
  (3, 'Pakistan', 'U.K', 2, 0, '2021-09-04'),
  (4, 'Germany', 'Russia', 3, 1, '2021-09-05'),
  (5, 'Pakistan', 'Russia', 2, 2, '2021-09-06'),
  (6, 'Germany', 'U.K', 1, 1, '2021-09-08'),
  (7, 'Pakistan', 'U.K', 2, 0, '2021-09-15'),
  (8, 'Germany', 'Russia', 4, 0, '2021-09-09'),
  (9, 'USA', 'U.K', 3, 3, '2021-09-24');
-- --------------------------------------------------------
  --
  -- Table structure for table `Teams`
  --
  CREATE TABLE `Teams` (
    `id` int(11) NOT NULL,
    `team` varchar(255) DEFAULT 'set',
    `hasGoal` tinyint(11) DEFAULT '0',
    `missingGoal` tinyint(11) DEFAULT '0',
    `goalDifference` tinyint(11) DEFAULT '0',
    `points` tinyint(11) DEFAULT '0',
    `numOfMatches` tinyint(11) DEFAULT '0'
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
  -- Dumping data for table `Teams`
  --
INSERT INTO
  `Teams` (
    `id`,
    `team`,
    `hasGoal`,
    `missingGoal`,
    `goalDifference`,
    `points`,
    `numOfMatches`
  )
VALUES
  (1, 'Pakistan', 9, 3, 6, 10, 4),
  (2, 'Russia', 4, 12, -8, 1, 4),
  (3, 'Germany', 10, 3, 7, 10, 4),
  (4, 'U.K', 5, 10, -5, 2, 5),
  (5, 'USA', 3, 3, 0, 1, 1);
-- --------------------------------------------------------
  --
  -- Table structure for table `users`
  --
  CREATE TABLE `users` (
    `id` int(11) NOT NULL,
    `login` varchar(255) NOT NULL,
    `pass` varchar(255) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
  -- Dumping data for table `users`
  --
INSERT INTO
  `users` (`id`, `login`, `pass`)
VALUES
  (1, 'qw@qw.qw', 'qwqw');
--
  -- Indexes for dumped tables
  --
  --
  -- Indexes for table `matchDescription`
  --
ALTER TABLE
  `matchDescription`
ADD
  PRIMARY KEY (`id`);
--
  -- Indexes for table `Teams`
  --
ALTER TABLE
  `Teams`
ADD
  PRIMARY KEY (`id`);
--
  -- Indexes for table `users`
  --
ALTER TABLE
  `users`
ADD
  PRIMARY KEY (`id`);
--
  -- AUTO_INCREMENT for dumped tables
  --
  --
  -- AUTO_INCREMENT for table `matchDescription`
  --
ALTER TABLE
  `matchDescription`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 10;
--
  -- AUTO_INCREMENT for table `Teams`
  --
ALTER TABLE
  `Teams`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 6;
--
  -- AUTO_INCREMENT for table `users`
  --
ALTER TABLE
  `users`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;