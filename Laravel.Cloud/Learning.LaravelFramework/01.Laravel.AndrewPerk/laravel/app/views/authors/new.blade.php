{{ Form::open(array('url' => 'authors/create', 'method' => 'POST' )) }}

<h1>Add New Author</h1>
@include('common.error')

<p>
	{{ Form::label('lblName', 'Name:') }} <br />
	{{ Form::text('txtName', Input::old('txtName')) }}
</p>

<p>
	{{ Form::label('lblBio', 'Biography:') }} <br />
	{{ Form::textarea('txtBio', Input::old('txtBio') ) }}
</p>

<p>
	{{ Form::submit('Add Author') }}
</p>

{{ Form::close() }}