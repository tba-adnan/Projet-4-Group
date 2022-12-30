import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';
import App from './App';
import Header from './components/Header';
import reportWebVitals from './reportWebVitals';
import GroupProress from './components/group_progress';
import Bpemo from './components/progress_brief';
import Studentprogress from './components/student_progress';
import Garage from './components/student_progress';
import AvancementApprenant from './components/student_progress';
import Students from './components/students';

const header = ReactDOM.createRoot(document.getElementById('header'));
header.render(<Header/>)

const progressgroup = ReactDOM.createRoot(document.getElementById('progress'));
progressgroup.render(<GroupProress/>)

const Pbdemo = ReactDOM.createRoot(document.getElementById('pbdemo'))
Pbdemo.render(<Bpemo/>)

const studentprogress = ReactDOM.createRoot(document.getElementById('studentprogress'))
studentprogress.render(<AvancementApprenant/>)

const students = ReactDOM.createRoot(document.getElementById('students'))
students.render(<Students/>)



// const demo = ReactDOM.createRoot(document.getElementById('demo'))
// demo.render(<Demo/>)

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
