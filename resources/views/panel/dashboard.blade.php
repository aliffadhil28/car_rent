@extends('layout.dashboard')

@section('title', 'Dashboard')


@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Primary Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Warning Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Success Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Danger Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar me-1"></i>
                History Rent
            </div>
            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
        </div>
        <h1 class="my-4">Rent Car History</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Rents
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            {{-- <th>Action</th> --}}
                            <th>Driver</th>
                            <th>Car</th>
                            <th>Accessor 1</th>
                            <th>Accessor 2</th>
                            {{-- <th>Status 1</th> --}}
                            {{-- <th>Status 2</th> --}}
                            <th>Rented At</th>
                            <th>Return At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                {{-- <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('rent.edit', $data->id) }}">Edit</a>
                                            </li>
                                            <li>
                                                <form class='mt2' onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('rent.destroy', $data->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type='submit' class='btn btn-danger'>
                                                        Delete
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td> --}}
                                <td>
                                    @foreach ($user as $u)
                                        @if ($u->id == $d->users_id)
                                            {{ $u->name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($car as $c)
                                        @if ($c->id == $d->cars_id)
                                            {{ $c->name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($user as $u)
                                        @if ($u->id == $d->accessor1)
                                            {{ $u->name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($user as $u)
                                        @if ($u->id == $d->accessor2)
                                            {{ $u->name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $d->out }}</td>
                                <td>{{ $d->in }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script type="text/javascript">
        var ctx = document.getElementById('myBarChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: ["Car 1", "Car 2", "Car 3", "Car 4"],
                datasets: [{
                    label: "Rent Car",
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [{{ $c1 }}, {{ $c2 }}, {{ $c3 }},
                        {{ $c4 }}
                    ],
                }]
            },

            // Configuration options go here
            options: {}
        });
    </script>
@endsection
