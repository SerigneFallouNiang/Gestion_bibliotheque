<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-oPI8ajgiD5DBXgHy+UFn+6HFan57QOhB0X7IMq/FzK5aRAzB4m/w9jZ9Zf1Tuh0S+0FblLQlSnXjZWPO4yG1GA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHq6TcjK4KfG4pM0iD0f4b8o3hY2lb1nqzj7fPvGZgtp9p9LdcoyJ6qILVEX4yIUsyT4Z4Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gestion de livres</title>
    <style>
        .hero {
            background-image: url('https://img.freepik.com/photos-gratuite/librairie-moderne-presentant-rangees-livres-vibrants_60438-3565.jpg?t=st=1717754917~exp=1717758517~hmac=08ee922b1a55c1879816092cd500579d8d974b5e6d6968364bf866c60c8e5ff0&w=826');
            background-size: cover;
            background-position: center;
            height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{route('livres.index')}}">Gestion de livres</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('categories.index')}}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('rayons.index')}}">Rayons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="ml-auto">
                <form action="{{route('deconnexion')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Déconnexion</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="hero">
        <div class="container">
            <h1 class="display-4">Bienvenue dans notre bibliothèque</h1>
            <p class="lead">Explorez notre vaste collection de livres.</p>
            <form>
                <div class="mb-3">
                    <input type="text" class="form-control" id="searchInput" placeholder="Rechercher un livre">
                </div>
                <button type="submit" class="btn btn-light">Rechercher</button>
            </form>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-12">
                <div class="btn-group" role="group" aria-label="Filtres de catégories">
                    <a href="{{ route('livres.index') }}" class="btn btn-primary {{ !isset($categorieActuelle) ? 'active' : '' }}">Toutes les catégories</a>
                    @foreach($categories as $categorie)
                        <a href="{{ route('livres.categorie', $categorie->id) }}" class="btn btn-outline-primary {{ isset($categorieActuelle) && $categorieActuelle->id == $categorie->id ? 'active' : '' }}">{{ $categorie->libelle }}</a>
                    @endforeach
                </div>
                <a href="{{route('livres.ajouter')}}" class="btn btn-success float-end"><i class="fas fa-plus"></i> Ajouter un livre</a>
            </div>
        </div>
        <div class="row">
            @foreach($livres as $livre)
                {{-- <div class="col-6 book-card mb-3" data-category="{{$livre->categorie->libelle}}"> --}}
                    <div class="col-6 book-card mb-3" data-category="{{ $livre->categorie ? $livre->categorie->libelle : 'Unknown' }}">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{$livre->url_image}}" class="img-fluid rounded-start" alt="{{$livre->titre}}">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{$livre->titre}}</h5>
                                    <ul>
                                        <li>Auteur :{{$livre->auteur}}</li>
                                        <li>{{$livre->nombre_de_pages}} Pages</li>
                                        <li>N~ISBN{{$livre->isbn}}</li>
                                        <li>Rayon : {{ $livre->rayon->libelle }}</li>

                                    </ul>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                       <a onclick="return confirm('Confirmer la suppression')" href="livres/delete/{{$livre->id}}">
                                           <button type="button" class="btn btn-outline-primary"><i class="fa-solid fa-trash" style="color: #c72e23;"></i>Supprimer</button>
                                       </a>
                                       <a href="livres/modifier/{{$livre->id}}">
                                           <button type="button" class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i> Modifier</button>
                                       </a>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        const filterButtons = document.querySelectorAll('.btn-group button');
        const bookCards = document.querySelectorAll('.book-card');

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                const filter = button.dataset.filter;
                filterBooks(filter);
                filterButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
            });
        });

        function filterBooks(category) {
            bookCards.forEach(card => {
                const bookCategory = card.dataset.category;
                if (category === 'all' || bookCategory === category) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>
