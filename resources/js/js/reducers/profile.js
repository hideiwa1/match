const initState = {
	img: '',
};

export default function profile(state = initState, action) {
	switch (action.type) {
		case 'INPUT_IMG':
			//object.assign stateのコピーをとる
			return Object.assign({}, state, {img: action.val});
		default:
			return state;
	}
}