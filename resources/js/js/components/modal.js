import React from 'react';
import ReactDOM from 'react-dom';

export default class Modal extends React.Component{
	constructor(props){
		super (props);
		this.state={
		rootDOM: document.getElementById('body')
		};
	}


	render(){
		return(
			ReactDOM.createPortal(
				<div className='p-modal' onClick = {()=>preventDefault() }>
			<nav className="p-modal-menu">
			<ul>
			<li className="p-modal-menu__item"><a href="index.html">TOP</a></li>
			<li className="p-modal-menu__item"><a href="login.html">ログイン</a></li>
			<li className="p-modal-menu__item"><a href="signup.html">新規登録</a></li>
			</ul>
			</nav>
			</div>,
			this.state.rootDOM)
		);
	}
}