<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 10 Custom Login and Registration - Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h1 class="card-title text-center mb-0">Connexion</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('connexion') }}" method="post">
                            @csrf
                            @if (Session::has('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('error') }}
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Entrez votre email"
                                    name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="password"
                                    placeholder="Entrez votre mot de passe" name="password" required>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary btn-block">Connexion</button>
                            </div>
                        </form>
                        <hr>
                        <div class="text-center">
                            <p class="mb-0">Vous n'avez pas de compte ? <a href="{{ route('inscription') }}">Inscrivez-vous
                                    ici</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
