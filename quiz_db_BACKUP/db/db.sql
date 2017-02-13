-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Feb 12, 2017 at 09:43 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) unsigned NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `is_right_choice` tinyint(1) DEFAULT NULL,
  `choice` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `is_right_choice`, `choice`) VALUES
(84, 23, 0, 'Pirosra szinezi az <code>important</code> html elemet'),
(85, 23, 0, ' Pirosra szinezi az <code>important</code> html elem szövegét'),
(86, 23, 1, 'Pirosra szinezni a <code>important</code> css osztállyal ellátott elem szövegét'),
(87, 24, 1, 'Aláhúzza a szöveget az <code>underline</code> egyéni azonosítóval ellátott elemekben'),
(88, 24, 0, 'Aláhúzza a szöveget az <code>underline</code> egyéni azonosítóval ellátott elemekben'),
(89, 25, 1, '<code>< link rel="stylesheet" type="text/css" href="stylesheet.css"/></code>'),
(90, 25, 0, '<code>< style type="text/css" href="stylesheet.css" /></code>'),
(92, 25, 0, '<code>< style type="text/css" href="stylesheet.css" /></code>'),
(94, 26, 0, '<code>aside, nav, footer</code>'),
(95, 26, 1, '<code>article, article, div</code>'),
(96, 26, 0, '<code>figcapture, figure, main</code>'),
(97, 36, 0, 'choice1'),
(98, 36, 0, 'choice1'),
(99, 36, 0, 'choice1'),
(100, 36, 1, 'choice1'),
(101, 37, 0, 'valami'),
(102, 37, 0, 'valami2'),
(103, 39, 0, 'hello'),
(104, 39, 1, 'hello'),
(105, 27, 1, 'margin'),
(106, 27, 0, 'width'),
(107, 27, 0, 'size'),
(108, 27, 0, 'noshade'),
(109, 28, 0, '<code>self</code>'),
(110, 28, 0, '<code>top<code>'),
(111, 28, 1, '<code>child</code>'),
(112, 28, 0, '<code>parent</code>'),
(113, 29, 0, 'border'),
(114, 29, 0, 'width'),
(115, 29, 0, 'cellspadding'),
(116, 29, 1, 'color'),
(117, 30, 0, 'action'),
(118, 30, 0, 'method'),
(119, 30, 0, 'name'),
(120, 30, 1, 'target'),
(121, 31, 0, '<code> < INPUT type="text" name="szöveg1" size="15" value="Alap szöveg"> </code>'),
(122, 31, 0, '<code> < input type="text" name="szöveg1" size="15" value="Alap szöveg"> </code>'),
(123, 31, 1, '<code> < input minlength="10" type="text" name="szöveg1" size="15" value="Alap szöveg"> </code>'),
(124, 32, 0, '<code> h6 </code>'),
(125, 32, 0, '<code> head </code>'),
(126, 32, 0, '<code> heading </code>'),
(127, 32, 1, '<code> h1 </code>');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) unsigned NOT NULL,
  `question` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `owner` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `is_active`, `description`, `owner`, `tags`) VALUES
(23, 'Mit csinál a következő CSS osztály?', 1, '<code>\n.important {color: red;}\n</code>', 'admin', ''),
(24, 'Mit csinál a következő CSS definíció?', 1, '<code>\n.underline {text-decoration: underline;}\n</code>', 'admin', ''),
(25, 'Hogyan adnál hozzá külső CSS library-t a html fájlodhoz?', 1, '', 'admin', ''),
(26, 'Melyik a kakukktojás? ', 1, '', 'admin', ''),
(27, 'Mely paraméter nem adható meg a következő elemben?', 1, '<code> hr </code>', '', 'html, '),
(28, 'Mely paraméter nem adható meg a következő elemben?', 1, '<code> a target=" " </code>', 'admin', 'html, '),
(29, 'Melyik pareméter nem adható meg a következő elemnek?', 1, '<code> table </code>', 'admin', 'html, '),
(30, 'Melyik paraméter nem adható meg a következő elemnek?', 1, '<code> form </code>', 'admin', 'html, '),
(31, 'Melyik nem helyes az alábbiak közül?', 1, '', 'admin', 'html, '),
(32, 'Melyik elem definiálja a legnagyobb címsort?', 1, '', 'admin', 'html, ');

-- --------------------------------------------------------

--
-- Table structure for table `quizs`
--

CREATE TABLE `quizs` (
  `id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(255) NOT NULL,
  `questions` varchar(255) NOT NULL,
  `deadline` date NOT NULL,
  `starts_from` date NOT NULL,
  `owner` varchar(255) NOT NULL,
  `max_sub` int(11) NOT NULL DEFAULT '5'
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizs`
--

INSERT INTO `quizs` (`id`, `timestamp`, `name`, `questions`, `deadline`, `starts_from`, `owner`, `max_sub`) VALUES
(17, '2017-02-08 17:57:03', 'Példa kvíz', '24,25,26,', '2017-02-23', '2017-02-08', 'admin', 5),
(18, '2017-02-08 15:50:22', 'sample', '23,25,', '2017-02-08', '2017-02-08', 'admin', 5),
(19, '2017-02-09 22:24:57', 'Sample 2', '26,25,24,', '2017-03-03', '2017-02-10', 'admin', 5);

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `quiz_id` int(11) NOT NULL,
  `result` varchar(255) NOT NULL,
  `submission_count` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `user_id`, `timestamp`, `quiz_id`, `result`, `submission_count`) VALUES
(15, '2', '2017-02-10 14:14:25', 17, '100', 1),
(18, '3', '2017-02-10 20:34:28', 17, '100', 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `neptun` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `profilepic` varchar(255) DEFAULT NULL,
  `user_level` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `neptun`, `timestamp`, `profilepic`, `user_level`) VALUES
(2, 'Richard Zilahi', 'richard.zilahi', '$1$KzsBAamm$9t1IpJ8PMnVMGAERBcq0D0', 'Y4ILM9', '2017-02-08 17:18:18', NULL, 1),
(3, 'Richard Zilahi', 'admin', '$1$iWiH8DIZ$1lxJ0.2wfX7Cfmpjwpa3v.', 'Y4ILM9', '2017-02-08 17:18:15', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizs`
--
ALTER TABLE `quizs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `quizs`
--
ALTER TABLE `quizs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
