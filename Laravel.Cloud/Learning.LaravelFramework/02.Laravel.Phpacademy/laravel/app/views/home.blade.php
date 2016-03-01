<h1>Your Items&nbsp;<small>(<a href="{{ URL::route('NewItemPage') }}">New Item</a>)</small></h1>

<ul>
@foreach($items as $item)
	<li>
		{{ Form::open() }}			
			<input 
				type="checkbox" 
				onClick="this.form.submit()"				
				{{ $item->done ? 'checked' : '' }} />
			
			<input type="hidden" name="id" value="{{ $item->id }}" />

			{{ e($item->name) }} <small><a href="{{ URL::route('DeleteItemBindClass', $item->id) }}">(x)</a></small>
		
		{{ Form::close() }}
	</li>
@endforeach
</ul>
 