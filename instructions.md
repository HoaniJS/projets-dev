# Mini-projet React (Vite) — **chuck-norris**

> **Énoncé uniquement — aucun extrait de solution ni d’URL fournie.**

## 🎯 Objectifs pédagogiques

-   Utiliser **React** (hooks `useState`, `useEffect`) avec **Vite**.
-   Réaliser un **appel API** pour récupérer une blague aléatoire.
-   Gérer la **navigation** via **React Router** (2 pages).
-   **Persister** des données en **`localStorage`** (favoris).
-   Concevoir une **UI simple, robuste** (loading, erreurs).

---

## 📝 Description

Construire une application React nommée **`chuck-norris`** qui permet :

1. D’afficher une **punchline** aléatoire de Chuck Norris.
2. De demander une **nouvelle** punchline via un bouton.
3. D’**ajouter/retirer** la punchline affichée aux **favoris** (stockés en `localStorage`).
4. De consulter une page **Favoris** listant toutes les punchlines sauvegardées.

> **Note :** utilisez une **API publique** de blagues Chuck Norris (endpoint “random”). **Recherchez l’URL vous-même.**

---

## 🗺️ Parcours utilisateur (User Stories)

-   **US1** : En tant qu’utilisateur, je vois une punchline aléatoire au chargement de la page d’accueil.
-   **US2** : Je peux cliquer sur « **Nouvelle blague** » pour charger une autre punchline.
-   **US3** : Je peux **ajouter** la punchline courante aux **favoris**, puis **la retirer** si elle y est déjà.
-   **US4** : Mes **favoris** sont **persistés** entre les rechargements via `localStorage`.
-   **US5** : Je peux consulter la page **Favoris** depuis un lien/menu.
-   **US6** : Depuis la page **Favoris**, je peux **supprimer** un favori (au moins individuellement).

---

## 🔧 Contraintes techniques

-   Outil : **Vite** (template React).
-   Routing : **React Router** (au minimum 2 routes : `/` et `/favorites`).
-   **Aucune** librairie de state management externe.
-   État UI à gérer :

    -   **Chargement** pendant la requête.
    -   **Erreur** si l’appel échoue (message + action de réessai).

-   **Accessibilité minimale** : texte de blague annoncé (`aria-live="polite"`), désactivation des boutons en chargement, libellés explicites.

---

## 🖥️ Pages à réaliser

### 1) `Home` (`/`)

-   Affiche la **punchline courante**.
-   Boutons :

    -   **Nouvelle blague** → relance un appel API.
    -   **Ajouter aux favoris** / **Retirer des favoris** (affichage conditionnel).

-   États :

    -   **Loading** (squelette/placeholder ou spinner).
    -   **Erreur** (message + bouton **Réessayer**).

### 2) `Favorites` (`/favorites`)

-   Affiche la **liste** des punchlines favorites (texte + actions).
-   Actions requises :

    -   **Supprimer** un favori.

-   États :

    -   **Vide** : message indiquant qu’aucun favori n’a été ajouté.

-   (Optionnel) Actions bonus :

    -   **Vider tous** les favoris (avec confirmation).
    -   Lien « **Source** » (si l’API fournit une URL par blague).

### 3) Navigation

-   Un composant de **menu** avec deux liens : **Accueil** et **Favoris**.
-   Le lien actif doit être identifiable (style ou attribut aria).

---

## 🗃️ Persistance (exigences)

-   Stockage via **`localStorage`** sous une **clé unique** dédiée.
-   **Format libre**, mais chaque favori doit permettre au minimum :

    -   d’identifier **de manière unique** une blague (id) ;
    -   d’afficher le **texte** de la blague.

-   Gestion des doublons : **interdits** (la même blague ne doit pas être ajoutée plusieurs fois).

---

## ✅ Critères d’acceptation

-   [ ] Une **punchline** s’affiche au premier rendu de la page d’accueil.
-   [ ] Le bouton **Nouvelle blague** charge une punchline différente (si l’API renvoie une nouvelle).
-   [ ] Le bouton **Ajouter/Retirer** modifie l’état **et** la persistance (`localStorage`).
-   [ ] Après **rechargement**, les **favoris** sont toujours présents.
-   [ ] La page **Favoris** liste correctement les éléments stockés.
-   [ ] La **suppression** d’un favori est reflétée immédiatement et persiste après reload.
-   [ ] Les états **loading** et **erreur** sont visibles et fonctionnels.
-   [ ] UX : boutons désactivés pendant le chargement, messages clairs, liens de navigation opérationnels.

---

## 📦 Livrables attendus

-   Projet **Vite** fonctionnel nommé **`chuck-norris`**.
-   Un **README** (quelques lignes) expliquant :

    -   comment lancer le projet ;
    -   un bref résumé des choix techniques ;
    -   la clé `localStorage` utilisée et le format stocké.

---

## 🧭 Pistes de réalisation (sans solution)

1. Créer le projet Vite, installer le router, structurer deux pages.
2. Mettre en place les **états** (blague, loading, erreur).
3. Implémenter l’**appel API** (random).
4. Ajouter le **toggle favori** et la persistance `localStorage`.
5. Construire la page **Favoris** et les actions de suppression.
6. Soigner les **états vides/erreurs** et l’accessibilité.

---

## 🌟 Bonus (optionnels)

-   Bouton **Copier** la blague dans le presse-papiers.
-   **Recherche/filtre** dans la page Favoris.
-   **Compteur** de favoris dans le menu.
-   **Tests unitaires** de la logique de favoris.
-   **Animations légères** (apparition de la blague, feedback d’ajout).

---




