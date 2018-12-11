import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default function ChatComponent(props)
{
	let input;
	return (
		<div className="panel-block field chat-composer">
			<div className="control">
				<input type="text" 
				ref={ (node) => {
					input = node
				}}
				/>

			</div>

			<div className="control auto-width">
				<input type="submit" value="Send" 
					onClick={
						(e) => {
							props.onMComposer(input)
						}
					} 
				/>
			</div>
		
		</div>
	);
}