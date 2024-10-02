<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("util-db.php"); 
require_once("model-casts.php"); 

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $show_id = $_POST['show_id']; 
    $casts = selectCastsByShow($show_id); 
} else {

    die("No show ID provided.");
}
include "view-casts.php";
?>
