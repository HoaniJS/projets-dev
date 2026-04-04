# API MVC Express avec POO

## Contexte
Ce projet est le résultat d'un exercice fait à EFREI, visant à s'entraîner à la maîtrise de Express.js.

L'objectif était de structurer une API Express en MVC minimal avec un CRUD dans le Modèle et de pratiquer la POO en JavaScript

## Installation
1. Cloner la branche
2. Accéder au répertoire depuis la console
3. Entrer les commandes suivantes :
    - `npm install express`
    - `npm install -D nodemon`
4. Entrer la commande `npm run dev` et accéder à l'adresse affichée par la console

## Routes HTTPS
Les routes HTTP suivantes sont accessibles sur le site :
- `GET /api/products` (filtres : `q`, `minPrice`, `maxPrice`, `limit`, `offset`)
- `GET /api/products/:id`
- `POST /api/products` (`name` et `price` requis)
- `PUT /api/products/:id`
- `PATCH /api/products/:id` (`name` ou `price`)
- `DELETE /api/products/:id`
