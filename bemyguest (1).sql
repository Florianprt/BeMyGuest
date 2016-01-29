-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Ven 29 Janvier 2016 à 21:37
-- Version du serveur :  5.5.34
-- Version de PHP :  5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bemyguest`
--

-- --------------------------------------------------------

--
-- Structure de la table `bmg_com`
--

CREATE TABLE `bmg_com` (
  `idbmg_com` int(11) NOT NULL AUTO_INCREMENT,
  `com_date` datetime DEFAULT NULL,
  `bmg_user_idbmg_user` int(11) NOT NULL,
  `bmg_dish_idbmg_dish` int(11) NOT NULL,
  `com_desc` text NOT NULL,
  PRIMARY KEY (`idbmg_com`),
  KEY `fk_bmg_com_bmg_user1_idx` (`bmg_user_idbmg_user`),
  KEY `fk_bmg_com_bmg_dish1_idx` (`bmg_dish_idbmg_dish`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `bmg_connect`
--

CREATE TABLE `bmg_connect` (
  `idbmg_connect` int(11) NOT NULL AUTO_INCREMENT,
  `bmg_user_idbmg_user` int(11) NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `idfacebook` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idbmg_connect`),
  KEY `fk_bmg_connect_bmg_user1_idx` (`bmg_user_idbmg_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `bmg_connect`
--

INSERT INTO `bmg_connect` (`idbmg_connect`, `bmg_user_idbmg_user`, `type`, `email`, `password`, `idfacebook`) VALUES
(1, 51, 'formulaire', 'charert@aol.fr', '$1$aavsq6Yk$.J.jZ./kgXt8vtuOpbin31', NULL),
(4, 54, 'formulaire', 'test@aol.fr', '$1$cIjlYUw0$dwObKy5SDVDg9nxUsmu7t.', NULL),
(5, 55, 'formulaire', 'yoyo@yo.fr', '$1$wxrN2s9G$NHk3NMfCo5O1c.uZ9VJhV.', NULL),
(6, 56, 'formulaire', 'zjifizjizj@aol.Fr', '$1$6YhPXoci$k4nUPKTZqirJuaQ4NEJUh1', NULL),
(7, 57, 'formulaire', 'sophiedarriet@aol.fr', '$1$G0W6Tyjk$Sb4sVeEskeNhhw.yTZUUr0', NULL),
(8, 58, 'formulaire', 'testimg@testimg.fr', '$1$3riSKCKH$aUXhlhxlx7MpAYt6kzbi71', NULL),
(9, 59, 'formulaire', 'testcreadossier@testcreadossier.fr', '$1$WvnddMm9$HiuvYw6JeDxXkKshLsAXj1', NULL),
(10, 60, 'formulaire', 'test1@test1.fr', '$1$merq80dn$DBiaKHZ6SqmFl7hb2tzLJ1', NULL),
(11, 61, 'formulaire', 'charert@aol.fr', '$1$6h1QFuW/$pfuRiFaG21m2F6gKup5EQ1', NULL),
(12, 62, 'formulaire', 'fezfzaef@aol.fr', '$1$3SPlvFW8$q7/x.EaYYTFHFlvRD6k3M/', NULL),
(13, 63, 'formulaire', 'fezfezf@aol.fr', '$1$3gEJDyr8$LwvBGIGOn2uUGOIlfEl./1', NULL),
(14, 64, 'formulaire', 'fezfezfezlz@aol.fr', '$1$pxes9y8O$bCW/i0g6t7iLEUoRaAh3u1', NULL),
(15, 65, 'formulaire', 'afezofkoekf@aol.fr', '$1$l3UkIjua$hFjsqQvCpzAIu7hdUhDE81', NULL),
(16, 66, 'formulaire', 'test@gmail.com', '$1$pnnr2ErS$B8PKeVLAk1qHVntfnpXHN0', NULL),
(17, 67, 'facebook', 'charlesduvert@aol.fr', NULL, '10153627124824223'),
(18, 68, 'formulaire', 'fefefeeee@aol.Fr', '$1$IoUeHaRy$7l6Xh3OicB./Y/KCniFJD0', NULL),
(19, 69, 'facebook', '', NULL, '10153315655583041'),
(20, 70, 'formulaire', 'fezfez@aol.fr', '$1$xPApgYRE$2uGjFxc/AJwlSD8Knsvr41', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `bmg_dish`
--

CREATE TABLE `bmg_dish` (
  `idbmg_dish` int(11) NOT NULL AUTO_INCREMENT,
  `bmg_user_idbmg_user` int(11) NOT NULL,
  `dishname` varchar(45) DEFAULT NULL,
  `dishadress` varchar(255) NOT NULL,
  `dishzipcode` varchar(45) NOT NULL,
  `dishcity` varchar(255) NOT NULL,
  `dishingredients` text NOT NULL,
  `dishdesc` text,
  `dishprice` varchar(45) DEFAULT NULL,
  `dishquantity` int(11) NOT NULL,
  `dishbuy` int(11) NOT NULL,
  `dishbegin` datetime NOT NULL,
  `dishfinish` datetime NOT NULL,
  `dishactive` tinyint(11) NOT NULL,
  `dishlat` varchar(255) NOT NULL,
  `dishlong` varchar(255) NOT NULL,
  PRIMARY KEY (`idbmg_dish`),
  KEY `fk_dish_bmg_user_idx` (`bmg_user_idbmg_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `bmg_dish`
--

INSERT INTO `bmg_dish` (`idbmg_dish`, `bmg_user_idbmg_user`, `dishname`, `dishadress`, `dishzipcode`, `dishcity`, `dishingredients`, `dishdesc`, `dishprice`, `dishquantity`, `dishbuy`, `dishbegin`, `dishfinish`, `dishactive`, `dishlat`, `dishlong`) VALUES
(1, 67, 'Dish 1', '2quai de gesvres', '75008', 'Paris', 'beurre ,cannelle,sucre,pain,viande', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae lectus finibus orci placerat volutpat vitae ac ante. Nulla ullamcorper justo non felis maximus congue. Praesent suscipit sodales purus, a tempor diam aliquet sed. Phasellus quis vehicula arcu. Morbi sed magna in elit vestibulum dapibus. Donec in eros non augue eleifend gravida vestibulum eu ex. Vivamus magna ligula, vestibulum eu rutrum eget, pulvinar nec nibh.', '3.5', 5, 3, '2016-01-19 20:25:00', '2016-01-21 21:25:00', 0, '', ''),
(2, 67, 'Pates 3', '57 rue de miromesnil', '75008', 'Paris', 'pates,tomates,sel,poivre', 'Inter has ruinarum varietates a Nisibi quam tuebatur accitus Vrsicinus, cui nos obsecuturos iunxerat imperiale praeceptum, dispicere litis exitialis certamina cogebatur abnuens et reclamans, adulatorum oblatrantibus turmis, bellicosus sane milesque semper et militum ductor sed forensibus iurgiis longe discretus, qui metu sui discriminis anxius cum accusatores quaesitoresque subditivos sibi consociatos ex isdem foveis cerneret emergentes, quae clam palamve agitabantur, occultis Constantium litteris edocebat inplorans subsidia, quorum metu tumor notissimus Caesaris exhalaret.', '4', 27, 1, '2016-01-29 11:52:00', '2016-01-30 12:00:00', 1, '', ''),
(3, 67, 'test adress', '57 rue de miromesnil', '75008', 'Paris', 'ferg,ger,g,erzg,rge,ezrg,erz,erg', 'gzregjirgjzeirjgez', '3', 6, 6, '2016-01-29 19:24:00', '2016-01-29 19:24:00', 1, '48.8757897', '2.3154955');

-- --------------------------------------------------------

--
-- Structure de la table `bmg_newsletter`
--

CREATE TABLE `bmg_newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `bmg_newsletter`
--

INSERT INTO `bmg_newsletter` (`id`, `email`, `number`) VALUES
(1, 'fezfezf@aol.fr', 0),
(2, 'fzefefezfez@aol.Fr', 0),
(3, 'fzefezf@aol.fr', 0),
(4, 'charlesduvert@aol.Fr', 0),
(5, 'fzeez@aol.fr', 0),
(6, 'fz@aol.Fr', 0),
(7, 'fzfzef@aol.fr', 0),
(8, 'gzaeglkzamlrkl@aol.Fr', 0);

-- --------------------------------------------------------

--
-- Structure de la table `bmg_reco`
--

CREATE TABLE `bmg_reco` (
  `id_bmg_reco` int(11) NOT NULL AUTO_INCREMENT,
  `bmg_user_idbmg_user` int(11) NOT NULL,
  `bmg_user_idbmg_user1` int(11) NOT NULL,
  `recommendation` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_bmg_reco`,`bmg_user_idbmg_user`,`bmg_user_idbmg_user1`),
  KEY `fk_bmg_user_has_bmg_user_bmg_user2_idx` (`bmg_user_idbmg_user1`),
  KEY `fk_bmg_user_has_bmg_user_bmg_user1_idx` (`bmg_user_idbmg_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `bmg_user`
--

CREATE TABLE `bmg_user` (
  `idbmg_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `ville` varchar(45) DEFAULT NULL,
  `arrondissement` varchar(45) DEFAULT NULL,
  `adresse` varchar(45) DEFAULT NULL,
  `date_inscription` varchar(45) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`idbmg_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

--
-- Contenu de la table `bmg_user`
--

INSERT INTO `bmg_user` (`idbmg_user`, `nom`, `prenom`, `email`, `ville`, `arrondissement`, `adresse`, `date_inscription`, `age`, `image`, `description`) VALUES
(34, 'fejekfje', 'khklhkjh', 'jkhkjhjgkj@aol.fr', NULL, NULL, NULL, '2016-1-19', NULL, NULL, ''),
(35, 'fezfmelj', 'kljfekfjzkel', 'kjkljklh@aol.fr', NULL, NULL, NULL, '2016-1-19', NULL, NULL, ''),
(36, 'defzffez', 'fezfezfezf', 'fzfeezfez@aol.Fr', NULL, NULL, NULL, '2016-1-19', NULL, NULL, ''),
(37, 'ece', 'eeecc', 'cecece@aol.fr', NULL, NULL, NULL, '2016-1-19', NULL, NULL, ''),
(38, 'dededede', 'dedede', 'dedefefe@aol.fr', NULL, NULL, NULL, '2016-1-19', NULL, NULL, ''),
(39, 'defef', 'feffefg', 'efffefl@aol.fr', NULL, NULL, NULL, '2016-1-19', NULL, NULL, ''),
(40, 'zafzfz', 'afzafzfa', 'zddjalk@aol.Fr', NULL, NULL, NULL, '2016-1-19', NULL, NULL, ''),
(41, 'dezfefs', 'fezfzefe', 'knqcjkhj@aol.fr', NULL, NULL, NULL, '2016-1-19', NULL, NULL, ''),
(42, 'fzefefez', 'ezfgezgffgz', 'testfefzfezf@aol.fr', NULL, NULL, NULL, '2016-1-19', NULL, NULL, ''),
(43, 'zefevezv@aol.fr', 'dezgvegezg', 'zefevezv@aol.fr', NULL, NULL, NULL, '2016-1-19', NULL, NULL, ''),
(44, 'fezffez', 'fezfezfezff', 'ezfefez@aoo.fr', NULL, NULL, NULL, '2016-1-19', NULL, NULL, ''),
(45, 'fzefezf', 'fezfzefezf', 'fezfezfzf@aol.fr', NULL, NULL, NULL, '2016-1-19', NULL, NULL, ''),
(46, 'fzefezfezf', 'fezfefezf', 'ezfeefezf@aol.Fr', NULL, NULL, NULL, '2016-1-19', NULL, NULL, ''),
(47, 'zafzfzaf', 'ezfezfzef', 'fezfezfez@aol.fr', NULL, NULL, NULL, '2016-1-19', NULL, NULL, ''),
(48, 'zfazafa', 'fzafazfzf', 'fzafafz@aol.fr', NULL, NULL, NULL, '2016-1-19', NULL, NULL, ''),
(49, 'ezfefezf', 'fezfzefezf', 'fzefze@aol.fr', NULL, NULL, NULL, '2016-1-19', NULL, NULL, ''),
(50, 'defzef', 'fezfezfez', 'youp34zefefi@youpi.fr', NULL, NULL, NULL, '2016-1-19', NULL, NULL, ''),
(51, 'charles', 'Duvert', 'charlvert@aol.fr', NULL, NULL, NULL, '2016-1-19', NULL, NULL, ''),
(54, 'nom', 'prenom', 'test@aol.fr', NULL, NULL, NULL, '2016-1-20', NULL, NULL, ''),
(55, 'nom', 'prenom', 'yoyo@yo.fr', NULL, NULL, NULL, '2016-1-20', NULL, NULL, ''),
(56, 'esther', 'levy', 'zjifizjizj@aol.Fr', NULL, NULL, NULL, '2016-1-20', NULL, NULL, ''),
(57, 'Duvert Darriet', 'sophie', 'sophiedarriet@aol.fr', NULL, NULL, NULL, '2016-1-21', NULL, NULL, ''),
(58, 'testimg', 'testimg', 'testimg@testimg.fr', NULL, NULL, NULL, '2016-1-21', NULL, 'common-files/bemyguest_filemanager/uploads/user/default/avatar.jpg', NULL),
(59, 'testcreadossier', 'testcreadossier', 'testcreadossier@testcreadossier.fr', NULL, NULL, NULL, '2016-1-21', NULL, 'common-files/bemyguest_filemanager/uploads/user/default/avatar.jpg', NULL),
(60, 'test1', 'test1', 'test1@test1.fr', NULL, NULL, NULL, '2016-1-22', NULL, 'common-files/bemyguest_filemanager/uploads/user/default/avatar.jpg', NULL),
(61, 'Duvert', 'charles', 'charlesduvert@aol.fr', 'Paris', '75008', '57 rue de Miromesnil', '2016-1-22', 22, 'common-files/bemyguest_filemanager/uploads/user/61/profil/Duvert_Charles20160122200423.png', 'zelrkgfmlzegljzekj'),
(62, 'fzefze', 'ezafef', 'fezfzaef@aol.fr', NULL, NULL, NULL, '2016-1-27', NULL, 'common-files/bemyguest_filemanager/uploads/user/default/avatar.jpg', NULL),
(63, 'fefmkezfl', 'ezffezf', 'fezfezf@aol.fr', NULL, NULL, NULL, '2016-1-27', NULL, 'common-files/bemyguest_filemanager/uploads/user/default/avatar.jpg', NULL),
(64, 'zefezf', 'efzef', 'fezfezfezlz@aol.fr', NULL, NULL, NULL, '2016-1-27', NULL, 'common-files/bemyguest_filemanager/uploads/user/default/avatar.jpg', NULL),
(65, 'fzaef', 'fezfeza', 'afezofkoekf@aol.fr', NULL, NULL, NULL, '2016-1-27', NULL, 'common-files/bemyguest_filemanager/uploads/user/default/avatar.jpg', NULL),
(66, 'test1', 'test', 'test@gmail.com', NULL, NULL, NULL, '2016-1-27', NULL, 'common-files/bemyguest_filemanager/uploads/user/default/avatar.jpg', NULL),
(67, 'Ðuvert-Lévy', 'Charles', 'charlesduvert@aol.fr', '', '', '', '2016-1-27', 25, 'https://scontent.xx.fbcdn.net/hprofile-xfa1/v/t1.0-1/p50x50/11898601_10153472357214223_4723262625952047916_n.jpg?oh=0a11f7302f850b48b56a7fa4d7c6a7cb&amp;oe=57479210', ''),
(68, 'zefezfe', 'fzefezfez', 'fefefeeee@aol.Fr', NULL, NULL, NULL, '2016-1-28', NULL, 'common-files/bemyguest_filemanager/uploads/user/default/avatar.jpg', NULL),
(69, 'Ðuvert-Lévy', 'Esther', '', NULL, NULL, NULL, '2016-1-28', 21, 'https://scontent.xx.fbcdn.net/hprofile-prn2/v/t1.0-1/c0.0.50.50/p50x50/10625140_10152413874858041_6132161238880585468_n.jpg?oh=2d5ce59025bd3701dade77661cef087d&amp;oe=573F9DE5', NULL),
(70, 'dazfe', 'fezfeza', 'fezfez@aol.fr', NULL, NULL, NULL, '2016-1-28', NULL, 'common-files/bemyguest_filemanager/uploads/user/default/avatar.jpg', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `bmg_validation`
--

CREATE TABLE `bmg_validation` (
  `idbmg_validation` int(11) NOT NULL AUTO_INCREMENT,
  `bmg_user_idbmg_user` int(11) NOT NULL,
  `facebook` int(11) DEFAULT NULL,
  `email` int(11) DEFAULT NULL,
  PRIMARY KEY (`idbmg_validation`),
  KEY `fk_bmg_validation_bmg_user1_idx` (`bmg_user_idbmg_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `bmg_com`
--
ALTER TABLE `bmg_com`
  ADD CONSTRAINT `fk_bmg_com_bmg_dish1` FOREIGN KEY (`bmg_dish_idbmg_dish`) REFERENCES `bmg_dish` (`idbmg_dish`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bmg_com_bmg_user1` FOREIGN KEY (`bmg_user_idbmg_user`) REFERENCES `bmg_user` (`idbmg_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `bmg_connect`
--
ALTER TABLE `bmg_connect`
  ADD CONSTRAINT `fk_bmg_connect_bmg_user1` FOREIGN KEY (`bmg_user_idbmg_user`) REFERENCES `bmg_user` (`idbmg_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `bmg_dish`
--
ALTER TABLE `bmg_dish`
  ADD CONSTRAINT `fk_dish_bmg_user` FOREIGN KEY (`bmg_user_idbmg_user`) REFERENCES `bmg_user` (`idbmg_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `bmg_reco`
--
ALTER TABLE `bmg_reco`
  ADD CONSTRAINT `fk_bmg_user_has_bmg_user_bmg_user1` FOREIGN KEY (`bmg_user_idbmg_user`) REFERENCES `bmg_user` (`idbmg_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bmg_user_has_bmg_user_bmg_user2` FOREIGN KEY (`bmg_user_idbmg_user1`) REFERENCES `bmg_user` (`idbmg_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `bmg_validation`
--
ALTER TABLE `bmg_validation`
  ADD CONSTRAINT `fk_bmg_validation_bmg_user1` FOREIGN KEY (`bmg_user_idbmg_user`) REFERENCES `bmg_user` (`idbmg_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
