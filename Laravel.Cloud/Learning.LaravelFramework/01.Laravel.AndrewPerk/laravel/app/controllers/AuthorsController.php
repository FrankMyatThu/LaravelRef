<?php

class AuthorsController extends BaseController{
	public $restful = true;
	public $layout = 'layouts.default';
	
	public function Index(){
		
		//Log::info('[controllers/AuthorsController/Index]');
		//Log::warning('Something could be going wrong.');
		//Log::error('Something is really going wrong.');

		$view = View::make('authors.index');		
		$view->authors = Author::orderBy('name','desc')->get();
		$this->layout->content = $view;

		$this->layout->title = 'Authors and Books via controller';
	}
	public function View($id){
		$view = View::make('authors.view');		
		$view->author = Author::find($id);
		$this->layout->content = $view;

		$this->layout->title = 'Author view page by id';
	}
	public function NewAuthor(){
		$view = View::make('authors.new');
		$this->layout->content = $view;

		$this->layout->title = 'Author new creation';
	}
	public function CreateAuthor(){
		Log::info('[controllers/AuthorsController/CreateAuthor]');

		foreach (Input::all() as $value) {		    
		    Log::info('[controllers/AuthorsController/CreateAuthor] Input::all() ' . $value);
		}
		

		$validation = Author::validate(Input::all());
		Log::info('[controllers/AuthorsController/CreateAuthor] $validation ' . $validation->messages());		

		if($validation->fails()){
			Log::info('[controllers/AuthorsController/CreateAuthor] fails');
			return Redirect::route('newAuthor')
								->withErrors($validation)
								->withInput();
		}else{
			Author::create(array(
				'name' => Input::get('txtName'),
				'bio' => Input::get('txtBio')
			));
			return Redirect::route('authors')->with('message', 'The author was created successfully.');
		}
	}
	public function EditAuthor($id){
		$view = View::make('authors.edit');		
		$view->author = Author::find($id);
		$this->layout->content = $view;

		$this->layout->title = 'Author edit page by id';
	}
	public function UpdateAuthor(){
		log::info('[Controller.UpdateAuthor] Start');
		$validation = Author::validate(Input::all());
		log::info('[Controller.UpdateAuthor] after validate');
		
		$id = Input::get('id');
		if($validation->fails()){
			return Redirect::route('editAuthor', $id)
								->withErrors($validation)
								->withInput();
		}else{
			log::info('[Controller.UpdateAuthor] validation');	
			Author::where('id',$id)->update(array(
				'name'=>Input::get('txtName'),
				'bio'=>Input::get('txtBio')
			));
			return Redirect::route('author', $id)
				->with('message', 'The author was updated successfully.');
		}
	}
	public function DeleteAuthor($id)
	{
		Author::find($id)->delete();
		return Redirect::route('authors')
				->with('message', 'The author was deleted successfully..');
	}
	public function DestoryAuthor()
	{
		Author::find(Input::get('id'))->delete();
		return Redirect::route('authors')
				->with('message', 'The author was deleted successfully..');
	}
}