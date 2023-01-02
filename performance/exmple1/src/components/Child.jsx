import React ,{memo , useMemo}from "react";

function Child(props){
    console.log("child render");



    const output = useMemo (()=>{
        let number = 0;
        for (let i = 0; i <20000000; i++) {
            number++
            
        }
        return number  
    })
    return(
        <div>
            child component{output} .{props.count}
            <br />
            <button onClick={()=>props.updateCount()}>update count</button>
        </div>
    )
}
export default memo(Child); 