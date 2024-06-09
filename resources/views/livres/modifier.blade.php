<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier un livre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .card-header {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .form-label {
            font-weight: 500;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Mis à jour du livre</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/modifier-livre" class="row g-3">
                            @csrf
                            @if(Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('error') }}
                            </div>
                            @endif
                            <input type="text" name="id" style="display: none;"  value="{{$livres->id}}">

                            <div class="col-md-6">
                                <label for="bookTitle" class="form-label">Titre <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="bookTitle" name="titre"   value="{{$livres->titre}}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="author" class="form-label">Auteur <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="author" name="auteur" value="{{$livres->auteur}}"  required>
                            </div>
                            <div class="col-12">
                                <label for="publisher" class="form-label">Éditeur <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="publisher" name="editeur"  value="{{$livres->editeur}}" required>
                            </div>
                            <div class="col-6">
                                <label for="publicationDate" class="form-label">Date de publication</label>
                                <input type="date" class="form-control" id="publicationDate" name="date_de_publication"  value="{{$livres->date_de_publication}}">
                            </div>
                            <div class="col-6">
                                <label for="publicationDate" class="form-label">Image de couverture</label>
                                <input type="text" class="form-control" id="publicationDate" name="url_image"  value="{{$livres->url_image}}">
                            </div>
                            <div class="col-md-6">
                                <label for="pageCount" class="form-label">Nombre de pages <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="pageCount" name="nombre_de_pages"  value="{{$livres->nombre_de_pages}}"  required>
                            </div>
                            <div class="col-md-6">
                                <label for="isbn" class="form-label">ISBN</label>
                                <input type="text" class="form-control" id="isbn" name="isbn"  value="{{$livres->isbn}}">
                            </div>
                            <div class="col-md-6">
                                <label for="category" class="form-label">Catégorie <span class="text-danger">*</span></label>
                                <select name="categorie_id" id="categorie_id" class="form-select" required>
                                    <option value="">Choisissez une catégorie</option>
                                    @foreach ($categories as $categorie)
                                    <option  value="{{ $categorie->id }}" @selected($categorie->id == $livres->categorie_id)>{{ $categorie->libelle }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="rayon" class="form-label">Rayon <span class="text-danger">*</span></label>
                                <select name="rayon_id" id="rayon_id" class="form-select" required>
                                    <option value="">Choisissez un rayon</option>
                                    @foreach ($rayons as $rayon)
                                        <option value="{{ $rayon->id }}" @selected($rayon->id == $livres->rayon_id)>{{ $rayon->libelle }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">Mettre à jour le livre</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
