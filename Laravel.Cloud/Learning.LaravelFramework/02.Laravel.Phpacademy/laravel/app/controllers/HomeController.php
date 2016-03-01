<?php

class HomeController extends BaseController{
	public $layout = 'layouts.default';
	
	public function getIndex(){
		Log::info('[controllers/HomeController/getIndex]');
		$items = Auth::user()->items;

		$view = View::make('home', array(
			'items' => $items
		));
		$this->layout->content = $view;
		$this->layout->title = 'To do list Application';
	}

	public function postIndex(){
		Log::info('[controllers/HomeController/postIndex]');
		$id = Input::get('id');
		Log::info('[controllers/HomeController/postIndex] id' . $id);
		
		$userId = Auth::user()->id;

		$this->layout->content = "";
		$this->layout->title = 'To do list Application';
		$item = Item::findOrFail($id);

		if($item->owner_id == $userId){
			$item->mark();
		}

		return Redirect::route('home_getIndex');
	}

	public function getNew(){
		$view = View::make('new');
		$this->layout->content = $view;
		$this->layout->title = 'To do list Application';
	}

	public function postNew(){
		Log::info('[controllers/HomeController/postNew]');
		$rules = array('name' => 'required|min:3|max:255');
		$this->layout->title = "To do list Application";	
		$this->layout->content = "";

		Log::info('[controllers/HomeController/postNew] before validator make');
		$validator = Validator::make(Input::all(), $rules);
		Log::info('[controllers/HomeController/postNew] after validator make');
		$userId = Auth::user()->id;
		Log::info('[controllers/HomeController/postNew] userId ' . $userId);

		if($validator->fails()){
			return Redirect::route('NewItemPage')->withErrors($validator);
		}

		Log::info('[controllers/HomeController/postNew] before object intialization');
		$item = new Item;
		Log::info('[controllers/HomeController/postNew] after object intialization');
		Log::info('[controllers/HomeController/postNew] Input::get(name)' . Input::get('name'));
		$item->name = Input::get('name');
		Log::info('[controllers/HomeController/postNew] owner_id ' . $userId);
		$item->owner_id = $userId;

		Log::info('[controllers/HomeController/postNew] before save');
		$item->save();
		Log::info('[controllers/HomeController/postNew] after save');

		return Redirect::route('home_getIndex');
	}

	public function getDeleteNormal($id){
		$this->layout->title = "To do list Application";	
		$this->layout->content = "";

		Log::info('[controllers/HomeController/getDeleteNormal] before delete');
		$item = Item::find($id);
		if(!$item){
			Log::info('[controllers/HomeController/getDeleteNormal] not found');
		}

		if($item->owner_id == Auth::user()->id){
			$item->delete();
			Log::info('[controllers/HomeController/getDeleteNormal] after delete');				
		}
	}

	public function getDeleteItemBindClass(Item $itemInfoRow){
		$this->layout->title = "To do list Application";	
		$this->layout->content = "";
		Log::info('[controllers/HomeController/getDeleteItemBindClass] before delete');
		if($itemInfoRow->owner_id == Auth::user()->id){	
			$itemInfoRow->delete();
			Log::info('[controllers/HomeController/getDeleteItemBindClass] after delete');
		}
		return Redirect::route('home_getIndex');
	}
}