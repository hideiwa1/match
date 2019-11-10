import axios from "axios";
export const FETCH_REQUEST = "FETCH_REQUEST";
export const FETCH_SUCCESS = "FETCH_SUCCESS";

export function menuClick(state){
	return {
		type: "ON_CLICK",
		val: state
	};
}

export function initData(state){
	return dispatch => {
		dispatch(requestData())
		let fdata = '';
		return axios
			.get('/api/project')
			.then((res) =>{
			console.log(res),
				fdata = {data: res.data},
				dispatch(receiveData(fdata))
		})
			.catch((error) => {
		});
	}
}

function requestData(){
	return{
		type: "FETCH_REQUEST"
	}
}

function receiveData(data){
	return{
		type: "FETCH_SUCCESS",
		data: data
	}
}

export function searchProject(state){
	return dispatch => {
		dispatch(requestData())
		let fdata = '';
		/*案件情報の取得*/
		return axios
		.get('/api/projectSearch',{params: state})
			.then((res) =>{
			fdata = {data: res.data, search: state},
			dispatch(receiveData(fdata))
		})
			.catch((error) => {
		});
	}
}

export function clickPage(state, search){
	return dispatch => {
		dispatch(requestData())
		let fdata = '';
		/*案件情報の取得＋ページネーション*/
		return axios
			.get('/api/projectSearch?page=' + state,{params: search})
			.then((res) =>
						{console.log(res),
							fdata = {data: res.data, search: search},
							dispatch(receiveData(fdata))
						})
			.catch((error) => {
		});
	}
}

export function likeToggle(state){
	return {
		type: "LIKE_TOGGLE",
		val: state
	};
}

export function inputImg(state){
	return {
		type: "INPUT_IMG",
		val: state
	};
}

export function inputForm(state){
	return {
		type: "INPUT_FORM",
		val: state
	};
}