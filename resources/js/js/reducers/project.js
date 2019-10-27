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
			
		default:
			return state;
	}
}