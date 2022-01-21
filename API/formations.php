
<?php
$formations=json_decode(file_get_contents('http://localhost/Testperso1/API/formations'));
    // print_r($formations);
    ob_start();
?>
    <h1>
        Toutes nos formations
    </h1>
    <table class="table">
        <tr>
            <td>Id</td>
            <td>Libellé</td>
            <td>Description</td>
            <td>Prix</td>
        </tr>
        <?php foreach($formations as $formation):?>
            <tr>
                <td><?= $formation->id; ?></td>
                <td><a href="formation.php?id=<?= $formation->id; ?>"><?= $formation->libelle; ?></a></td>
                <td><?= $formation->description; ?></td>
                <td><?= $formation->prix; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

<?php
    $content = ob_get_clean();
    require 'template.php';
?>