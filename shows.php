<?php
require_once("util-db.php");
require_once("model-shows.php");

$pageTitle = "Shows";
include "view-header.php";
$Shows = selectShows();
include "view-shows.php";
include "view-footer.php";
?>
