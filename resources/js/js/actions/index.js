import axios from "axios";
export const FETCH_REQUEST = "FETCH_REQUEST";
export const FETCH_SUCCESS = "FETCH_SUCCESS";

/*モーダル*/
export function menuClick(state){
	return {
		type: "ON_CLICK",
		val: state
	};
}

/*案件初期データ*/
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

/*案件検索*/
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

/*ページネーション*/
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

/*お気に入り*/
export function likeToggle(state){
	return {
		type: "LIKE_TOGGLE",
		val: state
	};
}

/*プロフィール画像*/
export function inputImg(state){
	return {
		type: "INPUT_IMG",
		val: state
	};
}

/*案件登録*/
export function inputForm(state){
	return {
		type: "INPUT_FORM",
		val: state
	};
}