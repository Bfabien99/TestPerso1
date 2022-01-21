<?php
    $property = json_decode(file_get_contents("http://localhost/Testperso1/APIGESTION/view/showProperty/".$_GET["id"]));
    ob_start();
?>
    <h1>
        Information de l'immobilier de <em><?= $property->owner ;?></em>
    </h1>
   
        <div class="center">
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
        </div>


<?php
    $content = ob_get_clean();
    require 'template.php';
?>