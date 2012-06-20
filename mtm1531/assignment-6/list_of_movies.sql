-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 08, 2012 at 04:14 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `elmo0008`
--

-- --------------------------------------------------------

--
-- Table structure for table `list_of_movies`
--

CREATE TABLE IF NOT EXISTS `list_of_movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `directed_by` varchar(50) NOT NULL,
  `release_date` date NOT NULL,
  `starring` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `list_of_movies`
--

INSERT INTO `list_of_movies` (`id`, `title`, `genre`, `directed_by`, `release_date`, `starring`) VALUES
(1, 'Savages', 'Drama/Crime', 'Oliver Stone', '2012-07-06', 'Aaron Johnson, Taylor Kitsch, Benicio del Toro'),
(2, 'Ice Age 4', 'Adventure/Animation/Family/Comedy', 'Carlos Saldanha', '2012-07-13', 'Ray Romano, Queen Latifah, Denis Leary, John Leguizamo'),
(3, 'Red Lights', 'Thriller', 'Rodrigo Cortes', '2012-07-13', 'Cillian Murphy, Sigourney Weaver, Robert De Niro, Elizabeth Olsen'),
(4, 'Ted', 'Comedy', 'Seth MacFarlane', '2012-07-13', 'Mark Wahlberg, Mila Kunis, Giovanni Ribisi, Joel McHale, Seth MacFarlane'),
(7, 'Batman 3 - Dark King', 'Action/Superhero', 'Christopher Nolan', '2012-07-20', 'Christian Bale'),
(11, 'Killer Joe', 'Comedy', 'William Friedkin', '2012-07-27', 'Matthew McConaughey, Emile Hirsch, Thomas Haden Church, Gina Gershon, Juno Temple');
