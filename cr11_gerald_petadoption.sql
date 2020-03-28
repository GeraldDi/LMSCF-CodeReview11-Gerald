-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 28. Mrz 2020 um 14:33
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_gerald_petadoption`
--
CREATE DATABASE IF NOT EXISTS `cr11_gerald_petadoption` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cr11_gerald_petadoption`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pets`
--

CREATE TABLE `pets` (
  `petID` int(11) NOT NULL,
  `description` varchar(80) NOT NULL,
  `age` int(11) NOT NULL,
  `size` varchar(11) NOT NULL,
  `city` varchar(20) NOT NULL,
  `ZIPcode` int(11) NOT NULL,
  `address` varchar(40) NOT NULL,
  `name` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  `website` varchar(80) NOT NULL,
  `hobbies` varchar(40) NOT NULL,
  `date` date DEFAULT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `pets`
--

INSERT INTO `pets` (`petID`, `description`, `age`, `size`, `city`, `ZIPcode`, `address`, `name`, `image`, `website`, `hobbies`, `date`, `lat`, `lng`) VALUES
(1, 'Cat', 9, 'senior', 'Vienna', 1010, 'Tegetthoffstraße 57', 'Sandro', 'https://c.pxhere.com/images/af/02/d8d46e0cc5f48726da18c232b741-1594715.jpg!d', '', 'Cuddling', '2020-03-26', 48.2062, 16.3696),
(2, 'Cat 2', 8, 'senior', 'Vienna', 1200, 'Engerthstraße 163', 'Schneeball', 'https://c.pxhere.com/photos/30/e6/cat_kitten_feline_pet_animals_animal_pets_cats-1111241.jpg!d', '', 'Sleeping', '2020-03-31', 48.2288, 16.3989),
(3, 'Rabbit', 2, 'small', 'Vienna', 1190, 'Koschatgasse 39', 'Alex', 'https://c.pxhere.com/photos/8e/a2/rabbit_hare_animal_cute_adorable_lawn_grass_nature-1163779.jpg!d', 'https://c.pxhere.com/photos/8e/a2/rabbit_hare_animal_cute_adorable_lawn_grass_na', '', NULL, 48.2415, 16.3239),
(4, 'Rabbit 2', 4, 'small', 'Mautern', 3512, 'Maria Langegger Straße 46', 'Julius', 'https://c.pxhere.com/photos/59/46/rabbit_bunny_animal_brown_pet-143760.jpg!d', 'https://c.pxhere.com/photos/59/46/rabbit_bunny_animal_brown_pet-143760.jpg!d', '', NULL, 48.3867, 15.5665),
(6, 'Mouse', 2, 'small', 'Dunkelsteinerwald', 3122, 'Hauptstraße 2', 'Mickey', 'http://res.freestockphotos.biz/pictures/17/17036-close-up-of-a-deer-mouse-pv.jpg', 'http://res.freestockphotos.biz/pictures/17/17036-close-up-of-a-deer-mouse-pv.jpg', '', NULL, 48.2707, 15.4614),
(7, 'Rat', 1, 'small', 'Ybbs', 3370, 'Kirlstraße 2', 'Wunibald', 'https://images.pexels.com/photos/51340/rat-pets-eat-51340.jpeg?auto=compress&cs=', 'https://images.pexels.com/photos/51340/rat-pets-eat-51340.jpeg?auto=compress&cs=', '', NULL, 48.1787, 15.0776),
(8, 'Horse 1', 7, 'large', 'Amstetten', 3300, 'Dornacher Straße 5', 'Parala', 'https://images.unsplash.com/photo-1553284965-5dd8352ff1bd?ixlib=rb-1.2.1&ixid=ey', '', 'relaxing', NULL, 48.1274, 14.8857),
(9, 'Horse 2', 6, 'large', 'Graz', 8020, 'Traungauergasse 9', 'Julia', 'https://images.unsplash.com/flagged/photo-1557296126-ae91316e5746?ixlib=rb-1.2.1', '', 'galloping', NULL, 47.0699, 15.4213),
(10, 'Dog 1', 4, 'large', 'Villach', 9500, 'Piccostraße 2', 'Bello', 'https://www.petanos.com/wp-content/uploads/2019/09/Akbash-Dog-turky-scaled.jpg', '', 'running', NULL, 46.6202, 13.8616),
(11, 'Dog 2', 3, 'large', 'Steinfeld', 9754, 'Oktoberstraße 4', 'Hannes', 'https://images.unsplash.com/photo-1554079501-a254f876fc77?ixlib=rb-1.2.1&auto=format&fit=crop&w=1267', '', 'walking', NULL, 46.7574, 13.2488),
(12, 'Dog 3', 9, 'senior', 'Kitzbühel', 6370, 'Hauptstraße 57', 'Andreas', 'https://image.freepik.com/free-photo/old-dog_144627-17087.jpg', '', 'sleeping', '2020-04-15', 47.4509, 12.3981),
(13, 'Dog 4', 8, 'senior', ' Innsbruck', 6010, 'Bahnstraße 71', 'Blitz', 'https://img-s-msn-com.akamaized.net/tenant/amp/entityid/BBYGoRU.img?h=438&w=768&', '', 'cuddling', '2020-05-07', 47.2667, 11.3956);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `usertype` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `usertype`) VALUES
(1, 'Admin', 'admin@gmail.com', '25f43b1486ad95a1398e3eeb3d83bc4010015fcc9bedb35b432e00298d5021f7', 'admin'),
(2, 'max mustermann', 'maxmustermann@gmil.com', '0b14d501a594442a01c6859541bcb3e8164d183d32937b851835442f69d5c94e', 'user');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`petID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `pets`
--
ALTER TABLE `pets`
  MODIFY `petID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
