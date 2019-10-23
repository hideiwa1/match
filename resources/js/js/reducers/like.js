const initState = {
	like_flg: false,
};

export default function like(state = initState, action) {
	switch (action.type) {
		case 'LIKE_TOGGLE':
			//object.assign stateのコピーをとる
			return Object.assign({}, state, {like_it: action.val});
		default:
			return state;
	}
}