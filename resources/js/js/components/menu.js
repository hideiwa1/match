import React from 'react';
import ReactDOM from 'react-dom';
import {menuClick} from '../actions';
import {connect} from 'react-redux';
import axios from "axios";

import Modal from './modal';

class Menu extends React.Component{
	constructor(props){
		super(props);
		
		this.state={
			modalShow: this.props.modalShow,
			user: 'init',
			item: []
		}
		this.handleClick = this.handleClick.bind(this);
	}

	handleClick(){
		this.setState(prevState => ({
			modalShow: !prevState.modalShow
			})
		);
		this.props.dispatch(menuClick(this.state.modalShow));
	}
    
	componentDidMount(){
//		this.props.searchProject();
		axios
			.get('/api/auth', {withCredentials: true})
			.then((res) => {
				this.setState({
					user: res.data
				});
			})
			.catch((error) => {
					console.log('通信失敗');
			})
	}
	
	menuItem(auth){
		if(auth === 'init'){
			return(
				<ul></ul>
			);
		}else if(auth){
			return(
				<ul className="p-navmenu u-flex">
				<li className="p-navmenu__item">
				<a href='/project' className="c-button">案件検索</a>
				</li>
				<li className="p-navmenu__item">
				<a href='/mypage' className="c-button">マイページ</a>
				</li>
				<li className="p-navmenu__item">
				<a href='/logout' className="c-button">ログアウト</a>
				</li>
				</ul>
			);
		}else{
			return(
				<ul className="p-navmenu u-flex">
				<li className="p-navmenu__item">
				<a href='/project' className="c-button">案件検索</a>
				</li>
				<li className="p-navmenu__item">
				<a href='/signup' className="c-button">新規登録</a>
				</li>
				<li className="p-navmenu__item">
				<a href='/login' className="c-button">ログイン</a>
				</li>
				</ul>
			);
		}
	}

	render(){
		console.log('show' + this.state.modalShow);
		console.log(this.state.user);
		return(
        <div>
					{this.menuItem(this.state.user)}
				<div className="p-menu-trigger" onClick = {this.handleClick}>
						<span></span>
						<span></span>
						<span></span>
						{this.state.modalShow &&
						<Modal user={this.state.user}/>
						}
				</div>
		</div>
		);
	}
}

export default connect()(Menu)