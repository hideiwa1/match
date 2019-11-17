import React from 'react';
import ReactDOM from 'react-dom';
import {searchProject} from '../actions';
import {connect} from 'react-redux';
import axios from "axios";

class Item extends React.Component{
	
	constructor(props){
		super(props);
	}
	
	price(flg){
		/*単発案件時のみ、価格は非表示*/
		if(flg === '単発案件'){
			return(
			<>
				<span>金額：{this.props.value.min},000円〜{this.props.value.max},000円</span>
			</>
			);
		}
	}


	render(){
		return (
			<div className="p-panel__item u-mb_m">
			<a href={"detail/" + this.props.value.id} className="c-textbox">
			<span className="u-ellipsis_default">{this.props.value.title}</span><br />
			<span>{this.props.value.category}</span><br />
			{this.price(this.props.value.category)}
			</a>
			</div>
		);
	}
}

export default Item;