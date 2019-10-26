import React from 'react';
import ReactDOM from 'react-dom';
import {connect} from 'react-redux';
import {clickPage} from '../actions';
import axios from "axios";

import Item from './item';
import Paginate from './paginate';

class ProjectList extends React.Component{
	
	constructor(props){
		super(props);
		
		this.state={
			initData: [],
			activePage: 1,
			itemsPerPage: 1,
			totalItemCount: 1,
			pageRange: 5,
		}
		
		this.handlePageChange = this.handlePageChange.bind(this);
	}
	
	handlePageChange(num){
		console.log('handlePageChange');
		console.log('num:' + num);
/*		axios
			.get('/api/project?page=' + num)
			.then((res) => {
			this.setState({
				initData: res.data.data,
				activePage: res.data.project.current_page,
				itemsPerPage: res.data.project.per_page,
				totalItemCount: res.data.project.total,
			});
		})
			.catch((error) => {
			console.log('通信失敗2');
		})
*/			this.props.dispatch(clickPage(num, this.props.search))
/*		.then(this.setState({
			activePage: this.props.data.project.current_page,
			itemsPerPage: this.props.data.project.per_page,
			totalItemCount: this.props.data.project.total,
		}),
		);*/
	}
	
	componentDidMount(){
/*		if(this.props.search){
			console.log('1');
			axios
				.get('/api/projectSearch', {
				params: this.props.search
			})
				.then((res) => {
				this.setState({
					initData: res.data
				});
			})
				.catch((error) => {
				console.log('通信失敗1');
			})
		}else{
*/			console.log('2');
//		this.handlePageChange(1);
			axios
				.get('/api/project')
					.then((res) => {
					this.setState({
						initData: res.data.data,
						activePage: res.data.project.current_page,
						itemsPerPage: res.data.project.per_page,
						totalItemCount: res.data.project.total,
					});
				})
					.catch((error) => {
					console.log('通信失敗2');
				})
			}
//	}
	
/*	searchProject(data, search){
		let fdata = [];
		console.log('data:' + typeof data);
		console.log('search:');
		let fkey = this.props.search;
		Object.keys(data).forEach((value)=>{
			console.log(data[value].title);
			if(fkey.keyword){
				console.log('fkey');
				console.log(fkey.keyword);
				console.log(data[value].title.indexOf(fkey.keyword));
				if(data[value].title.indexOf(fkey.keyword) < 0){
					data[value].flg = false;
				}else{
					data[value].flg = true;
				}
				console.log(data[value].flg);
			}
			
			data[value].flg && fdata.push(data[value]);
		});
		return fdata;
	}
	*/
	render(){

		console.log('3');
		let data = this.props.data.data? this.props.data.data : this.state.initData;
		console.log(data);
/*		console.log('props');
		console.log(this.props.search);
		console.log('state');
		console.log(this.state.test);
		console.log('search');
		console.log(this.state.search);
		console.log('props');
		console.log(this.props.search.keyword);
		
		data = this.props.search ? this.searchProject(data, this.state.serach) : data;
		console.log('s:' + data);
		*/
		let Items = data ? data.map((value) => (
			<Item key={value.id} value={value} index={value.id} />
		)) : '';

			return (
				<div>
				<div className="p-panel">
				{Items}
				</div>
				<div>
				<Paginate 
				activePage={this.props.activePage? this.props.activePage: this.state.activePage}
				itemsPerPage={this.props.itemsPerPage? this.props.itemsPerPage: this.state.itemsPerPage}
				totalItemCount={this.props.totalItemCount? this.props.totalItemCount: this.state.totalItemCount}
				pageRange={this.state.pageRange}
				onChange={this.handlePageChange}/>
				</div>
				</div>
			);
		
	}
}

export default ProjectList;