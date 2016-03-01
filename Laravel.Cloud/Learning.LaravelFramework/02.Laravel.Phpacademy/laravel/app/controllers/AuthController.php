<?php

class AuthController extends BaseController{
	public $layout = 'layouts.default';

	// return View::make('pages.index', array('title' => 'Title'));

	public function getLogin(){
		Log::info('[controllers/AuthController/getLogin]');
		$view = View::make('login');
		Log::info('[controllers/AuthController/getLogin] after set title');
		$this->layout->title = 'Login Title';
		Log::info('[controllers/AuthController/getLogin] after set content');
		$this->layout->content = $view;
	}

	public function postLogin(){
		Log::info('[controllers/AuthController/postLogin]');
		$rules = array('username' => 'required', 'password' => 'required');
		$validator = Validator::make(Input::all(), $rules);
		Log::info('[controllers/AuthController/postLogin] after validator '. $validator->messages());			

		if($validator->fails()){
			Log::info('[controllers/AuthController/postLogin] validator fail');
			Log::info('[controllers/AuthController/postLogin] validator message '. $validator->messages());			
			return Redirect::route('getlogin')->withErrors($validator);
		}

		$auth = Auth::attempt(array(
			'name' => Input::get('username'),
			'password' => Input::get('password')
		), false);

		if(!$auth){
			return Redirect::route('getlogin')->withErrors(array(
				'Invalid credentials were provided.'
			));
		}

		return Redirect::route('home_getIndex');
	}
}