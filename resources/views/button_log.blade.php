@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col-lg-12 mb-3">
        <form action="{{ route('arduino.list') }}" method="get">

            <a href="{{ route('arduino.list') }}" class="btn btn-secondary float-start">
                <i class="fa fas fa-arrow-left " aria-hidden="true"></i> Back
            </a>

            <button type="submit" class="btn btn-outline-primary pull-right">
                <i class="fa fa-search" aria-hidden="true"></i> Search
            </button>

            <input type="text" name="arduino_name" style="width:200px" class="form-control pull-right mr-4" id="arduino-name" placeholder="Button">
        </form>
    </div>
</div>


<div class="row mb-5">
    <div class="col-lg-12">
        <div class="chart-container">
            <canvas id="myChart" width="400" height="50"></canvas>
        </div>

    </div>
</div>



<div class="row mt-5">
    <div class="col-lg-12">
        <div class="card easion-card">
            <div class="card-header">
                <div class="easion-card-icon">
                    <i class="fas fa-table"></i>
                </div>
                <div class="easion-card-title"><b>{{ $arduino_name }}</b><small> Buttons Log</small></div>
            </div>
            <div class="card-body ">

                <table class="table table-hover table-in-card table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Arduino Name</th>
                            <th scope="col">Button Status</th>
                            <th scope="col">Date time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($btn_logs as $log)
                            <tr>
                                <th scope="row" class="align-middle">{{ $log->id }}</th>
                                <td class="align-middle">{{ $log->arduino_name }}</td>
                                <td class="align-middle">{{ $log->button_status }}</td>
                                <td class="align-middle">{{ $log->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        <div class="pull-right">
            {!! $btn_logs->links('pagination::bootstrap-4') !!}
        </div>
    </div>
</div>


@endsection


@section('javascript')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

    <script>
        const labels = [
          '2022-05-04 21:38:52',
          '2022-05-04 20:00:00',
          '2022-05-04 23:38:52',
          '2022-05-04 21:38:52',
          '2022-05-04 21:38:52',
          '2022-05-04 21:38:52',
          '2022-05-04 21:38:52',
          '2022-05-04 21:38:52',
          '2022-05-04 21:38:52',
          '2022-05-04 21:38:52',
        ];

        const data = {
          labels: labels,
          datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0],
            fill: true,
            stepped: true,
          }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                interaction: {
                intersect: false,
                axis: 'x'
                },
                plugins: {
                    title: {
                        display: true,
                        text: (ctx) => 'Step ' + ctx.chart.data.datasets[0].stepped + ' Interpolation',
                    }
                },
                scales: {
                    x: {
                        type: 'time',
                        time: {
                        // Luxon format string
                        tooltipFormat: 'DD T'
                        },
                        title: {
                        display: true,
                        text: 'Datetime'
                        }
                    },
                    y: {
                        title: {
                        display: true,
                        text: 'value'
                        }
                    }
                },
            }
            };
      </script>

      <script>
        const myChart = new Chart(
          document.getElementById('myChart'),
          config
        );
      </script>


@endsection
