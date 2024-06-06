<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter un livre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Ajouter un nouveau livre</h4>
                    </div>
                    <div class="card-body">
                        <form  method="post" action="{{route('livres.ajouter')}}" class="row g-3">
                          @csrf
                            <div class="col-md-6">
                                <label for="bookTitle" class="form-label">Titre</label>
                                <input type="text" class="form-control" id="bookTitle" name="titre" required>
                            </div>
                            <div class="col-md-6">
                                <label for="author" class="form-label">Auteur</label>
                                <input type="text" class="form-control" id="author" name="auteur" required>
                            </div>
                            <div class="col-12">
                                <label for="publisher" class="form-label">Éditeur</label>
                                <input type="text" class="form-control" id="publisher" name="editeur" required>
                            </div>
                            <div class="col-12">
                                <label for="publicationDate" class="form-label">Date de publication</label>
                                <input type="date" class="form-control" id="publicationDate" placeholder="jj/mm/aaaa" name="date_de_publication">
                            </div>
                            <div class="col-md-6">
                                <label for="pageCount" class="form-label">Nombre de pages</label>
                                <input type="number" class="form-control" id="pageCount" required name="nombre_de_pages">
                            </div>
                            <div class="col-md-4">
                                <label for="category" class="form-label">Catégorie</label>
                                <select id="category" class="form-select" required>
                                    <option value="">Choisir...</option>
                                    <option>Fiction</option>
                                    <option>Non-fiction</option>
                                    <option>Biographie</option>
                                    <option>Jeunesse</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="isbn" class="form-label">ISBN</label>
                                <input type="text" class="form-control" id="isbn"  name="isbn">
                            </div>
                          
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">Ajouter le livre</button>
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