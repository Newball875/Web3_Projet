insert into origine(nom,description)
values ("Game of thrones","série TV");

insert into recette(nom,instructions,origine_id)
values ("Pancake Moelleux","    Étape 1

    Faire fondre le beurre, dans une casserole à feu doux ou dans un bol au micro-ondes.
    Étape 2

    Mettre la farine, la levure et le sucre dans un saladier. Mélanger et creuser un puits.
    Étape 3

    Ajouter ensuite les oeufs entiers et fouetter l'ensemble.
    Étape 4

    Incorporer le beurre fondu, fouetter puis délayer progressivement le mélange avec le lait afin d'éviter les grumeaux.
    Étape 5

    Laisser reposer la pâte au minimum 1 heure au réfrigérateur.
    Étape 6

    Dans une poêle chaude et légèrement huilée, faire cuire comme des crêpes, mais en les faisant plus petites. Réserver au chaud et déguster.",1);

insert into ingredient(nom)
values  ("Farine"),
        ("Sucre semoule"),
        ("Levure"),
        ("Beurre doux"),
        ("Sel"),
        ("Oeuf"),
        ("Lait");

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
