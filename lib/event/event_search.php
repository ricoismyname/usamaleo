<?php
require_once 'lib/event/ievent.php';
require_once 'lib/tmdb-api.php';

class Event_Search implements IEvent 
{
	public function execute() {
		$objApi = new TMDB( TMDB_API_KEY);
		$objApi->setLang('de');
		
		$arrMovies = $objApi->searchMovie( $_REQUEST["searchValue"]);

		include 'templates/site_searchresult.html';
	}
	
}