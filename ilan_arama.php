<?php

include("admin/functions.php");

userbaglanti();

$row = siteinfocek();

include("templates/tema2/header.html");

include("templates/tema2/ilan_arama.html");
$row = siteinfocek();
include("templates/tema2/footer.html");

?>