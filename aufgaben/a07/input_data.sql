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
INSERT INTO `Ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Limette', NULL, '2');
INSERT INTO `Ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Cachaça', NULL, '1');
INSERT INTO `Ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Rohrzucker', NULL, '3');
INSERT INTO `Ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Minze', NULL, '2');
INSERT INTO `Ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Tonic', NULL, '1');
INSERT INTO `Ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Ananassaft', NULL, '1');
INSERT INTO `Ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Cream of Coconut', NULL, '1');
INSERT INTO `Ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Cranberrysaft', NULL, '1');
INSERT INTO `Ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Pfirsichlikör', NULL, '1');
INSERT INTO `Ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Creme de noyaux', NULL, '1');
INSERT INTO `Ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Creme de cocoa', NULL, '1');
INSERT INTO `Ingredient` (`id`, `name`, `image_path`, `unit`) VALUES (NULL, 'Cola', NULL, '1');


INSERT INTO `User` (`username`, `password`, `email`, `firstname`, `lastname`, `isAdmin`) VALUES ('Michel', '$2y$10$fgk5gIvxH83bK0LAjg5RJuzKFyY.q4ORhAbQyP1P4aEv2QOsOx6eG', 'michel', 'Michel', 'Uz', '1');
INSERT INTO `User` (`username`, `password`, `email`, `firstname`, `lastname`, `isAdmin`) VALUES ('user', '$2y$10$fgk5gIvxH83bK0LAjg5RJuzKFyY.q4ORhAbQyP1P4aEv2QOsOx6eG', 'michel', 'Michel', 'Uz', '0');
INSERT INTO `User` (`username`, `password`, `email`, `firstname`, `lastname`, `isAdmin`) VALUES ('Sabine', '$2y$10$fgk5gIvxH83bK0LAjg5RJuzKFyY.q4ORhAbQyP1P4aEv2QOsOx6eG', 'safsdf@adsfsdf.ch', NULL, NULL, '1');

INSERT INTO `Drink`(`name`, `description`, `creator`, `createdAt`) VALUES ('Pink Squirrel', 'Als Einhörnchen unter den Drinks wird es besonders gerne von den Frauen gesehen. Jedoch sollte dieser Drink jedem schmecken, wagt er sich denn an dessen rosaroten Pelz!', 'Sabine', '2016-11-23');
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (21, 1, 1);
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (22, 1, 1);
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (10, 1, 3);
    INSERT INTO `Image`(`id`, `path`) VALUES ('0', 'pink_squirrel.png');
    INSERT INTO `Images_for_Drink`(`drink_id`, `image_id`) VALUES ('1','0');

INSERT INTO `Drink`(`name`, `description`, `creator`, `createdAt`) VALUES ('Moscow Mule', 'Man kann es glauben oder auch nicht: Es gab einmal eine Zeit in den USA, als die Menschen Wodka nicht wirklich mochten. In den 1940er Jahren war tatsächlich der Gin die populärste Spirituose. Bis zu jenem Zeitpunkt, als jemand den Moscow Mule kreierte und ihn als Gag in speziellen Kupferbechern servierte. Und als sich dann auch noch die Berühmtheiten Hollywoods für den Moscow Mule begeisterten, wurde er zum Hit. Und ist es immer noch.', 'Michel', '2017-01-07');
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (6, 2, 1);
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (11, 2, 1);
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (8, 2, 1);
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (2, 2, 1);
    INSERT INTO `Image`(`id`, `path`) VALUES ('9', 'moscowmule.jpg');
    INSERT INTO `Images_for_Drink`(`drink_id`, `image_id`) VALUES ('2','9');
    
INSERT INTO `Drink`(`name`, `description`, `creator`, `createdAt`) VALUES ('Cuba Libre', 'Um das Ende des kubanischen Unabhängigkeitskrieges zu feiern bestellte ein US-Soldat kubanischen Rum mit Coca Cola und Limette.Man stieß gemeinsam an und rief „ Cuba Libre“. Freies Cuba und er weltbekannte Longdrink war geboren. <br />-Havana Club', 'Sabine', '2016-12-27');
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (5, 3, 1);
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (23, 3, 3);
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

INSERT INTO `Drink`(`name`, `description`, `creator`, `createdAt`) VALUES ('Caipirinha', 'Limettenspalten und Zucker in ein Glas geben und mit einem Holzstössel zerdrücken damit sich der Saft mit dem Zucker vermischt. Cachaça hinzugeben und das Glas mit Crushed Ice auffüllen. Mit zwei dicken Trinkhalmen servieren. - mischbar.ch', 'Michel', '2017-01-07');
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (12, 6, 1);
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (14, 6, 5);
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (13, 6, 4);
    INSERT INTO `Image`(`id`, `path`) VALUES ('4', 'caipirinha.jpg');
    INSERT INTO `Images_for_Drink`(`drink_id`, `image_id`) VALUES ('6','4');

INSERT INTO `Drink`(`name`, `description`, `creator`, `createdAt`) VALUES ('Mojito', 'Minze mit Zucker und Limetten mit dem Stössel ein wenig zerquetschen, sodass sich der Limettensaft mit dem Zucker vermischen und sich der Zucker auflösen kann. Rum hinzufügen und mit Sodawasser auffüllen. - mischbar.ch', 'Michel', '2017-01-07');
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (5, 7, 1);
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (15, 7, 1);
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (1, 7, 4);
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (11, 7, 3);
    INSERT INTO `Image`(`id`, `path`) VALUES ('5', 'mojito.jpg');
    INSERT INTO `Images_for_Drink`(`drink_id`, `image_id`) VALUES ('7','5');

INSERT INTO `Drink`(`name`, `description`, `creator`, `createdAt`) VALUES ('Piña Colada', 'Die Piña Colada ist ein tropischer, cremig, süsser Cocktail auf Kokosnusscreme-Basis, mit Rum und Ananassaft. Die Piña Colada ist namensgebend für eine ganze Gruppe von Kokosnusscreme basierten Cocktails, den sogenannten Coladas. - mischbar.ch', 'Michel', '2017-01-07');
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (17, 8, 10);
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (5, 8, 3);
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (18, 8, 2);
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (10, 8, 1);
    INSERT INTO `Image`(`id`, `path`) VALUES ('6', 'pinacolada.png');
    INSERT INTO `Images_for_Drink`(`drink_id`, `image_id`) VALUES ('8','6');

INSERT INTO `Drink`(`name`, `description`, `creator`, `createdAt`) VALUES ('Gin Tonic', 'Der Gin Tonic ist ein klassischer und erfrischender Longdrink aus Gin und Tonic Water, der nicht nur an heissen Tagen mundet! - mischbar.ch', 'Michel', '2017-01-07');
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (4, 9, 1);
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (16, 9, 3);
    INSERT INTO `Image`(`id`, `path`) VALUES ('7', 'gintonic.jpg');
    INSERT INTO `Images_for_Drink`(`drink_id`, `image_id`) VALUES ('9','7');

INSERT INTO `Drink`(`name`, `description`, `creator`, `createdAt`) VALUES ('Sex on the Beach', 'Sex on the Beach ist ursprünglich ein fruchtiger, leicht süßer Longdrink, der mit Cranberry-Saft gemixt wird. Da Cranberry-Saft (oder Nektar) auch heute nicht überall erhältlich oder vorrätig ist, existieren verschiedene Variationen.', 'Michel', '2017-01-07');
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (6, 10, 1);
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (17, 10, 2);
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (19, 10, 2);
    INSERT INTO `Ingredients_for_Drink` (`ingredient_id`, `drink_id`, `quantity`) VALUES (20, 10, 1);
    INSERT INTO `Image`(`id`, `path`) VALUES ('8', 'sexonthebeach.jpg');
    INSERT INTO `Images_for_Drink`(`drink_id`, `image_id`) VALUES ('10','8');



