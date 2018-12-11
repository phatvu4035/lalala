@extends('layouts.app')
@section('css')
	<link rel="stylesheet" href="{{ asset('css/chat.css') }}">
@endsection
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

@section('script')
	{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
	<script>
		$(document).ready(function() {
			const userId = $('meta[name="userId"]').attr('content');
const friendId = $('meta[name="friendId"]').attr('content');
		// Khởi tạo một đối tượng Pusher với app_key
        var pusher = new Pusher('8cf95096c9c788a01ade', {
            cluster: 'ap1',
            encrypted: true
        });
 
        //Đăng ký với kênh chanel-demo-real-time mà ta đã tạo trong file DemoPusherEvent.php
        var channel = pusher.subscribe('Chat.');
 
        //Bind một function addMesagePusher với sự kiện DemoPusherEvent
        channel.bind('App\\Events\\BroadcastChat', addMessageDemo);
 
	      //function add message
	      function addMessageDemo(data) {
	        console.log(data);
	      }

		});
	</script> --}}
@endsection