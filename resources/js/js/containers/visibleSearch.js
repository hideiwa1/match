import {connect} from 'react-redux';
import Search from '../components/search';

const mapStateToProps = state => {
	return{
		search: state.project.search
	}
};

/*	const mapDispatchToProps = dispatch => {
		return{

		}
	}
}
*/

export default connect(mapStateToProps)(Search)