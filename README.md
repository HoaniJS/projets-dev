# Application web MVC Gilla

## Contexte
Ce projet est un des deux projets sur lesquels j'ai travaillé durant ma deuxième année de BTS SIO option SLAM au lycée Louis Armand, dans le cadre de l'épreuve U5.

Il s'agit d'une application web sécurisée de gestion de tickets d'incidents, développée en PHP avec un framework dit "Mini-MVC", similaire à Laravel.

Deux types d'utilisateurs sont pris en charge : les utilisateurs et les agents de maintenance.

Les utilisateurs peuvent signaler des incidents par un formulaire, en renseignant le type, la priorité, une description, le bâtiment et éventuellement la salle et le poste. L'accès au formulaire est précédé d'une liste des incidents ouverts, afin d'éviter les doublons. Chaque utilisateur peut également consulter la liste des incidents qu'il a signalés.

Les agents ont accès à la liste des incidents ouverts, avec la possibilité d'en prendre un en charge. Une fois un incident pris en charge, un agent peut en consulter les détails dans une liste d'incidents pris en charge, le commenter et le clôturer une fois l'incident résolu.

## Installation
1. Installer Laragon si nécessaire
2. Cloner la branche dans le sous-répertoire `www` du répertoire principal de Laragon (accessible par le bouton `Root` sur Laragon)
    - Vérifier que la branche active soit bien `louis-armand.gilla`
4. Lancer Laragon en appuyant sur le bouton `Start All`
5. Cliquer sur le bouton `Database`, puis sur la session `Laragon.MySQL` dans la fenêtre HeidiSQL nouvellement ouverte
6. Dans le menu `Fichier` de HeidiSQL, sélectionner `Exécuter un fichier SQL`, et ouvrir le fichier `gilla.sql` dans le répertoire du projet
7. Ouvrir l'application en cliquant sur `Menu` dans Laragon, puis `gilla` dans le menu déroulant `www`

## Identifiants de connexion
La base de données contient déjà des identifiants de connexion, permettant de tester l'application. Seuls ceux correspondant aux rôles d'utilisateur et d'agent donnent accès à des fonctionnalités exclusives sur le site (un administrateur peut également accéder à la route `\update-hash`, permettant seulement de mettre à jour le hash des mots de passe de chaque utilisateur).

Les identifiants (au format **adresse mail** / **mot de passe**) sont les suivants :
- utilisateur1@gilla.fr / utilisateur
- utilisateur2@gilla.fr / utilisateur
- agent1@gilla.fr / agent
- agent2@gilla.fr / agent
- responsable@gilla.fr / responsable
- admin@gilla.fr / admin
