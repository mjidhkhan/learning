-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2019 at 11:44 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mp`
--

-- --------------------------------------------------------

--
-- Table structure for table `course_details`
--

DROP TABLE IF EXISTS `course_details`;
CREATE TABLE `course_details` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(250) NOT NULL,
  `course_prep_date` date NOT NULL,
  `course_prep_time` int(11) NOT NULL,
  `course_description` text NOT NULL,
  `course_notes` text NOT NULL,
  `course_instructions` text NOT NULL,
  `course_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_details`
--

INSERT INTO `course_details` (`course_id`, `course_name`, `course_prep_date`, `course_prep_time`, `course_description`, `course_notes`, `course_instructions`, `course_image`) VALUES
(53, 'Spring chicken in a pot', '2019-04-09', 10, 'Casseroles aren\'t just for winter  this light, vibrant one-pot is packed with spring veg and herby pesto', 'Add the broccoli, spring greens, petit pois and spring onions, stir well, then return to the boil. Cover, then cook for 5 mins more, stir in the pesto and heat through.', 'Heat the oil in a large, heavy pan. Add the onion, gently fry for 5 mins until softened, add the chicken, then fry until lightly coloured. Add the potatoes, stock and plenty of freshly ground black pepper, then bring to the boil. Cover, then simmer for 30 mins until the potatoes are tender and the chicken is cooked. Can be frozen at this point.', '1554803707_pad-thai-1-500x500.jpg'),
(54, 'Test Recipe Beef With Rice', '2019-04-09', 10, 'Our Speciality', 'Cook for 3o minutes', 'Chicken with rice', '1554805155_s2-500x500.jpg'),
(55, 'Test Recipe Girlled Fish', '2019-04-09', 10, 'Our Speciality', 'Cook for 3o minutes', 'Chicken with rice', '1554805207_the-norfolk-arms-ngci-menu.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_details`
--
ALTER TABLE `course_details`
  ADD UNIQUE KEY `course_id` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
