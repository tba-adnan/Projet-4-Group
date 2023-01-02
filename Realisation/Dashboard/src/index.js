import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';
import App from './App';
import reportWebVitals from './reportWebVitals';
import GroupProress from './components/group_progress';
import Briefprogress from './components/Brief_progress';
import Studentprogress from './components/student_progress';
import AvancementApprenant from './components/student_progress';
import Students from './components/students';
import Header from './layout/Header';
import Yearselect from './components/year_select';


// const progressgroup = ReactDOM.createRoot(document.getElementById('groupprogress'));
// progressgroup.render(<GroupProress year="2"/>)

const yearselector = ReactDOM.createRoot(document.getElementById('yearselect'))
yearselector.render(<Yearselect/>)

const briefprogress = ReactDOM.createRoot(document.getElementById('briefprogress'))
briefprogress.render(<Briefprogress/>)

const studentprogress = ReactDOM.createRoot(document.getElementById('studentprogress'))
studentprogress.render(<AvancementApprenant/>)

const students = ReactDOM.createRoot(document.getElementById('students'))
students.render(<Students/>)
// 
const header = ReactDOM.createRoot(document.getElementById('header'))
header.render(<Header/>)

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();