<?php

class MovieApiConnector{

	private $client;

	private $query;

	public __contruct(\Drupal\Core\Http\ClientFactory $client){

		$movie_api_config = \Drupal::state()->get(\Drupal\movie_directory\Form\MovieApi::MOVIE_API_CONFIG_PAGE);
		$api_url = ($movie_api_config['api23_base_url']) ?: 'https://api.themoviedb.org/';
		$api_key = ($movie_api_config['api45_key']) ?: '';


		$query = ['api_key' =>$api_key];

		$this->query = $query;

		$this->client = $client->formOptions(
			[
				'base_uri' => $api_url,
				'query' => $query
			]
		);

	}

	public function discoverMovies(){
		$data = [];

		$endpoint = '/3/discover/movie'
		$options = ['query' => $this->query];
	}
}