INSERT INTO `unit` (`id`, `name`) VALUES (NULL, 'Einheit');
INSERT INTO `unit` (`id`, `name`) VALUES (NULL, 'Stück');
INSERT INTO `unit` (`id`, `name`) VALUES (NULL, 'Gramm');

INSERT INTO `ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Zucker', NULL, '3');
INSERT INTO `ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Zitrone', NULL, '2');
INSERT INTO `ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Rosmarin', NULL, '2');
INSERT INTO `ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Gin', NULL, '1');
INSERT INTO `ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Rum', NULL, '1');
INSERT INTO `ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Vodka', NULL, '1');
INSERT INTO `ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Whiskey', NULL, '1');
INSERT INTO `ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Ginger Ale', NULL, '1');


INSERT INTO `user` (`username`, `password`, `email`, `firstname`, `lastname`, `isAdmin`) VALUES ('Michel', '$2y$10$fgk5gIvxH83bK0LAjg5RJuzKFyY.q4ORhAbQyP1P4aEv2QOsOx6eG', 'michel', 'Michel', 'Uz', '1');
INSERT INTO `User` (`username`, `password`, `email`, `firstname`, `lastname`, `isAdmin`) VALUES ('Sabine', '$2y$10$fgk5gIvxH83bK0LAjg5RJuzKFyY.q4ORhAbQyP1P4aEv2QOsOx6eG', 'safsdf@adsfsdf.ch', NULL, NULL, '1');

INSERT INTO `Drink`(`name`, `description`, `creator`) VALUES ('Pink Squirrel', 'Als Einhörnchen unter den Drinks wird es besonders gerne von den Frauen gesehen. Jedoch sollte dieser Drink jedem schmecken, wagt er sich denn an dessen rosaroten Pelz!', 'Sabine');