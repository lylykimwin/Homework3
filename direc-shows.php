<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("util-db.php");
require_once("model-direc-shows.php");

$pageTitle = "Directors with Shows"; 
include "view-header.php"; 

$directors = selectDirectors(); 
include "view-direc-shows.php";
include "view-footer.php";
?>
