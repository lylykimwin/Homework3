<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("util-db.php");
require_once("model-casts.php");

$pageTitle = "Cast Information"; 
include "view-header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['show_id'])) {
    $show_id = $_POST['show_id']; // Get the show_id from the POST request
    $casts = selectCastsByShow($show_id); 
    include "view-casts.php"; 
} else {
    echo "No show selected.";
}

include "view-footer.php"; // Include the footer file
?>
