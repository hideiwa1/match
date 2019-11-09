import React from 'react';
import ReactDOM from 'react-dom';
import {pagenate} from '../actions';

class Paginate extends React.Component{
	
	constructor(props){
		super(props);
		
		this.handleLinkClick = this.handleLinkClick.bind(this);
	}
	
	handleLinkClick(e){
		e.preventDefault();
		this.props.onChange(e.target.name);
		
	}
	
	buildPages(){
		/*ページネーション*/
		const {activePage, itemsPerPage, totalItemCount, pageRange} = this.props;
		let Pages = [],
				first_page = '',
				last_page = '',
				totalPage = Math.ceil(totalItemCount / itemsPerPage);
		if(pageRange >= totalPage){
			first_page = 1;
					last_page = totalPage;
		}else{
			if(activePage < (pageRange / 2) ){
				first_page = 1;
						last_page = pageRange;
			}else if(activePage + (pageRange /2) > totalPage){
				first_page = totalPage - pageRange + 1;
						last_page = totalPage;
			}else{
				first_page = activePage - Math.floor(pageRange /2);
						last_page = activePage + Math.floor(pageRange /2);
			}
		}
		
		for(let i = first_page; i <= last_page; i++){
			Pages.push(
				<li className="pagenation__item active" key={i}><a name={i} onClick={this.handleLinkClick}>{i}</a></li>
			);
		}
		
		activePage !== 1 && Pages.unshift(
			<li className="pagenation__item active" key='prev'><a name={activePage - 1} onClick={this.handleLinkClick}>前へ</a></li>
		);
		
		activePage !== 1 && Pages.unshift(
			<li className="pagenation__item active" key='top'><a name='1' onClick={this.handleLinkClick}>先頭へ</a></li>
		);
		
		activePage !== totalPage && Pages.push(
			<li className="pagenation__item active" key='next'><a name={activePage + 1} onClick={this.handleLinkClick}>次へ</a></li>
		);
		
		activePage !== totalPage && Pages.push(
			<li className="pagenation__item active" key='end'><a name={activePage + 1} onClick={this.handleLinkClick}>最後へ</a></li>
		);
		
		return Pages;
	}
	
	render(){
		
		const Pages = this.buildPages();
		return(
			<ul className="u-flex-default p-pagenation u-center">
			{Pages}
			</ul>
		);
	}
}

export default Paginate;