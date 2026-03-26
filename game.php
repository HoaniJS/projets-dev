<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Jeu de billes</title>
</head>
<body>
    <?php
        $j1 = $_POST['first-name1'] . " " . $_POST['last-name1'];
        $j2 = $_POST['first-name2'] . " " . $_POST['last-name2'];
    ?>

    <header class="bg-dark p-4 text-white">
        <h1 class="text-center">Jeu de billes</h1>
    </header>

    <h1 class="text-center pt-2">Au tour de <?php echo $j1; ?></h1>
</body>
</html>