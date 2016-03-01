<h1>{{ e($author->name) }} </h1>

<p> {{ $author->bio}} </p>

<p><small> {{ $author->updated_at }} </small></p>
<span>
	{{ HTML::linkRoute('authors', 'Authors list') }} |
	{{ HTML::linkRoute('editAuthor', 'Edit', array($author->id)) }} |	
	{{ Form::open(array('url'=>'/authorPage/deletePage', 'method'=>'DELETE', 'style'=>'display:inline;')) }} ﻿
	{{ Form::hidden('id', $author->id) }}
	{{ Form::submit('Delete') }}
	{{ Form::close() }}
	{{-- HTML::linkRoute('deleteAuthor', 'Delete', array($author->id)) --}}	
</span>