<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 10 Custom Login and Registration - Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h1 class="card-title text-center mb-0">Inscription</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('inscription') }}" method="post">
                        @csrf
                        @if(Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                        @endif
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom Complet</label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" placeholder="Entrez votre nom complet" name="nom" value="{{ old('nom') }}" required>
                            @error('nom')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Entrez votre email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Entrez votre mot de passe" name="password" required>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary btn-block">S'inscrire</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
