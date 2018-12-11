import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default function Message(props)
{
	return (
		<div className={ props.clas } >
			{ props.chat }
		</div>
	);
}