-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2019 at 11:30 AM
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
-- Database: `menu`
--
CREATE DATABASE IF NOT EXISTS `menu` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `menu`;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `m_cat_id` int(11) NOT NULL,
  `m_type_id` int(11) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `title`, `visible`, `m_cat_id`, `m_type_id`, `content`) VALUES
(4, 'Fruit Medley', 1, 2, 3, 'Preheat oven to 325&deg; F.<img class=\"courses\" src=\"meals/Fruit%20Medley%20Dessert.jpg\" alt=\"\"/>Roll chilled dough on floured surface to 1/4-inch thickness. Cut out 24 shapes using 2 1/2 to 3-inch cookie cutters. Place on ungreased baking sheets.<br />Bake for 10 to 14 minutes or until edges are light golden brown. Cool on baking sheets for 2 minutes; remove to wire racks to cool completely.<br />Place two cookies on each plate. Top with 1/2 cup yogurt and 1/2 cup fruit mixture; place a third cookie on top.﻿'),
(7, 'Lobster Thermidor', 1, 2, 1, '<p style=\"text-align: justify;\"><span style=\"font-size: small;\"><img class=\"courses\" title=\"Lobster Thermidor\" src=\"meals/lobster-web.jpg\" alt=\"Lobster Thermidor\"/></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-size: small;\">Whole lobster in the shell topped with a creamy Mornay sauce, browned under the grill and topped with prawns. Served with a salad garnish potatoes. Try this dish out - it is superb and well worth the trouble it takes. If like me you are a little squeamish about boiling live lobsters, buy one that is ready cooked. Large supermarkets sell them now, as do good fishmongers.&#65279;</span>\r\n<br>\r\nIf you cut the vegetables too small and pile them into a small roasting dish you will end up steaming them instead. ﻿</p>'),
(2, 'Oven Roasted Vegetable Ratatouille with Cheese ', 1, 2, 2, '<p><img class=\"courses\" title=\"Oven Roasted Vegetable Ratatouille with Cheese \" src=\"meals/3191228_dfd3f130ad_m.jpg\" alt=\"Oven Roasted Vegetable Ratatouille with Cheese \"/>Still trying to lose those extra pounds from Christmas? I find that cutting back on alcohol and eating vegetarian meals once or twice a week can help. Now you don not have to be a vegetarian to enjoy a meatless dish, just open-minded. Of course the key to success is how you cook, rather than what you cook. The two important keys to this dish are cut the vegetables into a chunky size and brown them before roasting them in the oven.<br />If you cut the vegetables too small and pile them into a small roasting dish you will end up steaming them instead. &#65279;</p>'),
(6, 'Smoked salmon gateau', 1, 2, 1, '<img class=\"courses\" title=\"Smoked salmon gateau\" src=\"meals/starter.jpg\" alt=\"Smoked salmon gateau\" />\r\nWrap the base of a loose-bottomed, 20cm non-stick cake tin with cling film, twizzling it into a knot on the underside, then slot base back in the tin. Cut the salmon into pieces about 15cm long and make a neat layer of slices, presentation side down, on the base of the tin. Start at the outside and push the slices right to the edge; after going all round the edge, fill in the centre with straight pieces of salmon. \r\n Mash the cream cheese until smooth (a rubber spatula is good for this), working in the mignonette pepper and a pinch of salt at the same time. Pour in two-thirds of the cream, a little at a time, and keep stirring and beating until a smooth, lightly whipped cream consistency is achieved. ');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `ingredient_name` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `units` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `ingredient_name`, `quantity`, `units`) VALUES
(1, 'Flour', 440, 'g'),
(2, 'Raisins', 2575, 'g'),
(3, 'Rice  ', 2167, 'g'),
(4, 'Syrup ', 203, 'ml'),
(5, 'Lettuce', 500, 'g'),
(6, 'Carrots', 450, 'g'),
(7, 'Potato', 1500, 'g'),
(8, 'Apples ', 388, 'g'),
(9, 'Chicken  ', 9150, 'g'),
(10, 'Blackbeans', 1000, 'g'),
(11, 'Beef', 3900, 'g'),
(12, 'Shrimp', 1000, 'g'),
(13, 'Salmon', 1744, 'g'),
(14, 'Spaghetti', 1794, 'g'),
(15, 'Tomato  ', 2850, 'g'),
(16, 'Salt', 990, 'g'),
(17, 'Pepper', 390, 'g'),
(18, 'Garlic', 930, 'g'),
(19, 'Paprika', 1000, 'g'),
(20, 'Onions', 1800, 'g'),
(21, 'Cumin  ', 1000, 'g'),
(22, 'Cayenne pepper', 333, 'g'),
(23, 'Olive oil', 1000, 'ml'),
(24, 'Dry sherry', 500, 'g'),
(25, 'Hot sauce', 245, 'g'),
(26, 'Oregano', 350, 'g'),
(27, 'Bay leaves', 100, 'g'),
(28, 'Honey ', 1000, 'ml'),
(29, 'Avocado', 500, 'g'),
(30, 'Lime', 500, 'ml');

-- --------------------------------------------------------

--
-- Table structure for table `meal_category`
--

