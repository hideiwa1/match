import React from 'react';
import ReactDOM from 'react-dom';
import {searchProject} from '../actions';
import {connect} from 'react-redux';
import axios from "axios";

class Item extends React.Component{
	
	constructor(props){
		super(props);
	}


	render(){

		return (
			<div className="p-panel__item u-mb_m">
			<a href={"detail/" + this.props.value.id} className="c-textbox">
			<span>{this.props.value.title}</span><br />
			<span>{this.props.value.category}</span><br />
			<span>金額：{this.props.value.min}千〜{this.props.value.max}千</span>
			</a>
			</div>
		);
	}
}

export default Item;