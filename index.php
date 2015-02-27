<?php
require_once 'lib/tmdb-api.php';

$strApiKey = "4d24f8a42cee7863bde3ce14d3bea1ed";

$objApi = new TMDB( $strApiKey);
$objApi->setLang('de');

$arrMovies = array();
if ( array_key_exists( "searchvalue", $_REQUEST) && $_REQUEST["searchvalue"])
{
	$arrMovies = $objApi->searchMovie( $_REQUEST["searchvalue"]);
}
if ( array_key_exists( "search", $_REQUEST) && $_REQUEST["search"])
{
	$arrMovies = $objApi->searchByAll( $_REQUEST["search"]);
}


print_r( $arrMovies);

foreach ( $arrMovies as $objMovie)
{
	echo "<br />--------------------------------------------<br />";

	$objMovie = $objApi->getMovie( $objMovie->getID());
	print_r( $objMovie->getJSON());
	
	echo "<img src='".$objApi->getimageUrl('w185').$objMovie->getPoster()."'/>";
	
	echo "<h1>" . $objMovie->getTitle()." (" . $objMovie->getReleaseDate() . ") </h1>";
	
	echo "<iframe width='420' height='315'";
	echo "src='http://www.youtube.com/embed/".$objMovie->getTrailer()."'>";
	echo "</iframe>";
	
	echo "<div class='description'>" . $objMovie->getDescription() . "</div>";
	
	echo "<hr>";
	print_r( $objMovie->getGenres());
	echo "</hr>";
	
	$actors = $objMovie->getActors();
	echo "<ul class='actors'>";
	foreach($actors as $actor) {
	  print_r( $actor );
	  echo '<hr>';
	  # echo "<li>".$actor."</li>";
	}
	echo "</ul>";
	
	$directors = $objMovie->getDirector();
	echo "<ul class='directors'>";
	foreach($directors as $director) {
		print_r( $director );
		echo '<hr>';
		# echo "<li>".$actor."</li>";
	}
	echo "</ul>";
	
	$producers = $objMovie->getProducer();
	echo "<ul class='producers'>";
	foreach($producers as $producer) {
		print_r( $producer );
		echo '<hr>';
		# echo "<li>".$actor."</li>";
	}
	echo "</ul>";
	
	
	# print_r( $objMovie );
}