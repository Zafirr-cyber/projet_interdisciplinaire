<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un equipement</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <a href="index.php" class="back-button">← Retour à la liste des equipements</a>
    <h1>Ajouter un equipement</h1>

    <form action="create.php" method="post">
        <label for="type_lit">type_lit:</label>
        <select name="type_lit" id="type_lit" required>
        <option value="standard">standard</option>
        <option value="intensif">intensif</option>
        <option value="pediatrique">pediatrique</option>
        </select>
        <br>
        <label for="disponible">disponible:</label>
        <textarea id="disponible" name="disponible" required></textarea>
        <br>
        <label for="date_modification">date_modification:</label>
        <input type="date" id="date_modification" name="date_modification" required>
        <br>
        <label for="date_creation">date_creation:</label>
        <input type="date" id="date_creation" name="date_creation" required>
        <br>
        <button type="submit">Ajouter</button>
    </form>

    <?php
    require_once '../../models/LitsRehabilitation.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $personnel = new LitsRehabilitation();
        $personnel->type_lit = $_POST['type_lit'];
        $personnel->disponible = $_POST['disponible'];
        $personnel->date_modification = $_POST['date_modification'];
        $personnel->date_creation = $_POST['date_creation'];
        if ($personnel->create()) {
            header("Location: index.php");
            exit();
        } else {
            echo "<p class='error'>Erreur lors de l'ajout du lit.</p>";
        }
    }
    ?>
</body>
</html>

$lit_id;
    public $disponible;
    public $type_lit;
    public $date_creation;
    public $date_modification;
