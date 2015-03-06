<?php
require_once 'lib/event/ievent.php';
require_once 'lib/tmdb-api.php';

class Event_Movie implements IEvent
{
	public function execute() {
		$objApi = new TMDB( TMDB_API_KEY);
		$objApi->setLang('de');

		$objMovie = $objApi->getMovie( $_REQUEST["movieid"]);

		$arrActors = array();
		foreach ( $objMovie->getActors() as $arrActor)
		{
			$arrActors[] = "<a href='javascript:void(0);'>" . $arrActor["name"] . "</a> (" . $arrActor["character"] . ")";
		}
		$strActors = implode( ", ", $arrActors);

		$arrDirectors = array();
		foreach ( $objMovie->getDirector() as $arrDirector)
		{
			$arrDirectors[] = "<a href='javascript:void(0);'>" . $arrDirector["name"] . "</a>";
		}
		$strDirectors = implode( ", ", $arrDirectors);

		$arrProducers = array();
		foreach ( $objMovie->getProducer() as $arrProducer)
		{
			$arrProducers[] = "<a href='javascript:void(0);'>" . $arrProducer["name"] . "</a>";
		}
		$strProducers = implode( ", ", $arrProducers);

		include 'templates/site_movie.html';
	}

}