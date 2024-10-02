<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("util-db.php");  
require_once("model-cast.php");
require_once("model-shows.php");

$pageTitle = "Shows Cast"; 
include "view-header.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['show_id'])) {
    $show_id = $_POST['show_id']; 
    $casts = selectCastsByShow($show_id); 
    $show = getShowbyId($show_id);
} else {
    die("No show ID provided.");
}

include "view-show-by-cast.php";
include "view-footer.php"; // Include the view for casts
?>
