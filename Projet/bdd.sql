DROP TABLE IF EXISTS recette;
CREATE TABLE `recette` (
  `recette_id` int UNIQUE NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `instructions` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `difficulte` decimal(5,2),
  `origine_id` varchar(50)
);

DROP TABLE IF EXISTS ustensile;
CREATE TABLE `ustensile` (
  `ustensile_id` int UNIQUE NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL
);

DROP TABLE IF EXISTS ustensile_recette;
CREATE TABLE `ustensile_recette` (
  `recette_id` int,
  `ustensile_id` int
);

DROP TABLE IF EXISTS ingredient;
CREATE TABLE `ingredient` (
  `ingredient_id` int UNIQUE NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` varchar(25)
);

DROP TABLE IF EXISTS ingredient_recette;
CREATE TABLE `ingredient_recette` (
  `recette_id` int,
  `ingredient_id` int
);

DROP TABLE IF EXISTS tag;
CREATE TABLE `tag` (
  `tag_id` int UNIQUE NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL
);

DROP TABLE IF EXISTS tag_recette;
CREATE TABLE `tag_recette` (
  `tag_id` int,
  `recette_id` int
);

DROP TABLE IF EXISTS origine;
CREATE TABLE `origine` (
  `origine_id` int UNIQUE NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` longtext,
  `image` varchar(255) DEFAULT NULL
);


ALTER TABLE `origine`
  ADD CONSTRAINT `pk_origine` PRIMARY KEY (`origine_id`);

ALTER TABLE `recette`
  ADD CONSTRAINT `pk_recette` PRIMARY KEY (`recette_id`),
  ADD CONSTRAINT `fk_recette_origine` FOREIGN KEY (`origine_id`) REFERENCES `origine`(`origine_id`);

ALTER TABLE `ustensile`
  ADD CONSTRAINT `pk_ustensile` PRIMARY KEY (`ustensile_id`);

ALTER TABLE `ustensile_recette`
  ADD CONSTRAINT `pk_ustensile_recette` PRIMARY KEY (`recette_id`,`ustensile_id`),
  ADD CONSTRAINT `fk_ustensile` FOREIGN KEY (`ustensile_id`) REFERENCES `ustensile`(`ustensile_id`),
  ADD CONSTRAINT `fk_ustensile_recette` FOREIGN KEY (`recette_id`) REFERENCES `recette`(`recette_id`);

ALTER TABLE `ingredient`
  ADD CONSTRAINT `pk_ingredient` PRIMARY KEY (`ingredient_id`);

ALTER TABLE `ingredient_recette`
  ADD CONSTRAINT `pk_ingredient_recette` PRIMARY KEY (`recette_id`,`ingredient_id`),
  ADD CONSTRAINT `fk_ingredient` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredient`(`ingredient_id`),
  ADD CONSTRAINT `fk_ingredient_recette` FOREIGN KEY (`recette_id`) REFERENCES `recette`(`recette_id`);

ALTER TABLE `tag`
  ADD CONSTRAINT `pk_tag` PRIMARY KEY (`tag_id`);

ALTER TABLE `tag_recette`
  ADD CONSTRAINT `pk_tag_recette` PRIMARY KEY (`tag_id`,`recette_id`),
  ADD CONSTRAINT `fk_tag` FOREIGN KEY (`tag_id`) REFERENCES `tag`(`tag_id`),
  ADD CONSTRAINT `fk_recette` FOREIGN KEY (`recette_id`) REFERENCES `recette`(`recette_id`);



describe recette;
describe ustensile;
describe ustensile_recette;
describe ingredient;
describe ingredient_recette;
describe tag;
describe tag_recette;
describe origine;