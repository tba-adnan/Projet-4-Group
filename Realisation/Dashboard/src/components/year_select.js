import React from "react";
import GroupProress from "./group_progress";



const options = [{label: "Année",value: "1",},{label: "2020",value: "1",},{label: "2021",value: "2",},{label: "2022",value: "3",},];

export default class Yearselect extends React.Component {
    state = {
        year : "2"
    };

render(){
    return(
    <GroupProress year= {this.state.year} />
    );
}

}