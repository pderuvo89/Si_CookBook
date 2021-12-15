-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 19, 2021 at 07:52 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_cookbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE `ingredient` (
  `id` int(5) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`id`, `name`) VALUES
(1, 'eggs'),
(2, 'Turkey'),
(3, 'Bread'),
(4, 'Mayo'),
(6, 'Box of Prepared Mac and Cheese'),
(7, 'BreadCrumbs'),
(8, 'Butter'),
(9, 'Chicken Breasts'),
(10, 'BreadCrumbs'),
(11, 'Jar of Marinara Sauce'),
(12, 'Mozzarella Cheese'),
(13, 'Bolona'),
(14, 'Bread'),
(15, 'Mayo'),
(16, 'Cheese'),
(17, 'Ice Cream'),
(18, 'Chocolate Syrup'),
(19, 'Sprinkles'),
(20, 'Whipped Cream'),
(21, 'eggs'),
(22, 'Yellow Mustard'),
(23, 'Mayo'),
(24, 'White Vinegar');

-- --------------------------------------------------------

--
-- Table structure for table `measure`
--

CREATE TABLE `measure` (
  `id` int(5) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `measure`
--

INSERT INTO `measure` (`id`, `name`) VALUES
(1, ''),
(2, 'Slices'),
(3, 'Slices'),
(4, 'TABLESPOONS'),
(5, ''),
(6, ''),
(7, 'Cup'),
(8, 'TABLESPOONS'),
(9, ''),
(10, 'Cup'),
(11, ''),
(12, 'Cup'),
(13, 'Slices'),
(14, 'Slices'),
(15, 'TABLESPOONS'),
(16, 'Slices'),
(17, 'Scoops'),
(18, 'Tablespoons'),
(19, 'Dashes'),
(20, 'Tablespoons'),
(21, ''),
(22, 'Teaspoon'),
(23, 'Cup'),
(24, 'Teaspoon');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `instructions` varchar(750) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `name`, `description`, `instructions`, `user_id`) VALUES
(1, 'Hard Boiled Eggs', 'Simple boiled eggs', 'Bring a pot of water to boil. Add the eggs. Boil for 12 minutes. Then cool, peel, and enjoy', 7),
(2, 'Turkey Sandwich', 'BASIC Sandwich', 'Take bread and apply mayo to one side of each slice. Place slices of turkey between the bread. Add cheese on top of turkey. Close sandwich, cut into triangles, and enjoy.', 7),
(4, 'Macaroni and Cheese', 'Basic Mac and Cheese', 'Bring a large pot of water to boil. Add macaroni and boil for 8 minutes or as long as the box instructions say. Drain well, then return to the pot and add cheese sauce. In a separate pan toast breadcrumbs with butter for 6 minutes. Move macaroni to a baking dish and top with breadcrumbs.', 8),
(5, 'Chicken Parmesan', 'Fried chicken topped with cheese and sauce', 'Filet Chicken breasts and pound thin. Coat in Breadcrumbs and fry for 3 minutes each side. Move cutlets to a baking dish and top with sauce and cheese. Bake at 350 degrees for 25 minutes or until cheese is melted.', 8),
(6, 'Bologna Sandwhich', 'Simple meat and cheese sandwhich', 'Take bread and apply mayo to one side of each slice. Place slices of turkey between the bread. Add cheese on top of turkey. Close sandwich, cut into triangles, and enjoy.', 8),
(7, 'Ice Cream Sundae', 'Simple Dessert', 'place two scoops of your favorite flavor of ice cream into a bowl. Top with chocolate syrup, sprinkles, and whipped cream. Serve immediately.', 9),
(8, 'Deviled Eggs', 'Classic deviled eggs', 'Boil eggs for 12 minutes in 3 quarts of water. Drain and run eggs under cool water for 1 minute. Crack egg shells and carefully peel under cool running water. Gently dry with paper towels. Slice the eggs in half lengthwise, removing yolks to a medium bowl, and placing the whites on a serving platter. Mash the yolks into a fine crumble using a fork. Add mayonnaise, vinegar, and  mustard. Evenly disperse heaping teaspoons of the yolk mixture into the egg whites. Sprinkle with paprika and serve.', 9);

-- --------------------------------------------------------

--
-- Table structure for table `recipeingredient`
--

CREATE TABLE `recipeingredient` (
  `recipe_id` int(5) NOT NULL,
  `ingredient_id` int(5) NOT NULL,
  `measure_id` int(5) DEFAULT NULL,
  `amount` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipeingredient`
--

INSERT INTO `recipeingredient` (`recipe_id`, `ingredient_id`, `measure_id`, `amount`) VALUES
(1, 1, 1, 12),
(2, 2, 2, 4),
(2, 3, 3, 2),
(2, 4, 4, 2),
(4, 6, 6, 1),
(4, 7, 7, 1),
(4, 8, 8, 2),
(5, 9, 9, 2),
(5, 10, 10, 1),
(5, 11, 11, 1),
(5, 12, 12, 1),
(6, 13, 13, 6),
(6, 14, 14, 2),
(6, 15, 15, 2),
(6, 16, 16, 2),
(7, 17, 17, 2),
(7, 18, 18, 3),
(7, 19, 19, 4),
(7, 20, 20, 3),
(8, 21, 21, 6),
(8, 22, 22, 1),
(8, 24, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(5) NOT NULL,
  `user_first` varchar(256) NOT NULL,
  `user_last` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_uid` varchar(256) NOT NULL,
  `user_pwd` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first`, `user_last`, `user_email`, `user_uid`, `user_pwd`) VALUES
(7, 'Peter', 'DeRuvo', 'peterderuvo@gmail.com', 'pderuvo89', '$2y$10$34YMgGe6pIH/KdKmYXfSPuGAoE0TnC9eY369dn0trjUgTV/vo9WcS'),
(8, 'Julia', 'DeRuvo', 'jean.greyson@gmail.com', 'juliagoolia', '$2y$10$REx9n/avVNJXbu7NcmHe6ega3G2NOeFjEgcPLB27iKSkxShyXZH3q'),
(9, 'John ', 'Peterson', 'jpeterson@gmail.com', 'Jpa123', '$2y$10$jLw3AdwJa0ZSKsG/dMgc7O6RfEbdK6Jenn4CHvajEKOxJ0q2lzKzi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `measure`
--
ALTER TABLE `measure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_userid` (`user_id`);

--
-- Indexes for table `recipeingredient`
--
ALTER TABLE `recipeingredient`
  ADD PRIMARY KEY (`recipe_id`,`ingredient_id`),
  ADD KEY `fk_ingredient` (`ingredient_id`),
  ADD KEY `fk_measure` (`measure_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `measure`
--
ALTER TABLE `measure`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `fk_userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `recipeingredient`
--
ALTER TABLE `recipeingredient`
  ADD CONSTRAINT `fk_ingredient` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredient` (`id`),
  ADD CONSTRAINT `fk_measure` FOREIGN KEY (`measure_id`) REFERENCES `measure` (`id`),
  ADD CONSTRAINT `fk_recipe` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
