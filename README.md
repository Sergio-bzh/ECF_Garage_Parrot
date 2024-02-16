# ECF_Garage_Parrot
Le projet Garage Parrot a été fait dans le cadre de mon Evaluation en Cours de Formation.

## Pré-requis pour utiliser ce projet sur votre poste:
- GIT
- PHP
  - Symfony-cli (non obligatoire mais fortement recommandés)
- Composer
- IDE (PHPStorm ou autre) ou Editeur de texte avancé (par éxemple VSCode)
- NodeJS
  - yarn ou nmp
- SGBD**R** (J'ai utilisé MySQL mais vous pouvez utiliser MariaDB, PostgreSQL ou tout autre)

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
  - yarn install (lors de mon test pour l'écriture de ce fichier il m'a fallu la lancer deux fois)
- Créer la base de données avec : 
  - **symfony console doctrine:database:create** (_possible aussi avec **php bin/console** si vous n'avez pas installé symfony-cli_)
  - Ou directement via une interface graphique (tel que PhpMyAdmin)
- Créez les tables dans la BDD (appliquer les migrations) avec :
  - **symfony console doctrine:migrations:migrate**
- Importer le jeu de données du fichier .sql qui se trouve dans le sous-dossier "SQL" du dossier "annexes" (ou créez votre propre ensemble des données) dans votre SGBD

### Lancez le serveur serveur Web et Yarn watch (ENV=dev)
- symfony console serve:start
- yarn watch

#### _Merci pour l'intérêt que vous prêtez à ce projet_
