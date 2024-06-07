<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Gestion de livres</title>
</head>
<body>
    <div class="container mt-5">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Liste des Rayons</h2>
        <a href="{{ route('rayons.ajouter') }}" class="btn btn-primary">Ajouter un Rayon</a>
    </div>
        <table class="table table-hover table-bordered border-primary">
            <thead class="table-primary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Libelle</th>
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
                    <td>
                        <a href="{{ route('rayons.modifier', $rayon->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <form action="{{ route('rayons.supprimer', $rayon->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                        </form>  
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFuCJvR5YkITJ4Mkh3w5Yb7VZ04f/7GFsiCZuyWb51Y5f6MeVVVtKRxP0" crossorigin="anonymous"></script>
</body>
</html>
