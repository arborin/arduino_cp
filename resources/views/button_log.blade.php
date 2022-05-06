@extends('layouts.app')


@section('content')
        <form action="" method="get" >
            <div class="row mb-5">
                <div class="col-md-3 input-group">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">
                            <a href="{{ route('arduino.list') }}"><i class="fas fa-angle-double-left"></i></a>
                        </label>
                    </div>
                    <div class="input-group-prepend">
                        <label class="input-group-text bg-warning" for="inputGroupSelect01" >{{ $arduino_name }}</label>
                    </div>
                    <select name='button_pin' class="custom-select" id="inputGroupSelect01">
                        <option disabled selected>-- select pin --</option>
                        <option value="btn_2" {{ ($btn == 'btn_2') ? 'selected' : '' }}>Button (PIN 2)</option>
                        <option value="btn_3" {{ ($btn == 'btn_3') ? 'selected' : '' }}>Button (PIN 3)</option>
                        <option value="btn_5" {{ ($btn == 'btn_5') ? 'selected' : '' }}>Button (PIN 5)</option>
                        <option value="btn_6" {{ ($btn == 'btn_6') ? 'selected' : '' }}>Button (PIN 6)</option>
                        <option value="btn_7" {{ ($btn == 'btn_7') ? 'selected' : '' }}>Button (PIN 7)</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <input type="text" name="date_from" class="form-control date" id="" placeholder="Date (from)">
                </div>
                <div class="col-md-2">
                    <input type="text" name="date_to" class="form-control date" id="" placeholder="Date (to)">
                </div>

<<<<<<< HEAD
            <a href="{{ route('arduino.list') }}" class="btn btn-secondary float-start">
                <i class="fa fas fa-arrow-left " aria-hidden="true"></i> Back
            </a>

            <button type="submit" class="btn btn-outline-primary pull-right">
                <i class="fa fa-search" aria-hidden="true"></i> Search
            </button>
=======
                <div class="col-md-2 ">
                    <button type="submit" class="btn btn-primary input-group-append mr-3">Select</button>
                </div>

            </div>
>>>>>>> d4881665874791e20a2d1ae4d1fceb37b8d2e233

        </form>



<div class="row mb-5">
    <div class="col-lg-12">
        <div class="chart-container">
            <canvas id="myChart" width="400" height="50"></canvas>
        </div>

    </div>
</div>



<div class="row mt-5">
    <div class="col-lg-12">


        <canvas id="myChart" height='50'></canvas>



        <div class="card easion-card">
            <div class="card-header">
                <div class="easion-card-icon">
                    <i class="fas fa-table"></i>
                </div>
<<<<<<< HEAD
                <div class="easion-card-title"><b>{{ $arduino_name }}</b><small> Buttons Log</small></div>
=======
                <div class="easion-card-title">Log</div>
                <span class="easion-card-menu">
                        @php $total = ($button_logs) ? $button_logs->total() : 0; @endphp
                    <strong>Total: {{ $total }}</strong></span>
>>>>>>> d4881665874791e20a2d1ae4d1fceb37b8d2e233
            </div>
            <div class="card-body ">




                <table class="table table-hover table-in-card table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Arduino Name</th>
<<<<<<< HEAD
                            <th scope="col">Button Status</th>
                            <th scope="col">Date time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($btn_logs as $log)
=======
                            <th scope="col">Status</th>
                            <th scope="col">Button(pin)</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($button_logs as $log)
>>>>>>> d4881665874791e20a2d1ae4d1fceb37b8d2e233
                            <tr>
                                <th scope="row" class="align-middle">{{ $log->id }}</th>
                                <td class="align-middle">{{ $log->arduino_name }}</td>
                                <td class="align-middle">{{ $log->button_status }}</td>
<<<<<<< HEAD
                                <td class="align-middle">{{ $log->created_at }}</td>
=======
                                <td class="align-middle">{{ $log->button_pin }}</td>
                                <td class="align-middle">{{ $log->created_at }}</td>

>>>>>>> d4881665874791e20a2d1ae4d1fceb37b8d2e233
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        <div class="pull-right">
<<<<<<< HEAD
            {!! $btn_logs->links('pagination::bootstrap-4') !!}
=======
            @if($button_logs)
                {!! $button_logs->links('pagination::bootstrap-4') !!}
            @endif
>>>>>>> d4881665874791e20a2d1ae4d1fceb37b8d2e233
        </div>
    </div>
</div>


@endsection


<<<<<<< HEAD
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

=======

@section('javascript')

<script>
    function newDate() {
  return moment().add(days, 'd');
}

var config = {
  type: 'line',

  data: {
    labels: ['00:00:00','01:00:00', '02:00:00','03:00:00', '04:00:00', '05:00:00', '06:00:00','07:00:00','08:00:00','09:00:00','10:00:00','11:00:00',
    '12:00:00','13:00:00','14:00:00','15:00:00','16:00:00','17:00:00','18:00:00','23:59:59'],
    datasets: [{
        fill: true,
        stepped: true,
        label: "My First dataset",
        data: [1, 0, 1, 0, 1, 0, 1,0,1,0,1,0],
    }],

  },
    options: {
        backgroundColor: '#ff8069',
        scales: {
            // xAxis:[{
            //     type: 'time',

            // }],
            //         type: 'time',
            //         time: {
            //             format: "HH:mm",
            //             unit: 'hour',
            //             unitStepSize: 1,
            //             displayFormats: {
            //             'minute': 'HH:mm',
            //             'hour': 'HH:mm',
            //             min: '00:00',
            //             max: '23:59'
            //             },
            //         }
        // }],
        x: {
                type: 'timeseries',
            },
            y: {
            title: {
            display: true,
            text: 'Value'
            },
            min: 0,
            max: 1,
            ticks: {
            // forces step size to be 50 units
            stepSize: 1
            }
        }

    }
  }
};

var ctx = document.getElementById("myChart").getContext("2d");
new Chart(ctx, config);

</script>
>>>>>>> d4881665874791e20a2d1ae4d1fceb37b8d2e233

@endsection
