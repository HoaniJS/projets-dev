# Jeu des billes

## Contexte
Ce projet est le résultat d'un exercice fait à EFREI, visant à s'entraîner au JavaScript. L'objectif était de développer un jeu à deux joueurs basé sur une mécanique de retrait de billes.

## Installation
1. Cloner la branche
2. Ouvrir le fichier `index.php` dans un navigateur

## Règles
1. Le jeu commence avec un nombre défini de billes (saisi par les joueurs au démarrage).
2. Deux joueurs s’affrontent à tour de rôle.
  - Le joueur 1 commence.
3. À chaque tour, le joueur peut retirer 1, 2 ou 3 billes, mais pas le même nombre que celui retiré au tour précédent.
  - Exemple : si le joueur précédent a retiré 2 billes, le joueur suivant peut retirer 1 ou 3, mais pas 2.
4. Un joueur perd s’il ne peut plus jouer, soit :
  - parce qu’il ne reste plus de billes,
  - ou parce qu’il reste 1 bille et que le dernier coup retirait déjà 1.
