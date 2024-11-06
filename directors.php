<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("util-db.php");
require_once("model-directors.php");

$pageTitle = "Directors"; 
include "view-header.php"; 

$directors = selectDirectors(); 
include "view-directors.php";
include "view-footer.php";
?>

<script src="scripts.js"></script> <!-- Replace 'path/to/' with the actual path -->
</body>
</html>
