<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Gestion de livres</title>
    <div class="row col-12 md-3" >
        <form action="{{route('rayons.ajouter')}}" method="POST">
            @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Libelle</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="libelle" name="libelle">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Partie</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="partie" name="partie"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Ajouter une categorie</button>

    </form>
    </div>