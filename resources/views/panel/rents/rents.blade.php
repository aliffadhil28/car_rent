@extends('layout.dashboard')

@section('title', 'Rents Data')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1 class="my-4">Rent Car Data</h1>
        <a class="btn btn-primary" href="/rent/create">Tambah data</a>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Rents
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>Driver</th>
                        <th>Car</th>
                        <th>Accessor 1</th>
                        <th>Accessor 2</th>
                        <th>Status 1</th>
                        <th>Status 2</th>
                        <th>Rented At</th>
                        <th>Return At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rents as $data)
                        <tr>
                            <td>
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
                            </td>
                            <td>
                                @foreach ($user as $u)
                                    @if ($u->id == $data->users_id)
                                        {{ $u->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($car as $c)
                                    @if ($c->id == $data->cars_id)
                                        {{ $c->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($user as $u)
                                    @if ($u->id == $data->accessor1)
                                        {{ $u->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($user as $u)
                                    @if ($u->id == $data->accessor2)
                                        {{ $u->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $data->status1 }}</td>
                            <td>{{ $data->status2 }}</td>
                            <td>{{ $data->out }}</td>
                            <td>{{ $data->in }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
