<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("util-db.php");
require_once("model-casts.php");

$pageTitle = "Cast"; // Set the page title
include "view-header.php"; // Include the header file

$casts = selectCasts(); // Fetch directors from the database
include "view-casts.php"; // Include the view file to display directors
include "view-footer.php"; // Include the footer file
?>
