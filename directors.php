<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("util-db.php");
require_once("model-directors.php");

$pageTitle = "Directors"; // Set the page title
include "view-header.php"; // Include the header file

$directors = selectDirectors(); // Fetch directors from the database
include "view-directors.php"; // Include the view file to display directors
include "view-footer.php"; // Include the footer file
?>
