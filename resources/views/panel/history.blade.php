@extends('layout.dashboard')

@section('title', 'Rents History')

@section('content')

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

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>

    <script>
        $('#datatablesSimple').dataTable({
            paging: true,
            ordering: true,
            info: false,
            searching: false,
            dom: 'Bfrtip',
            buttons: [{
                "extend": 'excel',
                "text": 'Excel',
                "className": 'btn btn-success btn-xs'
            }],
        });
    </script>
@endsection
