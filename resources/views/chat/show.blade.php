@extends('layouts.app')

@section('content')
	<meta name="friendId" content="{{ $friend->id }}">
	<div class="container">
		<div class="column is-8 is-offset-2">
			<div class="panel">
				<div class="panel-heading">
					{{ $friend->name }}
					<div class="contain is-pulled-right">
						<a href="{{ route('chat.index') }}" class="is-link"><i class="fa fa-arrow"></i> Go Back</a>
					</div>
					<div id="chat">
						
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection