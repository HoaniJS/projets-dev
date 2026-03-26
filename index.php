<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Application JS avec JSONPlaceholder</title>
</head>
<body>
    <header class="bg-dark p-4 text-white">
        <h1 class="text-center">Application de posts</h1>
    </header>
    <main>
        <div class="row p-3">
            <div class="col-sm-4 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Utilisateurs</h5>
                        <ul class="list-group" id="users">
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 postsCard">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" id="userName">Posts</h5>
                        <ul class="list-group" id="posts">
                            <div class="post">Choisissez un utilisateur à gauche</div>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 postCard d-none">
                <div class="card">
                    <div class="card-body">
                        <span class="return">← Liste des posts</span>
                        <div class="mt-2 mx-3">
                            <h5 class="card-title" id="postTitle">Titre du post</h5>
                            <h6 id="postAuthor">Auteur du post</h6>
                            <p class="card-text" id="postText">
                                Texte du post
                            </p>
                            <ul class="list-group list-group-flush" id="comments">
                                <li class="list-group-item"><h5 class="card-title">Commentaires<h5></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>