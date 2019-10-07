require('./bootstrap');
import React from 'react';
import ReactDOM from 'react-dom';
import {createStore} from 'redux';
import {Provider} from 'react-redux';
import rootReducer from './js/reducers';

/*import "./sass/style.scss";*/
/*import Form from "./js/main";*/
import Menu from "./js/components/menu";

let store = createStore(rootReducer);

document.addEventListener('DOMContentLoaded', function(){
	ReactDOM.render( 
		<Provider store = {store} >
			<Menu />
		</Provider>,
		document.getElementById('js-menu')
	);
});




/*
document.addEventListener('DOMContentLoaded', function(){
	var formDom = document.getElementsByClassName('contact-form');
	for (var i = 0; i < formDom.length; i++){
    ReactDOM.render(
        <Form />, formDom[i]
    );
	}
*/
