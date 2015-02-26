<?php

$strApiKey = "4d24f8a42cee7863bde3ce14d3bea1ed";



$api = "https://api.themoviedb.org/3/search/movie?query=fury&api_key=" . $strApiKey;
$result = file_get_contents( $api);

print_r( $result);



