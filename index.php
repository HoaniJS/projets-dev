<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Randomizer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="position-absolute top-50 start-50 translate-middle text-center">
        <h1>!!! Randomizer !!!</h1>
        <p>Cliquez pour sélectionner un élément au hasard parmi ceux du fichier "list.txt"</p>
        <form action="randomizer.php" method="POST">
            <p><button type="submit" name="action" value="display" class="btn btn-primary">Tirer un élément</button></p>
            <p class="fw-bold">
		<h4 class="fw-bold">
                    <?php
                    if(isset($_POST['item'])){
                        echo $_POST['item'];
                    };
                    ?>
		</h4>
            </p>
            <input type="hidden" name="line" value="
                <?php
                if(isset($_POST['line'])){
                    echo $_POST['line'];
                };
                ?>
                "/>
            <button type="submit" name="action" value="delete" class="btn btn-primary"
                <?php
                if(!isset($_POST['line'])){
                    echo ' disabled';
                };
                ?>
                >Supprimer l'élément de la liste</button>
        </form>
    </div>
</body>
</html>