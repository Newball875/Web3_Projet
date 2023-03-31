

CREATE TABLE `recette` (
  `recette_id` varchar(50),
  `description` longtext,
  `image` varchar(255) DEFAULT NULL,
  `difficulte` varchar(20),
  `origine_id` varchar(50)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `ustensile` (
  `ustensile_id` varchar(50),
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `ustensile_recette` (
  `recette_id` varchar(50),
  `ustensile_id` varchar(50)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `ingredient` (
  `ingredient_id` varchar(50),
  `image` varchar(255) DEFAULT NULL,
  `type` varchar(25)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `ingredient_recette` (
  `recette_id` varchar(50),
  `ingredient_id` varchar(50)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tag` (
  `tag_id` varchar(50)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tag_recette` (
  `tag_id` varchar(50),
  `recette_id` varchar(50)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `origine` (
  `origine_id` varchar(50),
  `description` longtext,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `recette`
  ADD CONSTRAINT `pk_recette` PRIMARY KEY (`recette_id`);
  ADD CONSTRAINT `fk_recette_origine` FOREIGN KEY (`origine_id`) REFERENCES `origine`(`origine_id`);

ALTER TABLE `ustensile`
  ADD CONSTRAINT `pk_ustensile` PRIMARY KEY (`ustensile_id`);

ALTER TABLE `ustensile_recette`
  ADD CONSTRAINT `pk_ustensile_recette` PRIMARY KEY (`recette_id`,`ustensile_id`);
  ADD CONSTRAINT `fk_ustensile` FOREIGN KEY (`ustensile_id`) REFERENCES `ustensile`(`ustensile_id`);
  ADD CONSTRAINT `fk_recette` FOREIGN KEY (`recette_id`) REFERENCES `recette`(`recette_id`);

ALTER TABLE `ingredient`
  ADD CONSTRAINT `pk_ingredient` PRIMARY KEY (`ingredient_id`);

ALTER TABLE `ingredient_recette`
  ADD CONSTRAINT `pk_ingredient_recette` PRIMARY KEY (`recette_id`,`ingredient_id`);
  ADD CONSTRAINT `fk_ingredient` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredient`(`ingredient_id`);
  ADD CONSTRAINT `fk_recette` FOREIGN KEY (`recette_id`) REFERENCES `recette`(`recette_id`);

ALTER TABLE `tag`
  ADD CONSTRAINT `pk_tag` PRIMARY KEY (`tag_id`);

ALTER TABLE `tag_recette`
  ADD CONSTRAINT `pk_tag_recette` PRIMARY KEY (`tag_id`,`recette_id`);
  ADD CONSTRAINT `fk_tag` FOREIGN KEY (`tag_id`) REFERENCES `tag`(`tag_id`);
  ADD CONSTRAINT `fk_recette` FOREIGN KEY (`recette_id`) REFERENCES `recette`(`recette_id`);

ALTER TABLE `origine`
  ADD CONSTRAINT `pk_origine` PRIMARY KEY (`origine_id`);