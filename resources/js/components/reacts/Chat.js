import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export default class Chat extends Component 
{
	constructor(props) {
		super(props);
		this.state = {
			chats: []
		}
	}

	componentDidMount()
	{
		const __self = this;
		const userId = $('meta[name="userId"]').attr('content');
		const friendId = $('meta[name="friendId"]').attr('content');

		if(friendId != 'undefined') {
			axios.post('/chat/getChat/' + friendId).then(response => {
				this.setState((state, props) => {
					console.log(response.data);
					return {
						chats: response.data
					}
				});
			});
		}
	}

    render() {
        return (
            <div className="panel-block">
				
            </div>
        );
    }
}

if (document.getElementById('chat')) {
    ReactDOM.render(<Chat />, document.getElementById('chat'));
}
