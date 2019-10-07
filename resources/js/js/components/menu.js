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
			user: []
		}
		this.handleClick = this.handleClick.bind(this);
	}

	handleClick(){
		this.setState(prevState => ({
			modalShow: !prevState.modalShow
			})
		);
		this.props.dispatch(menuClick(this.state));
	}
    
	componentDidMount(){
		axios
			.get('/api/auth', {withCredentials: true})
			.then((res) => {
				this.setState({
					user: res
				});
			})
			.catch((error) => {
					console.log('通信失敗');
			})
	}

	render(){
		console.log('show' + this.state.modalShow);
		console.log(this.state.user);
		return(
        <div>
        <ul className="p-navmenu u-flex">
        <li className="p-navmenu__item">
        <a href="/login" className="c-button">ログイン</a>
            </li>
        <li className="p-navmenu__item">
        <a href="/signup" className="c-button">新規登録</a>
            </li>
            </ul>
            <div className="p-menu-trigger" onClick = {this.handleClick}>
                <span></span>
                <span></span>
                <span></span>
                {this.state.modalShow &&
                <Modal />
                }
            </div>
        </div>
		);
	}
}

export default connect()(Menu)