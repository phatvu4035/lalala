import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Message from './Message';

export default function Messages(props) {
	console.log(props.chats);
	return (
		<div className="chat">
			<div style={{overflow: "auto"}}>
				{props.chats.map((chat, i) => {
					if(chat.user_id == props.userId) {
						let clas = "chat-right"
						return (
							<div className="message-frame" key={i} >
								<Message clas={clas} chat={chat.chat}/>
							</div>
						);
					} else {
						let clas = "chat-left"
						return (
							<div className="message-frame" key={i}>
								<Message clas={clas} chat={chat.chat} />
							</div>				
						);
					}
					
				})}
			</div>
			
		</div>
	);
}