# Instructions du projet React My Movie 🎬

## Création du projet

-   Créer une application React avec Vite nommée my-movie.
-   Installer et configurer TailwindCSS.

## Structure des pages

Créer 2 pages :

-   Home
-   Favorite

## Navigation

-   Installer le système de router de React.
-   Mettre en place une NavBar avec un menu pour accéder aux deux pages.

## Page Home

Ajouter un formulaire de recherche :

-   L’input doit être contrôlé (gestion de l’état lors du changement de valeur).

-   À la soumission du formulaire, trier les cards de films affichées.

-   Afficher une liste de films en utilisant un composant MovieCard.

## Composant MovieCard

Props : un objet movie contenant :

movie.path
movie.title
movie.release_date

```
Structure attendue :
div
├─ img
├─ button 💓
└─ div
├─ h3
└─ p
```

```javascript
const movies = [
    { path: 'inception.jpg', title: 'Inception', release_date: '2010-07-16' },
    { path: 'interstellar.jpg', title: 'Interstellar', release_date: '2014-11-07' },
    { path: 'matrix.jpg', title: 'The Matrix', release_date: '1999-03-31' },
    { path: 'dark-knight.jpg', title: 'The Dark Knight', release_date: '2008-07-18' },
    { path: 'pulp-fiction.jpg', title: 'Pulp Fiction', release_date: '1994-10-14' },
    { path: 'fight-club.jpg', title: 'Fight Club', release_date: '1999-10-15' },
    { path: 'forrest-gump.jpg', title: 'Forrest Gump', release_date: '1994-07-06' },
    { path: 'gladiator.jpg', title: 'Gladiator', release_date: '2000-05-05' },
    {
        path: 'lord-rings-fellowship.jpg',
        title: 'The Lord of the Rings: The Fellowship of the Ring',
        release_date: '2001-12-19',
    },
    { path: 'lord-rings-king.jpg', title: 'The Lord of the Rings: The Return of the King', release_date: '2003-12-17' },
    { path: 'star-wars.jpg', title: 'Star Wars: A New Hope', release_date: '1977-05-25' },
    { path: 'empire-strikes.jpg', title: 'Star Wars: The Empire Strikes Back', release_date: '1980-05-21' },
    { path: 'avengers.jpg', title: 'The Avengers', release_date: '2012-05-04' },
    { path: 'avatar.jpg', title: 'Avatar', release_date: '2009-12-18' },
    { path: 'titanic.jpg', title: 'Titanic', release_date: '1997-12-19' },
    { path: 'jurassic-park.jpg', title: 'Jurassic Park', release_date: '1993-06-11' },
    { path: 'shawshank.jpg', title: 'The Shawshank Redemption', release_date: '1994-09-23' },
    { path: 'goodfellas.jpg', title: 'Goodfellas', release_date: '1990-09-19' },
    { path: 'joker.jpg', title: 'Joker', release_date: '2019-10-04' },
    { path: 'spiderman.jpg', title: 'Spider-Man: No Way Home', release_date: '2021-12-17' },
];
```
