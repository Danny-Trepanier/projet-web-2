Salut maxime !

## Première chose à faire, télécharger les packages et les dépendances

Commande: npm install

## Fin de la journée 1

La base de donnée est en place. Les relations entres les modèles sont en places. Le controlleur du cellier est terminé.
L'utilisateur peut créer son cellier, modifier le nom de son cellier et voir les bières qui se trouvent dans son cellier.
Intégration de Laravel Jetstream pour gagner du temps. Le visiteur peut désormais s'inscrire, se connecter et modifier ses informations.
Les validations des formulaires sont également faits.

## Fin de la journée 2

Installation de Laravel Nova. L'admin peut gérer les utilisateurs et les bouteilles. Le controlleur de la bouteille est terminé. 


## Correction
Correction effectuée au niveau de la table 
bottles_cellars. user_id devient cellar_id

Correction sur les modèles et controlleur Bottle & Cellar pour les relations N:M.
Correction sur les tables bottles_carts & bottles_cellars. 
Elles deviennent bottle_cart & bottle_cellar pour respecter la documentation.
