import {connect} from 'react-redux';
import Menu from '../components/menu';

const mapStateToProps = state => {
	return{
		modalShow: state.menu.modalShow
	}
};

/*	const mapDispatchToProps = dispatch => {
		return{
			
		}
	}
}
*/

export default connect(mapStateToProps)(Menu)