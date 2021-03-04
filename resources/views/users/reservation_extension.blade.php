@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <form method="POST" action="{{ route('user.reservation_extension.store', $vehicle) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Nouvelle date de fin de la réservation</label>
                    <input  class="form-control" type="date" name="new_ending_at">
                </div>
                <button type="submit" class="btn btn-primary">Prolonger la réservation</button>
            </form>
        </div>
        @include('layouts.includes.form-errors')
    </div>
@endsection
