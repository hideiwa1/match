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
	}

	handleChange(e){
		/*画像ライブプレビュー*/
	//	e.stopPropagation();
	//	e.preventDefault();
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
			<input type="file" name="pic" className="c-img c-img__input"  onChange={this.handleChange}/>
			<img src={this.state.img} className="c-img" />
		</>
		);
	}
}

		export default connect()(Profile)