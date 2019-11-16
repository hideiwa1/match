import React from 'react';
import ReactDOM from 'react-dom';
import {searchProject} from '../actions';
import {connect} from 'react-redux';
import axios from "axios";

class Search extends React.Component {
		constructor(props) {
			super(props);

			this.state = {
				keyword: '',
				min: '',
				max: '',
				single: false,
				share: false,
				search: this.props.search,
			};
			this.handleClick = this.handleClick.bind(this);
			this.handleChange = this.handleChange.bind(this);
			this.handleCheck = this.handleCheck.bind(this);

		}

	handleChange(e){
		/*フォーム名、値を取得*/
		let val = e.target.value;
		let name = e.target.name;
		this.setState({[name]: val});
	}

	handleCheck(e){
		/*フォームの値を取得*/
		let val = e.target.value;
		this.setState({[val]: e.target.checked});
	}
	
	handleClick(e){
		e.preventDefault();
		this.props.dispatch(searchProject(this.state))
	}
	
	render(){

		return(
			<form onSubmit={this.handleClick}>
				<div className="u-ml_l">
			<p>
			<span className="c-form__title">キーワード</span>
			<input type="text" name="keyword" placeholder="キーワード" className="c-form__text" onChange={this.handleChange} value={this.state.keyword} />
			</p>
			<p className="u-flex-form">
			<input type="checkbox" name="category[]" value="single" onChange={this.handleCheck} checked={this.state.single} id="single" /><label htmlFor="single">単発案件</label><br />
			<input type="checkbox" name="category[]" value="share" onChange={this.handleCheck} checked={this.state.share} id="share" /><label htmlFor="share">レベニューシェア案件</label>
			</p>
			<p>
			<span className="c-form__title">金額（最低金額〜最高金額）</span>
			<input type="number" name="min" className="c-form__num u-right" onChange={this.handleChange} value={this.state.min} />,000円〜
			<input type="number" name="max" className="c-form__num u-right" onChange={this.handleChange} value={this.state.max} />,000円
			</p>
			<input type="submit" name="submit" value="検索" className="c-form__button" />
				</div>
			</form>
		);
	}
}

export default Search;