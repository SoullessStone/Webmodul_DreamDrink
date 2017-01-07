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
INSERT INTO `Ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Zitronensaft', NULL, '5');


INSERT INTO `User` (`username`, `password`, `email`, `firstname`, `lastname`, `isAdmin`) VALUES ('Michel', '$2y$10$fgk5gIvxH83bK0LAjg5RJuzKFyY.q4ORhAbQyP1P4aEv2QOsOx6eG', 'michel', 'Michel', 'Uz', '1');
INSERT INTO `User` (`username`, `password`, `email`, `firstname`, `lastname`, `isAdmin`) VALUES ('user', '$2y$10$fgk5gIvxH83bK0LAjg5RJuzKFyY.q4ORhAbQyP1P4aEv2QOsOx6eG', 'michel', 'Michel', 'Uz', '0');
INSERT INTO `User` (`username`, `password`, `email`, `firstname`, `lastname`, `isAdmin`) VALUES ('Sabine', '$2y$10$fgk5gIvxH83bK0LAjg5RJuzKFyY.q4ORhAbQyP1P4aEv2QOsOx6eG', 'safsdf@adsfsdf.ch', NULL, NULL, '1');

INSERT INTO `Drink`(`name`, `description`, `creator`, `createdAt`) VALUES ('Pink Squirrel', 'Als Einhörnchen unter den Drinks wird es besonders gerne von den Frauen gesehen. Jedoch sollte dieser Drink jedem schmecken, wagt er sich denn an dessen rosaroten Pelz!', 'Sabine', '2016-11-23');
    INSERT INTO `Image`(`id`, `path`) VALUES ('0', 'pink_squirrel.png');
    INSERT INTO `Images_for_Drink`(`drink_id`, `image_id`) VALUES ('1','0');

INSERT INTO `Drink`(`name`, `description`, `creator`) VALUES ('Zucker Ale', 'Vor allem Zucker. Etwas Ginger Ale hinzufügen, fertig!', 'Michel');
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (1, 2, 100);
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (8, 2, 1);
    
INSERT INTO `Drink`(`name`, `description`, `creator`, `createdAt`) VALUES ('Cuba Libre', 'Um das Ende des kubanischen Unabhängigkeitskrieges zu feiern bestellte ein US-Soldat kubanischen Rum mit Coca Cola und Limette.Man stieß gemeinsam an und rief „ Cuba Libre“. Freies Cuba und er weltbekannte Longdrink war geboren. <br />-Havana Club', 'Sabine', '2016-12-27');
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (5, 3, 1);
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (10, 3, 3);
    INSERT INTO `Image`(`id`, `path`) VALUES ('1', 'cuba_libre.png');
    INSERT INTO `Images_for_Drink`(`drink_id`, `image_id`) VALUES ('3','1');
    
INSERT INTO `Drink`(`name`, `description`, `creator`, `createdAt`) VALUES ('Gin-Gin', 'Dieser herb-aromatische Drink kommt bei starken Frauen und kühlen Männern gleich gut an.<br />-Betty Bossi', 'Sabine', '2016-12-27');
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (4, 4, 1);
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (8, 4, 5);
    INSERT INTO `Image`(`id`, `path`) VALUES ('2', 'gin-gin.png');
    INSERT INTO `Images_for_Drink`(`drink_id`, `image_id`) VALUES ('4','2');
  
INSERT INTO `Drink`(`name`, `description`, `creator`, `createdAt`) VALUES ('Vodka Sunrise', 'Alle Zutaten bis auf die Grenadine mit ein paar Eiswürfeln in einen Shaker geben und gut schütteln. Dann durch das Barsieb in ein Longdrinkglas geben. Als letztes vorsichtig die Grenadine zugeben, so dass diese sich am Boden absetzt und ein schöner Farbverlauf entsteht. Die russische Variante zum Tequila Sunrise, die etwas weniger nach Alkohol schmeckt als das Original. - Cocktailscout.de', 'Michel', '2017-01-07');
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (6, 5, 1);
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (9, 5, 1);
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (11, 5, 1);
    INSERT INTO `Image`(`id`, `path`) VALUES ('3', 'vodka-sunrise.jpg');
    INSERT INTO `Images_for_Drink`(`drink_id`, `image_id`) VALUES ('5','3');


