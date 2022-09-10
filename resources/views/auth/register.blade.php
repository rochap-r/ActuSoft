<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>actu-soft.com | Inscription</title>
    <link rel="icon" href="{{ asset('logo/icone.png') }}" type="image/png" />
    <link rel="stylesheet" href="{{ asset('auth/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/my-login.css')}}">
</head>
<body class="my-login-page">
<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-md-center h-100">
            <div class="card-wrapper">

                <div class="cardx fat mt-4">
                    <div class="card-body">
                        <h4 class="card-title">Inscription</h4>
                        <form method="POST" class="my-login-validation" autocomplete="off" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input id="name" type="text" class="form-control" name="name"  autofocus placeholder="Entrez le nom" value="{{ old('name') }}">
                                <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                            </div>

                            <div class="form-group">
                                <label for="email">Adresse e-mail</label>
                                <input id="email" type="email" class="form-control" name="email"  placeholder="Entrez l'e-mail" value="{{ old('email') }}">
                                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                            </div>

                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input id="password" type="password" class="form-control" name="password"  data-eye placeholder="Entrer le mot de passe">
                                <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">Confirmez le mot de passe</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required data-eye placeholder="Entrez le mot de passe de confirmation">
                                <span class="text-danger">@error('password_confirmation'){{ $message }}@enderror</span>

                            </div>

                            <div class="form-group m-0">
                                <button type="submit" class="btn btn-primary btn-block">
                                    S'inscrire
                                </button>
                            </div>
                            <div class="mt-4 text-center">
                                Vous avez déjà un compte? <a href="{{route('login')}}">Connexion</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<script src="{{ asset('blog_template/js/jquery.min.js') }}"></script>
<script src="{{ asset('auth/bootstrap/js/popper.js')}}"></script>
<script src="{{ asset('auth/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{ asset('auth/js/my-login.js')}}"></script>
</body>
</html>