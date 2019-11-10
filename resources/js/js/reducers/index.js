import {combineReducers} from "redux";
import menu from "./menu";
import project from "./project";
import like from "./like";
import profile from "./profile";
import registProject from "./registProject";

const reducer = combineReducers({
    menu,
    project,
    like,
    profile,
    registProject,
});

export default reducer;