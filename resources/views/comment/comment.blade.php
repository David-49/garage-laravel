<form action="{{route('add.comment', $announcement->id)}}" method="POST">
    @csrf
    <div class="form-group col-1">
        <label for="">Commentaire :</label>
        <input type="text" placeholder="Ajouter un commantaire...">
    </div>
    <button class="btn btn-primary">Ajouter mon commantaire</button>
</form>
<div></div>