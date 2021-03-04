# Exercice Les fonctionnalitées attendues sont les suivantes :  

-   Les annonces sont accessibles via un lien dans le menu principale

-   Un utilisateur peut ajouter / editer / supprimer ses annonces

-   Un utilisateur peut ajouter / editer / supprimer ses commentaires

-   Une page doit contenir l'ensemble des annonces qui possède le champs enabled à true. Il doit être possible de filtrer les annonces grâce a un champs de recherche de type text qui sera basé sur le title d'une annonce.

-   Les commentaires seront visibles sur le détail d'une annonce

-   Sur la vue de detail d'une annonces séparer le code HTML correspondant aux annonces et aux commentaires dans des fichiers differents

-   Un administrateur peut masquer un commentaire ou une annonce en mettant le champ enabled a false

ATTENTION :

-   Chaque route doit être proteger si elle le nécessite

-   Chaque données recu par un utilistaeur doit etre verifiée

# Model de données Une annonce peut etre définie par les champs suivant   

-   title (text)

-   content (text)

-   price (float)

-   user_id (int)

-   enabled (bool) default true

-   created_at (datetime)

-   updated_at (datetime)

# Un commentaire quand à lui est définie par :

-   content (text)

-   enabled (bool) par defaut true

-   user_id (int)

-   annoucement_id (int)

-   created_at (datetime)

-   updated_at (datetime)

# Decoupage des taches Création des migrations des tables annoucements / comments

Creation de Seeder

Création des Factory

Creation des Models

Creation des Controllers

Creation de vues (Le design n'est pas important)

Supplement : Mise en place des tests
