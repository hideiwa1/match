import axios from "axios";
export const FETCH_REQUEST = "FETCH_REQUEST";
export const FETCH_SUCCESS = "FETCH_SUCCESS";

export function menuClick(state){
	return {
		type: "ON_CLICK",
		val: state
	};
}

function requestData(){
	console.log('req');
	return{
		type: "FETCH_REQUEST"
	}
}

function receiveData(data){
	console.log('receiv');
	return{
		type: "FETCH_SUCCESS",
		data: data
	}
}

export function searchProject(state){
	console.log(state);
	return dispatch => {
		dispatch(requestData())
		let fdata = '';
		/*案件情報の取得*/
		return axios
		.get('/api/projectSearch',{params: state})
			.then((res) =>
						{console.log(res),
						fdata = {data: res.data, search: state},
			dispatch(receiveData(fdata))
		})
			.catch((error) => {
		});
	}
}

export function clickPage(state, search){
	console.log(state);
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
