<?php
    $property = json_decode(file_get_contents("http://localhost/Testperso1/APIGESTION/view/updateProperty/".$_GET["id"]));
    ob_start();
?>
    <h1>
        Modifier les informations de l'immobilier <em><?= $property->id ;?></em>
    </h1>
   
        <form action="">
            <div class="group">
                <label for="owner">Proprio</label><input type="text" name="owner" value="<?= $property->owner ;?>">
            </div>
            <div class="group">
                <label for="owner">Tel</label><input type="tel" name="owner" value="<?= $property->tel ;?>">
            </div>
            <div class="group">
                <label for="owner">Superficie</label><input type="number" name="owner" value="<?= $property->area ;?>">
            </div>
            <div class="group">
                <label for="owner">Localité</label><input type="text" name="owner" value="<?= $property->location ;?>">
            </div>
            <div class="group">
                <label for="owner">Prix</label><input type="number" name="owner" value="<?= $property->price ;?>">
            </div>
            <div class="group">
                <label for="owner">Details</label><input type="text" name="owner" value="<?= $property->details ;?>">
            </div>
            <input type="submit" value="Envoyer" name="submit">
        </form>


<?php
    $content = ob_get_clean();
    require 'template.php';
?>