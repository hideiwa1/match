import axios from "axios";

const initState = {
	data: '',
	search: '',
	isFetching: false,
};

export default function project(state = initState, action) {
	switch (action.type) {
		case 'FETCH_REQUEST':
			return Object.assign({}, state,{isFetching: true});
			
		case 'FETCH_SUCCESS':
			console.log(action);
			return Object.assign({}, state,{
				isFetching: false,
				data: action.data.data,
				search: action.data.search,
			});
			
		case 'SEARCH':
			//object.assign stateのコピーをとる
			console.log('project');

//			if(this.props.search){
/*			let fdata = '';
				axios
					.get('/api/projectSearch',{params: action.val})
					.then((res) => {
					
						fdata = res.data;
					console.log('fdata');
						console.log(fdata);
					return {search: action.val};
				})
					.catch((error) => {
					console.log('通信失敗1');
				});
					*/
/*			let data = [];
			state.data.forEach((value)=>{
				action.val.forEach((val, key)=>{
					if(value.key.indexOf(val) < 0){
						value.flg = false;
					}
				});
				value.flg && data.push(value);
			});
				return data;
*/
			return Object.assign({}, state,{data: action.data}, {search: action.val});
		default:
			return state;
	}
}