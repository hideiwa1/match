import {connect} from 'react-redux';
import ProjectList from '../components/projectList';

const mapStateToProps = state => {
	return{
		data: state.project.data,
		search: state.project.search
	}
};

/*	const mapDispatchToProps = dispatch => {
		return{

		}
	}
}
*/

export default connect(mapStateToProps)(ProjectList)