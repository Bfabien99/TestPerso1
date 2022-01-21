<?php
    // $allPropertys = json_decode(file_get_contents("http://192.168.64.2/Testperso1/APIGESTION/view/allProperty"));
    ob_start();
?>
    <h1>
        Liste de toutes les propriétés immobilieres
    </h1>
    <div class="content">
    <?php foreach ($allPropertys as $property):?>
        <div class="box">
            <img src="" alt="photo.png" width="100%">
            <div class="group">
                <em>Id :</em> <h3><?= $property->id ;?></h3>
            </div>
            <div class="group">
                <em>Proprio :</em> <h3><?= $property->owner ;?></h3>
            </div>
            <div class="group">
                <em>Prix :</em> <h3><?= $property->price ;?></h3>
            </div>
            <div class="group">
                <em>Superficie :</em> <h3><?= $property->area ;?></h3>
            </div>
            <div class="group">
                <em>Localisation :</em> <h3><?= $property->location ;?></h3>
            </div>
            <div class="group">
                <a href="/TestPerso1/APIGESTION/property/delete/<?= $property->id ;?>/" class="delete" >supp</a>
                <a href="update.php?id=<?= $property->id ;?>" class="update" >modif</a>
                <a href="/TestPerso1/APIGESTION/property/<?= $property->id ;?>/" class="show" >voir</a>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
<?php
    $content = ob_get_clean();
    require 'template.php';
?>