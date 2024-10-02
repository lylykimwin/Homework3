<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("model-direc-shows.php");
require_once("model-shows.php");

$pageTitle = "Directors with Shows"; 
include "view-header.php"; 

$directors = selectDirectors(); 
include "view-direc-shows.php";
include "view-footer.php";
?>
