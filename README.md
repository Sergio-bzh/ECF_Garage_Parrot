# ECF_Garage_Parrot
J'ai réalisé ce projet dans le cadre de mon Evaluation en Cours de Formation et vous trouverez le tableau ayant servi à son organisation et suivi ci-après : 
## - _[Trello du projet](https://trello.com/b/hfWvDwmv/ecfgarageparrot)_

## Pré-requis pour utiliser ce projet sur votre poste:
- GIT
- PHP
  - Symfony-cli (non obligatoire mais fortement recommandés)
- Composer
- IDE (PHPStorm ou autre) ou Editeur de texte avancé (par éxemple VSCode)
- NodeJS
  - yarn ou nmp
- SGBD**R** (J'ai utilisé MySQL mais vous pouvez utiliser MariaDB)

## Pour installer ce projet en local :
### Rappatrier le projet depuis le dépôt distant:
- git init
- git add origin https://github.com/Sergio-bzh/ECF_Garage_Parrot.git
- git fetch
- git checkout main

ou

- git clone https://github.com/Sergio-bzh/ECF_Garage_Parrot.git

### Installer localement le projet :
- Se positionner dans le dossier du projet
- Créer votre fichier d'environnement env.local (à la racine du projet) avec les informations de connexion à votre base des donées et le type d'environnement sur lequel vous souhaitez travailler (par exemple dev) 
- Exécuter la commande "**composer install**"
- Exécuter la commande "**yarn install**" (ou "npm install")
  - yarn install (lors de mon test sur GNU/Linux il a fallu mettre à jour la version de nodejs et installer yarn en global)
- Créer la base de données avec : 
  - **symfony console doctrine:database:create** (_possible aussi avec **php bin/console** si vous n'avez pas installé symfony-cli_)
  - Ou directement via une interface graphique (tel que PhpMyAdmin)
- Créez les tables dans la BDD (appliquer les migrations) avec :
  - **symfony console doctrine:migrations:migrate**
- Importer le jeu de données du fichier .sql qui se trouve dans le sous-dossier "SQL" du dossier "annexes" avec :
  - **mysql -u root -p nom_de_votre_bdd < annexes/SQL/jeu_de_donnees.sql**
  - _ATTENTIION ! : Si vous utilisez un outil graphiphique tel que MySQLWorkbench pensez à selectionner la base des donnés cible avant de lancer le script MySQL ci-dessus_
#### _Si vous le souhaitez, vous pouvez peupler manuellement votre base des données_

### Lancez le serveur serveur Web et Yarn watch (ENV=dev)
- symfony console serve:start
- yarn watch
### Vous pouvez utiliser ce projet avec les comptes présents dans le jeu de données
- Compte admin :
  - Login : admin@garage-parrot.com
  - Mot de passe : Studi2023!
- Compte employé : 
  - Login : employee@garage-parrot.com
  - Mot de passe : password
#### _Merci pour l'intérêt que vous prêtez à mon projet_
