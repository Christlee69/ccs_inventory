<?php

if (isset($_POST['addOption'])) {
    $option = $_POST['options'];
    $optionsList[] = $option;
}
?>
<?php 
if (!empty($optionsList)) {
    echo "<h2>Selected Options:</h2>";
    echo "<ul>";
    foreach ($optionsList as $option) {
        echo "<li>$option</li>";
    }
    echo "</ul>";
}
?>