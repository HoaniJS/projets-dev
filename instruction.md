# 📝 Exercice – Générateur de citations (API + DOM + localStorage)

## 🎯 Objectif

Réaliser une mini-application en **vanilla JavaScript** qui :

-   Récupère une **citation aléatoire** depuis une API publique
    _(ex. [https://api.quotable.io/random](https://api.quotable.io/random))_
-   Permet de **charger une nouvelle citation** via un bouton
-   Permet de **sauvegarder des favoris** en `localStorage` et de les **supprimer**

### 📌 API d’exemple (gratuite) : Quotable

-   Citation aléatoire : [https://api.quotable.io/random](https://api.quotable.io/random)

---

## ✅ Spécifications minimales

-   Un bloc qui affiche **la citation** et **l’auteur**
-   Un bouton **« Nouvelle citation »**
-   En cas d’erreur (réseau / API), afficher un **message d’erreur** et proposer un bouton **Réessayer**
-   Un bouton **« Ajouter aux favoris »** qui stocke la citation dans `localStorage`
-   Un **panneau Favoris** listant les citations sauvegardées (texte + auteur + bouton **Supprimer**)
-   Les favoris doivent **persister** après rechargement de la page
