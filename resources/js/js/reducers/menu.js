const initState = {
	modalShow: false
};

export default function menu(state = initState, action) {
	switch (action.type) {
		case 'ON_CLICK':
			return Object.assign({}, state, {modalShow: action.val});
		default:
			return state;
	}
}