@extends('layouts.app');
@section('css')
	<link rel="stylesheet" href="{{ asset('css/chat.css') }}">
@endsection
@section('content')
	<div class="container">
		<div class="column is-8 is-offset-2">
			<div class="panel">
				<div class="panel-heading">
					List of all friends
				</div>
				@forelse($friends as $friend)
					<div class="panel-block">
						<a href="{{ route('chat.show', $friend->id ) }}" class="chat-item">{{ $friend->name }}</a>
						<span id="userStatus{{ $friend->id }}" class="fa fa-circle status-user-red"></span>
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

@section('script')
	<script>
		var userId = document.querySelector('meta[name="userId"]').content;

		window.Echo.join('Online')
                .here((users) => {
                    users.map(user => {
                    	// Neu khac user dang dang nhap thi se cho no online
                    	joinOnlineUser(user, userId, 'v1');
                    })
                })
                .joining((user) => {
                    joinOnlineUser(user, userId, 'v2');
                })
                .leaving((user) => {
                    leavingOnlineUser(user, userId)
                });

        function joinOnlineUser(user, userId, a) {
        	if(user.id != userId) {
            	let id = "userStatus" + user.id;
				let cir = document.getElementById(id);
				// Set class
				cir.className = "fa fa-circle status-user-green";
            }
        }

        function leavingOnlineUser(user, userId) {
        	if(user.id != userId) {
            	let id = "userStatus" + user.id;
				let cir = document.getElementById(id);
				// Set class
				cir.className = "fa fa-circle status-user-red";
            }
        }
	</script>
@endsection