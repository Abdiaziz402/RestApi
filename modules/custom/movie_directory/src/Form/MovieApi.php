<?php

namespace Drupal\movie_directory\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class MovieApi extends FormBase{
	const MOVIE_API_CONFIG_PAGE = 'movie_api_config_page:values';


	public function getFormId(){
		return 'movie_api_config_page';
	}

	public function buildForm(array $form, FormStateInterface $form_state){
		$values = \Drupal::state()->get(self::MOVIE_API_CONFIG_PAGE);
		$form=[];

		$form['api23_base_url']=[
			'#type' => 'textfield',
			'#title' => $this->t('Api Base URL'),
			'#description' => $this->t('This is Api Base URL'),
			'#required' => true,
			'#default_value' => $values['api23_base_url'],
		];

		$form['api45_key']=[
			'#type' => 'textfield',
			'#title' => 'Api Key',
			'#description' => $this->t('This is Api key that will be used to access the api'),
			'#required' => true,
			'#default_value' =>  $values['api45_key'],
		];

		$form['actions']['#type']= 'actions';
		$form['actions']['submit'] = [
			'#type' => 'submit',
			'#value' => $this->t('Save'),
			'#button_type' => 'primary',
		];
		//  echo $form['api23_base_url']['#type'];
		//	print_r($form);
		return $form;
	}

	public function submitForm(array &$form, FormStateInterface $form_state){
	  	$submit_values =$form_state->cleanValues()->getValues();
	  //	print_r($submit_values);
		\Drupal::state()->set(self::MOVIE_API_CONFIG_PAGE, $submit_values);

		  $messanger = \Drupal::service('messenger');
		  $messanger->addMessage($this->t('Your new Configuration has been saved'));
		//drupal_set_message("Your new Configuration has been saved");
	}
}