import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import Messages from './widgets/Messages';
import NoMessage from './widgets/NoMessage';
import ChatComposer from './widgets/ChatComposer';

export default class Chat extends Component 
{
	constructor(props) {
		super(props);
		this.state = {
			chats: [],
			userId: 0,
			friendId: 0,
		}
	}

	onChatComposer(e) {
		if(e.value != '') {
			var data = {
				chat: e.value,
				user_id: this.state.userId,
				friend_id: this.state.friendId,
			}
			var _self = this;
			axios.post('/chat/sendChat', data).then(response => {
				this.setState((state, props) => {
					return {
						chats: this.state.chats.concat([data]),
					}
				});
			})
		}
		
	}

	componentDidMount()
	{
		const __self = this;
		const userId = $('meta[name="userId"]').attr('content');
		const friendId = $('meta[name="friendId"]').attr('content');

		// Dang ki pusher message de cap nhat tu dong
		this.listenMessageEcho();

		this.setState((state, props) => {
			return {
				userId: userId,
				friendId: friendId
			}
		})

		if(friendId != 'undefined') {
			axios.post('/chat/getChat/' + friendId).then(response => {
				this.setState((state, props) => {
					// console.log(response.data);
					return {
						chats: response.data
					}
				});
			});
		}

	}

	// listenMessagePusher() {

	// 	const userId = $('meta[name="userId"]').attr('content');
	// 	const friendId = $('meta[name="friendId"]').attr('content');

	// 	var pusher = new Pusher('8cf95096c9c788a01ade', {
	// 		cluster: 'ap1',
	// 	    encrypted: true
	// 	})

	// 	var channel = pusher.subscribe('Chat.');

	// 	channel.bind('App\\Events\\BroadcastChat', this.addMessageData.bind(this));

		
	// }

	addMessageData(data) {
		console.log(data);
		this.setState((state, props) => {
			return {
				chats: this.state.chats.concat([data.chat])
			}
		});
	}

	listenMessageEcho() {
		const userId = $('meta[name="userId"]').attr('content');
		const friendId = $('meta[name="friendId"]').attr('content');
		window.Echo.private('Chat.' + friendId + '.' + userId)
			.listen('BroadcastChat', this.addMessageData.bind(this) );
	}

    render() {
    	var chats;
    	if(this.state.chats.length != 0) {
    		chats = <Messages chats={this.state.chats} userId={this.state.userId} />
    	} else {
    		chats = <NoMessage />
    	}
        return (
            <div className="panel-block">
				{chats}
				<ChatComposer onMComposer={ this.onChatComposer.bind(this) } />
            </div>
            
        );
    }
}

if (document.getElementById('chat')) {
    ReactDOM.render(<Chat />, document.getElementById('chat'));
}
