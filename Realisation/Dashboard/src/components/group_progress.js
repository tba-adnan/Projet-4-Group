import React from 'react';
import ProgressBar from 'react-bootstrap/ProgressBar';
import axios from 'axios';


export default class GroupProress extends React.Component {
  state = {}; 
  async componentDidMount(){
    const res = await axios.get('http://127.0.0.1:8000/api/AvancementGroups/2')
    .then((res => this.setState({progress:res.data.Percentage})))
}

render(){
  return(
    <div >
      <h4>Group Porgress : </h4>
      <ProgressBar now={this.state.progress} label={`${this.state.progress}%`} />
    </div>
  ); 
}

}