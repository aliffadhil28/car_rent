@extends('layout.dashboard')

@section('title', 'Edit Rents Data')
@section('head')
    <style>
        .disable {
            pointer-events: none;
            background: grey;
        }
    </style>
@endsection
@section('content')
    <h1>Edit data</h1>
    <form action="{{ route('rent.update', $data->id) }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="row my-2">
            <div class="col">
                <select class="form-select disable" aria-label="Default select example" name="users_id"
                    @if (Auth::check()) @if (auth()->user()->role == 'head' || auth()->user()->role == 'branch')
                    disabled @endif
                    @endif>
                    <option>-- Select Driver --</option>
                    @foreach ($user as $u)
                        @if ($u->id == $data->users_id)
                            <option selected value="{{ $u->id }}">{{ $u->name }}</option>
                        @endif
                    @endforeach
                </select>
                <input type="hidden" name="users_id" value="{{ $data->users_id }}" />
            </div>
            <div class="col">
                <select class="form-select disable" aria-label="Default select example" name="cars_id"
                    @if (Auth::check()) @if (auth()->user()->role == 'head' || auth()->user()->role == 'branch')
                    disabled @endif
                    @endif>
                    <option>-- Select Car --</option>
                    @foreach ($car as $c)
                        @if ($c->id == $data->cars_id)
                            <option selected value="{{ $c->id }}">{{ $c->name }}</option>
                        @endif
                    @endforeach
                </select>
                <input type="hidden" name="cars_id" value="{{ $data->cars_id }}" />
            </div>
        </div>
        <div class="row my-2">
            <div class="col">
                <select class="form-select disable" aria-label="Default select example" name="accessor1"
                    @if (Auth::check()) @if (auth()->user()->role == 'head' || auth()->user()->role == 'branch')
                    disabled @endif
                    @endif>
                    <option>-- Select Accessor --</option>
                    @foreach ($user as $u)
                        @if ($u->id == $data->accessor1)
                            <option selected value="{{ $u->id }}">{{ $u->name }}</option>
                        @endif
                    @endforeach
                </select>
                <input type="hidden" name="accessor1" value="{{ $data->accessor1 }}" />
            </div>
            <div class="col">
                <select class="form-select disable" aria-label="Default select example"
                    name="accessor2"@if (Auth::check()) @if (auth()->user()->role == 'head' || auth()->user()->role == 'branch')
                    disabled @endif
                    @endif>
                    <option>-- Select Accessor --</option>
                    @foreach ($user as $u)
                        @if ($u->id == $data->accessor2)
                            <option selected value="{{ $u->id }}">{{ $u->name }}</option>
                        @endif
                    @endforeach
                </select>
                <input type="hidden" name="accessor2" value="{{ $data->accessor2 }}" />
            </div>
        </div>
        <div class="row my-2">
            <div class="col">
                <select class="form-select" aria-label="Default select example"
                    @if (Auth::check()) @if (auth()->user()->role == 'head')
                        disabled @endif
                    @endif name="status1">
                    <option>-- Status 1 --</option>
                    <option {{ $data->status1 == 'waiting' ? 'selected' : '' }} value="waiting">Waiting</option>
                    <option {{ $data->status1 == 'accepted' ? 'selected' : '' }} value="accepted">Accepted</option>
                    <option {{ $data->status1 == 'rejected' ? 'selected' : '' }} value="rejected">Rejected</option>
                </select>
                @if (Auth::check())
                    @if (auth()->user()->role == 'head')
                        <input type="hidden" name="status1" value="{{ $data->status1 }}" />
                    @endif
                @endif

            </div>
            <div class="col">
                <select class="form-select" aria-label="Default select example"
                    @if (Auth::check()) @if (auth()->user()->role == 'branch')
                    disabled @endif
                    @endif name="status2">
                    <option>-- Status 2 --</option>
                    <option {{ $data->status2 == 'waiting' ? 'selected' : '' }} value="waiting">Waiting</option>
                    <option {{ $data->status2 == 'accepted' ? 'selected' : '' }} value="accepted">Accepted</option>
                    <option {{ $data->status2 == 'rejected' ? 'selected' : '' }} value="rejected">Rejected</option>
                </select>
                @if (Auth::check())
                    @if (auth()->user()->role == 'branch')
                        <input type="hidden" name="status2" value="{{ $data->status2 }}" />
                    @endif
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="out">Checkout Time</label>
                <input class="form-control" type="datetime-local" name="out" id="out"
                    value="{{ $data->out }}">
            </div>
            <div class="col">
                <label for="in">Checkin Time</label>
                <input class="form-control" type="datetime-local" name="in" id="in"
                    value="{{ $data->in }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
@endsection
