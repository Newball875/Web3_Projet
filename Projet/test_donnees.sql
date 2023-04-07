INSERT INTO `recette` (`recette_id`, `nom`, `description`, `instructions`, `image`, `difficulte`, `origine_id`) VALUES (NULL, 'Pancakes', 'De bons pancakes', 'Fais', 'pancakes.jpg', '1', NULL);

insert into origine(nom,description,image)
values ("Game of thrones","série TV","GoT.jpg");

insert into recette(nom,instructions,origine_id,image)
values ("Pancake Moelleux","    Étape 1\n

    Faire fondre le beurre, dans une casserole à feu doux ou dans un bol au micro-ondes.\n
    Étape 2\n

    Mettre la farine, la levure et le sucre dans un saladier. Mélanger et creuser un puits.\n
    Étape 3\n

    Ajouter ensuite les oeufs entiers et fouetter l'ensemble.\n
    Étape 4\n

    Incorporer le beurre fondu, fouetter puis délayer progressivement le mélange avec le lait afin d'éviter les grumeaux.\n
    Étape 5\n

    Laisser reposer la pâte au minimum 1 heure au réfrigérateur.\n
    Étape 6\n

    Dans une poêle chaude et légèrement huilée, faire cuire comme des crêpes, mais en les faisant plus petites. Réserver au chaud et déguster.",1,"pancake_moelleux.png");

insert into ingredient(nom,image)
values  ("Farine","farine.png"),
        ("Sucre semoule","sucre_semoule.png"),
        ("Levure","levure.png"),
        ("Beurre doux","beurre_doux.png"),
        ("Sel","sel.png"),
        ("Oeuf","oeuf.png"),
        ("Lait","lait.png");

insert into ingredient_recette(recette_id,ingredient_id)
values  (1,1),
        (1,2),
        (1,3),
        (1,4),
        (1,5),
        (1,6),
        (1,7);

insert into tag(nom)
values  ("Dessert"),
        ("Crêpe");

insert into tag_recette(tag_id,recette_id)
values  (1,1),
        (2,1);
