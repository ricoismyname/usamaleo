<?php
require_once 'lib/tmdb-api.php';

$strApiKey = "4d24f8a42cee7863bde3ce14d3bea1ed";

$objApi = new TMDB( $strApiKey);

$objMovie = $objApi->getLatestMovie();

print_r( $objMovie);

