# Introduction à Express.js

## Contexte
Ce projet est le résultat d'un exercice fait à EFREI, visant à découvrir Express.js.

L'objectif était de créer des routes HTTPS et de réaliser un CRUD complet.

## Installation
1. Cloner la branche
2. Accéder au répertoire depuis la console
3. Entrer les commandes suivantes :
    - `npm install express`
    - `npm install -D nodemon`
4. Entrer la commande `npm run dev` et accéder à l'adresse affichée par la console

## Routes HTTPS
Les routes HTTPS suivantes sont accessibles sur le site :
- `GET /api/users`
- `GET /api/users/:id`
- `POST /api/users`
- `PUT /api/users/:id`
- `DELETE /api/users/:id`

Il est également possible de filtrer les utilisateurs de 2 façons différentes :
- `GET /api/users?q=[string]`, avec `[string]` une partie d'un nom d'utilisateur
- `GET /api/users?minAge=[int]`, avec `[int]` un âge minimum des utilisateurs affichés
