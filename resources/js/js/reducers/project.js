import axios from "axios";

const initState = {
	data: '',
	search: '',
	isFetching: false,
	activePage: '',
	itemsPerPage: '',
	totalItemCount: '',
};

export default function project(state = initState, action) {
	switch (action.type) {
		case 'FETCH_REQUEST':
			return Object.assign({}, state,{isFetching: true});
			
		case 'FETCH_SUCCESS':
			console.log(action);
			console.log(action.data.data);
			return Object.assign({}, state,{
				isFetching: false,
				data: action.data.data,
				search: action.data.search,
				activePage: action.data.data.project.current_page,
				itemsPerPage: action.data.data.project.per_page,
				totalItemCount: action.data.data.project.total,
			});
			
/*		case 'PAGENATE':
			return Object.assign({}, state,{data: action.data}, {active: action.val});
*/
/*		case 'SEARCH':
			//object.assign stateのコピーをとる
			console.log('project');

			if(this.props.search){
			let fdata = '';
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
					
			let data = [];
			state.data.forEach((value)=>{
				action.val.forEach((val, key)=>{
					if(value.key.indexOf(val) < 0){
						value.flg = false;
					}
				});
				value.flg && data.push(value);
			});
				return data;

			return Object.assign({}, state,{data: action.data}, {search: action.val});
*/
		default:
			return state;
	}
}