const initState = {
	data: '',
};

export default function registProject(state = initState, action) {
	switch (action.type) {
		case 'INPUT_FORM':
			//object.assign stateのコピーをとる
			return Object.assign({}, state, {data: action.val});
		default:
			return state;
	}
}