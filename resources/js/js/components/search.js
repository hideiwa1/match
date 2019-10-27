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
		let val = e.target.value;
		let name = e.target.name;
		this.setState({[name]: val});
	}

	handleCheck(e){
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
				<div className="p-form__content">
			<p>
			<span className="c-formtitle">キーワード</span>
			<input type="text" name="keyword" placeholder="キーワード" className="c-textform" onChange={this.handleChange} value={this.state.keyword} />
			</p>
			<p>
			<input type="checkbox" name="category[]" value="single" onChange={this.handleCheck} checked={this.state.single} />単発案件<br />
			<input type="checkbox" name="category[]" value="share" onChange={this.handleCheck} checked={this.state.share} />レベニューシェア案件
			</p>
			<p>
			<span className="c-formtitle">金額</span>
			<input type="number" name="min" className="c-numform" onChange={this.handleChange} value={this.state.min} />千〜
			<input type="number" name="max" className="c-numform" onChange={this.handleChange} value={this.state.max} />千
			</p>
			<input type="submit" name="submit" value="検索" className="c-formbutton" />
				</div>
			</form>
		);
	}
}

export default Search;