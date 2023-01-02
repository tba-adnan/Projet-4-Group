import React ,{useState, useCallback} from 'react';
import './App.css';
import Child from './components/Child';

function App() {
 
const [count, setCount]= useState(0);
const[user , setUser]=useState("");


 const updateCount = useCallback(()=>setCount(count+1),[count]);

  return (

    <div className='App'>
      <h1> hook [useMemo - useCallback]</h1>
      {count}
       <button onClick={()=>setCount(count+1)}>Add one</button>
       <input type="text" onChange={(e)=>setUser(e.target.value)}></input>
       <Child  count={count} updateCount={updateCount}  />
    </div>
  )
    
  }

export default App;
  