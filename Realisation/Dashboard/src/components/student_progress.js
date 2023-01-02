import React from "react";
import axios from "axios";
import QuickChart from "quickchart-js";
import { useEffect, useState } from "react";
import { useCallback } from "react";
import { ProgressBar } from "react-bootstrap";

function AvancementApprenant(props){
    
    const [ApprenantAV, setApprenantAV] = useState([]);
    const [AllBriefs, setAllBriefs] = useState([]);
    const [IdGroupe, setIdGroupe] = useState([]);
    const [Apprenants, setApprenants] = useState([]);

   useEffect(() => {
       const AvancementApprenant = async () => {
            await axios
              .get("http://localhost:8000/api/Groupe/1")
              .then((res) => {
                setApprenants(res.data.ListApprenants);
                setAllBriefs(res.data.ListBrifes);
                setApprenantAV(res.data.FirstBrief);
                setIdGroupe(res.data.Groupe.idGroupe);
              });
          };
          AvancementApprenant()      
    }, );


const selectBrief=(e)=>{
    const briefId = e.target.value;
    axios
    .get("http://localhost:8000/api/Av_ApprenantTache/" +  IdGroupe + "/" + briefId)
        .then((res) => {
            setApprenantAV(res.data.avancemantBrief);
            setApprenants(res.data.avancemantBrief);
        });
    }

    if (props.ChangeId) {
      const AvancementGroups = async () => {
          await axios.get("http://localhost:8000/api/AvancementApprenant/" + props.ChangeId)
            .then((res) => {
              console.log(res.data)
              setApprenantAV(res.data.avancemantBrief);
              setApprenants(res.data.avancemantBrief);
              setAllBriefs(res.data.ListBrief);
            });
          };
          AvancementGroups()   
        }
      

    const ChartApprenant = new QuickChart();
    ChartApprenant.setConfig({
      type: "progressBar",
      data: {
        datasets: [
          {
            data: ApprenantAV.map((value) => value.Percentage ),
            backgroundColor: "blue",
          },
        ],
      },
  
      options: {
        plugins: {
          datalabels: {
            formatter: (val) => {
              return val.toLocaleString() + "%";
            },
  
            font: {
              size: 30,
            },
            color: (context) =>
              context.dataset.data[context.dataIndex] > 15 ? "#fff" : "#000",
            anchor: (context) =>
              context.dataset.data[context.dataIndex] > 15 ? "center" : "end",
            align: (context) =>
              context.dataset.data[context.dataIndex] > 15 ? "center" : "right",
          },
        },
      },
    });


    // const studentprogress_bar = <ProgressBar now={ApprenantAV.map((value) => value.Percentage )} label={`${ApprenantAV.map((value) => value.Percentage )}%`} />
    const studentprogress_bar = <ProgressBar now={ApprenantAV.map((value) => value.Percentage )}  />
    const ApprenantImage = ChartApprenant.getUrl();
    return(
        <div className="">
        <h6>Etat d'avencement des apprenants : </h6>
        <div className="">
          <select onChange={selectBrief} name="" id="">
            {AllBriefs.map((value) => (
              <option key={value.id} value={value.id}>
                {value.Nom_du_brief}
              </option>
            ))}
          </select>
        </div>
        <img style={{ width: 300 }} src={ApprenantImage}></img> 

        <div>
        {Apprenants.map((value) => (
           <div key={value.id}>
            <li key={value.id}>
          {value.Nom} {value.Prenom} 
          <ProgressBar now={ApprenantAV.map((value) => value.Percentage )} label={`${ApprenantAV.map((value) => value.Percentage )}%`} />
            </li> 
          </div>
        ))} 

        </div>
      </div>


    )
}
export default AvancementApprenant