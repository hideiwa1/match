import React from 'react';
import ReactDOM from 'react-dom';

export default class Modal extends React.Component{
	constructor(props){
		super (props);
		this.state={
		rootDOM: document.getElementById('body')
		};
	}

	menuItem(auth){
		/*ログインの有無でメニュー切り替え*/
		if(auth){
			return(
				<ul>
				<li className="p-modal-menu__item"><a href="/">TOP</a></li>
				<li className="p-modal-menu__item">
				<a href='/project'>案件検索</a>
				</li>
				<li className="p-modal-menu__item"><a href="/mypage">マイページ</a></li>
				<li className="p-modal-menu__item"><a href="/registProject">新規案件登録</a></li>
				<li className="p-modal-menu__item"><a href="/myProject">登録案件一覧</a></li>
				<li className="p-modal-menu__item"><a href="/myLike">お気に入り</a></li>
				<li className="p-modal-menu__item"><a href="/myMessage">メッセージ一覧</a></li>
				<li className="p-modal-menu__item"><a href="/myDM">ダイレクトメッセージ一覧</a></li>
				<li className="p-modal-menu__item"><a href="/profile">プロフィール編集</a></li>
				<li className="p-modal-menu__item"><a href="/logout">ログアウト</a></li>
				</ul>
			);
		}else{
			return(
				<ul>
				<li className="p-modal-menu__item"><a href="/">TOP</a></li>
				<li className="p-modal-menu__item">
				<a href='/project'>案件検索</a>
				</li>
				<li className="p-modal-menu__item"><a href="/signup">新規登録</a></li>
				<li className="p-modal-menu__item"><a href="/login">ログイン</a></li>
				</ul>
			);
		}
	}

	
	render(){
		return(
			ReactDOM.createPortal(
				<div className='p-modal' onClick = {()=>preventDefault() }>
			<nav className="p-modal-menu">
			{this.menuItem(this.props.user)}
			</nav>
			</div>,
			this.state.rootDOM)
		);
	}
}