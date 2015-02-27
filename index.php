<?php
require_once 'lib/tmdb-api.php';

$strApiKey = "4d24f8a42cee7863bde3ce14d3bea1ed";

$objApi = new TMDB( $strApiKey);

$objApi->setLang('de');

$objMovie = $objApi->getMovie(228150);

echo "<img src='".$objApi->getimageUrl('w185').$objMovie->getPoster()."'/>";

echo "<h1>" . $objMovie->getTitle()."</h1>";


echo "<iframe width='420' height='315'";
echo "src='http://www.youtube.com/embed/".$objMovie->getTrailer()."'>";
echo "</iframe>";

echo "<div class='description'>" . $objMovie->getDescription() . "</div";

$actors = $objMovie->getActors();

echo "<ul class='actors'>";
foreach($actors as $actor) {
  print_r( $actor );
  echo '<hr>';
  # echo "<li>".$actor."</li>";
}
echo "</ul>";

# print_r( $objMovie );