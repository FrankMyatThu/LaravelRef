{{ Form::open(array('url' => 'author/update', 'method' => 'PUT' )) }}

<h1>Editing {{ e($author->name) }} </h1>
@include('common.error')

<p>
	{{ Form::label('lblName', 'Name:') }}<br/>
	{{ Form::text('txtName', e($author->name)) }}	
</p>

<p>
	{{ Form::label('lblBio', 'Biography:') }}<br/>
	{{ Form::textarea('txtBio', e($author->bio)) }}
</p>

{{ Form::hidden('id', $author->id) }}

<p> {{ Form::submit('Update Author') }} </p>

{{ Form::close() }}