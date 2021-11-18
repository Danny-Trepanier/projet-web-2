## Première chose à faire, télécharger les packages et les dépendances

Commande: npm install

## Étapes pour git Pull/Push
git checkout <branche>
git pull origin developpement
git push origin <ma-branche>:developpement
git add <file>
git commit -m "commentaire"
git rm <file>
git reset -- <file>
get checkout -- <file>

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

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[CMS Max](https://www.cmsmax.com/)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**
- **[Romega Software](https://romegasoftware.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

Correction sur les modèles et controlleur Bottle & Cellar pour les relations N:M.
Correction sur les tables bottles_carts & bottles_cellars. 
Elles deviennent bottle_cart & bottle_cellar pour respecter la documentation.

