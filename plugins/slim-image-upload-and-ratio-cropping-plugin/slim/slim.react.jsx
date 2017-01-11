/*
 * Slim v3.0.3 - Image Cropping Made Easy
 * Copyright (c) 2016 Rik Schennink - http://slim.pqina.nl
 */
// Necessary React Modules
import React from '../build/react';
import ReactDOM from '../build/react-dom';
import _Slim from './slim.module.js';

// React Component
export default class Slim extends React.Component {

	componentDidMount() {
		this.slim = _Slim.create(ReactDOM.findDOMNode(this));
	}

	render() {
		return <div className="slim" { ...this.props }>{ this.props.children }</div>
	}

}