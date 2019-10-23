require('./bootstrap');
import React from 'react';
import ReactDOM from 'react-dom';
import {createStore, applyMiddleware} from 'redux';
import {Provider} from 'react-redux';
import rootReducer from './js/reducers';
import thunkMiddleware from 'redux-thunk';

/*import "./sass/style.scss";*/
/*import Form from "./js/main";*/
import VisibleMenu from "./js/containers/visibleMenu";
import VisibleSearch from "./js/containers/visibleSearch";
import VisibleProjectList from "./js/containers/visibleProjectList";
import VisibleLike from "./js/containers/visibleLike";
import VisibleProfile from "./js/containers/visibleProfile";

let store = createStore(rootReducer, applyMiddleware(thunkMiddleware));


document.getElementById('js-menu') &&
	ReactDOM.render( 
		<Provider store = {store} >
			<VisibleMenu />
		</Provider>,
		document.getElementById('js-menu')
	);

document.getElementById('js-search') &&
	ReactDOM.render( 
		<Provider store = {store} >
			<VisibleSearch />
		</Provider>,
		document.getElementById('js-search')
	);

document.getElementById('js-project') &&
ReactDOM.render( 
	<Provider store = {store} >
	<VisibleProjectList />
	</Provider>,
	document.getElementById('js-project')
);

document.getElementById('js-like') &&
ReactDOM.render( 
	<Provider store = {store} >
	<VisibleLike />
	</Provider>,
	document.getElementById('js-like')
);

document.getElementById('js-profpic') &&
	ReactDOM.render( 
	<Provider store = {store} >
	<VisibleProfile />
	</Provider>,
	document.getElementById('js-profpic')
);

/*
document.addEventListener('DOMContentLoaded', function(){
	var formDom = document.getElementsByClassName('contact-form');
	for (var i = 0; i < formDom.length; i++){
    ReactDOM.render(
        <Form />, formDom[i]
    );
	}
*/
