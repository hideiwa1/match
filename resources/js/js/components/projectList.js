import React from 'react';
import ReactDOM from 'react-dom';
import {connect} from 'react-redux';
import {clickPage, initData} from '../actions';
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
			this.props.dispatch(clickPage(num, this.props.search))
	}
	
	componentDidMount(){
		/*案件情報の取得*/
		this.props.dispatch(initData())
			}
			
	render(){
		let data = this.props.data.data? this.props.data.data : this.state.initData;
		/*案件情報を各Itemコンポーネントに展開*/
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