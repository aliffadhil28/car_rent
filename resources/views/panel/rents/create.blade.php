@extends('layout.dashboard')

@section('title', 'Add Rents Data')

@section('content')
    <h1>Create data</h1>
    <form action="{{ route('rent.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row my-2">
            <div class="col">
                <select class="form-select" aria-label="Default select example" name="users_id">
                    <option selected>-- Select Driver --</option>
                    @foreach ($user as $u)
                        @if ($u->role == 'driver')
                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col">
                <select class="form-select" aria-label="Default select example" name="cars_id">
                    <option selected>-- Select Car --</option>
                    @foreach ($cars as $c)
                        @if ($c->status == 'ready')
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row my-2">
            <div class="col">
                <select class="form-select" aria-label="Default select example" name="accessor1">
                    <option selected>-- Select Accessor --</option>
                    @foreach ($user as $u)
                        @if ($u->role == 'branch')
                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col">
                <select class="form-select" aria-label="Default select example" name="accessor2">
                    <option selected>-- Select Accessor --</option>
                    @foreach ($user as $u)
                        @if ($u->role == 'head')
                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        {{-- <div class="row my-2">
            <div class="col">
                <select class="form-select" aria-label="Default select example"
                    @if (Auth::check()) @if (auth()->user()->role == 'head')
                        disabled @endif
                    @endif>
                    <option selected>-- Status 1 --</option>
                    <option value="waiting">Waiting</option>
                    <option value="accepted">Accepted</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>
            <div class="col">
                <select class="form-select" aria-label="Default select example"
                    @if (Auth::check()) @if (auth()->user()->role == 'branch')
                    disabled @endif
                    @endif>
                    <option selected>-- Status 2 --</option>
                    <option value="waiting">Waiting</option>
                    <option value="accepted">Accepted</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>
        </div> --}}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
