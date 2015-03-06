<?php
require_once 'lib/event/ievent.php';

class Event_Home implements IEvent 
{
	public function execute() {
		include 'templates/site_home.html';
	}
	
}