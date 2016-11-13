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


INSERT INTO `user` (`username`, `password`, `email`, `firstname`, `lastname`, `isAdmin`) VALUES ('Michel', '$2y$10$a0kyogTPCzkNyGv9OcfuNeeN.Fw/qcI4g96eHsw6gu1NQ1d/80tfS', 'michel', 'Michel', 'Uz', '1');