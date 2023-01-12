<?php

namespace Drupal\movie_directory\Controller;

use Drupal\Core\Controller\ControllerBase;

class MovieListing extends ControllerBase{

	public function view(){
		$content=[];
		$content['name']='My name is Abdiaziz';
		return[
			'#theme'=> 'movie-listing',
			'#content'=> $content,
		];
	}
}