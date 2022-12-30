import React, { Component } from 'react';
import Chart from 'chart.js/auto';
import { ProgressBar } from 'react-bootstrap';

const options = [
	{
		label: "Année",
		value: "1",
	  },
	{
	  label: "2020",
	  value: "1",
	},
	{
	  label: "2021",
	  value: "2",
	},
	{
	  label: "2022",
	  value: "3",
	},];

export default class Header extends Component {
  constructor(){
    super();
  }
  
render() {
		return (
			<div>
	<h4>Group Progress : </h4>
	<select>
            {options.map((option) => (
              <option value={option.value}>{option.label}</option>
            ))}
    </select>
			</div>
			)
	}
}

