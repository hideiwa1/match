import React from 'react';
import ReactDOM from 'react-dom';
import {inputForm} from '../actions';
import {connect} from 'react-redux';
import axios from "axios";

class RegistProject extends React.Component{
	constructor(props){
		super(props);
		console.log(window.location.pathname);
		this.state={
			url: (window.location.pathname !== '/registProject') ? window.location.pathname.replace('/registProject/', '') : 'new',
			data: {
				title: '',
				category_id: '',
				min_price: '',
				max_price: '',
				comment: '',
			}
		}
		this.handleChange = this.handleChange.bind(this);
	}

	handleChange(e){
		let val = e.target.value;
		let name = e.target.name;
		this.setState({
			data: {
				...this.state.data,
				[name]: val}});
	}

	componentDidMount(){
		/*プロフィール画像の取得*/
		if(this.state.url !== 'new'){
			axios
				.get('/api/registProject', {params: this.state.url})
				.then((res) => {
				this.setState({
					data:  {
						title: res.data[0].title,
						category_id: res.data[0].category_id,
						min_price: res.data[0].min_price,
						max_price: res.data[0].max_price,
						comment: res.data[0].comment,
					},
				});
			})
				.catch((error) => {
			})
		}
	}
	
	price(flg){
		if(flg == 2){
			return(
				<>
				<p className="u-mb_m u-hidden">
					<span className="c-form__title">予算（最低金額〜最高金額）</span>
				<input type="number" name="min_price" className="c-form__num" value='0' />,000円〜
				<input type="number" name="max_price" className="c-form__num" value='0' />,000円
				</p>
				</>
			);
		}else{
			return(
				<>
				<p className="u-mb_m">
					<span className="c-form__title">予算（最低金額〜最高金額）</span>
				<input type="number" name="min_price" className="c-form__num" value={this.state.data.min_price} onChange={this.handleChange} />,000円〜
				<input type="number" name="max_price" className="c-form__num" value={this.state.data.max_price} onChange={this.handleChange} />,000円
				</p>
				</>
			);
		}
	}

	render(){
		
		return(
			<>
			<p className="u-mb_m">
				<span className="c-form__title">タイトル</span>
			<input type="text" name="title" placeholder="title" className="c-form__text" value={this.state.data.title} onChange={this.handleChange} />
			</p>
			<p className="u-mb_m">
			<span className="c-form__title">案件種別</span>
			<input type="radio" name="category_id" value="1" checked={this.state.data.category_id == 1} onChange={this.handleChange} />単発案件
			<input type="radio" name="category_id" value="2" checked={this.state.data.category_id == 2} onChange={this.handleChange} />レベニューシェア案件
			</p>
			{this.price(this.state.data.category_id)}
			<p className="u-mb_m">
				<span className="c-form__title">案件概要</span>
					<textarea name="comment" className="c-textarea" rows="5" value={this.state.data.comment} onChange={this.handleChange} />
			</p>
			</>
		);
	}
}

export default connect()(RegistProject)