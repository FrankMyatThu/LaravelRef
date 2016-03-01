<?php

class Author extends Eloquent{
	
	protected $table = 'authors';
	protected $fillable = array('name', 'bio');
	protected $rules = array(
			'txtName' => 'required|min:2',
			'txtBio' => 'required|min:10'
		);

	protected function validate($data){		
		Log::info('[models/Author/validate] validate function start');

		foreach ($data as $value) {
		    Log::info('[models/Author/validate] $data ' . $value);
		}
		Log::info('[models/Author/validate] loop end');
		return Validator::make($data, $this->rules);
	}
}