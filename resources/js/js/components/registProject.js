import React from 'react';
import ReactDOM from 'react-dom';
import {inputForm} from '../actions';
import {connect} from 'react-redux';
import axios from "axios";

class RegistProject extends React.Component{
	constructor(props){
		super(props);
		
		this.state={
			/*URLパラメータにより新規、編集の分岐*/
			url: (window.location.pathname !== '/registProject') ? window.location.pathname.replace('/registProject/', '') : 'new',
			data: {
				title: '',
				category_id: '',
				min_price: '',
				max_price: '',
				comment: '',
			},
			/*エラーメッセージ*/
			errMsg: {},
			/*バリデーション項目*/
			valid: {
				['title']: ['max','require'],
				['comment']: ['require'],
				['category_id']: ['integer', 'require'],
				['min_price']: ['integer', 'require'],
				['max_price']: ['integer', 'gte_min', 'require'],
			},
		}
		this.handleChange = this.handleChange.bind(this);
		
	}
	
	validate(name, val){ 
		let isValid = true,
				errMsg = '',
				valid = this.state.valid[name];
		const errMsgRequire = '入力必須です',
					errMsgInteger = '半角数字で入力してください。　',
					errMsgMax = '191文字以下で入力してください。　',
					errMsgGte_min = '最高金額は最低金額以上の値を入力してください　';
		/*バリデーション'require'が含まれる場合*/
		if(valid.indexOf('require') >= 0){
			isValid = val.length !== 0;
			/*エラーメッセージを挿入*/
			if(!isValid) errMsg = errMsgRequire;
		}
		/*入力があるとき、その他のバリデーションを実施*/
		if(errMsg.indexOf(errMsgRequire) <0){
			for(let i in valid){
				switch(valid[i]){
					case 'integer':
						isValid = /^[0-9]/.test(val);
						if(!isValid) errMsg = errMsgInteger;
						break;
					case 'max':
						isValid = val.length < 191;
						if(!isValid) errMsg = errMsgMax;
						break;
					case 'gte_min':
						let min_price = this.state.data.min_price;
						/*数値型へ変換後、比較*/
						isValid = Number(val) >= Number(min_price);
						if(!isValid) errMsg = errMsgGte_min;
						break;
				}
			}
		}
		return errMsg;
	}
	
	/*submitボタンの制限*/
	canSubmit(){
		/*空項目がないか*/
		const validData = Object.values(this.state.data).filter(value => {return value === '';}).length === 0;
		/*エラーメッセージがないか*/
		const validErrMsg = Object.values(this.state.errMsg).filter(value => {return value !== '';}).length === 0;
		/*上記を満たすときのみ、押下可能にする*/
		const canSubmit = Boolean(validData && validErrMsg);
		return canSubmit;
	}
	
	handleChange(e){
		/*フォーム名、値を取得*/
		let val = e.target.value;
		let name = e.target.name;
		let errMsg = this.validate(name, val);
		this.setState({
			data: {
				/*配列の展開*/
				...this.state.data,
				/*データの更新*/
				[name]: val},
			errMsg: {
				/*エラーメッセージの挿入*/
				[name]: errMsg,
			}
		});
	}

	componentDidMount(){
		/*案件情報の取得*/
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
			/*レベニューシェアの場合、価格を非表示、金額は０で入力*/
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
				<span className="u-block u-error">{this.state.errMsg['min_price']}</span>
				<span className="u-block u-error">{this.state.errMsg['max_price']}</span>
				<input type="number" name="min_price" className="c-form__num" value={this.state.data.min_price} onChange={this.handleChange} />,000円〜
				<input type="number" name="max_price" className="c-form__num" value={this.state.data.max_price} onChange={this.handleChange} />,000円
				</p>
				</>
			);
		}
	}
	
	button(url){
		/*urlにて新規登録か編集か分岐*/
		/*canSubmitにて押下フラグを設定*/
		if(url === 'new'){
			return(
				<input type="submit" disabled = {!this.canSubmit()} value="新規登録" className="c-form__button" />
			);
		}else{
			return(
				<input type="submit" disabled = {!this.canSubmit()} value="更新" className="c-form__button" />
			);
		}
	}

	render(){
		
		return(
			<>
			<p className="u-mb_m">
				<span className="c-form__title">タイトル</span>
			<span className="u-block u-error">{this.state.errMsg['title']}</span>
			<input type="text" name="title" placeholder="title" className="c-form__text" value={this.state.data.title} onChange={this.handleChange} />
			</p>
			<p className="u-mb_m">
			<span className="c-form__title">案件種別</span>
			<span className="u-block u-error">{this.state.errMsg['category_id']}</span>
			<input type="radio" name="category_id" value="1" checked={this.state.data.category_id == 1} onChange={this.handleChange} />単発案件
			<input type="radio" name="category_id" value="2" checked={this.state.data.category_id == 2} onChange={this.handleChange} />レベニューシェア案件
			</p>
			{this.price(this.state.data.category_id)}
			<p className="u-mb_m">
				<span className="c-form__title">案件概要</span>
					<span className="u-block u-error">{this.state.errMsg['comment']}</span>
					<textarea name="comment" className="c-textarea" rows="5" value={this.state.data.comment} onChange={this.handleChange} />
			</p>
					{this.button(this.state.url)}
			</>
		);
	}
}

export default connect()(RegistProject)