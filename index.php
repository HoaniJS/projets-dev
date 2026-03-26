<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        #barre{
            width: 100%;
            height: 100%;
            background-color: rgb(203, 192, 189);
            border-radius: 20px;
        }

        
        #progress{
            width: 0%;
            height: 20px;
            background-color: rgb(14, 28, 227);
            border-radius: 20px;
        }
    </style>
    <title>Inscription</title>
</head>
<body>
    <header class="bg-dark p-4 text-white">
        <h1 class="text-center">Entrez vos noms</h1>
    </header>

    <main class="container-fluid">
        <div class="my-4 py-4 d-none text-center fs-1" id="fin">
            Fin du jeu !<br><strong id="gagnant">[redacted]</strong> a remporté la partie !
        </div>

        <div class="card my-4 py-4 d-none" id="jeu">
            <div class="p-4 text-center fs-1" id="billes">🟢</div>
            <div class="px-4">Au tour de <strong id="joueurActif">[redacted]</strong></div>
            <div class="px-4" id="cp">Coup précédent : 0</div>
            <div class="px-4" id="br">Billes restantes : 10</div>
            <div class="d-flex gap-3 p-4">
                <button class="btn btn-primary" data-bille="1">Prendre 1</button>
                <button class="btn btn-primary" data-bille="2">Prendre 2</button>
                <button class="btn btn-primary" data-bille="3">Prendre 3</button>
            </div>

            <div id="barre">
                <div id="progress"></div>
            </div>
        </div>

        <div class="card my-4 py-4" id="form">
            <div class="row g-3 px-4">
                <div class="col-md-6">
                    <h2>Joueur 1</h2>
                </div>
                <div class="col-md-6">
                    <h2>Joueur 2</h2>
                </div>
            </div>
            <form action="" class="row g-3 px-4">
                <div class="col-md-6">
                    <label for="prenom1" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom1">
                </div>
                <div class="col-md-6">
                    <label for="prenom2" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom2">
                </div>
                <div class="col-md-6">
                    <label for="nom1" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom1">
                </div>
                <div class="col-md-6">
                    <label for="nom2" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom2">
                </div>
                <div class="col d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary" id="submit">Commencer</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>