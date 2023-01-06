import React, { Component } from 'react'
import ProgressBar from 'react-bootstrap/ProgressBar';

export class BriefAv extends Component {
    constructor(props){
        super(props)
    }
  render() {
    return (
        <div>BriefAv
            <div>
                {this.props.data.map(item=>(
                    <><span>{item?.brief_name}</span>
                    <ProgressBar now={item?.brief_av} label={`${item?.brief_av}%`}/>
                    </>
                ))}
            </div>
            
            <div className="row">
         <div className="col-md-12">
          <div className="card">
            <div className="card-header">
              <h5 className="card-title">Monthly Recap Report</h5>
              <div className="card-tools">
                <button type="button" className="btn btn-tool" data-card-widget="collapse">
                  <i className="fas fa-minus" />
                </button>
                <div className="btn-group">
                  <button type="button" className="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                    <i className="fas fa-wrench" />
                  </button>
                  <div className="dropdown-menu dropdown-menu-right" role="menu">
                    <a href="#" className="dropdown-item">Action</a>
                    <a href="#" className="dropdown-item">Another action</a>
                    <a href="#" className="dropdown-item">Something else here</a>
                    <a className="dropdown-divider" />
                    <a href="#" className="dropdown-item">Separated link</a>
                  </div>
                </div>
                <button type="button" className="btn btn-tool" data-card-widget="remove">
                  <i className="fas fa-times" />
                </button>
              </div>
            </div>
            {/* /.card-header */}
            <div className="card-body">
              <div className="row">
                <div className="col-md-8">
                  <p className="text-center">
                    <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                  </p>
                  <div className="chart">
                    {/* Sales Chart Canvas */}
                    <canvas id="salesChart" height={180} style={{height: 180}} />
                  </div>
                  {/* /.chart-responsive */}
                </div>
                {/* /.col */}
                <div className="col-md-4">
                  <p className="text-center">
                    <strong>Goal Completion</strong>
                  </p>
                  <div className="progress-group">
                    Add Products to Cart
                    <span className="float-right"><b>160</b>/200</span>
                    <div className="progress progress-sm">
                      <div className="progress-bar bg-primary" style={{width: '80%'}} />
                    </div>
                  </div>
                  {/* /.progress-group */}
                  <div className="progress-group">
                    Complete Purchase
                    <span className="float-right"><b>310</b>/400</span>
                    <div className="progress progress-sm">
                      <div className="progress-bar bg-danger" style={{width: '75%'}} />
                    </div>
                  </div>
                  {/* /.progress-group */}
                  <div className="progress-group">
                    <span className="progress-text">Visit Premium Page</span>
                    <span className="float-right"><b>480</b>/800</span>
                    <div className="progress progress-sm">
                      <div className="progress-bar bg-success" style={{width: '60%'}} />
                    </div>
                  </div>
                  {/* /.progress-group */}
                  <div className="progress-group">
                    Send Inquiries
                    <span className="float-right"><b>250</b>/500</span>
                    <div className="progress progress-sm">
                      <div className="progress-bar bg-warning" style={{width: '50%'}} />
                    </div>
                  </div>
                  {/* /.progress-group */}
                </div>
                {/* /.col */}
              </div>
              {/* /.row */}
            </div>
            {/* ./card-body */}
           
              
            {/* /.card-footer */}
          </div>
      </div>

        </div>
        </div>
    )
  }
}

export default BriefAv;