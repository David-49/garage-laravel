@extends('layouts.app')

@section('content')
   <div class="container-fluid">
       <h1 class="title">List des annonces :</h1>
        @if ($announcement->user_id === $user->id)
             <a href="{{route('edit.announcement', $announcement->id)}}" class="btn btn-warning">Modifier l'annonce</a>
        @endif
        <div class="col">
            <p class="col-1">{{ $announcement->title }}</p>
            <p class="col-1">{{ $announcement->content }}</p>
            <p class="col-1">{{ $announcement->price }} €</p>
        <form action="{{route('add.comment', $announcement->id)}}" method="POST">
            @csrf
            <div class="form-group col-1">
                <label for="">Commentaire :</label>
                <input type="text" placeholder="Ajouter un commantaire...">
            </div>
            <button class="btn btn-primary">Ajouter mon commantaire</button>
            </form>
        <div></div>
       </div>
   </div>
@endsection
