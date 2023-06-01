DROP TABLE IF EXISTS origine;
CREATE TABLE `origine` (
    `origine_id` int PRIMARY KEY AUTO_INCREMENT,
    `nom` varchar(50) NOT NULL,
    `description` longtext,
    `image` varchar(255) DEFAULT NULL
);

DROP TABLE IF EXISTS recette;
CREATE TABLE `recette` (
    `recette_id` int PRIMARY KEY AUTO_INCREMENT,
    `nom` varchar(50) NOT NULL,
    `instructions` longtext NOT NULL,
    `image` varchar(255) DEFAULT NULL,
    `origine_id` int,

    FOREIGN KEY (`origine_id`) REFERENCES origine(`origine_id`)
);

DROP TABLE IF EXISTS ingredient;
CREATE TABLE `ingredient` (
    `ingredient_id` int PRIMARY KEY AUTO_INCREMENT,
    `nom` varchar(50) NOT NULL,
    `image` varchar(255) DEFAULT NULL
);

DROP TABLE IF EXISTS ingredient_recette;
CREATE TABLE `ingredient_recette` (
    `recette_id` int REFERENCES `recette`(`recette_id`),
    `ingredient_id` int REFERENCES `ingredient`(`ingredient_id`),
    `quantite` float,

    PRIMARY KEY (`recette_id`,`ingredient_id`)
);

DROP TABLE IF EXISTS tag;
CREATE TABLE `tag` (
    `tag_id` int PRIMARY KEY AUTO_INCREMENT,
    `nom` varchar(50) NOT NULL
);

DROP TABLE IF EXISTS tag_recette;
CREATE TABLE `tag_recette` (
    `tag_id` int REFERENCES `tag`(`tag_id`),
    `recette_id` int REFERENCES `recette`(`recette_id`),

    PRIMARY KEY (`tag_id`,`recette_id`)
);







describe recette;
describe ingredient;
describe ingredient_recette;
describe tag;
describe tag_recette;
describe origine;