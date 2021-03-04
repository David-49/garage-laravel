@extends('layouts.app')

@section('content')
   <div class="container-fluid">
        <div class="row">
           <div class="col-lg-6">
               <form method="POST" action="{{route('user.settings.store.announcement')}}">
                   @csrf
                <div class="form-group">
                    <label for="">Title</label>
                    <input  class="form-control" type="text" name="title">
                </div>
                <div class="form-group">
                    <label for="">Content</label>
                    <input class="form-control" type="textarea" name="content">
                </div>
                <div class="form-group">
                    <label for="">price</label>
                    <input class="form-control" type="number" name="price">
                </div>
                   <button type="submit" class="btn btn-primary">Ajouter une annonce</button>
               </form>
           </div>
       </div>
   </div>
@endsection
