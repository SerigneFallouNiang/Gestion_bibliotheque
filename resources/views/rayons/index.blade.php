<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Gestion de livres</title>

<table class="table table-bordered border-primary">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">libelle</th>
        <th scope="col">Partie</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($rayons as $rayon)
      <tr>
        <th scope="row">{{$rayon->id}}</th>
        <td>{{$rayon->libelle}}</td>
        <td>{{$rayon->partie}}</td>
        <td>@mdo
            
        </td>
      </tr>
      @endforeach
     
     
    </tbody>
  </table>