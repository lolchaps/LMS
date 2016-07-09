@if (session()->has('flash_message'))
	<div class="alert alert-{{ strtolower(session('flash_message_level')) }}">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  		{{ session('flash_message') }}
	</div>
@endif