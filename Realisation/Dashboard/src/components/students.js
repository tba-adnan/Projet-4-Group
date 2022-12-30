import React from "react";
import axios from "axios";
import { useEffect, useState } from "react";
import { useCallback } from "react";

function Students(props){
const [Apprenants, setApprenants] = useState([]);
useEffect(() => {
       const Students = async () => {
            await axios.get("http://localhost:8000/api/Groupe/1").then((res) => {
                setApprenants(res.data.ListApprenants);
              });
          };
          Students()      
    },);
    return(
        <div className="">
          <br></br>
        <h6>Apprenants : </h6>
        {Apprenants.map((value) => (
           <div key={value.id}>
            <li key={value.id}>
              {value.Nom} {value.Prenom}
            </li> 
          </div>
        ))} 
      </div>
    )
}
export default Students