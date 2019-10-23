import {connect} from 'react-redux';
import Like from '../components/like';

const mapStateToProps = state => {
	return{
		like_flg: state.like.like_flg
	}
};

/*	const mapDispatchToProps = dispatch => {
		return{

		}
	}
}
*/

export default connect(mapStateToProps)(Like)