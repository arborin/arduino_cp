@extends('layouts.app')


@section('content')



<div class="row dash-row">
    <div class="col-xl-4">
        <div class="stats stats-success">
            <h3 class="stats-title"> Button Logs today: </h3>
            <div class="stats-content">
                <div class="stats-icon">
                    <i class="fas fas fa-power-off"></i>
                </div>
                <div class="stats-data">
                    <div class="stats-number">87</div>
                    <div class="stats-change">
                        <span class="stats-percentage mr-2">Total:</span>
                        <span class="stats-percentage">2554</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="stats stats-info">
            {{-- <h3 class="stats-title"> {{ today()->format('Y-m-d') }} </h3> --}}
            <h3 class="stats-title"> Presure Logs today: </h3>
            <div class="stats-content">
                <div class="stats-icon">
                    <i class="fas fas fa-tachometer-alt"></i>
                </div>
                <div class="stats-data">
                    <div class="stats-number">100</div>
                    <div class="stats-change">
                        <span class="stats-percentage mr-2">Total:</span>
                        <span class="stats-percentage">787945</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="stats stats-warning">
            {{-- <h3 class="stats-title"> {{ today()->format('Y-m-d') }} </h3> --}}
            <h3 class="stats-title"> Total Logs: </h3>
            <div class="stats-content">
                <div class="stats-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="stats-data">
                    <div class="stats-number">54000</div>
                    <div class="stats-change">
                        <span class="stats-percentage mr-2">From:</span>
                        <span class="stats-percentage">2022-01-05</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-lg-6">
        <div class="card easion-card">
            <div class="card-header">
                <div class="easion-card-icon">
                    <i class="fas fas fa-toggle-on"></i>
                </div>
                <div class="easion-card-title">Button log</div>
            </div>
            <div class="card-body ">
                <table class="table table-in-card">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Arduino Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>node_1</td>
                            <td>Bulb is on</td>
                            <td>2022-05-01 15:14:54</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>node_1</td>
                            <td>Bulb is on</td>
                            <td>2022-05-01 15:14:54</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>node_1</td>
                            <td>Bulb is on</td>
                            <td>2022-05-01 15:14:54</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card easion-card">
            <div class="card-header">
                <div class="easion-card-icon">
                    <i class="fas fa-table"></i>
                </div>
                <div class="easion-card-title">Presure log</div>
            </div>
            <div class="card-body ">
                <table class="table table-hover table-in-card">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Arduino Name</th>
                            <th scope="col">Presure</th>
                            <th scope="col">Date Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>node_1</td>
                            <td>25-50%</td>
                            <td>2022-05-01 15:14:54</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>node_548</td>
                            <td>25-50%</td>
                            <td>2022-05-01 15:14:54</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>node_1</td>
                            <td>75-100%</td>
                            <td>2022-05-01 15:14:54</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>






@endsection
