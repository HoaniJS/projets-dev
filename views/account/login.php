<div class="container mt-5">
    <div class="row">
        <div class="card">
            <div class="card-body text-center">
                <main class="form-signin">
                    <form method="POST" action="/connexion">
                        <h3>Connexion</h3>

                        <div class="form-floating">
                            <input name="login" type="email" class="form-control" id="floatingInput" placeholder="Email">
                            <label for="floatingInput">Adresse mail</label>
                        </div>
                        <div class="form-floating mt-2">
                            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe">
                            <label for="floatingPassword">Mot de passe</label>
                        </div>

                        <button class="w-100 mt-5 btn btn-lg btn-primary" type="submit">Connexion</button>
                    </form>
                </main>
            </div>
        </div>
    </div>
</div>
