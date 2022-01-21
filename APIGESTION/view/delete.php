<?php
    ob_start();
?>
    <h1>
        Supprimé avec success.
    </h1>
<?php
    $content = ob_get_clean();
    require 'template.php';
?>