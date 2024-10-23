
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("util-db.php");
require_once("model-genres.php");

$pageTitle = "Genres"; 
include "view-header.php"; 

$genres = selectGenres(); 
include "view-genres.php";
include "view-footer.php";
?>
