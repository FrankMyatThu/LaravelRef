<h1>Authors home Page Blade</h1>

<url>
@foreach($authors as $author)
	<li>{{ HTML::linkRoute('author', $author->name, $parameters = array($author->id)) }}</li>
@endforeach
</url>

<p> {{ HTML::linkRoute('newAuthor', 'New Author') }} </p>