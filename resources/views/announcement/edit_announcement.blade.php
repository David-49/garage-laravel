@extends('layouts.app')

@section('content')
   <div class="container-fluid">
       <h1 class="title">Modifier l'annonce :</h1>
        <div class="row">
           <div class="col-lg-6">
               <form method="POST" action="{{route('update.announcement', $announcement->id)}}">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">Title</label>
                    <input  class="form-control" type="text" name="title" value="{{$announcement->title}}">
                </div>
                <div class="form-group">
                    <label for="">Content</label>
                    <input class="form-control" type="textarea" name="content" value="{{$announcement->content}}">
                </div>
                <div class="form-group">
                    <label for="">price</label>
                    <input class="form-control" type="number" name="price" value="{{$announcement->price}}">
                </div>
                   <button type="submit" class="btn btn-primary">Valider la modification</button>
               </form>
           </div>
       </div>
   </div>
@endsection
