import {connect} from 'react-redux';
import Profile from '../components/profile';

const mapStateToProps = state => {
	return{
		img: state.profile.img
	}
};

/*	const mapDispatchToProps = dispatch => {
		return{

		}
	}
}
*/

export default connect(mapStateToProps)(Profile)