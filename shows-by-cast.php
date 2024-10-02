<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("util-db.php"); 
require_once("model-casts.php"); 
require_once("model-shows.php"); // Include the model to access getShowById

// Check if the show ID is provided via POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['show_id'])) {
    $show_id = $_POST['show_id']; 
    $casts = selectCastsByShow($show_id); 
} else {
    die("No show ID provided.");
}

// Fetch show details
$show = getShowById($show_id); // Get show details using the function

include "view-casts.php"; // Include the view for casts
?>
