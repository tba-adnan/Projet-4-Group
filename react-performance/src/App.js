import logo from './logo.svg';
import React from 'react';
import './App.css';

function App() {
  const [counterA, setCounterA] = React.useState(0);
  const [counterB, setCounterB] = React.useState(0);

  return (
    <div>
      <Counter name="A" value={counterA} />
      <Counter name="B" value={counterB} />
      <button
        onClick={() => {
          console.log("Click button");
          setCounterA(counterA + 1);
        }}
      >
        Increment counter A
      </button>
    </div>
  );
}
const Counter = React.memo(function Counter({ name, value }) {
  console.log(`Rendering counter ${name}`);
  return (
    <div>
      {name}: {value}
    </div>
  );
});



export default App;
