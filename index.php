<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" />
    <title>Gestion de la souris</title>
    <script src="script.js" defer></script>
</head>
<body>
    <div>
        <h1>Gestion de la Souris</h1>
        <button id="toggle-rectangle">Cacher / Afficher le rectangle</button>
    </div>
    <br/>
    <div>
        <p>
            Appuyer sur le bouton ci-dessus affiche/cache le rectangle. Lorsque la souris 
            survole le rectangle, il devient rouge. Il reprend sa couleur bleue originale 
            quand la souris n'est plus dedans. Enfin, double-cliquer sur le rectangle 
            lui fait prendre une couleur verte.
        </p>
        <div class="rectangle"></div>
    </div>
</body>
</html>