import React from 'react';
import ReactDOM from 'react-dom';
import {likeToggle} from '../actions';
import {connect} from 'react-redux';
import axios from "axios";

class Like extends React.Component{
	constructor(props){
		super(props);
		
		let path = location.pathname;
		let url = path.slice(1).split('/');
		
		this.state={
			like_flg: this.props.like_flg,
			id: url.pop(),
		}
		this.handleClick = this.handleClick.bind(this);
	}

	handleClick(){
		axios
			.get('/api/liketoggle', {withCredentials: true, params: this.state})
			.then((res) => {
			console.log(res)
			this.setState({
				like_flg: res.data,
			});
		})
			.catch((error) => {
			console.log('通信失敗');
		});
		this.props.dispatch(likeToggle(this.state.like_flg));
	}

	componentDidMount(){
		let path = location.pathname;
		let url = path.slice(1).split('/');
		
		axios
			.get('/api/like', {withCredentials: true, params: this.state})
			.then((res) => {
			console.log(res)
			this.setState({
				like_flg: res.data ? true: false,
			});
		})
			.catch((error) => {
			console.log('通信失敗');
		})
	}

	render(){
		let icon = this.state.like_flg ? <i className="fas fa-heart active" onClick={this.handleClick}/> : <i className="fas fa-heart" onClick={this.handleClick} />;
		return(
			<>
			{icon}
			</>
		);
	}
}

export default connect()(Like)