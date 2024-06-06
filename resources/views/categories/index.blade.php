<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bibliothèque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container text-center">
     <div class="row">
      <div class="col s12">
          <h1>Categorie des livres</h1>
          <hr>
          <a href="/ajouter" class="btn btn-primary">Ajouter une categorie</a>
          <hr>
          @if (session('status'))
              <div class="alert alert-succes">
                {{session('status')}}
              </div>
          @endif
         
            <table class="table">
                  <thead>
                      <tr>
                        <th>#</th>
                        <th>Libelle</th>
                        <th>Description</th>
                        <th>Action</th>
                  
                      </tr>
                  </thead>
                  <tbody>

          @php
              $ide = 1;
          @endphp
                    @foreach($categories as $categorie)
                      <tr>
                        <td>{{$ide}}</td>
                        <td>{{$categorie->libelle}}</td>
                        <td>{{$categorie->description}}</td>
                        <td>
                          <a href="/update-etudiant/{{$categorie->id}}" class="btn btn-info">Modifier</a>
                          <a href="/delete-etudiant/{{$categorie->id}}" class="btn btn-danger">Supprimer</a>
                        </td>
                    </td>
          {{-- pour incrémenter les id  --}}
            @php
                $ide += 1;
            @endphp
                    
                    @endforeach
                  </tbody>
            </table>
        </div>
      </div>
    </div>

        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>