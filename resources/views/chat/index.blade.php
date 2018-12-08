@extends('layouts.app');

@section('content')
	<div class="container">
		<div class="column is-8 is-offset-2">
			<div class="panel">
				<div class="panel-heading">
					List of all friends
				</div>
				@forelse($friends as $friend)
					<div class="panel-block">
						<a href="{{ route('chat.show', $friend->id ) }}" class="panel-block">{{ $friend->name }}</a>
					</div>
				@empty
					<div class="panel-block">
						You dont have any friends
					</div>
				@endforelse
			</div>
		</div>
	</div>
@endsection