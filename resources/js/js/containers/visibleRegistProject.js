import {connect} from 'react-redux';
import RegistProject from '../components/registProject';

const mapStateToProps = state => {
	return{
		data: state.registProject.data
	}
};

/*	const mapDispatchToProps = dispatch => {
		return{

		}
	}
}
*/

export default connect(mapStateToProps)(RegistProject)