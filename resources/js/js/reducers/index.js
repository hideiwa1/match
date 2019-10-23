import {combineReducers} from "redux";
import menu from "./menu";
import project from "./project";
import like from "./like";
import profile from "./profile";

const reducer = combineReducers({
    menu,
    project,
    like,
    profile,
});

export default reducer;