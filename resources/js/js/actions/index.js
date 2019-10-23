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
		return axios
		.get('/api/projectSearch',{params: state})
			.then((res) =>
						{console.log(res),
						fdata = {data: res.data, search: state},
			dispatch(receiveData(fdata))

/*		fdata = res.data;
		console.log('fdata');
		console.log(fdata);
		return {
			type: "SEARCH",
			val: state,
			data: res.data
		};*/
	})
		.catch((error) => {
		console.log('通信失敗1');
	});
/*	return {
		type: "SEARCH",
		val: state
	};*/
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