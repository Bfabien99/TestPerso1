<?php
    ob_start();
?>
    <h1>
        Bienvenue sur Mon site de Gestion des propriétés immobiliers
    </h1>
<?php
    $content = ob_get_clean();
    require 'template.php';
?>