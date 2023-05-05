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

DROP TABLE IF EXISTS ustensile;
CREATE TABLE `ustensile` (
     `ustensile_id` int PRIMARY KEY AUTO_INCREMENT,
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
    `ingredient_id` int PRIMARY KEY AUTO_INCREMENT,
    `nom` varchar(50) NOT NULL,
    `image` varchar(255) DEFAULT NULL,
    `type` varchar(25)
);

DROP TABLE IF EXISTS ingredient_recette;
CREATE TABLE `ingredient_recette` (
    `recette_id` int REFERENCES `recette`(`recette_id`),
    `ingredient_id` int REFERENCES `ingredient`(`ingredient_id`),
    `quantite` float,

    PRIMARY KEY (`recette_id`,`ingredient_id`)
    #     FOREIGN KEY (`ingredient_id`) REFERENCES `ingredient`(`ingredient_id`),
    #     FOREIGN KEY (`recette_id`) REFERENCES `recette`(`recette_id`)
);

DROP TABLE IF EXISTS tag;
CREATE TABLE `tag` (
    `tag_id` int PRIMARY KEY AUTO_INCREMENT,
    `nom` varchar(50) NOT NULL
);

DROP TABLE IF EXISTS tag_recette;
CREATE TABLE `tag_recette` (
    `tag_id` int,
    `recette_id` int
);



ALTER TABLE `ustensile_recette`
    ADD CONSTRAINT `pk_ustensile_recette` PRIMARY KEY (`recette_id`,`ustensile_id`),
    ADD CONSTRAINT `fk_ustensile` FOREIGN KEY (`ustensile_id`) REFERENCES `ustensile`(`ustensile_id`),
    ADD CONSTRAINT `fk_ustensile_recette` FOREIGN KEY (`recette_id`) REFERENCES `recette`(`recette_id`);

# ALTER TABLE `ingredient_recette`
#   ADD CONSTRAINT `pk_ingredient_recette` PRIMARY KEY (`recette_id`,`ingredient_id`),
#   ADD CONSTRAINT `fk_ingredient` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredient`(`ingredient_id`),
#   ADD CONSTRAINT `fk_ingredient_recette` FOREIGN KEY (`recette_id`) REFERENCES `recette`(`recette_id`);

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