@extends('layouts.app')


@section('content')
        <form action="" method="get" >
            <div class="row mb-5">

                <div class="input-group-prepend ml-3">
                    <label class="input-group-text" for="inputGroupSelect01">
                        <a href="{{ route('arduino.list') }}"><i class="fas fa-angle-double-left"></i></a>
                    </label>
                </div>
                <div class="input-group-prepend">
                    <label class="input-group-text bg-warning" for="inputGroupSelect01" >{{ $arduino_name }}</label>
                </div>


                <div class="col-md-2">
                    <input type="text" name="date_from" class="form-control date" id="" placeholder="Date (from)">
                </div>
                <div class="col-md-2">
                    <input type="text" name="date_to" class="form-control date" id="" placeholder="Date (to)">
                </div>

                <div class="col-md-2 ">
                    <button type="submit" class="btn btn-primary input-group-append mr-3">Select</button>
                </div>

            </div>

        </form>





<div class="row">
    <div class="col-lg-12">
        <div class="card easion-card">
            <div class="card-header">
                <div class="easion-card-icon">
                    <i class="fas fa-table"></i>
                </div>
                <div class="easion-card-title">Log</div>
                <span class="easion-card-menu"><strong>Total: {{ $presure_logs->total() }}</strong></span>
            </div>
            <div class="card-body ">

                <table class="table table-hover table-in-card table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Arduino Name</th>
                            <th scope="col">Presure Value</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($presure_logs as $log)
                            <tr>
                                <th scope="row" class="align-middle">{{ $log->id }}</th>
                                <td class="align-middle">{{ $log->arduino_name }}</td>
                                <td class="align-middle">{{ $log->presure_value}}</td>
                                <td class="align-middle">{{ $log->created_at }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        <div class="pull-right">
            @if($presure_logs)
                {!! $presure_logs->links('pagination::bootstrap-4') !!}
            @endif
        </div>
    </div>
</div>


@endsection
