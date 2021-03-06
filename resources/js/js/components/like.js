import React from 'react';
import ReactDOM from 'react-dom';
import {likeToggle} from '../actions';
import {connect} from 'react-redux';
import axios from "axios";

class Like extends React.Component{
	constructor(props){
		super(props);
		
		/*URLパラメータより案件IDを取得*/
		let path = location.pathname;
		let url = path.slice(1).split('/');
		
		this.state={
			like_flg: this.props.like_flg,
			id: url.pop(),
		}
		this.handleClick = this.handleClick.bind(this);
	}

	handleClick(){
		/*お気に入り情報の登録*/
		axios
			.get('/api/liketoggle', {withCredentials: true, params: this.state})
			.then((res) => {
			this.setState({
				like_flg: res.data,
			});
		})
			.catch((error) => {
		});
		this.props.dispatch(likeToggle(this.state.like_flg));
	}

	componentDidMount(){
		/*URLパラメータより案件IDを取得*/
		let path = location.pathname;
		let url = path.slice(1).split('/');
		/*お気に入り情報の取得*/
		axios
			.get('/api/like', {withCredentials: true, params: this.state})
			.then((res) => {
			this.setState({
				/*お気に入り情報があればtrue*/
				like_flg: res.data ? true: false,
			});
		})
			.catch((error) => {
		})
	}

	render(){
		/*フラグによりクラスの分岐*/
		let icon = this.state.like_flg ? <i className="fas fa-heart u-active" onClick={this.handleClick}/> : <i className="fas fa-heart" onClick={this.handleClick} />;
		
		return(
			<>
			{icon}
			</>
		);
	}
}

export default Like