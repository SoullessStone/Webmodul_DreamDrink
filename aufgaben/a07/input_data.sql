INSERT INTO `Unit` (`id`, `name`) VALUES (NULL, 'Einheit');
INSERT INTO `Unit` (`id`, `name`) VALUES (NULL, 'Stück');
INSERT INTO `Unit` (`id`, `name`) VALUES (NULL, 'Gramm');
INSERT INTO `Unit` (`id`, `name`) VALUES (NULL, 'Deziliter');
INSERT INTO `Unit` (`id`, `name`) VALUES (NULL, 'Zentiliter');

INSERT INTO `Ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Zucker', NULL, '3');
INSERT INTO `Ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Zitrone', NULL, '2');
INSERT INTO `Ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Rosmarin', NULL, '2');
INSERT INTO `Ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Gin', NULL, '1');
INSERT INTO `Ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Rum', NULL, '1');
INSERT INTO `Ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Vodka', NULL, '1');
INSERT INTO `Ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Whiskey', NULL, '1');
INSERT INTO `Ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Ginger Ale', NULL, '1');
INSERT INTO `Ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Orangensaft', NULL, '4');
INSERT INTO `Ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Rahm', NULL, '4');


INSERT INTO `User` (`username`, `password`, `email`, `firstname`, `lastname`, `isAdmin`) VALUES ('Michel', '$2y$10$fgk5gIvxH83bK0LAjg5RJuzKFyY.q4ORhAbQyP1P4aEv2QOsOx6eG', 'michel', 'Michel', 'Uz', '1');
INSERT INTO `User` (`username`, `password`, `email`, `firstname`, `lastname`, `isAdmin`) VALUES ('user', '$2y$10$fgk5gIvxH83bK0LAjg5RJuzKFyY.q4ORhAbQyP1P4aEv2QOsOx6eG', 'michel', 'Michel', 'Uz', '0');
INSERT INTO `User` (`username`, `password`, `email`, `firstname`, `lastname`, `isAdmin`) VALUES ('Sabine', '$2y$10$fgk5gIvxH83bK0LAjg5RJuzKFyY.q4ORhAbQyP1P4aEv2QOsOx6eG', 'safsdf@adsfsdf.ch', NULL, NULL, '1');

INSERT INTO `Drink`(`name`, `description`, `creator`, `createdAt`) VALUES ('Pink Squirrel', 'Als Einhörnchen unter den Drinks wird es besonders gerne von den Frauen gesehen. Jedoch sollte dieser Drink jedem schmecken, wagt er sich denn an dessen rosaroten Pelz!', 'Sabine', '2016-11-23');
    INSERT INTO `Image`(`path`) VALUES ('pink_squirrel.png');
    INSERT INTO `Images_for_Drink`(`drink_id`, `image_id`) VALUES ('1','0');

INSERT INTO `Drink`(`name`, `description`, `creator`) VALUES ('Zucker Ale', 'Vor allem Zucker. Etwas Ginger Ale hinzufügen, fertig!', 'Michel');
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (1, 2, 100);
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (8, 2, 1);