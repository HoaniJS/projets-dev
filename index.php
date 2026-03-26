<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Carrousel</title>
</head>
<body>
    <header class="bg-dark p-4 text-white">
        <h1 class="text-center">Sliders</h1>
    </header>

    <button class="btn btn-outline-success mt-5" id="toolbar-toggle">
        Afficher/Cacher
    </button>

    <div id="toolbar" class="text-center">
        <button id="slider-previous"><i class="fa-solid fa-backward"></i></button>
        <button id="slider-toggle"><i class="fa-solid fa-play"></i></button>
        <button id="slider-next"><i class="fa-solid fa-forward"></i></button>
        <button id="slider-random"><i class="fa-solid fa-random"></i></button>

        <figure id="slider" class="slider">
            <img src="img/ball.jpg" alt="Screaming Tennis Ball">
            <figcaption>Screaming Tennis Ball</figcaption>
        </figure>
    </div>
</body>
</html>