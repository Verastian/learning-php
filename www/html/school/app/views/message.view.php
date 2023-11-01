<?php include("layouts/header.view.php");
print '<div class="alert ' . $data["color"] . '" mt-3>';
print '<h4>' . $data["text"] . '</h4>';
print '</div>';
print '<a href="' . RUTA . $data["url"] . '" class="btn ' . $data["colorButton"] . '">';
print $data["textButton"] . '</a>';
include("layouts/footer.view.php");

?>