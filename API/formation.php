
<?php
$formation=json_decode(file_get_contents('http://localhost/Testperso1/API/formation/'.$_GET['id']));
    // print_r($formations);
    ob_start();
?>
    <h1>
    <?= $formation->libelle; ?>
    </h1>
    <section>
        <h3>
            <em>description :</em><?= $formation->description; ?>
        </h3>
        <h4>
            <em>prix :</em><?= number_format($formation->prix, 2, ',', ' '); ?> Euros.
        </h4>
    </section>

<?php
    $content = ob_get_clean();
    require 'template.php';
?>