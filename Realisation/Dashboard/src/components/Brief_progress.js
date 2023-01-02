import React from "react";
import { ProgressBar} from "react-bootstrap";
import axios from "axios";


export default class Briefprogress extends React.Component {
    state = {};
    async componentDidMount(){
      const request = await axios.get('http://127.0.0.1:8000/api/AvancementBrief/2')
      // const list = request.data.map((item) => console.log(item.Percentage))
      const liststate = request.data.map((item) => this.setState({progress:item.Percentage})) 
      
    }

render(){
 return (
<div class="card-body">
<br></br>
<h4>Brief Progress : </h4>
<ProgressBar variant="success" now={this.state.progress} label={`${this.state.progress}%`} />
<br></br>
</div>
);}

}