import React from 'react';
import ReactDOM from 'react-dom';
import {inputImg} from '../actions';
import {connect} from 'react-redux';
import axios from "axios";

class Profile extends React.Component{
	constructor(props){
		super(props);

		this.state={
			img: this.props.img,
		}
		this.handleChange = this.handleChange.bind(this);
		this.drop = this.drop.bind(this);
		this.dragEnter = this.dragEnter.bind(this);
		this.dragOver = this.dragOver.bind(this);
	}

	dragEnter(e){
		e.stopPropagation();
		e.preventDefault();
	}
	
	dragOver(e){
		e.stopPropagation();
		e.preventDefault();
	}
	
	drop(e){
		e.stopPropagation();
		e.preventDefault();
		
		const files = e.dataTransfer.files;
		console.log(files);
		e.target.files = files;
		this.handleChange(e);
	}
	
	handleChange(e){
		/*画像ライブプレビュー*/
		e.stopPropagation();
		e.preventDefault();
		const files = e.target.files;
		console.log(files);
		if(files.length > 0){
			let file = files[0];
			let reader = new FileReader();
			reader.onload = (e) =>{
				this.setState({img: e.target.result})
			};
			reader.readAsDataURL(file);
			this.props.dispatch(inputImg(this.state.img));
		}else{
			this.setState({img: ''});
		}
	}

	componentDidMount(){
		/*プロフィール画像の取得*/
		axios
			.get('/api/profilePic', {withCredentials: true})
			.then((res) => {
			this.setState({
				img: res.data,
			});
		})
			.catch((error) => {
		})
	}

	render(){
		return(
		<>
			<input type="file" name="pic" className="c-img c-img__input" onDragEnter={this.dragEnter} onDragOver={this.dragOver} onDrop={this.handleChange} onChange={this.handleChange}/>
			<img src={this.state.img} className="c-img" />
			<span className="c-img__span">ドラッグ<br />＆ドロップ</span>
		</>
		);
	}
}

		export default connect()(Profile)