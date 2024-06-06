<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Gestion de livres</title>
    <style>
        .hero {
            background-image: url('https://via.placeholder.com/1920x1080');
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
                    <button type="button" class="btn btn-primary active" data-filter="all">Toutes les catégories</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="fiction">Fiction</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="non-fiction">Non-fiction</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="biographie">Biographie</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="jeunesse">Jeunesse</button>
                </div>
            </div>
        </div>

        @foreach($livres as $livre)

        <div class="row">
            <div class="col-md-6 book-card" data-category="fiction">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://via.placeholder.com/150" class="img-fluid rounded-start" alt="Livre 1">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$livre->titre}}</h5>
                                <p class="card-text">Description du livre 1.</p>
                                <a href="#" class="btn btn-primary">Voir les détails</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

            <div class="col-md-6 book-card" data-category="non-fiction">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://via.placeholder.com/150" class="img-fluid rounded-start" alt="Livre 2">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Livre 2</h5>
                                <p class="card-text">Description du livre 2.</p>
                                <a href="#" class="btn btn-primary">Voir les détails</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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