DROP TABLE IF EXISTS `meal_category`;
CREATE TABLE `meal_category` (
  `id` int(11) NOT NULL,
  `meal_category` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal_category`
--

INSERT INTO `meal_category` (`id`, `meal_category`) VALUES
(1, 'Starter'),
(2, 'Main Course'),
(3, 'Dessert'),
(4, 'Breakfast'),
(5, 'Refreshment');

-- --------------------------------------------------------

--
-- Table structure for table `meal_course`
--

DROP TABLE IF EXISTS `meal_course`;
CREATE TABLE `meal_course` (
  `id` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `prep_date` date NOT NULL,
  `course_type` tinyint(4) NOT NULL,
  `time_to_prepare` int(11) NOT NULL,
  `course_notes` text NOT NULL,
  `course_instructions` text NOT NULL,
  `meal_cat_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal_course`
--

INSERT INTO `meal_course` (`id`, `course_name`, `prep_date`, `course_type`, `time_to_prepare`, `course_notes`, `course_instructions`, `meal_cat_id`) VALUES
(1, 'Oven Roasted Vegetable Ratatouille with Cheese ', '2011-03-26', 2, 12, 'To Serve\r\nMake a little mound of salad leaves on one side of each dinner plate, and then top with two cheese parcels. Then carefully place a mound of the roasted vegetables at the front and finally drizzle a little of the reduced balsamic vinegar around the plate.\r\n\r\nChef’s Tips\r\nRemember that phylo pastry dries out fast so try to work quickly, away from the heat if possible\r\nand wrap the sheets your not using with parchment paper and a damp tea towel.', '1. Cut the tomatoes in half lengthwise, rub with a little olive oil, season and cook in the oven on a low heat 120 C gas mark 1 (put fan on if your oven has one). Cook them in the bottom of the oven on a shallow tray so they dry out as well as cook for about 2 hours.\r\n2. Trim off the very top of the garlic, rub with olive oil and add to the tomato tray.\r\n3. Mix the mozzarella, Parmesan in a food processor and season with salt and pepper.\r\n4. Divide the cheese mix into 6 equal amounts push a pecan into the centre of each one and refrigerate.\r\n5. Fold one sheet of phylo in half lengthwise into a rectangle and brush the edges lightly with water.\r\n6. Place one ball of the cheese at one end of the phylo rectangle and fold over to create a triangle, which about 5 inches (125mm) long. Where the triangle joins the filo sheet fold the triangle again, and finally a third time.\r\n7. Trim off the excess phylo pastry and make sure the triangles are well sealed to prevent the cheese coming out during the cooking.\r\n8. Repeat the process until you have 6 triangles then brush them with melted butter and place them on a baking sheet lined with baking parchment.\r\n9. Reduce the balsamic vinegar in a nonstick saucepan until it is syrupy, cover and allow to cool.\r\n10.In a large nonstick frying-pan cook the peppers, aubergine, courgette, mushroom and red onion separately in a little olive oil allowing each to get some colour on it then transfer to a roasting pan.\r\n11. Roast the vegetables in the top of the oven just until they are tender but not mushy.\r\n12. Remove all the roasted vegetables, keep them warm and add the basil and season the vegetables.\r\n13. Turn up the oven to 190 gas mark 5 and bake the phylo parcels until they golden brown.', 2),
(2, 'test', '2011-03-30', 2, 10, 'nothing', 'nothing', 2);

-- --------------------------------------------------------

--
-- Table structure for table `meal_type`
--

DROP TABLE IF EXISTS `meal_type`;
CREATE TABLE `meal_type` (
  `id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal_type`
--

INSERT INTO `meal_type` (`id`, `type`) VALUES
(1, 'vegetarian'),
(2, 'non-vegetarian');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `booking_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_date`, `booking_date`) VALUES
(1, 1, '2011-03-10', '2011-03-15');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `cours_id` int(11) NOT NULL,
  `qty_used` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `item_id`, `cours_id`, `qty_used`) VALUES
(1, 7, 1, 250),
(2, 17, 1, 10),
(3, 18, 1, 50),
(4, 20, 1, 100),
(5, 2, 2, 12),
(6, 18, 2, 12),
(7, 13, 2, 250),
(8, 15, 2, 50);

-- --------------------------------------------------------

--
-- Table structure for table `review_rating`
--

DROP TABLE IF EXISTS `review_rating`;
CREATE TABLE `review_rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cont_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `cont_title` varchar(100) NOT NULL,
  `review` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_rating`
--

INSERT INTO `review_rating` (`id`, `user_id`, `cont_id`, `rating`, `cont_title`, `review`, `date`) VALUES
(1, 28, 2, 5, 'This is a test review to check that wether it is working or not', 'this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content', '2011-03-27 13:19:09'),
(2, 28, 2, 2, 'content 4', 'this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content', '2011-03-29 23:23:51'),
(3, 28, 6, 5, 'This is another  test review to  see how it looks like when it is in it\'s place ', 'this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content', '2011-03-29 23:24:46'),
(4, 28, 7, 5, 'This is so delious', 'this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content this is 3rd content', '2011-03-29 23:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `servings`
--

DROP TABLE IF EXISTS `servings`;
CREATE TABLE `servings` (
  `id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `cou_id` int(11) NOT NULL,
  `ord_id` int(11) NOT NULL,
  `no_of_servings` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servings`
--

INSERT INTO `servings` (`id`, `cus_id`, `cou_id`, `ord_id`, `no_of_servings`) VALUES
(1, 1, 1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hashed_password` varchar(250) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `hashed_password`, `status`) VALUES
(28, 'Chathurika Goonawardane', 'chathurika', 'cha@cha', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2),
(27, 'Majid', 'mhkhan', 'mhk@mhk.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal_category`
--
ALTER TABLE `meal_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal_course`
--
ALTER TABLE `meal_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal_type`
--
ALTER TABLE `meal_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_rating`
--
ALTER TABLE `review_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servings`
--
ALTER TABLE `servings`
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
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `meal_category`
--
ALTER TABLE `meal_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `meal_course`
--
ALTER TABLE `meal_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meal_type`
--
ALTER TABLE `meal_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `review_rating`
--
ALTER TABLE `review_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `servings`
--
ALTER TABLE `servings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
