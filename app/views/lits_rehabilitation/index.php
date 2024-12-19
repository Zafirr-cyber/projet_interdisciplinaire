<!DOCTYPE html>
<html>
<head>
    <title>Lits de Réhabilitation</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <h1>Liste des lits de réhabilitation</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Disponible</th>
            <th>Type</th>
            <th>Date de Création</th>
            <th>Date de Modification</th>
        </tr>
        <?php if (isset($lits) && !empty($lits)):
            foreach ($lits as $lit): ?>
        <tr>
            <td><?php echo $lit['lit_id']; ?></td>
            <td><?php echo $lit['disponible']; ?></td>
            <td><?php echo $lit['type_lit']; ?></td>
            <td><?php echo $lit['date_creation']; ?></td>
            <td><?php echo $lit['date_modification']; ?></td>
        </tr>
        <?php endforeach; else: ?>
        <tr>
            <td colspan ="5" class = "no-data">Aucun lits n'a été trouvé</td>
        </tr>
            <?php endif; ?>
    </table>
</body>
</html>