@if($errors->has())
<ul>
	{{ $errors->first('txtName', '<li>:message</li>') }}
	{{ $errors->first('txtBio', '<li>:message</li>') }}
</ul>
@endif