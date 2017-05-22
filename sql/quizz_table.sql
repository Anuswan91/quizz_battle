-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 22 Mai 2017 à 12:59
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `quizz_table`
--
CREATE DATABASE IF NOT EXISTS `quizz_table` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `quizz_table`;

-- --------------------------------------------------------

--
-- Structure de la table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `ans_id` int(11) NOT NULL AUTO_INCREMENT,
  `ans_text` varchar(100) NOT NULL,
  `ans_question_id` int(11) NOT NULL,
  `ans_correct` tinyint(1) NOT NULL,
  PRIMARY KEY (`ans_id`),
  KEY `fk_ans_question_id` (`ans_question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

CREATE TABLE IF NOT EXISTS `game` (
  `gme_id` int(11) NOT NULL AUTO_INCREMENT,
  `gme_date` date NOT NULL,
  `gme_nb_player` int(11) NOT NULL DEFAULT '0',
  `gme_state_id` int(11) NOT NULL,
  PRIMARY KEY (`gme_id`),
  KEY `fk_gme_state_id` (`gme_state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `game_has_player`
--

CREATE TABLE IF NOT EXISTS `game_has_player` (
  `ghp_game_id` int(11) NOT NULL,
  `ghp_player_id` int(11) NOT NULL,
  `ghp_alive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ghp_game_id`,`ghp_player_id`),
  KEY `fk_ghp_game_id` (`ghp_game_id`),
  KEY `fk_ghp_player_id` (`ghp_player_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `game_has_question`
--

CREATE TABLE IF NOT EXISTS `game_has_question` (
  `ghq_game_id` int(11) NOT NULL,
  `ghq_question_id` int(11) NOT NULL,
  PRIMARY KEY (`ghq_game_id`,`ghq_question_id`),
  KEY `fk_ghq_game_id` (`ghq_game_id`),
  KEY `fk_ghq_question_id` (`ghq_question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `player`
--

CREATE TABLE IF NOT EXISTS `player` (
  `plr_id` int(11) NOT NULL AUTO_INCREMENT,
  `plr_pseudo` varchar(46) NOT NULL,
  `plr_password` varchar(46) NOT NULL,
  `plr_guest` tinyint(1) NOT NULL DEFAULT '0',
  `plr_date_crea` date NOT NULL,
  `plr_status_id` int(11) NOT NULL,
  PRIMARY KEY (`plr_id`),
  KEY `fk_plr_status_id` (`plr_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `player_has_answer`
--

CREATE TABLE IF NOT EXISTS `player_has_answer` (
  `pha_game_id` int(11) NOT NULL,
  `pha_player_id` int(11) NOT NULL,
  `pha_answer_id` int(11) NOT NULL,
  PRIMARY KEY (`pha_game_id`,`pha_player_id`,`pha_answer_id`),
  KEY `fk_pha_game_id` (`pha_game_id`),
  KEY `fk_pha_player_id` (`pha_player_id`),
  KEY `fk_pha_answer_id` (`pha_answer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `qst_id` int(11) NOT NULL AUTO_INCREMENT,
  `qst_text` varchar(100) NOT NULL,
  `qst_theme_id` int(11) NOT NULL,
  PRIMARY KEY (`qst_id`),
  KEY `fk_qst_theme_id` (`qst_theme_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `ste_id` int(11) NOT NULL AUTO_INCREMENT,
  `ste_name` varchar(46) NOT NULL,
  PRIMARY KEY (`ste_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `stu_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_name` varchar(46) NOT NULL,
  PRIMARY KEY (`stu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE IF NOT EXISTS `theme` (
  `thm_id` int(11) NOT NULL AUTO_INCREMENT,
  `thm_name` varchar(46) NOT NULL,
  PRIMARY KEY (`thm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`ans_question_id`) REFERENCES `question` (`qst_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`gme_state_id`) REFERENCES `state` (`ste_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `game_has_player`
--
ALTER TABLE `game_has_player`
  ADD CONSTRAINT `game_has_player_ibfk_2` FOREIGN KEY (`ghp_player_id`) REFERENCES `player` (`plr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `game_has_player_ibfk_1` FOREIGN KEY (`ghp_game_id`) REFERENCES `game` (`gme_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `game_has_question`
--
ALTER TABLE `game_has_question`
  ADD CONSTRAINT `game_has_question_ibfk_2` FOREIGN KEY (`ghq_question_id`) REFERENCES `question` (`qst_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `game_has_question_ibfk_1` FOREIGN KEY (`ghq_game_id`) REFERENCES `game` (`gme_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `player_has_answer`
--
ALTER TABLE `player_has_answer`
  ADD CONSTRAINT `player_has_answer_ibfk_3` FOREIGN KEY (`pha_answer_id`) REFERENCES `answer` (`ans_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `player_has_answer_ibfk_1` FOREIGN KEY (`pha_game_id`) REFERENCES `game` (`gme_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `player_has_answer_ibfk_2` FOREIGN KEY (`pha_player_id`) REFERENCES `player` (`plr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`qst_theme_id`) REFERENCES `theme` (`thm_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
