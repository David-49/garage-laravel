@extends('layouts.app')

@section('content')
   <div class="container-fluid">
       <h1 class="title">List des annonces :</h1>
        <div class="row">
           @foreach($announcements as $announcement)
               <div class="col-lg-3">
                   <div class="card mb-5" style="width: 18rem;">
                       <div class="card-body">
                            <p>{{ $announcement->title }}</p>
                            <p>{{ $announcement->content }}</p>
                            <p>{{ $announcement->price }} €</p>
                            <a href="{{route('show.announcement', $announcement->id)}}" class="btn btn-primary">Voir l'annonce</a>
                             @if ($announcement->user_id === $user->id)
                             <form method="POST" action="{{route('announcement.delete', $announcement->id) }}">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger">Supprimer l'annonce</button>
                            </form>
                            @endif
                       </div>
                   </div>
               </div>
           @endforeach
       </div>
   </div>
@endsection
